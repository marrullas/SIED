<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ParentescoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('parentescos')->insert([
            'nombre' => 'Conyuge',
            'descripcion' => 'Pareja sentimental'
        ]);

        DB::table('parentescos')->insert([
            'nombre' => 'Hijo (a)',
            'descripcion' => 'Hijo o hija del jefe del hogar'
        ]);
        DB::table('parentescos')->insert([
            'nombre' => 'Nieto (a)',
            'descripcion' => 'nieto o nieta jefe del hogar'
        ]);
        DB::table('parentescos')->insert([
            'nombre' => 'Primo (a)',
            'descripcion' => 'Primo o prima del jefe del hogar'
        ]);
        DB::table('parentescos')->insert([
            'nombre' => 'Hijo (a)',
            'descripcion' => 'Hijo o hija del jefe del hogar'
        ]);
        DB::table('parentescos')->insert([
            'nombre' => 'Tio (a)',
            'descripcion' => 'tio o tia del jefe del hogar'
        ]);
        DB::table('parentescos')->insert([
            'nombre' => 'Suegro (a)',
            'descripcion' => 'Suegro o suegra del jefe del hogar'
        ]);

        DB::table('parentescos')->insert([
            'nombre' => 'Yerno / Nuera',
            'descripcion' => 'Yerno / Nuera del jefe del hogar'
        ]);

    }
}
