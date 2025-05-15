<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Causal;
use App\Models\Technician;
use App\Models\TypeActivity;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(RoleSeeder::class);
        $this->call(CausalSeeder::class);
        $this->call(ObservationSeeder::class);
        $this->call(TypeActivitySeeder::class);

        // se crea 1 usuario de rol admin
        User::factory()->create([
            'role_id' => 1
        ]);
        // se crea 3 usuarios de rol supervisor
        User::factory(3)->create([
            'role_id' => 2
        ]);
        //technician
        Technician::factory(2)->create([
            'speciality' => 'Instalacion de redes',
        ]);
        
        Technician::factory(2)->create([
            'speciality' => 'Construcion de redes',           
        ]);

        Technician::factory(2)->create([
            'speciality' => 'Lectura de redes',
        ]);

        Technician::factory(1)->create(); //tecnico sin especialidad

        $this->call(ActivitySeeder::class);
        //sedders de prueba
        //$this->call(TestTechnicianSeeder::class);
        $this->call(TestActivitySeeder::class);
    }
}
