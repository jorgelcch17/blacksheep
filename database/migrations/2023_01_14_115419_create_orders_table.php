<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Models\Order;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();

            $table->float('subtotal', 8, 2);
            $table->float('discount', 8, 2)->default(0);
            $table->float('tax', 8, 2)->default(0);
            $table->float('shipping_cost', 8, 2)->default(0);
            $table->float('total', 8, 2);

            $table->enum('status', [
                Order::PENDIENTE,
                Order::RECIBIDO,
                Order::ENVIADO,
                Order::ENTREGADO,
                Order::CANCELADO,
            ])->default(Order::PENDIENTE);

            $table->json('shipping_type')->nullable();
            $table->json('content')->nullable();
            $table->json('shipping_address')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
