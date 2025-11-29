<?php

use App\Models\Event;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('creates an event with a user', function () {
    $event = Event::factory()->create();

    expect($event->user_id)->not->toBeNull();
    expect($event->user)->toBeInstanceOf(User::class);
});