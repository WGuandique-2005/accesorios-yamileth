<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'product_id',
        'product_batch_id',
        'cantidad',
        'precio_unitario',
        'descuento_aplicado',
        'precio_inversion_aplicado',
    ];

    protected function casts(): array
    {
        return [
            'precio_unitario'    => 'decimal:2',
            'descuento_aplicado' => 'decimal:2',
            'precio_inversion_aplicado' => 'decimal:2',
        ];
    }

    // ── Relaciones ──────────────────────────────────────
    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class)->withTrashed();
    }

    public function productBatch(): BelongsTo
    {
        return $this->belongsTo(ProductBatch::class);
    }

    public function review(): HasOne
    {
        return $this->hasOne(Review::class);
    }

    // ── Accessors ───────────────────────────────────────

    // Subtotal de este ítem (precio * cantidad)
    public function getSubtotalAttribute(): float
    {
        return ($this->precio_unitario - $this->descuento_aplicado) * $this->cantidad;
    }

    // Ganancia de este ítem
    public function getGananciaAttribute(): float
    {
        $costo = $this->precio_inversion_aplicado ?? $this->product?->precio_inversion ?? 0;

        return ($this->precio_unitario - $costo - $this->descuento_aplicado)
               * $this->cantidad;
    }
}
