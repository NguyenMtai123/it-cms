<?php

namespace Platform\Plugins\Blog\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Platform\Plugins\Blog\Models\Category;
use Platform\Plugins\Blog\Models\Post;

class PublicPostController extends Controller
{
    public function index(Request $request)
    {
        $query = Post::where('status', 1);

        if ($request->filled('keyword')) {

            $query->where(function ($q) use ($request) {

                $q->where('title', 'like', '%' . $request->keyword . '%')
                    ->orWhere('description', 'like', '%' . $request->keyword . '%');

            });
        }

        $posts = $query
            ->latest()
            ->paginate(10)
            ->withQueryString();

        $categories = Category::where('status', 1)
            ->whereNull('parent_id')
            ->get();

        $featuredPosts = Post::where('status', 1)
            ->where('is_featured', 1)
            ->latest()
            ->take(5)
            ->get();

        $viewed = session()->get('viewed_posts', []);

        $viewedPosts = Post::whereIn('id', $viewed)->get();

        return view(
            'theme::pages.blog.blog',
            compact(
                'posts',
                'categories',
                'featuredPosts',
                'viewedPosts'
            )
        );
    }

    public function show($slug)
    {
        $post = Post::where('slug', $slug)
            ->where('status', 1)
            ->firstOrFail();
        $key = 'viewed_post_' . $post->id;

        if (!session()->has($key)) {

            $post->increment('views');

            session()->put($key, true);
        }

        $categories = Category::where('status', 1)
            ->whereNull('parent_id')
            ->get();

        $featuredPosts = Post::where('status', 1)
            ->where('is_featured', 1)
            ->latest()
            ->take(4)
            ->get();

        /*
         * Bài viết đã xem
         */
        $viewed = session()->get('viewed_posts', []);

        $viewed = array_unique([
            $post->id,
            ...$viewed
        ]);

        $viewed = array_slice($viewed, 0, 5);

        session()->put(
            'viewed_posts',
            $viewed
        );

        $viewedPosts = Post::whereIn('id', $viewed)
            ->where('id', '!=', $post->id)
            ->get();
        $previousPost = Post::where('status', 1)
            ->where('id', '<', $post->id)
            ->orderBy('id', 'desc')
            ->first();

        $nextPost = Post::where('status', 1)
            ->where('id', '>', $post->id)
            ->orderBy('id', 'asc')
            ->first();

        return view(
            'theme::pages.blog.blog-detail',
            compact(
                'post',
                'categories',
                'featuredPosts',
                'viewedPosts',
                'previousPost',
                'nextPost'
            )
        );
    }
    public function category($slug)
    {
        $category = Category::query()
            ->where('slug', $slug)
            ->where('status', 1)
            ->firstOrFail();

        $posts = $category->posts()
            ->where('status', 1)
            ->latest()
            ->paginate(5);

        $categories = Category::where('status', 1)
            ->whereNull('parent_id')
            ->get();

        $featuredPosts = Post::where('status', 1)
            ->where('is_featured', 1)
            ->latest()
            ->take(5)
            ->get();

        return view(
            'theme::pages.blog.category',
            compact(
                'category',
                'posts',
                'categories',
                'featuredPosts'
            )
        );
    }
}
