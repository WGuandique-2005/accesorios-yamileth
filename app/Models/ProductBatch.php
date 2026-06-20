<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ProductBatch extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'invoice_item_id',
        'cantidad_inicial',
        'cantidad_disponible',
        'precio_inversion',
        'precio_venta',
        'fecha_ingreso',
    ];

    protected function casts(): array
    {
        return [
            'cantidad_inicial' => 'integer',
            'cantidad_disponible' => 'integer',
            'precio_inversion' => 'decimal:2',
            'precio_venta' => 'decimal:2',
            'fecha_ingreso' => 'date',
        ];
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function invoiceItem(): HasOne
    {
        return $this->hasOne(InvoiceItem::class, 'product_batch_id');
    }

    public function scopeDisponibles($query)
    {
        return $query->where('cantidad_disponible', '>', 0);
    }

    public function scopeOrdenAntiguedad($query)
    {
        return $query->orderBy('fecha_ingreso')->orderBy('id');
    }
}
