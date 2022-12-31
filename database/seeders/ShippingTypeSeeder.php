<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ShippingTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('shipping_types')->insert([
            [
                'name' => 'Envío a domicilio - GRATIS',
                'description' => 'Recibe tu pedido sin costo adicional',
                'price' => '0',
                'delivery_time' => 'Hasta 5 días hábiles',
                'is_active' => true,
            ],
            [
                'name' => 'Envío a domicilio - EXPRESS',
                'description' => 'Paga un costo adicional para recibir tu pedido cuanto antes',
                'price' => '50',
                'delivery_time' => 'Hasta 24 horas',
                'is_active' => true,
            ],
            [
                'name' => 'Retiro en sucursal',
                'description' => 'Pasa a retirar tu pedido en una de nuestras sucursales',
                'price' => '0',
                'delivery_time' => 'Inmediato',
                'is_active' => true,
            ],
        ]);
    }
}
