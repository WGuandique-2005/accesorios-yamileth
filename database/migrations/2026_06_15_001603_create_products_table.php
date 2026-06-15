<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 150);
            $table->unsignedInteger('cantidad_stock')->default(0);
            $table->decimal('precio_unitario', 8, 2);   // Precio de venta
            $table->decimal('precio_inversion', 8, 2);  // Costo / inversión
            $table->decimal('descuento', 5, 2)->default(0.00); // Porcentaje o monto
            $table->string('imagen_ruta')->nullable();  // Ruta del archivo de imagen
            $table->boolean('activo')->default(true);   // Para ocultar sin borrar
            $table->timestamps();
            $table->softDeletes();                      // deleted_at para borrado lógico
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};