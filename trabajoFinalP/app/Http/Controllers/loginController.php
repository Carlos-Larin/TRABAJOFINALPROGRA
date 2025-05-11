<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\usuarios;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class loginController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = usuarios::where('correo_electronico', $request->email)->first();

        if ($user && Hash::check($request->password, $user->contraseña)) {
            Auth::login($user); // Autentica al usuario
            return redirect()->route('index')->with('success', 'Bienvenido ' . $user->nombre_usuario); // Redirige al inicio
        }

        return back()->withErrors(['email' => 'Credenciales incorrectas']);
    }
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Has cerrado sesión');
    }
}