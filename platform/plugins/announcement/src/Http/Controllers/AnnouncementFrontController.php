<?php

namespace Platform\Plugins\Announcement\Http\Controllers;

use Illuminate\Routing\Controller;
use Platform\Plugins\Announcement\Models\Announcement;

class AnnouncementFrontController extends Controller
{
    public function index()
    {
        $announcements = Announcement::query()
            ->where('is_active', true)
            ->latest()
            ->paginate(10);

        return view(
            'theme::announcements.index',
            compact('announcements')
        );
    }

    public function show($slug)
    {
        $announcement = Announcement::where(
            'slug',
            $slug
        )->firstOrFail();

        return view(
            'theme::announcements.show',
            compact('announcement')
        );
    }
}
