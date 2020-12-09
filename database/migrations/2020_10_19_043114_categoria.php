<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Categoria extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categoria', function (Blueprint $table) {
        $table->bigIncrements('id');
        $table->string('nombre');
        $table->string('Tipo');
        $table->integer('nivel');
        $table->string('descricion',200);
        $table->timestamps();
        $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categoria');
    }
}
