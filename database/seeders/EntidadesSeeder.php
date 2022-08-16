<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class EntidadesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('entidades')->insert(
            [
            'nombre' => 'Bomberos',
            'descripcion' => 'Bomberos',
            'direccion' => 'Calle 1',
            'telefono' => '12345678',
            ]
        );
        DB::table('entidades')->insert(
            [
            'nombre' => 'Cruz Roja',
                'descripcion' => 'Cruz Roja',
            'direccion' => 'Calle 2',
            'telefono' => '87654321',
            ]
        );
        DB::table('entidades')->insert(
            [
                'nombre' => 'Defensa Civil',
                'descripcion' => 'Defensa Civil',
            'direccion' => 'Calle 3',
            'telefono' => '12345678',
            
            ]
        );
        DB::table('entidades')->insert(
            [
                'nombre' => 'UMGRD (Unidad Municipal de Gestion del Riesgo y Desastres)',
                'descripcion' => 'UMGRD (Unidad Municipal de Gestion del Riesgo y Desastres)',
            'direccion' => 'Calle 4',
            'telefono' => '87654321',
            ]
        );
        DB::table('entidades')->insert(
            [
                'nombre' => 'Otra',
                'descripcion' => 'Entidad distinta a las anteriores',
            'direccion' => 'Calle 4',
            'telefono' => '87654321',
            ]
        );
        
    }
}
