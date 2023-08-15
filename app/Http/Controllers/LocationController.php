<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location;

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
}
