<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    /**
     * Create vehicle in register page
     * * Used in RegisterController -> store()
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
     * Create vehicle in user page with simple form
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
     * Remove vehicle
     * Used in user page with simple form
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
