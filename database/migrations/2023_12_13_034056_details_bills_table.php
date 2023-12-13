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
        Schema::create('details_bills',function(Blueprint $table){
            $table->foreignId('id_bills');
            $table->foreignId('id_booking');
            $table->foreignId('id_service');
            $table->foreignId('id_product');
            $table->float('value');
            $table->foreign('id_bills')->references('id')->on('bills')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_booking')->references('id')->on('bookings')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_service')->references('id')->on('services')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_product')->references('id')->on('products')->onDelete('cascade')->onUpdate('cascade');

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
        Schema::dropIfExists('details_bills');
    }
};
