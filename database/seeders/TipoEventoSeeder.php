<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class TipoEventoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipo_eventos')->insert(
            [
            'nombre' => 'Avenida Torrecial',
            'descripcion' => 'Avenida Torrecial',
            ]
        );
        DB::table('tipo_eventos')->insert(
            [
            'nombre' => 'Colapso Estructura',
                'descripcion' => 'Colapso Estructura',
            ]
        );
        DB::table('tipo_eventos')->insert(
            [
                'nombre' => 'Derrame Hidrocarburos',
                'descripcion' => 'Derrame Hidrocarburos',
            ]
        );
        DB::table('tipo_eventos')->insert(
            [
                'nombre' => 'Deslizamiento',
                'descripcion' => 'Deslizamiento',
            ]
        );
        DB::table('tipo_eventos')->insert(
            [
                'nombre' => 'Explosión',
                'descripcion' => 'Explosión',
            ]
        );
        DB::table('tipo_eventos')->insert(
            [
                'nombre' => 'Granizada',
                'descripcion' => 'Granizada',
            ]
        );
        DB::table('tipo_eventos')->insert(
            [
                'nombre' => 'Incendio Estructural',
                'descripcion' => 'Incendio Estructural',
            ]
        );
        DB::table('tipo_eventos')->insert(
            [
                'nombre' => 'Incendio Forestal',
                'descripcion' => 'Incendio Forestal',
            ]
        );
        DB::table('tipo_eventos')->insert(
            [
                'nombre' => 'Incendio con materiales peligrosos',
                'descripcion' => 'Incendio con materiales peligrosos',
            ]
        );
        DB::table('tipo_eventos')->insert(
            [
                'nombre' => 'Inundacion',
                'descripcion' => 'Inundacion',
            ]
        );
        DB::table('tipo_eventos')->insert(
            [
                'nombre' => 'Sismo',
                'descripcion' => 'Sismo',
            ]
        );
        DB::table('tipo_eventos')->insert(
            [
                'nombre' => 'Tormenta Electrica',
                'descripcion' => 'Tormenta Electrica',
            ]
        );
        DB::table('tipo_eventos')->insert(
            [
                'nombre' => 'Vendabal',
                'descripcion' => 'Vendabal',
            ]
        );
        DB::table('tipo_eventos')->insert(
            [
                'nombre' => 'Otro',
                'descripcion' => 'Otro',
            ],
        );
    }
}
