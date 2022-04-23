<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;

class VehicleController extends BaseController
{
    public function index(){
        $results = DB::select("
            SELECT
                a.id as vehicle_type,
                (CASE
                    WHEN b.parent_id > 0 THEN 
                        concat('/',a.name,'/',c.name,'/',b.name)
                    ELSE concat('/',a.name,'/',b.name)
                END) as name,
                (CASE
                    WHEN b.parent_id > 0 THEN 
                        b.parent_id
                    ELSE b.id
                END) as order_id
            FROM master_vehicle a
            JOIN master_brand b ON a.id = b.master_vehicle_id
            LEFT JOIN master_brand c ON c.id = b.parent_id
            ORDER BY b.master_vehicle_id, order_id
        ");
        return view('vehicle.index', compact('results'));
    }

    public function search(Request $req){
        $params = explode("/", $req->all()['data']);
        $whereConditions = "";
        $flag = true;
        foreach ($params as $value) {
            if ( $flag ) {
                $whereConditions .= " WHERE LOWER(a.name) = LOWER('$value')";
                $flag = false;
            } else {
                $whereConditions .= " AND (LOWER(c.name) = LOWER('$value') OR LOWER(b.name) = LOWER('$value'))";
            }
        }

        $results = DB::select("
            SELECT
                a.id as vehicle_type,
                (CASE
                    WHEN b.parent_id > 0 THEN 
                    	concat('/',a.name,'/',c.name,'/',b.name)
                    ELSE concat('/',a.name,'/',b.name)
                END) as name,
                (CASE
                    WHEN b.parent_id > 0 THEN 
                        b.parent_id
                    ELSE b.id
                END) as order_id
            FROM master_vehicle a
            JOIN master_brand b ON a.id = b.master_vehicle_id
            LEFT JOIN master_brand c ON c.id = b.parent_id
            $whereConditions
            ORDER BY b.master_vehicle_id, order_id
        ");

        if ( sizeof($results) > 0 ) {
            $id = $results[0]->vehicle_type;
            $vehicleName = DB::select("
                SELECT
                    name
                FROM
                    master_vehicle
                WHERE
                    id = $id
            ");
            array_unshift($results, $vehicleName[0]);
        }

        return $results;
    }
}
