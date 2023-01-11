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

        // insertando subcategorias de pantalones: Vaqueros, Chinos, Cargo, Joggers, Leggins, Pantalones de vestir
        \DB::table('subcategories')->insert([
            'name' => 'Vaqueros',
            'slug' => 'vaqueros',
            'image' => 'pants.jpg',
            'is_popular' => true,
            'category_id' => 1,
        ]);
        \DB::table('subcategories')->insert([
            'name' => 'Chinos',
            'slug' => 'chinos',
            'image' => 'pants.jpg',
            'is_popular' => true,
            'category_id' => 1,
        ]);
        \DB::table('subcategories')->insert([
            'name' => 'Cargo',
            'slug' => 'cargo',
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
        \DB::table('subcategories')->insert([
            'name' => 'Leggins',
            'slug' => 'leggins',
            'image' => 'pants.jpg',
            'is_popular' => true,
            'category_id' => 1,
        ]);
        \DB::table('subcategories')->insert([
            'name' => 'Pantalones de vestir',
            'slug' => 'pantalones-de-vestir',
            'image' => 'pants.jpg',
            'is_popular' => true,
            'category_id' => 1,
        ]);

        // insertando subcategorias de camisas: Formales, Casuales, De Vestir, de Franela, de Seda, de Algodón, de Mezclilla
        \DB::table('subcategories')->insert([
            'name' => 'Formales',
            'slug' => 'formales',
            'image' => 'shirt.jpg',
            'is_popular' => true,
            'category_id' => 2,
        ]);
        \DB::table('subcategories')->insert([
            'name' => 'Casuales',
            'slug' => 'casuales',
            'image' => 'shirt.jpg',
            'is_popular' => true,
            'category_id' => 2,
        ]);
        \DB::table('subcategories')->insert([
            'name' => 'De Vestir',
            'slug' => 'de-vestir',
            'image' => 'shirt.jpg',
            'is_popular' => true,
            'category_id' => 2,
        ]); 
        \DB::table('subcategories')->insert([
            'name' => 'De Franela',
            'slug' => 'de-franela',
            'image' => 'shirt.jpg',
            'is_popular' => true,
            'category_id' => 2,
        ]);
        
        \DB::table('subcategories')->insert([
            'name' => 'De Seda',
            'slug' => 'de-seda',
            'image' => 'shirt.jpg',
            'is_popular' => true,
            'category_id' => 2,
        ]);
        \DB::table('subcategories')->insert([
            'name' => 'De Algodón',
            'slug' => 'de-algodon',
            'image' => 'shirt.jpg',
            'is_popular' => true,
            'category_id' => 2,
        ]);
        \DB::table('subcategories')->insert([
            'name' => 'De Mezclilla',
            'slug' => 'de-mezclilla',
            'image' => 'shirt.jpg',
            'is_popular' => true,
            'category_id' => 2,
        ]);

        // insertando subcategorias de poleras: de Algodón, de Seda, Con Estampados, Lisas, Con cuello redondo, Con Cuello en V, Con Botones
        \DB::table('subcategories')->insert([
            'name' => 'De Algodón',
            'slug' => 'de-algodon',
            'image' => 'shirt.jpg',
            'is_popular' => true,
            'category_id' => 3,
        ]);
        \DB::table('subcategories')->insert([
            'name' => 'De Seda',
            'slug' => 'de-seda',
            'image' => 'shirt.jpg',
            'is_popular' => true,
            'category_id' => 3,
        ]);

        \DB::table('subcategories')->insert([
            'name' => 'Con Estampados',
            'slug' => 'con-estampados',
            'image' => 'shirt.jpg',
            'is_popular' => true,
            'category_id' => 3,
        ]);
        \DB::table('subcategories')->insert([
            'name' => 'Lisas',
            'slug' => 'lisas',
            'image' => 'shirt.jpg',
            'is_popular' => true,
            'category_id' => 3,
        ]);
        \DB::table('subcategories')->insert([
            'name' => 'Con cuello redondo',
            'slug' => 'con-cuello-redondo',
            'image' => 'shirt.jpg',
            'is_popular' => true,
            'category_id' => 3,
        ]);
        \DB::table('subcategories')->insert([
            'name' => 'Con Cuello en V',
            'slug' => 'con-cuello-en-v',
            'image' => 'shirt.jpg',
            'is_popular' => true,
            'category_id' => 3,
        ]);
        \DB::table('subcategories')->insert([
            'name' => 'Con Botones',
            'slug' => 'con-botones',
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
            'name' => 'Batas',
            'slug' => 'batas',
            'image' => 'shirt.jpg',
            'is_popular' => true,
            'category_id' => 4,
        ]);
        \DB::table('subcategories')->insert([
            'name' => 'Proteccion',
            'slug' => 'proteccion',
            'image' => 'shirt.jpg',
            'is_popular' => true,
            'category_id' => 4,
        ]);
        \DB::table('subcategories')->insert([
            'name' => 'Ropa de trabajo',
            'slug' => 'ropa-de-trabajo',
            'image' => 'shirt.jpg',
            'is_popular' => true,
            'category_id' => 4,
        ]);
        \DB::table('subcategories')->insert([
            'name' => 'Ropa de seguridad',
            'slug' => 'ropa-de-seguridad',
            'image' => 'shirt.jpg',
            'is_popular' => true,
            'category_id' => 4,
        ]);
        \DB::table('subcategories')->insert([
            'name' => 'Chalecos reflectantes',
            'slug' => 'chalecos-reflectantes',
            'image' => 'shirt.jpg',
            'is_popular' => true,
            'category_id' => 4,
        ]);
    }
}
