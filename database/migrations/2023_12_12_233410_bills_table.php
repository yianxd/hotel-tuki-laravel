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
        Schema::create('bills',function(Blueprint $table){
            $table->id();
            $table->foreignId('documento');
            $table->decimal('tax_percentage',$precision=20,$scale=2);
            $table->decimal('discount',$precision=20,$scale=2);
            $table->decimal('total',$precision=20,$scale=2);
            $table->foreign('documento')->references('documento')->on('users')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('bills');
    }
};
