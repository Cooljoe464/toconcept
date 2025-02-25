<?php

namespace Database\Seeders;

use App\Models\Tags;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Console\View\Components\Task;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

//        User::factory()->create([
//            'name' => 'Test User',
//            'email' => 'test@example.com',
//        ]);

//        Tags::factory(2)->create();

        Tags::create(
            ['name' => 'Weddings', 'slug' => 'weddings'],
            ['name' => 'Portraits', 'slug' => 'portraits']
        );
    }

}
