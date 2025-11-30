<?php

namespace Database\Seeders;

use Database\Factories\TagFactory;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TagFactory::new()->create(['name' => 'art']);
        TagFactory::new()->create(['name' => 'science']);
        TagFactory::new()->create(['name' => 'sport']);
    }
}
