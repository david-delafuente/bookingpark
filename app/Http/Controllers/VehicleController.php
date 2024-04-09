<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
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
    public function create($user_id, $vehicle, $license_plate)
    {
        Vehicle::create([
            'user_id' => $user_id,
            'type' => $vehicle,
            'license_plate' => $license_plate
        ]);
        return true;
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create_form(Request $request)
    {
        Vehicle::create([
            'user_id' => $request->user_id,
            'type' => $request->vehicle,
            'license_plate' => $request->license_plate
        ]);
        return redirect()->route('profile');
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
        $vehicle = Vehicle::find($id);

        if ($vehicle) {

            $vehicle->delete();

            return redirect()->route('profile');
        } else {
            return redirect()->route('profile')->with('danger', 'El vehículo no ha podido eliminarse.');
        }
    }
}
