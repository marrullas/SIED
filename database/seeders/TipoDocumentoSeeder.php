<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class TipoDocumentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipo_documentos')->insert(
            [
            'nombre' => 'Cedula de Ciudadania',
            'descripcion' => 'Cedula de Ciudadania',
            
            ]
        );
        DB::table('tipo_documentos')->insert(
            [
            'nombre' => 'tarjeta de identidad',
                'descripcion' => 'tarjeta de identidad',
            ]
        );
        DB::table('tipo_documentos')->insert(
            [
                'nombre' => 'Cedula de extranjeria',
                'descripcion' => 'Cedula de extranjeria',
            ]
        );
        DB::table('tipo_documentos')->insert(
            [
                'nombre' => 'registro civil',
                'descripcion' => 'registro civil',
            ]
        );
        DB::table('tipo_documentos')->insert(
            [
                'nombre' => 'NUIP',
                'descripcion' => 'NUIP',
            ]
        );
        DB::table('tipo_documentos')->insert(
            [
                'nombre' => 'Pasaporte',
                'descripcion' => 'Pasaporte',
            ]
        );

    }
}
