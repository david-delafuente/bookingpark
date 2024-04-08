<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Park_place;
use App\Models\Parking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Complete booking for days
     */
    public function complete_booking_day(Request $request)
    {
        $park_id = $request->parking_id;

        if (isset($request) && is_null($request->size) || is_null($request->fecha1) || is_null($request->fecha2)) {

            return redirect()->route('show_parking_data', ['parking_id' => $park_id])->with('danger', 'Faltan datos.');
        } else {
            //obtener plaza de parking libre en el tamaño solicitado y pasarkla a inactiva
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



            //crear la reserva
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
