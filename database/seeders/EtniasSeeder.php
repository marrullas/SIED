<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class EtniasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('etnias')->insert(
            [
            'nombre' => 'Afro',
            'descripcion' => 'Afro',
            ]
        );
        DB::table('etnias')->insert(
            [
            'nombre' => 'Indígena',
                'descripcion' => 'Indígena',
            ]
        );
        DB::table('etnias')->insert(
            [
                'nombre' => 'Raizal',
                'descripcion' => 'Raizal',
            ]
        );
        DB::table('etnias')->insert(
            [
                'nombre' => 'Gitano',
                'descripcion' => 'Gitano',
            ]
        );
        DB::table('etnias')->insert(
            [
                'nombre' => 'Otro',
                'descripcion' => 'Otro',
            ]
        );
        DB::table('etnias')->insert(
            [
                'nombre' => 'Sin información',
                'descripcion' => 'Sin información',
            ]
        );
    }
}
