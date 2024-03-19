<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function login(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Intentar encontrar un usuario con las credenciales proporcionadas
        $user = User::where('email', $request->email)->first();

        // Si no se encuentra ningún usuario o la contraseña no coincide, redirigir con un mensaje de error
        if (!$user || !password_verify($request->password, $user->password)) {
            return redirect()->back()->withErrors(['error' => 'Credenciales incorrectas.']);
        }

        // Iniciar sesión si las credenciales son válidas
        Auth::login($user);

        // Redirigir a la página de inicio después del inicio de sesión exitoso
        return redirect()->route('welcome');
    }
    /**
     * Display a listing of the resource.
     */


    public function index()
    {
        return view('auth.login');
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
