<?php

use App\Models\Event;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('displays events with attendees on the home page', function () {
    User::factory()->count(5)->create(); // Create some extra users
    $user = User::factory()->create();
    $event = Event::factory()->create();
    $event->attendees()->attach($user);

    $response = $this->get('/');

    $response->assertStatus(200);

    $response->assertInertia(fn (Inertia\Testing\AssertableInertia $page) =>
        $page->component('Home')
             ->has('events')
             ->where('events.data.0.id', $event->id)
             ->where('events.data.0.attendees.0.id', $user->id)
    );
});
