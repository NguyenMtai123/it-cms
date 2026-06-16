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
        $categories = Category::with('parent')
            ->orderBy('sort_order')
            ->paginate(10);

        $categoriesList = Category::whereNull('parent_id')
            ->latest()
            ->get();

        return view(
            'blog::categories.index',
            compact('categories', 'categoriesList')
        );
    }

    public function store(CategoryRequest $request)
    {
        Category::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description,
            'parent_id' => $request->parent_id,
            'status' => $request->boolean('status'),
            'sort_order' => $request->sort_order ?? 0,
        ]);

        return redirect('/admin/blog/categories')
            ->with('success', 'Tạo danh mục thành công');
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
            'sort_order' => $request->sort_order ?? 0,
        ]);

        return redirect('/admin/blog/categories')
            ->with('success', 'Cập nhật danh mục thành công');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);

        $category->delete();

        return back()
            ->with('success', 'Xóa danh mục thành công');
    }
}
