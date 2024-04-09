<?php

namespace App\Http\Controllers;

use App\Models\Booking_last_mile;
use Illuminate\Http\Request;

class Booking_last_mileController extends Controller
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
    public function create_booking_last_mile($vehicle, $fecha1, $fecha2)
    {
        $booking = Booking_last_mile::create([
            'user_id' => auth()->id(),
            'vehicle_last_mile_id' => $vehicle->id,
            'check_in' => $fecha1,
            'check_out' => $fecha2
        ]);
        if ($booking) {
            return $booking->id;
        } else {
            return null;
        }
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
    public function show(string $id)
    {
        //
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
