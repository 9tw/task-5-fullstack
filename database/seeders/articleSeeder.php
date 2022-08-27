<?php

namespace Database\Seeders;

use App\Models\webArticle;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class articleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $articles = collect( value: [
            'Electronics',
            'Fashions',
            'Furniture',
            'Toys',
            'Hobby',
            'DIY',
            'Beauty',
            'Health',
            'Personal',
            'Household',
        ]);

        $articles->each(function($article){
            webArticle::create([
                'title' => $article,
                'content' => Str::random(25),
                'image' => Str::random(10).'.jpg',
                'user_id' => mt_rand(1, 10),
                'category_id' => mt_rand(1, 10),
            ]);
        });
    }
}
