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
            $table->foreignId('tipo_documento_id')->constrained();
            $table->string('documento');
            $table->smallInteger('edad');
            $table->foreignId('genero_id')->constrained();
            $table->string('telefono');
            $table->string('direccion');
            $table->string('email')->nullable();
            $table->smallInteger('numero_miembros');
            $table->smallInteger('mayores65')->default(0);
            $table->smallInteger('mayores18')->default(0);
            $table->smallInteger('menores18')->default(0);
            $table->foreignId('evento_id')->constrained();
            $table->foreignId('tipo_poblacion_id')->constrained('tipo_poblaciones');
            $table->string('observaciones')->nullable();
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
