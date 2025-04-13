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
        Schema::create('tabla_productos', function (Blueprint $table) {
            $table->id();            
            $table->string('codigo_producto', 50)->unique();
            $table->string('nombre_producto', 100);
            $table->string('descripcion_producto', 255);
            $table->decimal('precio_producto', 8, 2);
            $table->integer('stock_producto');
            $table->string('categoria_producto', 50);
            $table->string('imagen_producto', 255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tabla_productos');
    }
};
