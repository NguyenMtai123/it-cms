<?php

namespace Platform\Core\Base\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Platform\Plugins\Blog\Models\Post;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $keyword = trim($request->get('q', ''));

        $posts = Post::query()
            ->where('status', 1)
            ->when($keyword, function ($query) use ($keyword) {

                $query->where(function ($q) use ($keyword) {

                    $q->where('title', 'like', "%{$keyword}%")
                        ->orWhere('description', 'like', "%{$keyword}%")
                        ->orWhere('content', 'like', "%{$keyword}%");
                });
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view(
            'theme::search',
            compact('posts', 'keyword')
        );
    }
}
