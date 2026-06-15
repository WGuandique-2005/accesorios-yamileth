<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'product_id',
        'cantidad',
        'precio_unitario',
        'descuento_aplicado',
    ];

    protected function casts(): array
    {
        return [
            'precio_unitario'    => 'decimal:2',
            'descuento_aplicado' => 'decimal:2',
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

    // ── Accessors ───────────────────────────────────────

    // Subtotal de este ítem (precio * cantidad)
    public function getSubtotalAttribute(): float
    {
        return ($this->precio_unitario - $this->descuento_aplicado) * $this->cantidad;
    }

    // Ganancia de este ítem
    public function getGananciaAttribute(): float
    {
        return ($this->precio_unitario - $this->product->precio_inversion - $this->descuento_aplicado)
               * $this->cantidad;
    }
}
