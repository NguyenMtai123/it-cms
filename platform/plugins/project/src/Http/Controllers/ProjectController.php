<?php

namespace Platform\Plugins\Project\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Platform\Plugins\Project\Models\Project;

class ProjectController extends Controller
{
    public function index()
    {
        $items = Project::orderBy('sort_order')
            ->paginate(10);

        return view(
            'project::admin.index',
            compact('items')
        );
    }

    public function edit($id)
    {
        $item = Project::findOrFail($id);

        return view(
            'project::admin.edit',
            compact('item')
        );
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required']
        ]);

        Project::create([

            'name' => $request->name,

            'logo' => $request->logo,

            'url' => $request->url,

            'sort_order' => $request->sort_order ?? 0,

            'status' => $request->boolean('status'),
        ]);

        return back()->with(
            'success',
            'Created successfully'
        );
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required'],
        ]);

        $item = Project::findOrFail($id);

        $item->update([
            'name' => $request->name,
            'logo' => $request->logo,
            'url' => $request->url,
            'sort_order' => $request->sort_order ?? 0,
            'status' => $request->boolean('status'),
        ]);

        return redirect()
            ->route('projects.edit', $item->id)
            ->with('success', 'Project updated successfully.');
    }

    public function destroy($id)
    {
        Project::findOrFail($id)
            ->delete();

        return back()->with(
            'success',
            'Deleted successfully'
        );
    }
}
