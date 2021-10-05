<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('role');
            $table->unsignedBigInteger('country');
            $table->unsignedBigInteger('city');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('email')->unique();
            $table->date('email_verified')->nullable();
            $table->date('birthday');
            $table->string('phone');
            $table->string('phone_verified')->nullable();
            $table->string('affiliate_code');
            $table->string('sup_code')->nullable();
            $table->string('password');
            $table->string('selfie')->nullable();
            $table->string('cnib')->nullable();
            $table->string('card_recto')->nullable();
            $table->string('card_verso')->nullable();

            $table->foreign('role')
            ->references('id')
            ->on('roles')
            ->onDelete('cascade');

            $table->foreign('country')
            ->references('id')
            ->on('countries')
            ->onDelete('cascade');

            $table->foreign('city')
            ->references('id')
            ->on('cities')
            ->onDelete('cascade');

            $table->rememberToken();
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
        Schema::dropIfExists('clients');
    }
}
