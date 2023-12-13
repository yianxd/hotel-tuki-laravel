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
        Schema::create('rooms',function(Blueprint $table){
            $table->id();
            $table->integer('number');
            $table->foreignId('id_type');
            $table->decimal('fee',$precision=20,$scale=2);
            $table->integer('capacity');
            $table->string('image');
            $table->foreign('id_type')->references('id')->on('type_rooms')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('rooms');
    }
};
