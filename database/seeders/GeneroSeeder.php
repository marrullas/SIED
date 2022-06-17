<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class GeneroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Genero')->insert(
            [
            'nombre' => 'Hombre',
            'descripcion' => 'Hombre',
            ],

        );
        DB::table('Genero')->insert(
            [
            'nombre' => 'Mujer',
                'descripcion' => 'Mujer',
            ],

        );
        DB::table('Genero')->insert(
            [
                'nombre' => 'Otro',
                'descripcion' => 'Otro',
            ],
        );
    }
}
