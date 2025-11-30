<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Inertia\Response;

class HomeController extends Controller
{
    public function home(Request $request): Response
    {
        $filteredTagNames = array_filter((array) $request->query('tags', []));

        if (!empty($filteredTagNames)) {
            $tags = Tag::whereIn('name', $filteredTagNames)->get();
            $eventsQuery = Event::fetchByTags($tags);
        } else {
            $eventsQuery = Event::query();
        }

        $events = $eventsQuery->with('tags')->withCount('attendees')->latest()->paginate(15);
        return Inertia::render('Home', [
            'events' => $events->all(),
            'isLoggedIn' => Auth::check(),
            'allTags' => Tag::all(),
            'filteredTags' => $filteredTagNames,
        ]);
    }
}
