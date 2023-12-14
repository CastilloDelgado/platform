<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Post;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::truncate();
        Category::truncate();
        Post::truncate();

        User::factory(1)->create();

        $c1 = Category::create([
            'name' => "Rock",
            'slug' => "rock"
        ]);

        $c2 = Category::create([
            'name' => "Techno",
            'slug' => "techno"
        ]);

        $c3 = Category::create([
            'name' => "Indie",
            'slug' => "indie"
        ]);

        Post::create([
            'title' => "A Rock Post",
            'slug' => "a-rock-post",
            'excerpt' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam modi eligendi expedita maxime? Magnam inventore quos dolores distinctio voluptatibus maxime ipsam nulla eius, optio quam autem, dolorem ut expedita officia.",
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam modi eligendi expedita maxime? Magnam inventore quos dolores distinctio voluptatibus maxime ipsam nulla eius, optio quam autem, dolorem ut expedita officia.",
            "category_id" => $c1->id,
            "user_id" => 1
        ]);

        Post::create([
            'title' => "A Techno Post",
            'slug' => "a-techno-post",
            'excerpt' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam modi eligendi expedita maxime? Magnam inventore quos dolores distinctio voluptatibus maxime ipsam nulla eius, optio quam autem, dolorem ut expedita officia.",
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam modi eligendi expedita maxime? Magnam inventore quos dolores distinctio voluptatibus maxime ipsam nulla eius, optio quam autem, dolorem ut expedita officia.",
            "category_id" => $c2->id,
            "user_id" => 1
        ]);

        Post::create([
            'title' => "A Indie Post",
            'slug' => "a-indie-post",
            'excerpt' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam modi eligendi expedita maxime? Magnam inventore quos dolores distinctio voluptatibus maxime ipsam nulla eius, optio quam autem, dolorem ut expedita officia.",
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam modi eligendi expedita maxime? Magnam inventore quos dolores distinctio voluptatibus maxime ipsam nulla eius, optio quam autem, dolorem ut expedita officia.",
            "category_id" => $c3->id,
            "user_id" => 1
        ]);


        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
