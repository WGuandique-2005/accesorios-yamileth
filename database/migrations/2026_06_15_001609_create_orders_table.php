<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();

            // Relación con el cliente
            $table->foreignId('user_id')
                  ->constrained('users')
                  ->onUpdate('cascade')
                  ->onDelete('restrict'); // No borrar usuario si tiene pedidos

            $table->enum('envio_o_entrega', ['Envío', 'Entrega']);
            $table->string('lugar_despacho', 100)->nullable(); // "Melo Express", "Alcaldía", etc.
            $table->string('lugar_de_recibir', 255);           // Dirección destino del cliente
            $table->date('fecha');
            $table->time('hora_recordatorio')->nullable();
            $table->decimal('precio_total', 8, 2);

            $table->enum('estado', [
                'pendiente',
                'confirmado',
                'en_ruta',
                'entregado',
                'cancelado'
            ])->default('pendiente');

            $table->text('notas')->nullable(); // Observaciones adicionales

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};