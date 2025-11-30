<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Tag;
use Illuminate\Http\Request;
use Inertia\Inertia;

class EventController extends Controller
{
    //loading events
    public function index()
    {
        $events = Event::with('tags')
            ->withCount('attendees') 
            ->latest()
            ->get();

        return Inertia::render('Welcome', [
            'events' => $events
        ]);
    }

    //showing the form for creating an event
    public function create()
    {
        //get all tags
        $tags = Tag::all();

        return Inertia::render('Events/Create', [
            'tags' => $tags
        ]);
    }

    //saving data to database
    public function store(Request $request)
    {
        //checking user input
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'date'        => 'required|date',
            'location'    => 'required|string',
            'tags'        => 'array', 
        ]);

        //create event
        $event = $request->user()->events()->create([
            'title'       => $validated['title'],
            'description' => $validated['description'],
            'date'        => $validated['date'],
            'location'    => $validated['location'],
        ]);

        //add tags
        if (!empty($validated['tags'])) {
            $event->tags()->attach($validated['tags']);
        }

        //go back home
        return redirect()->route('home');
    }
}