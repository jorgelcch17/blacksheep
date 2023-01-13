<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        \App\Models\Tag::create([
            'name' => 'Camisetas',
            'slug' => 'camisetas',
        ]);
        \App\Models\Tag::create([
            'name' => 'Pantalones',
            'slug' => 'pantalones',
        ]);
        \App\Models\Tag::create([
            'name' => 'Zapatos',
            'slug' => 'zapatos',
        ]);
        \App\Models\Tag::create([
            'name' => 'Bolsos',
            'slug' => 'bolsos',
        ]);
        \App\Models\Tag::create([
            'name' => 'Accesorios',
            'slug' => 'accesorios',
        ]);
        \App\Models\Tag::create([
            'name' => 'Ropa interior',
            'slug' => 'ropa-interior',
        ]);
        \App\Models\Tag::create([
            'name' => 'Ropa de baño',
            'slug' => 'ropa-de-bano',
        ]);
        \App\Models\Tag::create([
            'name' => 'Ropa deportiva',
            'slug' => 'ropa-deportiva',
        ]);
        \App\Models\Tag::create([
            'name' => 'Ropa de trabajo',
            'slug' => 'ropa-de-trabajo',
        ]);
        \App\Models\Tag::create([
            'name' => 'Ropa de cama',
            'slug' => 'ropa-de-cama',
        ]);
    }
}
