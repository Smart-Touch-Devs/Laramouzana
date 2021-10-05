<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients_accounts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id');
            $table->bigInteger('amount');
            $table->foreign('client_id')
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
        Schema::dropIfExists('clients_accounts');
    }
}
