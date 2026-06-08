<?php

namespace Platform\Plugins\Blog\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Str;
use Platform\Plugins\Blog\Http\Requests\TagRequest;
use Platform\Plugins\Blog\Models\Tag;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::latest()->paginate(10);

        return view('blog::tags.index', compact('tags'));
    }

    public function store(TagRequest $request)
    {
        $request->validate([
            'name' => ['required'],
        ]);

        $slug = Str::slug($request->name);

        $count = Tag::where('slug', 'like', $slug . '%')->count();

        if ($count > 0) {
            $slug .= '-' . ($count + 1);
        }

        Tag::create([
            'name' => $request->name,
            'slug' => $slug,
        ]);

        return back()->with(
            'success',
            'Tag created'
        );
    }
    public function update(TagRequest $request, $id)
{
    $tag = Tag::findOrFail($id);

    $request->validate([
        'name' => ['required'],
    ]);

    $slug = Str::slug($request->name);

    $count = Tag::where('slug', 'like', $slug . '%')
        ->where('id', '!=', $id)
        ->count();

    if ($count > 0) {
        $slug .= '-' . ($count + 1);
    }

    $tag->update([
        'name' => $request->name,
        'slug' => $slug,
    ]);

    return back()->with('success', 'Tag updated');
}

    public function destroy($id)
    {
        Tag::findOrFail($id)->delete();

        return back();
    }
}
