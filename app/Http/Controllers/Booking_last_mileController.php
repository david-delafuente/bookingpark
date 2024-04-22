<?php

namespace App\Http\Controllers;

use App\Models\Booking_last_mile;
use Illuminate\Http\Request;

class Booking_last_mileController extends Controller
{
    /**
     * Create a booking lastm mile , when you've clicked this option in form
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
}
