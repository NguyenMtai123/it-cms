<?php

namespace Platform\Packages\Page\Http\Controllers;

use Illuminate\Routing\Controller;
use Platform\Packages\Page\Models\Page;

class PublicPageController extends Controller
{
    public function show(string $slugPath)
    {
        $segments = explode('/', trim($slugPath, '/'));

        $slug = array_pop($segments);

        $page = Page::with('parent')
            ->where('slug', $slug)
            ->where('status', 1)
            ->firstOrFail();

        $parents = [];

        $parent = $page->parent;

        while ($parent) {

            array_unshift($parents, $parent->slug);

            $parent = $parent->parent;
        }

        $expectedPath = implode(
            '/',
            array_merge($parents, [$page->slug])
        );

        if ($expectedPath !== $slugPath) {
            abort(404);
        }

        return view('theme::page', compact('page'));
    }
}
