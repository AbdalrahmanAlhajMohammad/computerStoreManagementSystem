<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersCartTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders_cart', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('product_id');
            $table->decimal('cost');
            $table->integer('order_id');
            $table->timestamps();

           /* $table->foreign('product_id')->references('id')
                ->on('products');
            $table->foreign('product_id')->references('id')
                ->on('products');*/
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders_cart');
    }
}
