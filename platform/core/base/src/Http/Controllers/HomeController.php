<?php

namespace Platform\Core\Base\Http\Controllers;

use Illuminate\Routing\Controller;
use Platform\Plugins\Blog\Models\Post;
use Platform\Plugins\Blog\Models\Category;
use Platform\Core\Base\Models\Announcement;

class HomeController extends Controller
{
    public function index()
    {
        $featuredPosts = Post::where('status', 1)
            ->latest()
            ->take(4)
            ->get();

        $latestPosts = Post::where('status', 1)
            ->latest()
            ->paginate(4);

        $categories = Category::query()
            ->latest()
            ->take(8)
            ->get();

        $announcements = Announcement::where('status', 1)
            ->latest()
            ->take(5)
            ->get();

        return view('theme::home', compact(
            'featuredPosts',
            'categories',
            'latestPosts',
            'announcements'
        ));
    }
}
