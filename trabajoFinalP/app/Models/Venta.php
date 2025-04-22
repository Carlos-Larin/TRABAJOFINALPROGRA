<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use HasFactory;

    protected $table = 'tabla_ventas';

    protected $fillable = [
        'codigo_venta',
        'nombre_cliente',
        'apellido_cliente',
        'direccion_cliente',
        'id_producto',
        'nombre_producto',
        'cantidad_producto',
        'total_venta',
        'fecha_venta',
    ];

    // Si necesitas relaciones, puedes definirlas aquí
    public function producto()
    {
        return $this->belongsTo(Producto::class, 'id_producto');
    }
}