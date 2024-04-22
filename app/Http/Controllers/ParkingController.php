<?php

namespace App\Http\Controllers;

use App\Models\Parking;
use Illuminate\Http\Request;

class ParkingController extends Controller
{
    /**
     * Display a specific parking (day mode)
     */
    public function show(Request $request)
    {
        $parking = Parking::find($request->parking_id);

        $num_plazas_small = $parking->park_places()->where('status', 'active')->where('size', 'small')->count();
        $num_plazas_large = $parking->park_places()->where('status', 'active')->where('size', 'large')->count();
        $last_mile_type = $parking->vehicles_last_mile()->value('type');
        $last_mile_availables = $parking->vehicles_last_mile()->where('status', 'active')->count();

        return view('pages.booking.parking_sheet', compact('parking', 'num_plazas_small', 'num_plazas_large', 'last_mile_type', 'last_mile_availables'));
    }
    /**
     * Display a specific parking (hour mode)
     */
    public function show2(Request $request)
    {
        $parking = Parking::find($request->parking_id);

        $num_plazas_small = $parking->park_places()->where('status', 'active')->where('size', 'small')->count();
        $num_plazas_large = $parking->park_places()->where('status', 'active')->where('size', 'large')->count();
        $last_mile_type = $parking->vehicles_last_mile()->value('type');
        $last_mile_availables = $parking->vehicles_last_mile()->where('status', 'active')->count();

        return view('pages.booking.parking_sheet_hour', compact('parking', 'num_plazas_small', 'num_plazas_large', 'last_mile_type', 'last_mile_availables'));
    }
}
