<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Inertia\Response;

class HomeController extends Controller
{
    public function home(Request $request): Response
    {
        $tags = $request->query('tags', false);
        if ($tags) {
            $tags = explode(',', $tags);
        }
        return Inertia::render('Home',
            [
                'isLoggedIn' => Auth::check(),
                'tags' => $tags,
            ]);
    }
}
