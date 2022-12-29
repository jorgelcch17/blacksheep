<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('provinces')->insert([
            [
                'name' => 'Andrés Ibáñez',
                'slug' => 'andres-ibanez',
                'status' => 1,
                'department_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Angel Sandoval',
                'slug' => 'angel-sandoval',
                'status' => 1,
                'department_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Chiquitos',
                'slug' => 'chiquitos',
                'status' => 1,
                'department_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Cordillera',
                'slug' => 'cordillera',
                'status' => 1,
                'department_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Florida',
                'slug' => 'florida',
                'status' => 1,
                'department_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Germán Busch',
                'slug' => 'german-busch',
                'status' => 1,
                'department_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Guarayos',
                'slug' => 'guarayos',
                'status' => 1,
                'department_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Ichilo',
                'slug' => 'ichilo',
                'status' => 1,
                'department_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Manuel María Caballero',
                'slug' => 'manuel-maria-caballero',
                'status' => 1,
                'department_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Warnes',
                'slug' => 'warnes',
                'status' => 1,
                'department_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Ñuflo de Chávez',
                'slug' => 'nuflo-de-chavez',
                'status' => 1,
                'department_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Obispo Santistevan',
                'slug' => 'obispo-santistevan',
                'status' => 1,
                'department_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Sara',
                'slug' => 'sara',
                'status' => 1,
                'department_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Vallegrande',
                'slug' => 'vallegrande',
                'status' => 1,
                'department_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Velasco',
                'slug' => 'velasco',
                'status' => 1,
                'department_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
