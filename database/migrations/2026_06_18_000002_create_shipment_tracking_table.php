<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('shipment_tracking', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->unique()->constrained('orders')->cascadeOnDelete();
            $table->string('agencia');
            $table->date('fecha_envio');
            $table->date('fecha_limite_retiro');
            $table->boolean('cliente_retiro')->default(false);
            $table->date('fecha_retiro_real')->nullable();
            $table->boolean('admin_cobro')->default(false);
            $table->date('fecha_cobro')->nullable();
            $table->text('notas_envio')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('shipment_tracking');
    }
};
