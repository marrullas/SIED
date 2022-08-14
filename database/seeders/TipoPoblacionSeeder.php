<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class TipoPoblacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipo_poblaciones')->insert(
            [
            'nombre' => 'PCDI',
            'descripcion' => 'Población con discapacidad',
            ]
        );

        DB::table('tipo_poblaciones')->insert(
            [
            'nombre' => 'PVC',
            'descripcion' => 'Población victima del conflicto armado',
            ]
        );
        DB::table('tipo_poblaciones')->insert(
            [
            'nombre' => 'AM',
            'descripcion' => 'Adulto mayor',
            
            ]
        );

        DB::table('tipo_poblaciones')->insert(
            [
            'nombre' => 'MCH',
            'descripcion' => 'Mujer Cabeza de Hogar',
            
            ]
        );

        DB::table('tipo_poblaciones')->insert(
            [
            'nombre' => 'DS y G',
            'descripcion' => 'Diversidad sexual y de genero',
            ]
        );
        DB::table('tipo_poblaciones')->insert(
            [
            'nombre' => 'Ninguna',
            'descripcion' => 'No pertenece a ninguna población',
            ]
        );
    }
}
