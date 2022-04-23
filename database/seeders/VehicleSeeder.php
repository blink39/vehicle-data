<?php

namespace Database\Seeders;

use App\Models\MasterVehicle;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VehicleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $mobil = MasterVehicle::create(['name' => 'mobil']);
        $motor = MasterVehicle::create(['name' => 'motor']);
    }
}
