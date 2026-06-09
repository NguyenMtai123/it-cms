<?php

namespace Platform\Core\Base\Http\Controllers;

use Illuminate\Routing\Controller;
use Platform\Core\Base\Models\Announcement;
use Platform\Plugins\Banner\Models\Banner;
use Platform\Plugins\Blog\Models\Category;
use Platform\Plugins\Blog\Models\Post;

class HomeController extends Controller
{
    public function index()
    {
        $sliders = Banner::where('status', 1)
            ->orderBy('sort_order')
            ->take(5)
            ->get();

        $featuredPosts = Post::where('status', 1)
            ->latest()
            ->take(4)
            ->get();

        $latestPosts = Post::where('status', 1)
            ->latest()
            ->paginate(4);

        $categories = Category::latest()->take(8)->get();

        $announcements = Announcement::where('status', 1)
            ->latest()
            ->take(5)
            ->get();

        return view('theme::home', compact(
            'sliders',
            'featuredPosts',
            'latestPosts',
            'categories',
            'announcements'
        ));
    }
}
