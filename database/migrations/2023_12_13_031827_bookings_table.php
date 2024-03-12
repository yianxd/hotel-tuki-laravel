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
            $table->foreignId('document');
            $table->foreignId('id_number');
            $table->integer('amount_people');
            $table->date('date_start');
            $table->date('date_end');
            $table->float('price');
            $table->foreign('id_number')->references('id_number')->on('rooms')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('document')->references('document')->on('users')->onDelete('cascade')->onUpdate('cascade');
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
        //
        Schema::dropIfExists('bookings');
    }
};
