<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->unsignedBigInteger('category_id');
            $table->string('product_name');
            $table->integer('stock');
            $table->integer('price');
            $table->integer('delivery_time')->nullable();
            $table->integer('delivery_time_rup')->nullable();
            $table->string('pdf1')->nullable();
            $table->string('pdf2')->nullable();
            $table->string('pdf3')->nullable();
            $table->string('picture1')->nullable();
            $table->string('picture2')->nullable();
            $table->string('picture3')->nullable();
            $table->text('product_desc');

            $table->foreign('category_id')
            ->references('id')
            ->on('categories')
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
        Schema::dropIfExists('products');
    }
}
