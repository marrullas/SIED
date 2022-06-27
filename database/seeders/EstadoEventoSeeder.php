<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstadoEventoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        DB::table('estado_eventos')->insert(
            [
            'nombre' => 'Verificación',
            'descripcion' => 'Se registra el evento en el sistema y se procede a la verificación',
            ]
        );
        DB::table('estado_eventos')->insert(
            [
            'nombre' => 'Atención',
            'descripcion' => 'Se verifica el evento y se procede a atenderlo',
            ]
        );

        DB::table('estado_eventos')->insert(
            [
            'nombre' => 'Cerrado',
            'descripcion' => 'Se atiende el evento y se cierra',
            ]
        );

    }
}
