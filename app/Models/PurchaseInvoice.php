<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PurchaseInvoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'numero_factura',
        'fecha_compra',
        'total_inversion',
        'descuento_temu',
        'descuento_por_producto',
        'notas',
    ];

    protected function casts(): array
    {
        return [
            'fecha_compra' => 'date',
            'total_inversion' => 'decimal:2',
            'descuento_temu' => 'decimal:2',
            'descuento_por_producto' => 'decimal:2',
        ];
    }

    public function items(): HasMany
    {
        return $this->hasMany(InvoiceItem::class, 'invoice_id');
    }
}
