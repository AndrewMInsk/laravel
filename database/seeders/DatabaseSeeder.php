<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $cats = Category::factory(10)->create();
        $posts = Post::factory(10)->create();
        $tags = Tag::factory(10)->create();
        foreach ($posts as $post) {
            $post->tags()->attach($tags->random(2));
        }
       //  \App\Models\User::factory(10)->create();

    }
}
