<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        \DB::table('categories')->insert([
            'name' => 'Pantalones',
            'slug' => 'pantalones',
            'image' => 'pants.jpg',
            'is_popular' => true,
        ]);
        \DB::table('categories')->insert([
            'name' => 'Camisas',
            'slug' => 'camisas',
            'image' => 'shirt.jpg',
            'is_popular' => true,
        ]);
        \DB::table('categories')->insert([
            'name' => 'Poleras',
            'slug' => 'poleras',
            'image' => 'shoes.jpg',
            'is_popular' => true,
        ]);
        \DB::table('categories')->insert([
            'name' => 'Ropa Industrial',
            'slug' => 'ropa-industrial',
            'image' => 'shoes.jpg',
            'is_popular' => true,
        ]);
        \DB::table('categories')->insert([
            'name' => 'Ropa Escolar',
            'slug' => 'ropa-escolar',
            'image' => 'shoes.jpg',
            'is_popular' => true,
        ]);
        \DB::table('categories')->insert([
            'name' => 'Ropa de invierno',
            'slug' => 'ropa-de-invierno',
            'image' => 'shoes.jpg',
            'is_popular' => true,
        ]);


        // insertando subcategorias de pantalones: Vaqueros, Chinos, Cargo, Joggers, Leggins, Pantalones de vestir
        \DB::table('subcategories')->insert([
            'name' => 'Juveniles',
            'slug' => 'juveniles',
            'image' => 'pants.jpg',
            'is_popular' => true,
            'category_id' => 1,
        ]);
        \DB::table('subcategories')->insert([
            'name' => 'Clasicos',
            'slug' => 'clasicos',
            'image' => 'pants.jpg',
            'is_popular' => true,
            'category_id' => 1,
        ]);
        \DB::table('subcategories')->insert([
            'name' => 'Cigarretes',
            'slug' => 'cigarretes',
            'image' => 'pants.jpg',
            'is_popular' => true,
            'category_id' => 1,
        ]);
        \DB::table('subcategories')->insert([
            'name' => 'Chupines',
            'slug' => 'chupines',
            'image' => 'pants.jpg',
            'is_popular' => true,
            'category_id' => 1,
        ]);
        \DB::table('subcategories')->insert([
            'name' => 'Joggers',
            'slug' => 'joggers',
            'image' => 'pants.jpg',
            'is_popular' => true,
            'category_id' => 1,
        ]);
        

        // insertando subcategorias de camisas: Formales, Casuales, De Vestir, de Franela, de Seda, de Algodón, de Mezclilla
        \DB::table('subcategories')->insert([
            'name' => 'Manga cortas',
            'slug' => 'manga-cortas',
            'image' => 'shirt.jpg',
            'is_popular' => true,
            'category_id' => 2,
        ]);
        \DB::table('subcategories')->insert([
            'name' => 'Manga largas',
            'slug' => 'manga-largas',
            'image' => 'shirt.jpg',
            'is_popular' => true,
            'category_id' => 2,
        ]);
        

        // insertando subcategorias de poleras: de Algodón, de Seda, Con Estampados, Lisas, Con cuello redondo, Con Cuello en V, Con Botones
        \DB::table('subcategories')->insert([
            'name' => 'Cuello en V',
            'slug' => 'cuello-en-v',
            'image' => 'shirt.jpg',
            'is_popular' => true,
            'category_id' => 3,
        ]);
        \DB::table('subcategories')->insert([
            'name' => 'Cuello redondo',
            'slug' => 'cuello-redondo',
            'image' => 'shirt.jpg',
            'is_popular' => true,
            'category_id' => 3,
        ]);
        \DB::table('subcategories')->insert([
            'name' => 'Polos',
            'slug' => 'polos',
            'image' => 'shirt.jpg',
            'is_popular' => true,
            'category_id' => 3,
        ]);
        \DB::table('subcategories')->insert([
            'name' => 'de Poliester',
            'slug' => 'de-poliester',
            'image' => 'shirt.jpg',
            'is_popular' => true,
            'category_id' => 3,
        ]);
        \DB::table('subcategories')->insert([
            'name' => 'de-Algodón',
            'slug' => 'de-algodon',
            'image' => 'shirt.jpg',
            'is_popular' => true,
            'category_id' => 3,
        ]);

        // insertando subcategorias ropa industrial: Overol, Batas, Proteccion, Ropa de trabajo, Ropa de seguridad, Chalecos reflectantes
        \DB::table('subcategories')->insert([
            'name' => 'Overol',
            'slug' => 'overol',
            'image' => 'shirt.jpg',
            'is_popular' => true,
            'category_id' => 4,
        ]);
        \DB::table('subcategories')->insert([
            'name' => 'Chalecos',
            'slug' => 'chalecos',
            'image' => 'shirt.jpg',
            'is_popular' => true,
            'category_id' => 4,
        ]);
        \DB::table('subcategories')->insert([
            'name' => 'Camisas jeans',
            'slug' => 'camisas-jeans',
            'image' => 'shirt.jpg',
            'is_popular' => true,
            'category_id' => 4,
        ]);

        // insertando subcategorias ropa escolar
        \DB::table('subcategories')->insert([
            'name' => 'Pantalones escolares',
            'slug' => 'pantalones-escolares',
            'image' => 'shirt.jpg',
            'is_popular' => true,
            'category_id' => 5,
        ]);
        \DB::table('subcategories')->insert([
            'name' => 'Shorts escolares',
            'slug' => 'shorts-escolares',
            'image' => 'shirt.jpg',
            'is_popular' => true,
            'category_id' => 5,
        ]);
        \DB::table('subcategories')->insert([
            'name' => 'Poleras escolares',
            'slug' => 'poleras-escolares',
            'image' => 'shirt.jpg',
            'is_popular' => true,
            'category_id' => 5,
        ]);
        \DB::table('subcategories')->insert([
            'name' => 'Uniformes escolares',
            'slug' => 'uniformes-escolares',
            'image' => 'shirt.jpg',
            'is_popular' => true,
            'category_id' => 5,
        ]);

        // insertando subcategorias ropa invierno
        \DB::table('subcategories')->insert([
            'name' => 'Chamarras de algodón',
            'slug' => 'chamarras-de-algodon',
            'image' => 'shirt.jpg',
            'is_popular' => true,
            'category_id' => 5,
        ]);
        \DB::table('subcategories')->insert([
            'name' => 'Canguros',
            'slug' => 'canguros',
            'image' => 'shirt.jpg',
            'is_popular' => true,
            'category_id' => 5,
        ]);
        \DB::table('subcategories')->insert([
            'name' => 'Rompevientos',
            'slug' => 'rompevientos',
            'image' => 'shirt.jpg',
            'is_popular' => true,
            'category_id' => 5,
        ]);
        
    }
}
