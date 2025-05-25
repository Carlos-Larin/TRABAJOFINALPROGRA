<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class usuarios extends Authenticatable
{
    protected $table = 'usuarios';
    public $timestamps = true;

    protected $fillable = [
        'nombre_usuario',
        'correo_electronico',
        'contraseña',
    ];

    // Si tu campo de contraseña se llama diferente a "password":
    public function getAuthPassword()
    {
        return $this->contraseña;
    }
}
