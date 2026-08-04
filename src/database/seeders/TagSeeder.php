<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tagLists = [
            'PHP',
            'Laravel',
            'JavaScript',
            'Vue.js',
            'React',
            'Node.js',
            'Python',
            'Django',
            'Flask',
            'Ruby on Rails',
            'programming',
            'realworld',
            'implementations',
        ];

        foreach ($tagLists as $tag) {
            DB::table('tags')->insert([
                'name' => $tag,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
