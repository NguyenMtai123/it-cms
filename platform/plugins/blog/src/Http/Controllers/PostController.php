<?php

namespace Platform\Plugins\Blog\Http\Controllers;

use Platform\Plugins\Blog\Http\Requests\PostRequest;
use Illuminate\Routing\Controller;
use Illuminate\Support\Str;
use Platform\Plugins\Blog\Models\Category;
use Platform\Plugins\Blog\Models\Post;
use Platform\Plugins\Blog\Models\Tag;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with([
            'author',
            'categories'
        ])
            ->latest()
            ->paginate(6);

        return view(
            'blog::posts.index',
            compact('posts')
        );
    }

    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('blog::posts.create', compact('categories', 'tags'));
    }

    public function store(PostRequest $request)
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'content' => ['nullable', 'string'],
            'image' => ['nullable', 'string'],
            'status' => ['nullable', 'boolean'],
            'is_featured' => ['nullable', 'boolean'],
            'categories' => ['nullable', 'array'],
            'categories.*' => ['integer'],
            'tags' => ['nullable', 'array'],
            'tags.*' => ['integer'],
        ]);

        $post = Post::create([
            'title' => $data['title'],
            'slug' => Str::slug($data['title']) . '-' . time(),
            'description' => $data['description'] ?? null,
            'content' => $data['content'] ?? null,
            'image' => $data['image'] ?? null,
            'status' => $request->boolean('status'),
            'is_featured' => $request->boolean('is_featured'),
            'author_id' => auth()->id(),
        ]);

        if (!empty($data['categories'])) {
            $post->categories()->sync($data['categories']);
        }

        if (!empty($data['tags'])) {
            $post->tags()->sync($data['tags']);
        }

        return redirect('/admin/blog/posts')->with('success', 'Tạo bài viết thành công');
    }

    public function edit(int $id)
    {
        $post = Post::findOrFail($id);
        $categories = Category::all();
        $tags = Tag::all();

        $selectedCategories = $post->categories->pluck('id')->toArray();
        $selectedTags = $post->tags->pluck('id')->toArray();

        return view('blog::posts.edit', compact(
            'post',
            'categories',
            'tags',
            'selectedCategories',
            'selectedTags'
        ));
    }

    public function update(PostRequest $request, int $id)
    {
        $post = Post::findOrFail($id);

        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'content' => ['nullable', 'string'],
            'image' => ['nullable', 'string'],
            'status' => ['nullable', 'boolean'],
            'is_featured' => ['nullable', 'boolean'],
            'categories' => ['nullable', 'array'],
            'categories.*' => ['integer'],
            'tags' => ['nullable', 'array'],
            'tags.*' => ['integer'],
        ]);

        $post->update([
            'title' => $data['title'],
            'slug' => Str::slug($data['title']) . '-' . $post->id,
            'description' => $data['description'] ?? null,
            'content' => $data['content'] ?? null,
            'image' => $data['image'] ?? null,
            'status' => $request->boolean('status'),
            'is_featured' => $request->boolean('is_featured'),
        ]);

        $post->categories()->sync($data['categories'] ?? []);
        $post->tags()->sync($data['tags'] ?? []);

        return redirect('/admin/blog/posts')->with('success', 'Cập nhật thành công');
    }

    public function destroy(int $id)
    {
        $post = Post::findOrFail($id);

        $post->categories()->detach();
        $post->tags()->detach();
        $post->delete();

        return back()->with('success', 'Xóa thành công');
    }
}
