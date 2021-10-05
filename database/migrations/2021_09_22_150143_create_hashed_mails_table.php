<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHashedMailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hashed_mails', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client');
            $table->string('hashed_email');
            $table->foreign('client')
            ->references('id')
            ->on('clients')
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
        Schema::dropIfExists('hashed_mails');
    }
}
