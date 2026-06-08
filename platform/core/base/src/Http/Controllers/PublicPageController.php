<?php
namespace Platform\Core\Base\Http\Controllers;

use Illuminate\Routing\Controller;
use Platform\Plugins\Page\Models\Page;

class PublicPageController extends Controller
{
    public function show($slug)
    {
        $page = Page::where('slug', $slug)
            ->where('status', 1)
            ->firstOrFail();

        return view('theme::page', compact('page'));
    }
}
