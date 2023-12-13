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
            $table->id();
            $table->foreignId('id_customer');
            $table->date('date');
            $table->integer('amount_rooms');
            $table->integer('adult');
            $table->integer('kids');
            $table->date('date_start');
            $table->date('date_end');
            $table->float('price');
            $table->foreign('id_customer')->references('id')->on('customers')->onDelete('cascade')->onUpdate('cascade');

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
