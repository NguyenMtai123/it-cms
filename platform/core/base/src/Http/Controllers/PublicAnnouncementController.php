<?php

namespace Platform\Core\Base\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Platform\Core\Base\Models\Announcement;

class PublicAnnouncementController extends Controller
{
    public function index()
    {
        $announcements = Announcement::where('status', 1)
            ->where(function ($q) {
                $q->whereNull('published_at')
                  ->orWhere('published_at', '<=', now());
            })
            ->latest()
            ->paginate(10);

        return view('theme::pages.announcements.index', compact('announcements'));
    }

    public function show($slug)
    {
        $announcement = Announcement::where('slug', $slug)
            ->where('status', 1)
            ->firstOrFail();

        return view('theme::pages.announcements.show', compact('announcement'));
    }
}
