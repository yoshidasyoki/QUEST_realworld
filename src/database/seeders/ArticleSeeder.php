<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Article;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $article1 = Article::factory()->create([
            'id' => 1,
            'user_id' => 1,
            'title' => 'How to build webapps that scale',
            'meta_description' => 'This is the description for the post.',
            'body' => 'This is the body for the post.',
        ]);
        $article1->tags()->attach([12, 13]);

        $article2 = Article::factory()->create([
            'id' => 2,
            'user_id' => 1,
            'title' => "The song you won't ever stop singing. No matter how hard you try.",
            'meta_description' => 'This is the description for the post.',
            'body' => 'This is the body for the post.',
        ]);
        $article2->tags()->attach([12, 13]);
    }
}
