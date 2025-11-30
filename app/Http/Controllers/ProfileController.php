<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Inertia\Response;

class ProfileController extends Controller
{
    public function profile(): Response
    {
        return Inertia::render('Profile',
            [
                'user' => auth()->user(),
            ]);
    }
}
