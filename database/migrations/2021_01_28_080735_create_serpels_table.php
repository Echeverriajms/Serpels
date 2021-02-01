<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSerpelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('serpels', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('Nombre');
            $table->string('Tipo');
            $table->string('Genero');
            $table->string('Año');
            $table->string('Sinopsis', 250);
            $table->string('Foto');

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
        Schema::dropIfExists('serpels');
    }
}
