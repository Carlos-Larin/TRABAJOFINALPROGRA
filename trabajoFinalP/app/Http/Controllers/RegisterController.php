<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:User,correo_electronico',
            'password' => 'required|min:8',
        ]);

        usuarios::create([
            'nombre_usuario' => $request->name,
            'correo_electronico' => $request->email,
            'contraseña' => $request->password, // Será encriptado automáticamente por el mutador
        ]);

        return redirect()->route('login')->with('success', 'Usuario registrado correctamente.');
    }
}
