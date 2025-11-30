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
    /**
     * Query String:
     * page - number of the page of events
     * tags[#] - tag to be filtered by
     * search - title text to filter by
     * @param Request $request
     * @return Response
     */
    public function home(Request $request): Response
    {
        $filteredTagNames = array_filter((array) $request->query('tags', []));

        if (!empty($filteredTagNames)) {
            $tags = Tag::whereIn('name', $filteredTagNames)->get();
            $eventsQuery = Event::fetchByTags($tags);
        } else {
            $eventsQuery = Event::query();
        }

        $textSearch = '%'.$request->query('search').'%' ?? '%';

        $events = $eventsQuery
            ->with('tags')
            ->withCount('attendees')
            ->latest()
            ->whereLike('title', $textSearch)
            ->paginate(15)
            ->all();

        return Inertia::render('Home', [
            'events' => $events,
            'isLoggedIn' => Auth::check(),
            'allTags' => Tag::all(),
            'filteredTags' => $filteredTagNames,
        ]);
    }
}
