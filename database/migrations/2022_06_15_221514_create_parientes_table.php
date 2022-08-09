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
            $table->foreignId('tipo_documento_id')->constrained();
            $table->string('documento');
            $table->string('telefono')->nullable();
            $table->foreignId('familia_id')->constrained();
            $table->foreignId('tipo_poblacion_id')->constrained('tipo_poblaciones');
            $table->foreignId('parentesco_id')->constrained();
            $table->string('notas')->nullable();
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
