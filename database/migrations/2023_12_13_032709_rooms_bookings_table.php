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
        Schema::create('rooms_bookings',function(Blueprint $table){
            $table->foreignId('id_booking');
            $table->foreignId('id_room');
            $table->foreign('id_booking')->references('id')->on('bookings')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_room')->references('id')->on('rooms')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('rooms_bookings');
    }
};
