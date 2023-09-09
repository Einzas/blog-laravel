<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create(['name'=>'Series','slug'=>'Series']);
        Category::create(['name'=>'Peliculas','slug'=>'Peliculas']);
        Category::create(['name'=>'Animes','slug'=>'Animes']);

    }
}
