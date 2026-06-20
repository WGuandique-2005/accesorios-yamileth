<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('product_batches', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained()->cascadeOnDelete();
            $table->foreignId('invoice_item_id')->nullable()->constrained()->nullOnDelete();
            $table->unsignedInteger('cantidad_inicial');
            $table->unsignedInteger('cantidad_disponible');
            $table->decimal('precio_inversion', 8, 2);
            $table->date('fecha_ingreso');
            $table->timestamps();
        });

        $today = now()->toDateString();

        DB::table('products')
            ->select('id', 'cantidad_stock', 'precio_inversion')
            ->orderBy('id')
            ->get()
            ->each(function ($product) use ($today) {
                if ((int) $product->cantidad_stock <= 0) {
                    return;
                }

                DB::table('product_batches')->insert([
                    'product_id' => $product->id,
                    'invoice_item_id' => null,
                    'cantidad_inicial' => (int) $product->cantidad_stock,
                    'cantidad_disponible' => (int) $product->cantidad_stock,
                    'precio_inversion' => $product->precio_inversion,
                    'fecha_ingreso' => $today,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            });
    }

    public function down(): void
    {
        Schema::dropIfExists('product_batches');
    }
};
