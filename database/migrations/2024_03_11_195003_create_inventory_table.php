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
        Schema::create('inventory', function (Blueprint $table) {
            $table->bigInteger('id_inventario')->unsigned()->primary();
            $table->foreignId('id_producto');
            $table->foreignId('id_number');
            $table->string('stock');
            $table->string('responsable');
            $table->string('nota');
            $table->foreign('id_producto')->references('id_producto')->on('products')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_number')->references('id_number')->on('rooms')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('inventory');
    }
};
