<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('questions')->insert([
            [
                'question' => '¿Cómo puedo realizar un pedido en su sitio web de BLACK SHEEP?',
                'answer' => 'answer 1',
                'created_at' => now()
            ],
            [
                'question' => '¿Cuáles son los métodos de pago disponibles?',
                'answer' => 'answer 2',
                'created_at' => now()
            ],
            [
                'question' => '¿Cómo puedo cancelar o modificar un pedido?',
                'answer' => 'answer 3',
                'created_at' => now()
            ],
            [
                'question' => '¿Qué es el plazo de entrega y cómo se calcula?',
                'answer' => 'answer 4',
                'created_at' => now()
            ],
            [
                'question' => '¿Cómo puedo hacer un seguimiento de mi pedido?',
                'answer' => 'answer 5',
                'created_at' => now()
            ],
            [
                'question' => '¿Cuáles son sus políticas de devolución y cambio?',
                'answer' => 'answer 6',
                'created_at' => now()
            ],
            [
                'question' => '¿Cómo puedo contactar al servicio al cliente?',
                'answer' => 'answer 7',
                'created_at' => now()
            ],
            [
                'question' => '¿Qué debo hacer si recibo un producto dañado o defectuoso?',
                'answer' => 'answer 8',
                'created_at' => now()
            ],
            [
                'question' => '¿Tienen una tienda física?',
                'answer' => 'answer 9',
                'created_at' => now()
            ],
            [
                'question' => '¿Qué medidas de seguridad tienen para proteger mi información personal y de pago?',
                'answer' => 'answer 10',
                'created_at' => now()
            ],
            [
                'question' => '¿Ofrecen envíos a mi país?',
                'answer' => 'answer 11',
                'created_at' => now()
            ],
            [
                'question' => '¿Qué descuentos o promociones tienen actualmente disponibles?',
                'answer' => 'answer 12',
                'created_at' => now()
            ],
            [
                'question' => '¿Cómo puedo inscribirme para recibir novedades o correos electrónicos promocionales?',
                'answer' => 'answer 13',
                'created_at' => now()
            ],
        ]);
    }
}
