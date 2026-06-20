<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('product_batches', function (Blueprint $table) {
            $table->decimal('precio_venta', 8, 2)->nullable()->after('precio_inversion');
        });

        DB::table('product_batches')
            ->select('id', 'product_id')
            ->orderBy('id')
            ->get()
            ->each(function ($batch) {
                $precioVenta = DB::table('products')
                    ->where('id', $batch->product_id)
                    ->value('precio_unitario');

                DB::table('product_batches')
                    ->where('id', $batch->id)
                    ->update(['precio_venta' => $precioVenta]);
            });
    }

    public function down(): void
    {
        Schema::table('product_batches', function (Blueprint $table) {
            $table->dropColumn('precio_venta');
        });
    }
};
