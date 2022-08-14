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
        Schema::create('eventos', function (Blueprint $table) {
            $table->id();
            $table->timestamp('fecha_hora_reporte');
            $table->string('responsable_reporte');
            $table->timestamp('fecha_hora_verificacion')->nullable();
            $table->string('responsable_verificacion')->nullable();
            $table->string('descripcion_verificación')->nullable();
            $table->timestamp('fecha_hora_evento')->nullable();
            $table->string('descripcion');
            $table->foreignId('tipo_evento_id')->constrained();
            $table->unsignedBigInteger('estado_evento_id');
            $table->foreignId('zona_id')->constrained();
            $table->string('direccion')->nullable();
            $table->smallInteger('numero_afectados')->nullable();
            $table->foreignId('estado_id')->constrained('estado_eventos');
            $table->string('descripcion_cierre')->nullable(); //debe ser una descripcion de cierre de evento
            $table->boolean('atendido')->default(false); //se debe marcar en true cuando el evento se atiended y se cierra el evento
            $table->timestamp('fecha_hora_cierre')->nullable(); //fecha y hora de cierre del evento
            $table->foreignId('entidad_id')->constrained('entidades'); //entidad que atendio el evento
            $table->string('entidad_nombre')->nullable(); //nombre de la entidad que atendio el evento en caso de no tener entidad_id
            $table->timestamps();

            $table->foreign('estado_evento_id')->references('id')->on('estado_eventos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('eventos');
        Schema::dropIfExists('evento');
    }
};
