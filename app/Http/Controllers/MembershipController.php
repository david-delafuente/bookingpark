<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class MembershipController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
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
    public function update(Request $request)
    {
        /* 
        Validation
        */
        $request->validate([
            'email' => 'required|email|unique:users'
        ]);

        /*
        Database Edit
        */
        $user = User::where('email', $request->email)->first();

        // Verificar si se encontró al usuario
        if ($user) {
            // Actualizar el membership_id del usuario de 1 a 2
            $user->update(['membership_id' => 2]);
            return redirect('login');

            // Redirigir o devolver una respuesta según sea necesario
            return redirect()->route('success_page')->with('success', 'El membership_id se actualizó correctamente.');
        } else {
            // Si el usuario no existe, puedes manejarlo como desees
            return redirect()->route('error_page')->with('error', 'El usuario no existe.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
