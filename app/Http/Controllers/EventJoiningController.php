<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class EventJoiningController extends Controller
{
    public function join(Request $request, Event $event): RedirectResponse
    {
        $user = $request->user();

        if (!$event->attendees()->where('user_id', $user->id)->exists()) {
            $event->attendees()->attach($user->id);
        }

        return redirect()->route('home');
    }
}
