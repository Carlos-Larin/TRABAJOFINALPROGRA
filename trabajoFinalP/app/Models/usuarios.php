<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class usuarios extends Model
{
    //quince años tenia tu hermana
    use HasFactory;
    protected $table = 'usuarios'; // nombre de la tabla
    public $timestamps = true; // si tu tabla no tiene created_at y updated_at

    protected $fillable = [
        'nombre_usuario',
        'correo_electronico',
        'contraseña',
    ];

}
