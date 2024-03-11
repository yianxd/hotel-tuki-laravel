<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->string('typeDoc');
            $table->id("document");
            $table->foreignId('id_rol');
            $table->string('name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('phone');
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->foreign('id_rol')->references('id')->on('roles')->onUpdate('cascade')->onDelete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
