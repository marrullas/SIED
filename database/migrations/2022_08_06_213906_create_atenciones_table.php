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
        Schema::create('atenciones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tipo_ayuda_id')->constrained();
            $table->string('descripcion')->nullable();
            $table->foreignId('familia_id')->constrained();
            $table->foreignId('evento_id')->constrained();
            $table->timestamp('fecha_hora_atencion')->nullable();
            $table->string('responsable_atencion')->nullable();
            $table->string('cantidad')->nullable();
            $table->boolean('entregado')->default(false);
            $table->string('foto1')->nullable();
            $table->string('foto2')->nullable();
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
        Schema::dropIfExists('atenciones');
    }
};
