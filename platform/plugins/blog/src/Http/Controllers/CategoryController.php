<?php

namespace Platform\Plugins\Blog\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Str;
use Platform\Plugins\Blog\Http\Requests\CategoryRequest;
use Platform\Plugins\Blog\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::with('parent')->latest()->paginate(10);
        $categoriesList = Category::whereNull('parent_id')->latest()->get();

        return view('blog::categories.index', compact('categories', 'categoriesList'));
    }

    public function create()
    {
        return view('blog::categories.create');
    }

    public function store(CategoryRequest $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        Category::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description,
            'parent_id' => $request->parent_id,
            'status' => $request->boolean('status'),
        ]);

        return redirect('/admin/blog/categories');
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);

        $categories = Category::where('id', '!=', $id)->get();

        return view(
            'blog::categories.edit',
            compact('category', 'categories')
        );
    }

    public function update(CategoryRequest $request, $id)
    {
        $category = Category::findOrFail($id);

        $category->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description,
            'parent_id' => $request->parent_id,
            'status' => $request->boolean('status'),
        ]);

        return redirect('/admin/blog/categories');
    }

    public function destroy($id)
    {
        Category::findOrFail($id)->delete();

        return back();
    }
}
