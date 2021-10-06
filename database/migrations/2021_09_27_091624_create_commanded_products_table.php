<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommandedProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commanded_products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('command_id');
            $table->unsignedBigInteger('product_id');
            $table->integer('quantity');

            $table->foreign('command_id')
            ->references('id')
            ->on('commands')
            ->onDelete('cascade');

            $table->foreign('product_id')
            ->references('id')
            ->on('products')
            ->onDelete('cascade');

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
        Schema::dropIfExists('commanded_products');
    }
}
