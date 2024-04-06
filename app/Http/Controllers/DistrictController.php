<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Parking;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $districts = District::all();
        return view('pages.nav.bookings_day', compact('districts'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {

        if (isset($request) && !is_null($request->district)) {
            $districts = District::all();
            $districtId = $request->input('district');
            //$parkings = Parking::where('district_id', $districtId)->get();
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
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
