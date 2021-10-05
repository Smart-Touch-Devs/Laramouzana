<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('role_id');
            $table->unsignedBigInteger('country');
            $table->unsignedBigInteger('city');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->date('birthday');
            $table->string('phone');
            $table->string('password');

            $table->foreign('role_id')
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
        Schema::dropIfExists('admin');
    }
}
