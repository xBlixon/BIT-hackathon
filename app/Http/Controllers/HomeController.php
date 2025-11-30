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
        $filteredTags = $request->query('tags', false);
        $events = null;
        if ($filteredTags) {
            $filteredTags = Tag::fetchFromQueryString($filteredTags);
            $events = Event::fetchByTags($filteredTags);
        } else {
            $events = Event::all();
        }
        dd($events);
        return Inertia::render('Home',
            [
                'isLoggedIn' => Auth::check(),
                'allTags' => Tag::all(),
                'filteredTags' => $filteredTags,
            ]);
    }
}
