<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class TipoAyudaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        DB::table('tipo_ayudas')->insert(
            [
            'nombre' => 'Asistencia alimentaria',
            'descripcion' => 'Asistencia alimentaria',
            ]            
        );
        DB::table('tipo_ayudas')->insert(
            [
            'nombre' => 'Kit cocina',
                'descripcion' => 'Kit cocina',
            ],
        );
        DB::table('tipo_ayudas')->insert(
            [
                'nombre' => 'Kit aseo',
                'descripcion' => 'Kit aseo',
            ]
        );
        DB::table('tipo_ayudas')->insert(
            [
                'nombre' => 'Tejas',
                'descripcion' => 'Tejas',
            ],
        );
        DB::table('tipo_ayudas')->insert(
            [
                'nombre' => 'Frazadas',
                'descripcion' => 'Frazadas',
            ]
        );
        DB::table('tipo_ayudas')->insert(
            [
                'nombre' => 'Subsidio arrendamiento',
                'descripcion' => 'Subsidio arrendamiento',
            ],
        );
    }
}
