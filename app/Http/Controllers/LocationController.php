<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location;
use Illuminate\Support\Facades\Artisan;

class LocationController extends Controller
{
    public function location(Request $request) {
        $lat = $request->lat;
        $long = $request->long;
        Location::updateOrCreate(
            [
                'lat' => $lat,
                'long' => $long
            ],
            [
                'lat' => $lat,
                'long' => $long,
                'created_at' => \Carbon\Carbon::now('Asia/Kolkata'),
                'updated_at' => \Carbon\Carbon::now('Asia/Kolkata')
            ]
        );
        return response()->json();
    }

    public function locations() {
        //Artisan::call("migrate --path=database/migrations/2023_08_15_122246_create_locations_table.php");
        $locations = Location::orderBy('id','DESC')->get();
        return view('locations')->with(compact(['locations']));
    }
}
