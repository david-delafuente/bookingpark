<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Park_place;
use App\Models\Parking;
use App\Models\Vehicle_last_mile;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Complete booking for days
     */
    public function complete_booking_day(Request $request)
    {
        $park_id = $request->parking_id;
        //Server side validation
        if (isset($request) && is_null($request->size) || is_null($request->fecha1) || is_null($request->fecha2)) {
            return redirect()->route('show_parking_data', ['parking_id' => $park_id])->with('danger', 'Faltan datos.');
        } else {
            //Obtain park place available and pass to inactive when it's reserved
            $parkPlace = Park_place::where('parking_id', $park_id)
                ->where('size', $request->size)
                ->where('status', 'active')
                ->first();

            if ($parkPlace) {
                $parkPlace->status = 'inactive';
                $parkPlace->save();
            } else {
                return redirect()->route('show_parking_data', ['parking_id' => $park_id])->with('danger', 'No hay parkings disponibles del tamaño seleccionado');
            }

            //create booking in Db without last mile
            if ($request->last_mile) {
                $fecha1 = $request->fecha1;
                $fecha2 = $request->fecha2;

                $vehicle = Vehicle_last_mile::where('parking_id', $park_id)
                    ->where('status', 'active')
                    ->first();

                $booking_last_mile_controller = new Booking_last_mileController();
                $booking_last_mile_controller->create_booking_last_mile($vehicle, $fecha1, $fecha2);
            }

            $booking = Booking::create([
                'user_id' => auth()->id(), // ID del usuario autenticado
                'check_in' => $request->fecha1,
                'check_out' => $request->fecha2,
                'park_place_id' => $parkPlace->id,
            ]);




            if ($booking) {
                return redirect()->route('welcome')->with('success', 'Reserva completada!');
            } else {
                return redirect()->route('welcome')->with('danger', 'Algo salió mal, vuelve a intentar hacer la reserva.');
            }
        }
    }

    public function cancel_booking($booking_id)
    {
        $booking = Booking::find($booking_id);

        if ($booking) {
            $parkPlace = $booking->park_place;
            $booking->delete();

            if ($booking) {
                $parkPlace->status = 'active';
                $parkPlace->save();
            }
            return redirect()->route('profile');
        } else {
            return redirect()->route('profile')->with('danger', 'La reserva no pudo ser cancelada.');
        }
    }




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
