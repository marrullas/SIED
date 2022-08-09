<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $this->call([
            UsersSeeder::class,
            EntidadesSeeder::class,
            EstratoSeeder::class,
            EtniasSeeder::class,
            GeneroSeeder::class,
            TipoAyudaSeeder::class,
            TipoEventoSeeder::class,
            TipoPoblacionSeeder::class,
            ParentescoSeeder::class,
        ]);
    }
}
