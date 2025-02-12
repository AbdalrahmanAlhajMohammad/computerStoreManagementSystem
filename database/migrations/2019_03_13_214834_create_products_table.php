<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->text('description');
            $table->text('logo');
            $table->integer('category_id');
            $table->decimal('price');
            $table->integer('manufactor_id');
            $table->boolean('active');
            $table->timestamps();
           /* $table->foreign('category_id')->references('id')
                ->on('categories');
            $table->foreign('manufactor_id')->references('id')
                ->on('manufactories');*/
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
