<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\PostImage;
use Database\Factories\PostCommentFactory;
use Database\Factories\PostImageFactory;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Post;
use App\Models\PostComment;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::truncate();
        // Category::truncate();
        // PostComment::truncate();
        // Post::truncate();

        PostComment::factory(10)->create();

        PostImage::factory()->create([
            'post_id' => 1,
            'image_url' => 'cgsUpXShBU9bOAHbvLvchHCRr71cGCD5Y2T5jgrC.png'
        ]);
        PostImage::factory()->create([
            'post_id' => 1,
            'image_url' => 'eZ9rraD9XD7uX01c1k4ZZIjPegs9zXsE5P58bgdJ.png'
        ]);
        PostImage::factory()->create([
            'post_id' => 1,
            'image_url' => 'yqoY8bGzdGqwnPqVchlgluzzWco2uf64nH2pPn16.png'
        ]);
    }
}
