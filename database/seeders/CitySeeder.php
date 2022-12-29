<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //aniadiendo las ciudades a la provincia coordillera
        \DB::table('cities')->insert([
            [
                'name' => 'Charagua',
                'slug' => 'charagua',
                'status' => 1,
                'province_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Lagunillas',
                'slug' => 'lagunillas',
                'status' => 1,
                'province_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Cabezas',
                'slug' => 'cabezas',
                'status' => 1,
                'province_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Cuevo',
                'slug' => 'cuevo',
                'status' => 1,
                'province_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Gutiérrez',
                'slug' => 'gutierrez',
                'status' => 1,
                'province_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Camiri',
                'slug' => 'camiri',
                'status' => 1,
                'province_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Boyuibe',
                'slug' => 'boyuibe',
                'status' => 1,
                'province_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Santa Cruz de la Sierra',
                'slug' => 'santa-cruz-de-la-sierra',
                'status' => 1,
                'province_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Cotoca',
                'slug' => 'cotoca',
                'status' => 1,
                'province_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Porongo',
                'slug' => 'porongo',
                'status' => 1,
                'province_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'La guardia',
                'slug' => 'la-guardia',
                'status' => 1,
                'province_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'El Torno',
                'slug' => 'el-torno',
                'status' => 1,
                'province_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
