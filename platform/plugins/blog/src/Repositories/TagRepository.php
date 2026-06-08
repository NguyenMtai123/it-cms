<?php

namespace Platform\Plugins\Blog\Repositories;

use Platform\Plugins\Blog\Models\Tag;

class TagRepository
{
    public function paginate(int $perPage = 10)
    {
        return Tag::latest()->paginate($perPage);
    }

    public function all()
    {
        return Tag::all();
    }

    public function create(array $data): Tag
    {
        return Tag::create($data);
    }

    public function findOrFail(int $id): Tag
    {
        return Tag::findOrFail($id);
    }

    public function delete(Tag $tag): bool
    {
        return (bool) $tag->delete();
    }
}
