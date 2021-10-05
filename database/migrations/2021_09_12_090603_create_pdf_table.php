<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePdfTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pdf', function (Blueprint $table) {
            // $table->bigIncrements('id');
            // $table->unsignedBigInteger('products_id');
            $table->string('pdf1')->nullable();
            $table->string('pdf2')->nullable();
            $table->string('pdf3')->nullable();

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
        Schema::dropIfExists('pdf');
    }
}
