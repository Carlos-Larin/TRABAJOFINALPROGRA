<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tabla_ventas', function (Blueprint $table) {
            $table->id();
            $table->string('codigo_venta', 50)->unique(); // Código único para identificar la venta
            $table->string('nombre_cliente', 100); // Nombre del cliente
            $table->string('apellido_cliente', 100); // Apellido del cliente
            $table->string('direccion_cliente', 255); // Dirección del cliente
            $table->unsignedBigInteger('id_producto'); // ID del producto vendido
            $table->string('nombre_producto',255); // Nombre del producto vendido
            $table->integer('cantidad_producto')->unsigned(); // Cantidad de productos vendidos
            $table->decimal('total_venta', 10, 2); // Total de la venta
            $table->date('fecha_venta'); // Fecha de la venta
            $table->timestamps(); // Timestamps para created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tabla_ventas');
    }
};
