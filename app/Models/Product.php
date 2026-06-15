<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'nombre',
        'cantidad_stock',
        'precio_unitario',
        'precio_inversion',
        'descuento',
        'imagen_ruta',
        'activo',
    ];

    protected function casts(): array
    {
        return [
            'precio_unitario'  => 'decimal:2',
            'precio_inversion' => 'decimal:2',
            'descuento'        => 'decimal:2',
            'activo'           => 'boolean',
        ];
    }

    // ── Relaciones ──────────────────────────────────────
    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    // ── Accessors (columnas calculadas) ─────────────────

    // Ganancia por unidad
    public function getGananciaUnitariaAttribute(): float
    {
        return $this->precio_unitario - $this->precio_inversion - $this->descuento;
    }

    // Precio final después de descuento
    public function getPrecioFinalAttribute(): float
    {
        return $this->precio_unitario - $this->descuento;
    }

    // Valor total del stock en inversión
    public function getValorStockInversionAttribute(): float
    {
        return $this->precio_inversion * $this->cantidad_stock;
    }

    // Valor total del stock en venta
    public function getValorStockVentaAttribute(): float
    {
        return $this->precio_unitario * $this->cantidad_stock;
    }

    // ── Scopes ──────────────────────────────────────────

    // Solo productos visibles/publicados
    public function scopeActivos($query)
    {
        return $query->where('activo', true);
    }

    // Solo productos con stock disponible
    public function scopeEnStock($query)
    {
        return $query->where('cantidad_stock', '>', 0);
    }
}