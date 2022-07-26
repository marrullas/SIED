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
        //TODO: revisar el manejo de las ayudas y los miembros de la familia
        Schema::create('familias', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('apellido');
            $table->foreign('tipo_documento_id')->references('id')->on('tipo_documentos');
            $table->string('documento');
            $table->string('telefono');
            $table->string('direccion');
            $table->string('email');
            $table->numeric('numero_miembros');
            $table->numeric('mayores65');
            $table->numeric('mayores18');
            $table->numeric('menores18');
            $table->foreignId('evento_id')->constrained();
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
        Schema::dropIfExists('familias');
    }
};
