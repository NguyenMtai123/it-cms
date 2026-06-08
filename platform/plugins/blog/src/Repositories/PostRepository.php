<?php

namespace Platform\Plugins\Blog\Repositories;

use Platform\Plugins\Blog\Models\Post;

class PostRepository
{
    public function paginate(int $perPage = 10)
    {
        return Post::latest()->paginate($perPage);
    }

    public function find(int $id): ?Post
    {
        return Post::find($id);
    }

    public function findOrFail(int $id): Post
    {
        return Post::findOrFail($id);
    }

    public function create(array $data): Post
    {
        return Post::create($data);
    }

    public function update(Post $post, array $data): bool
    {
        return $post->update($data);
    }

    public function delete(Post $post): bool
    {
        return (bool) $post->delete();
    }
}
