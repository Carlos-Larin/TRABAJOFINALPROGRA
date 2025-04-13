<?php
// filepath: d:\TRABAJOFINALPROGRA\trabajoFinalP\app\Models\Producto.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $table = 'tabla_productos'; // Nombre de la tabla en la base de datos

    protected $fillable = [
        'codigo_producto',
        'nombre_producto',
        'descripcion_producto',
        'precio_producto',
        'stock_producto',
        'categoria_producto',
        'imagen_producto',
    ];
}
?>