<?php

namespace Platform\Plugins\Blog\Repositories;

use Platform\Plugins\Blog\Models\Category;

class CategoryRepository
{
    public function paginate(int $perPage = 10)
    {
        return Category::latest()->paginate($perPage);
    }

    public function all()
    {
        return Category::all();
    }

    public function findOrFail(int $id): Category
    {
        return Category::findOrFail($id);
    }

    public function create(array $data): Category
    {
        return Category::create($data);
    }

    public function update(Category $category, array $data): bool
    {
        return $category->update($data);
    }

    public function delete(Category $category): bool
    {
        return (bool) $category->delete();
    }
}
