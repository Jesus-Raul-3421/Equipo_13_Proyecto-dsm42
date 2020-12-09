<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CategoriaProducto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categoria_producto', function (Blueprint $table) {
        $table->bigIncrements('id');
        $table->bigInteger('categoria_id')->unsigned();
        $table->bigInteger('productos_id')->unsigned();
        $table->foreign('categoria_id')->references('id')->on('categoria');
        $table->foreign('productos_id')->references('id')->on('productos');
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
        Schema::dropIfExists('categoria_producto');
    }
}
