<?php

namespace Platform\Plugins\Blog\Http\Controllers;

use Illuminate\Routing\Controller;
use Platform\Plugins\Blog\Models\Post;

class PublicPostController extends Controller
{
    public function index()
{
    $posts = Post::where('status', 1)
        ->latest()
        ->paginate(6);

    return view('theme::pages.blog', compact('posts'));
}

    public function show($slug)
    {
        $post = Post::where('slug', $slug)
            ->where('status', 1)
            ->firstOrFail();

        return view('theme::pages.blog-detail', compact('post'));
    }
}
