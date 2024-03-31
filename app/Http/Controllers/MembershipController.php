<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
    public function premium(Request $request)
    {
        /* 
        Validation
        */
        $request->validate([
            'email' => 'required|email'
        ]);

        /*
        Database Edit
        */

        $user = User::where('email', $request->email)->first();
        $email = $request->input('email');

        if ($user) {
            if ($user->membership_id === 1) {
                DB::update('UPDATE users SET membership_id = 2 WHERE email = ?', [$email]);
                return redirect()->route('welcome')->with('success', 'Membresía cambiada a Premium.');
            } else {
                return redirect()->route('welcome')->with('danger', 'Ya eres miembro Premium, ¿no lo recuerdas?');
            }
        } else {
            return redirect()->route('welcome')->with('danger', 'No se ha encontrado ningún usuario con el email indicado.');
        }



        /*      if ($rowsAffected > 0) {
            return redirect()->route('welcome')->with('success', 'Membresía cambiada a Premium.');
        } else {
            return redirect()->route('welcome')->with('danger', 'No se ha encontrado ningún usuario con el email indicado.');
        } */
    }

    /**
     * Update the specified resource in storage.
     */
    public function basic()
    {

        $user = Auth::user();
        $email = $user->email;


        if ($user->membership_id === 2) {
            DB::update('UPDATE users SET membership_id = 1 WHERE email = ?', [$email]);
            return redirect()->route('profile')->with('success', 'Membresía cambiada a Basic de nuevo.');
        } else {
            return redirect()->route('profile')->with('danger', 'Ya eres miembro Basic, ¿no lo recuerdas?');
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
