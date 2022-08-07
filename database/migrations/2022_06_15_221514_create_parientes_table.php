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
        Schema::create('parientes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('apellido');
            $table->foreign('tipo_documento_id')->references('id')->on('tipo_documentos');
            $table->string('documento');
            $table->string('telefono')->nullable();
            $table->foreignId('familia_id')->constrained();
            $table->foreign('tipo_poblacion_id')->references('id')->on('tipo_poblaciones');
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
        Schema::dropIfExists('parientes');
    }
};
