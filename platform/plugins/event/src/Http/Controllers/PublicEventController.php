<?php

namespace Platform\Plugins\Event\Http\Controllers;

use Illuminate\Routing\Controller;
use Platform\Plugins\Event\Models\Event;

class PublicEventController extends Controller
{
    public function index()
    {
        $events = Event::query()
            ->where('status', 1)
            ->latest()
            ->paginate(9);

        return view('theme::pages.events.index', compact('events'));
    }

    public function show(string $slug)
    {
        $event = Event::query()
            ->where('slug', $slug)
            ->where('status', 1)
            ->firstOrFail();

        return view('theme::pages.events.show', compact('event'));
    }
}
