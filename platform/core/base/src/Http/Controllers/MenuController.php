<?php
namespace Platform\Core\Base\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Platform\Core\Base\Models\Menu;
use Platform\Core\Base\Models\MenuItem;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::latest()->get();

        return view('base::menus.index', compact('menus'));
    }

    public function edit($id)
    {
        $menu = Menu::findOrFail($id);

        $items = MenuItem::where('menu_id', $id)
            ->orderBy('order')
            ->get();

        return view('base::menus.edit', compact('menu', 'items'));
    }

    public function storeItem(Request $request, $menuId)
    {
        $request->validate([
            'label' => 'required',
        ]);

        MenuItem::create([
            'menu_id' => $menuId,
            'label' => $request->label,
            'type' => $request->type ?? 'custom',
            'url' => $request->url,
            'order' => 999,
            'parent_id' => 0,
            'is_active' => 1,
        ]);

        return back();
    }

    public function updateOrder(Request $request)
    {
        foreach ($request->items as $item) {
            MenuItem::where('id', $item['id'])
                ->update(['order' => $item['order']]);
        }

        return response()->json(['status' => true]);
    }
}
