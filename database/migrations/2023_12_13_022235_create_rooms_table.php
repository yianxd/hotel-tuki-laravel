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
            $table->bigInteger('id_number')->unsigned()->primary();
            $table->foreignId('id_type');
            $table->integer('capacity');
            $table->string('state');
            $table->decimal('price',$precision=20,$scale=2);
            $table->foreign('id_type')->references('id_type')->on('type_rooms')->onDelete('cascade')->onUpdate('cascade');
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
