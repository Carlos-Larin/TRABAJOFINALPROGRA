<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class usuarios extends Model
{
    //quince años tenia tu hermana
    use HasFactory;
    protected $table = 'User';
    protected $fillable = [
        'nombre_usuario',
        'correo_electronico',
        'contraseña',
    ];

    public function setContraseñaAttribute($value)
    {
        $this->attributes['contraseña'] = Hash::make($value);
    }
}    
