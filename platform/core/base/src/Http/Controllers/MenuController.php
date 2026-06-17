<?php

namespace Platform\Core\Base\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Str;
use Platform\Core\Base\Models\Menu;
use Platform\Core\Base\Models\MenuItem;
use Platform\Packages\Page\Models\Page;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::latest()->get();

        return view('base::menus.index', compact('menus'));
    }
    public function create()
    {
        return view('base::menus.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'location' => 'required|max:100',
        ]);

        Menu::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'location' => $request->location,
            'is_active' => true,
        ]);

        return redirect()
            ->route('menus.index')
            ->with('success', 'Tạo menu thành công');
    }

    public function edit($id)
    {
        $menu = Menu::findOrFail($id);

        $items = MenuItem::where('menu_id', $id)
            ->whereNull('parent_id')
            ->orderBy('order')
            ->with([
                'children' => function ($q) {
                    $q->orderBy('order');
                }
            ])
            ->paginate(8);

        $pages = Page::orderBy('title')->get();

        return view(
            'base::menus.edit',
            compact(
                'menu',
                'items',
                'pages'
            )
        );
    }
    public function storeItem(Request $request, $menuId)
    {
        $request->validate([
            'label' => 'required|string|max:255',
        ]);

        $page = null;

        if ($request->page_id) {

            $page = Page::find($request->page_id);

        }

        MenuItem::create([

            'menu_id' => $menuId,

            'parent_id' => $request->parent_id ?: null,

            'label' => $request->label,

            'page_id' => $request->page_id,

            'url' => $page
                ? parse_url($page->url, PHP_URL_PATH)
                : $request->url,

            'type' => $page
                ? 'page'
                : 'custom',

            'order' => $request->order ?? 999,

            'target_blank' => $request->boolean('target_blank'),

            'is_active' => true,
        ]);

        return back()->with(
            'success',
            'Đã thêm menu item'
        );
    }
    // public function storeItem(Request $request, $menuId)
    // {
    //     $request->validate([
    //         'label' => 'required|string|max:255',
    //     ]);

    //     MenuItem::create([
    //         'menu_id' => $menuId,
    //         'parent_id' => $request->parent_id ?: null,
    //         'label' => $request->label,

    //         'url' => $request->url
    //             ? $request->url
    //             : '/' . Str::slug($request->label),

    //         'type' => 'custom',
    //         'order' => $request->order ?? 999,
    //         'target_blank' => $request->boolean('target_blank'),
    //         'is_active' => true,
    //     ]);

    //     return back()->with('success', 'Đã thêm menu item');
    // }

    public function updateOrder(Request $request)
    {
        foreach ($request->items as $item) {
            MenuItem::where('id', $item['id'])->update([
                'order' => $item['order'],
                'parent_id' => $item['parent_id'],
            ]);
        }

        return response()->json([
            'status' => true,
        ]);
    }
    public function editItem($id)
    {
        $item = MenuItem::with('page')
            ->findOrFail($id);

        $parents = MenuItem::where('menu_id', $item->menu_id)
            ->whereNull('parent_id')
            ->where('id', '!=', $item->id)
            ->get();

        return response()->json([
            'item' => $item,
            'parents' => $parents,
        ]);
    }

    public function updateItem(Request $request, $id)
    {
        $request->validate([
            'label' => 'required|max:255',
            'parent_id' => 'nullable|exists:menu_items,id',
            'order' => 'nullable|integer',
        ]);
        $item = MenuItem::findOrFail($id);
        if ($request->parent_id == $item->id) {
            return back()->withErrors([
                'parent_id' => 'Menu không thể là cha của chính nó'
            ]);
        }
        $page = null;

        if ($request->page_id) {

            $page = Page::find($request->page_id);

        }
        $item->update([

            'label' => $request->label,

            'page_id' => $request->page_id,

            'url' => $page
                ? parse_url($page->url, PHP_URL_PATH)
                : $request->url,

            'parent_id' => $request->filled('parent_id')
                ? $request->parent_id
                : null,

            'order' => $request->order ?? 0,

            'target_blank' => $request->has('target_blank'),
        ]);

        return back()
            ->with('success', 'Cập nhật menu item thành công');
    }


    public function destroyItem($id)
    {
        $item = MenuItem::findOrFail($id);

        $this->deleteChildren($item);

        $item->delete();

        return back()->with(
            'success',
            'Đã xóa menu item và toàn bộ menu con'
        );
    }

    private function deleteChildren(MenuItem $item)
    {
        foreach ($item->children as $child) {

            $this->deleteChildren($child);

            $child->delete();
        }
    }

}
