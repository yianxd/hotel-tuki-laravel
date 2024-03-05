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
        Schema::create('beds',function(Blueprint $table){
            $table->foreignUlid('id_room');
            $table->tinyInteger('single_bed');
            $table->tinyInteger('double_bed');
            $table->tinyInteger('suite_bed');
            $table->foreign('id_room')->references('id_number')->on('rooms')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('beds');
    }
};
