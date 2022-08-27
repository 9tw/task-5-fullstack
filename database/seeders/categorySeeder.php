<?php

namespace Database\Seeders;

use App\Models\webCategory;
use Illuminate\Database\Seeder;

class categorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = collect( value: [
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

        $categories->each(function($category){
            webCategory::create([
                'name' => $category,
                'user_id' => mt_rand(1, 10),
            ]);
        });
    }
}
