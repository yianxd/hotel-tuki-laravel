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
        //
        Schema::create('bookings',function(Blueprint $table){
            $table->id('id_booking');
            $table->integer('amount_rooms');
            $table->foreignId('documento');
            $table->date('date_start');
            $table->date('date_end');
            $table->integer('adult');
            $table->integer('kids');
            $table->foreign('documento')->references('documento')->on('users')->onDelete('cascade')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('bookings');
    }
};
