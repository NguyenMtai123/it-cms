<?php

namespace Platform\Plugins\Event\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Str;
use Platform\Plugins\Event\Models\Event;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::latest()->paginate(10);
        return view('event::events.index', compact('events'));
    }

    public function create()
    {
        return view('event::events.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
        ]);

        Event::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'description' => $request->description,
            'content' => $request->input('content'),
            'location' => $request->location,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'status' => $request->boolean('status'),
        ]);

        return redirect()->route('events.index')
            ->with('success', 'Created event');
    }

    public function edit($id)
    {
        $event = Event::findOrFail($id);
        return view('event::events.edit', compact('event'));
    }

    public function update(Request $request, $id)
    {
        $event = Event::findOrFail($id);

        $event->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'description' => $request->description,
            'content' => $request->input('content'),
            'location' => $request->location,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'status' => $request->boolean('status'),
        ]);

        return back()->with('success', 'Updated');
    }

    public function destroy($id)
    {
        Event::findOrFail($id)->delete();
        return back()->with('success', 'Deleted');
    }
}
