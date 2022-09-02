<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        User::factory(3)->create();
        Post::factory(500)->create();

        Category::create([
                'name' => 'Web Programming',
                'slug' => 'web-programming',
            ]);
        Category::create([
                'name' => 'Personal',
                'slug' => 'personal',
            ]);
        Category::create([
                'name' => 'Web Design',
                'slug' => 'web-design',
            ]);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
