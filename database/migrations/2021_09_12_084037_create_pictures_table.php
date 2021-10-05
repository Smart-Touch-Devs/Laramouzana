<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePicturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pictures', function (Blueprint $table) {
            // $table->bigIncrements('id');
            // $table->unsignedBigInteger('products_id');
            $table->string('picture1')->nullable();
            $table->string('picture2')->nullable();
            $table->string('picture3')->nullable();

            // $table->foreign('products_id')
            // ->references('id')
            // ->on('products')
            // ->onDelete('cascade');
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pictures');
    }
}
