<?php

namespace App\Http\Controllers;

use App\Models\Parking;
use Illuminate\Http\Request;

class ParkingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $parking = Parking::find($request->parking_id);

        $num_plazas_small = $parking->park_places()->where('status', 'active')->where('size', 'small')->count();
        $num_plazas_large = $parking->park_places()->where('status', 'active')->where('size', 'large')->count();
        $last_mile_type = $parking->vehicles_last_mile()->value('type');
        $last_mile_availables = $parking->vehicles_last_mile()->where('status', 'active')->count();
        return view('pages.booking.parking_sheet', compact('parking', 'num_plazas_small', 'num_plazas_large', 'last_mile_type', 'last_mile_availables'));
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
