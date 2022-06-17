<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class EstratoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Estratos')->insert(
            [
                'nombre' => '1',
                'descripcion' => 'Estrato 1',
            ],
        );
        DB::table('Estratos')->insert(
            [
                'nombre' => '2',
                'descripcion' => 'Estrato 2',
            ],
        );
        DB::table('Estratos')->insert(
            [
                'nombre' => '3',
                'descripcion' => 'Estrato 3',
            ],
        );
        DB::table('Estratos')->insert(
            [
                'nombre' => '4',
                'descripcion' => 'Estrato 4',
            ],
        );
        DB::table('Estratos')->insert(
            [
                'nombre' => '5',
                'descripcion' => 'Estrato 5',
            ],
        );
        DB::table('Estratos')->insert(
            [
                'nombre' => '5',
                'descripcion' => 'Estrato 5',
            ],
        );
        DB::table('Estratos')->insert(
            [
                'nombre' => '6',
                'descripcion' => 'Estrato 6',
            ],
        );
    }
}
