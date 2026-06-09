<?php

namespace Platform\Core\Base\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Str;
use Platform\Core\Base\Models\Menu;
use Platform\Core\Base\Models\MenuItem;

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
            ->with('children')
            ->paginate(8);

        return view('base::menus.edit', compact('menu', 'items'));
    }

    public function storeItem(Request $request, $menuId)
    {
        $request->validate([
            'label' => 'required|string|max:255',
        ]);

        MenuItem::create([
            'menu_id' => $menuId,
            'parent_id' => $request->parent_id ?: null,
            'label' => $request->label,

            'url' => $request->url
                ? $request->url
                : '/' . Str::slug($request->label),

            'type' => 'custom',
            'order' => $request->order ?? 999,
            'target_blank' => $request->boolean('target_blank'),
            'is_active' => true,
        ]);

        return back()->with('success', 'Đã thêm menu item');
    }

    public function updateOrder(Request $request)
    {
        foreach ($request->items as $item) {
            MenuItem::where('id', $item['id'])
                ->update(['order' => $item['order']]);
        }

        return response()->json(['status' => true]);
    }

    public function editItem($id)
    {
        $item = MenuItem::findOrFail($id);

        return response()->json($item);
    }

    public function updateItem(Request $request, $id)
    {
        $item = MenuItem::findOrFail($id);

        $item->update([
            'label' => $request->label,

            'url' => $request->url
                ?: '/' . \Str::slug($request->label),

            'parent_id' => $request->parent_id ?: null,

            'target_blank' => $request->boolean('target_blank'),
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
