<?php

namespace Database\Seeders;

use App\Models\MasterBrand;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $toyota = MasterBrand::create(['master_vehicle_id' => 1, 'name' => 'toyota', 'parent_id' => 0]);
        $daihatsu = MasterBrand::create(['master_vehicle_id' => 1, 'name' => 'daihatsu', 'parent_id' => 0]);
        $nissan = MasterBrand::create(['master_vehicle_id' => 1, 'name' => 'nissan', 'parent_id' => 0]);
        $honda = MasterBrand::create(['master_vehicle_id' => 2, 'name' => 'honda', 'parent_id' => 0]);
        $yamaha = MasterBrand::create(['master_vehicle_id' => 2, 'name' => 'yamaha', 'parent_id' => 0]);
        $suzuki = MasterBrand::create(['master_vehicle_id' => 2, 'name' => 'suzuki', 'parent_id' => 0]);
        $avanza = MasterBrand::create(['master_vehicle_id' => 1, 'name' => 'avanza', 'parent_id' => 1]);
        $innova = MasterBrand::create(['master_vehicle_id' => 1, 'name' => 'innova', 'parent_id' => 1]);
        $xenia = MasterBrand::create(['master_vehicle_id' => 1, 'name' => 'xenia', 'parent_id' => 2]);
        $ayla = MasterBrand::create(['master_vehicle_id' => 1, 'name' => 'ayla', 'parent_id' => 2]);
        $juke = MasterBrand::create(['master_vehicle_id' => 1, 'name' => 'juke', 'parent_id' => 3]);
        $livina = MasterBrand::create(['master_vehicle_id' => 1, 'name' => 'livina', 'parent_id' => 3]);
        $vario = MasterBrand::create(['master_vehicle_id' => 2, 'name' => 'vario', 'parent_id' => 4]);
        $cbr = MasterBrand::create(['master_vehicle_id' => 2, 'name' => 'cbr', 'parent_id' => 4]);
        $mio = MasterBrand::create(['master_vehicle_id' => 2, 'name' => 'mio', 'parent_id' => 5]);
        $r15 = MasterBrand::create(['master_vehicle_id' => 2, 'name' => 'r15', 'parent_id' => 5]);
        $spin = MasterBrand::create(['master_vehicle_id' => 2, 'name' => 'spin', 'parent_id' => 6]);
        $satria = MasterBrand::create(['master_vehicle_id' => 2, 'name' => 'satria', 'parent_id' => 6]);
    }
}
