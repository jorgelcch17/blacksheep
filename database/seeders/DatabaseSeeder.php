<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $brand_number = 1;
        for($i=0; $i<10; $i++){
            \App\Models\Brand::factory()->create([
                'logo' => 'logo_' . $brand_number . '.png',
            ]);
            $brand_number++;
        }
        
        \App\Models\Category::factory(6)->create();
        
        \App\Models\product::factory(16)->create();

        // creando 10 registros con factory de brand y pasandole el parametro logo con un valor de 1 a 10 en cada vuelta

        // creando 2 factories de home slider
        $home_slider = 3;
        for($i=3; $i<5; $i++){
            \App\Models\HomeSlider::factory()->create([
                'image' => 'slider_' . $home_slider . '.png',
            ]);
            $home_slider++;
        }

        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('1234Hola'),
            'utype' => 'ADM',
        ]);

        $this->call(DepartmentSeeder::class);
        $this->call(ProvinceSeeder::class);
        $this->call(CitySeeder::class);
    }
}
