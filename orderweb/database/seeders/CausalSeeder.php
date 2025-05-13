<?php

namespace Database\Seeders;

use App\Models\Causal;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CausalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Causal::insert([
            ['description' => 'Reparacion del servicio'],
            ['description' => 'Suspension del servicio'],
            ['description' => 'Reconexion del servicio'],
            ['description' => 'Instalacion del servicio'],
            ['description' => 'Cambio del servicio']
        ]);
    }
}
