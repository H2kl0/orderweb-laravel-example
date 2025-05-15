<?php

namespace Database\Seeders;

use App\Models\Activity;
use App\Models\Technician;
use App\Models\TypeActivity;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TestActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $activity = new Activity();
        $activity->description = 'Instalacion de redes';
        $activity->hours = 2;
        //Fks

        $technician = Technician::where('document', '=', '11162222333')->first();
        $activity->technician_id = $technician->id;

        $typeActivity = TypeActivity::where('id',3)->first();
        $activity->type_activity_id = $typeActivity->id;

        $activity->save();
    }
}
