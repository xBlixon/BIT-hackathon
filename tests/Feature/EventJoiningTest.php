<?php

use App\Models\Event;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

beforeEach(function () {
    $this->seed(\Database\Seeders\TagSeeder::class);
    $this->withoutMiddleware(\App\Http\Middleware\VerifyCsrfToken::class);
});

it('allows a user to join an event', function () {
    $user = User::factory()->create();
    $event = Event::factory()->create();

    $this->actingAs($user)
        ->post(route('events.join', $event))
        ->assertRedirect(route('home'));

    $event->refresh();

    expect($event->attendees)->toHaveCount(1);
    expect($event->attendees->first()->id)->toBe($user->id);
});

it('does not add a user multiple times to an event', function () {
    $user = User::factory()->create();
    $event = Event::factory()->create();

    // First attempt to join
    $this->actingAs($user)
        ->post(route('events.join', $event))
        ->assertRedirect(route('home'));

    // Second attempt to join
    $this->actingAs($user)
        ->post(route('events.join', $event))
        ->assertRedirect(route('home'));

    $event->refresh();

    expect($event->attendees)->toHaveCount(1);
    expect($event->attendees->first()->id)->toBe($user->id);
});

