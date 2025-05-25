<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\usuarios; // Asegúrate de importar el modelo correcto
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:usuarios,correo_electronico',
            'password' => 'required|min:8',
        ]);

        usuarios::create([
            'nombre_usuario' => $request->name,
            'correo_electronico' => $request->email,
            'contraseña' => Hash::make($request->password), // Encripta la contraseña
        ]);

        return redirect()->route('login')->with('success', 'Usuario registrado correctamente.');
    }
}
