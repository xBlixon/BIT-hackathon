<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Tag;
use Illuminate\Http\Request;
use Inertia\Inertia;

class EventController extends Controller
{
    // loading events
    public function index()
    {
        $events = Event::with('tags')
            ->withCount('attendees')
            ->latest()
            ->get();

        return Inertia::render('Welcome', [
            'events' => $events,
        ]);
    }

    // showing the form for creating an event
    public function create()
    {
        // get all tags
        $tags = Tag::all();

        return Inertia::render('AddEvent', [
            'tags' => $tags,
        ]);
    }

    // saving data to database
    public function store(Request $request)
    {
        // checking user input
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string',
            'tags' => 'array',
        ]);

        // create event
        $event = $request->user()->events()->create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'date' => now(),
            'location' => $validated['location'],
        ]);

        // add tags
        if (!empty($validated['tags'])) {
            $event->tags()->attach($validated['tags']);
        }

        // creator is an attendee
        $event->attendees()->attach(auth()->id());

        // go back home
        return redirect()->route('home');
    }
}
