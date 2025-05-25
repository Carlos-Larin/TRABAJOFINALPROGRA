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

        $email = trim($request->email); // Elimina espacios
        $usuario = usuarios::where('correo_electronico', $email)->first();

        if (!$usuario) {
            return back()->withErrors(['email' => 'Usuario no encontrado'])->withInput();
        }

        if (Hash::check($request->password, $usuario->contraseña)) {
            Auth::login($usuario); // Esto autentica al usuario
            return redirect('/')->with('success', 'Inicio de sesión exitoso');
        }

        return back()->withErrors(['email' => 'Contraseña incorrecta'])->withInput();
    }
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Has cerrado sesión');
    }
}