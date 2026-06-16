<?php

namespace Platform\Plugins\Admission\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Platform\Plugins\Admission\Models\Admission;

class AdmissionController extends Controller
{
    public function index()
    {
        $items = Admission::orderBy('sort_order')->get();

        return view(
            'admission::admin.index',
            compact('items')
        );
    }
    public function show($id)
    {
        return Admission::findOrFail($id);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required'],
        ]);

        Admission::create([
            'title' => $request->title,
            'description' => $request->description,
            'url' => $request->url,
            'sort_order' => $request->sort_order ?? 0,
            'status' => $request->boolean('status'),
        ]);

        return back()
            ->with('success', 'Created successfully');
    }
    public function update(
        Request $request,
        $id
    ) {
        $item = Admission::findOrFail($id);

        $item->update([
            'title' => $request->title,
            'description' => $request->description,
            'url' => $request->url,
            'sort_order' => $request->sort_order ?? 0,
            'status' => $request->boolean('status'),
        ]);

        return back()
            ->with('success', 'Updated successfully');
    }
    public function destroy($id)
    {
        Admission::findOrFail($id)
            ->delete();

        return back()
            ->with('success', 'Deleted successfully');
    }
}
