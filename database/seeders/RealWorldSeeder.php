<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Article;
use App\Models\Comment;
use App\Models\Tag;

class RealWorldSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $users = User::factory(10)->create();


        $articles = Article::factory(20)->create([
            'user_id' => $users->random()->id,
        ]);


        Comment::factory(30)->create([
            'user_id' => $users->random()->id,
            'article_id' => $articles->random()->id,
        ]);

        $tags = Tag::factory(5)->create();

        foreach ($articles as $article) {
            $article->tags()->attach(
                $tags->random(rand(1, 3))->pluck('id')->toArray()
            );
        }
    }
}
