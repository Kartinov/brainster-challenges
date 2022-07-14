<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['general', 'entertainment', 'sports', 'movies', 'politics', 'cars'];

        foreach ($categories as $category) {
            Category::insert([
                'name' => $category
            ]);
        }
    }
}
