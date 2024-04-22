<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Parking;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
    /**
     * Display a listing of districts in day page
     */
    public function index()
    {
        $districts = District::all();
        return view('pages.nav.bookings_day', compact('districts'));
    }
    /**
     * Display a listing of districts in hour page
     */
    public function index2()
    {
        $districts = District::all();
        return view('pages.nav.bookings_hour', compact('districts'));
    }

    /**
     * Display parkings in disctricts selected in day page
     */
    public function show(Request $request)
    {
        if (isset($request) && !is_null($request->district)) {
            $districts = District::all();
            $districtId = $request->input('district');

            $parkings = Parking::where('district_id', $districtId)
                ->whereRaw('EXISTS (
                SELECT 1
                FROM park_places
                WHERE park_places.parking_id = parkings.id
                AND park_places.status = "active"
            )')->get();

            return view('pages.nav.bookings_day', compact('parkings', 'districts'));
        } else {
            return redirect()->route('booking_day')->with('danger', 'Elige un dsitrito');
        }
    }

    /**
     * Display parkings in disctricts selected in hour page
     */
    public function show2(Request $request)
    {
        if (isset($request) && !is_null($request->district)) {
            $districts = District::all();
            //This is another way to access the form variable
            $districtId = $request->district;

            //Another method using Eloquent of Laravel to make a query to DB
            $parkings = Parking::where('district_id', $districtId)
                ->whereHas('park_places', function ($query) {
                    $query->where('status', 'active');
                })
                ->get();

            return view('pages.nav.bookings_hour', compact('parkings', 'districts'));
        } else {
            return redirect()->route('booking_hour')->with('danger', 'Elige un dsitrito');
        }
    }
}
