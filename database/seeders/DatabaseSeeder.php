<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory()->create([
          'name' => 'admin',
          'email' => 'admin@admin.com',
          'password' => Hash::make('admin'),
          'rol' => 'master',
          'active' => 1,
        ]);

        \App\Models\User::factory()->create([
          'name' => 'Nombre Apellido 1',
          'email' => 'napellido@psa.gob.ar',
          'password' => Hash::make('psa'),
          'rol' => 'mesa',
          'active' => 0,
        ]);
        \App\Models\User::factory()->create([
          'name' => 'Nombre Apellido 2',
          'email' => 'napellido2@psa.gob.ar',
          'password' => Hash::make('psa'),
          'rol' => 'admin',
          'active' => 1,
        ]);
        \App\Models\User::factory()->create([
          'name' => 'Nombre Apellido 3',
          'email' => 'napellido3@psa.gob.ar',
          'password' => Hash::make('psa'),
          'rol' => 'psa',
          'active' => 1,
        ]);
        \App\Models\User::factory()->create([
          'name' => 'Nombre Apellido 4',
          'email' => 'napellido4@psa.gob.ar',
          'password' => Hash::make('psa'),
          'rol' => 'audit',
          'active' => 0,
        ]);
        \App\Models\User::factory()->create([
          'name' => 'Nombre Apellido 5',
          'email' => 'napellido5@psa.gob.ar',
          'password' => Hash::make('psa'),
          'rol' => 'user',
          'active' => 1,
        ]);
    }
}
