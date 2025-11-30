<?php

use App\Models\Event;

use App\Models\User;

use Illuminate\Foundation\Testing\RefreshDatabase;



uses(RefreshDatabase::class);



beforeEach(function () {

    $this->seed(\Database\Seeders\TagSeeder::class);

});



it('creates an event with a user', function () {

    $event = Event::factory()->create();



    expect($event->user_id)->not->toBeNull();

    expect($event->user)->toBeInstanceOf(User::class);

});



it('attaches tags to an event', function () {

    $event = Event::factory()->create();



    expect($event->tags)->not->toBeEmpty();

});



it('fetches events by tags', function () {

    $artTag = \App\Models\Tag::where('name', 'art')->first();

    $scienceTag = \App\Models\Tag::where('name', 'science')->first();



    $event1 = Event::factory()->create();

    $event1->tags()->sync([$artTag->id]);



    $event2 = Event::factory()->create();

    $event2->tags()->sync([$scienceTag->id]);



    $events = Event::fetchByTags(collect([$artTag]));



    expect($events)->toHaveCount(1);

    expect($events->first()->id)->toBe($event1->id);

});




