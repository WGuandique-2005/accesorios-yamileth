<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();

            $table->foreignId('order_id')
                  ->constrained('orders')
                  ->onUpdate('cascade')
                  ->onDelete('cascade'); // Si se borra el pedido, se borran sus ítems

            $table->foreignId('product_id')
                  ->constrained('products')
                  ->onUpdate('cascade')
                  ->onDelete('restrict'); // No borrar producto si está en un pedido

            $table->unsignedInteger('cantidad');
            $table->decimal('precio_unitario', 8, 2); // Precio histórico al momento del encargo
            $table->decimal('descuento_aplicado', 5, 2)->default(0.00); // Descuento histórico

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};