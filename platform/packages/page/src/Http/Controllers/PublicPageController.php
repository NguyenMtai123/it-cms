<?php

namespace Platform\Packages\Page\Http\Controllers;

use Illuminate\Routing\Controller;
use Platform\Packages\Page\Models\Page;

class PublicPageController extends Controller
{
    public function show(string $slug)
    {
        $page = Page::where('slug', $slug)
            ->where('status', 1)
            ->where(function ($q) {
                $q->whereNull('published_at')
                  ->orWhere('published_at', '<=', now());
            })
            ->firstOrFail();

        return view('theme::page', compact('page'));
    }
}
