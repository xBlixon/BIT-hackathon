<?php

namespace Database\Factories;

use App\Models\Event;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->text(50),
            'description' => $this->faker->text(),
            'date' => $this->faker->date(),
            'location' => $this->faker->address(),
            'user_id' => User::factory(),
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Event $event) {
            $tags = Tag::all()->random(rand(1, 3))->pluck('id');
            $event->tags()->attach($tags);
        });
    }
}
