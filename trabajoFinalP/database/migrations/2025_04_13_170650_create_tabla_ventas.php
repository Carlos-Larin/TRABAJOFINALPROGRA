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
            $table->string('codigo_venta', 50)->unique();
            $table->string('nombre_cliente', 100); 
            $table->string('apellido_cliente', 100);
            $table->string('direccion_cliente', 255); 
            $table->unsignedBigInteger('id_producto');
            $table->string('nombre_producto',255);
            $table->integer('cantidad_producto')->unsigned();
            $table->decimal('total_venta', 10, 2);
            $table->date('fecha_venta');
            $table->timestamps(); 
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
