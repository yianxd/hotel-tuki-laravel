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
            $table->foreignId('num_habitacion');
            $table->striger('stock');
            $table->striger('responsable');
            $table->striger('nota');
            $table->foreign('id_producto')->references('id_producto')->on('prodducts')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('num_habitacion')->references('num_habitacion')->on('rooms')->onDelete('cascade')->onUpdate('cascade');
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
