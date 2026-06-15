<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'envio_o_entrega',
        'lugar_despacho',
        'lugar_de_recibir',
        'fecha',
        'hora_recordatorio',
        'precio_total',
        'estado',
        'notas',
    ];

    protected function casts(): array
    {
        return [
            'fecha'             => 'date',
            'hora_recordatorio' => 'datetime:H:i',
            'precio_total'      => 'decimal:2',
        ];
    }

    // ── Relaciones ──────────────────────────────────────
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    // ── Accessors ───────────────────────────────────────

    // Ganancia total del pedido
    public function getGananciaTotalAttribute(): float
    {
        return $this->orderItems->sum(function ($item) {
            return ($item->precio_unitario - $item->product->precio_inversion - $item->descuento_aplicado)
                   * $item->cantidad;
        });
    }

    // Cantidad total de productos en el pedido
    public function getCantidadTotalAttribute(): int
    {
        return $this->orderItems->sum('cantidad');
    }

    // ── Scopes ──────────────────────────────────────────
    public function scopePendientes($query)
    {
        return $query->where('estado', 'pendiente');
    }

    public function scopeEnRuta($query)
    {
        return $query->where('estado', 'en_ruta');
    }

    public function scopeEntregados($query)
    {
        return $query->where('estado', 'entregado');
    }
}