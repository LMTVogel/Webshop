<?php

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
        \App\Category::insert([
            'name' => 'Goocheltrucs',
            'image' => 'images/goocheltrucs.jpeg',
        ]);

        \App\Category::insert([
            'name' => "DVD's",
            'image' => 'images/dvd.jpg',
        ]);

        \App\Category::insert([
            'name' => 'Boeken',
            'image' => 'images/boeken.jpg',
        ]);

        \App\Category::insert([
            'name' => 'Accessoires',
            'image' => 'images/accessoires.jpg',
        ]);

        \App\Category::insert([
            'name' => 'Kaarten',
            'image' => 'images/kaarten.jpg',
        ]);
    }
}
