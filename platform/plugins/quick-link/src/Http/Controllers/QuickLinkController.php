<?php

namespace Platform\Plugins\QuickLink\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Platform\Plugins\QuickLink\Models\QuickLink;

class QuickLinkController extends Controller
{
    public function index()
    {
        $items = QuickLink::orderBy('sort_order')->get();

        return view(
            'quick-link::admin.index',
            compact('items')
        );
    }

    public function show($id)
    {
        return response()->json(
            QuickLink::findOrFail($id)
        );
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'max:255'],
        ]);

        QuickLink::create([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'url' => $request->url,
            'background_color' => $request->background_color ?: '#ffffff',
            'sort_order' => $request->sort_order ?? 0,
            'status' => $request->boolean('status'),
        ]);

        return redirect('/admin/quick-links')
            ->with('success', 'Created successfully');
    }

    public function update(Request $request, $id)
    {
        $item = QuickLink::findOrFail($id);

        $request->validate([
            'title' => ['required', 'max:255'],
        ]);

        $item->update([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'url' => $request->url,
            'background_color' => $request->background_color ?: '#ffffff',
            'sort_order' => $request->sort_order ?? 0,
            'status' => $request->boolean('status'),
        ]);

        return redirect('/admin/quick-links')
            ->with('success', 'Updated successfully');
    }

    public function destroy($id)
    {
        QuickLink::findOrFail($id)->delete();

        return back()
            ->with('success', 'Deleted successfully');
    }
}
