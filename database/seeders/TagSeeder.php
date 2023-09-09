<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tag::create(['name'=>'Terror','slug'=>'terror','color'=>'red']);
        Tag::create(['name'=>'Comedia','slug'=>'comedia','color'=>'green']);
        Tag::create(['name'=>'Accion','slug'=>'accion','color'=>'yellow']);
        Tag::create(['name'=>'Ciencia Ficcion','slug'=>'ciencia-ficcion','color'=>'blue']);
        Tag::factory(46)->create();
    }
}
