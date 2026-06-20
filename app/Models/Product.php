<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

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

    public function invoiceItems(): HasMany
    {
        return $this->hasMany(InvoiceItem::class);
    }

    public function batches(): HasMany
    {
        return $this->hasMany(ProductBatch::class)->orderBy('fecha_ingreso')->orderBy('id');
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }

    public function productImages(): HasMany
    {
        return $this->hasMany(ProductImage::class)->orderBy('orden');
    }

    public function primaryImage(): HasOne
    {
        return $this->hasOne(ProductImage::class)->orderBy('orden');
    }

    public function agregarLote(int $cantidad, float $precioInversion, ?int $invoiceItemId = null, ?float $precioVenta = null): ProductBatch
    {
        $esPrimerLote = ! $this->batches()->exists();
        $precioVentaFinal = $precioVenta ?? (float) $this->precio_unitario;

        $batch = $this->batches()->create([
            'invoice_item_id' => $invoiceItemId,
            'cantidad_inicial' => $cantidad,
            'cantidad_disponible' => $cantidad,
            'precio_inversion' => round($precioInversion, 2),
            'precio_venta' => round($precioVentaFinal, 2),
            'fecha_ingreso' => now()->toDateString(),
        ]);

        $this->update([
            'cantidad_stock' => $this->cantidad_stock + $cantidad,
            'precio_inversion' => $esPrimerLote ? round($precioInversion, 2) : $this->precio_inversion,
            'precio_unitario' => round($precioVentaFinal, 2),
        ]);

        return $batch;
    }

    public function loteDisponibleActual(): ?ProductBatch
    {
        return $this->relationLoaded('batches')
            ? $this->batches->firstWhere('cantidad_disponible', '>', 0)
            : $this->batches()->disponibles()->first();
    }

    /**
     * @return array<int, array{batch_id:int,cantidad:int,costo:float,venta:float}>
     */
    public function consumirStockFifo(int $cantidad): array
    {
        if ($cantidad <= 0) {
            return [];
        }

        $batch = $this->batches()
            ->disponibles()
            ->ordenAntiguedad()
            ->lockForUpdate()
            ->first();

        if ($batch) {
            $disponible = (int) $batch->cantidad_disponible;

            if ($disponible < $cantidad) {
                throw new \Exception("Stock insuficiente para {$this->nombre}, disponible: {$disponible}");
            }

            $batch->decrement('cantidad_disponible', $cantidad);

            $this->decrement('cantidad_stock', $cantidad);

            return [[
                'batch_id' => $batch->id,
                'cantidad' => $cantidad,
                'costo' => (float) $batch->precio_inversion,
                'venta' => (float) ($batch->precio_venta ?: $this->precio_unitario),
            ]];
        }

        if ($this->cantidad_stock < $cantidad) {
            throw new \Exception("Stock insuficiente para {$this->nombre}, disponible: {$this->cantidad_stock}");
        }

        $this->decrement('cantidad_stock', $cantidad);

        return [[
            'batch_id' => null,
            'cantidad' => $cantidad,
            'costo' => (float) $this->precio_inversion,
            'venta' => (float) $this->precio_unitario,
        ]];
    }

    public function getCostoPromedioDisponibleAttribute(): float
    {
        $query = $this->batches()->disponibles();
        $totalCantidad = (int) (clone $query)->sum('cantidad_disponible');
        if ($totalCantidad <= 0) {
            return 0.0;
        }

        $totalCosto = (float) (clone $query)
            ->selectRaw('COALESCE(SUM(cantidad_disponible * precio_inversion), 0) as total')
            ->value('total');

        return round($totalCosto / $totalCantidad, 2);
    }

    public function getPrecioVentaDisponibleAttribute(): float
    {
        $batch = $this->loteDisponibleActual();

        return (float) ($batch?->precio_venta ?? $this->precio_unitario);
    }

    public function getStockPublicoDisponibleAttribute(): int
    {
        return (int) ($this->loteDisponibleActual()?->cantidad_disponible ?? $this->cantidad_stock);
    }

    // ── Accessors (columnas calculadas) ─────────────────

    // Ganancia por unidad
    public function getGananciaUnitariaAttribute(): float
    {
        return $this->precio_unitario - ($this->costo_promedio_disponible ?: (float) $this->precio_inversion);
    }

    // Precio final después de descuento
    public function getPrecioFinalAttribute(): float
    {
        return $this->precio_venta_disponible - $this->descuento;
    }

    // Valor total del stock en inversión
    public function getValorStockInversionAttribute(): float
    {
        return (float) $this->batches()
            ->disponibles()
            ->selectRaw('COALESCE(SUM(cantidad_disponible * precio_inversion), 0) as total')
            ->value('total');
    }

    // Valor total del stock en venta
    public function getValorStockVentaAttribute(): float
    {
        return $this->precio_unitario * $this->cantidad_stock;
    }

    public function getImagenPrincipalAttribute(): ?string
    {
        $image = $this->relationLoaded('productImages')
            ? $this->productImages->first()
            : $this->productImages()->first();

        return $image?->ruta ?: $this->imagen_ruta;
    }

    public function getPromedioCalificacionAttribute(): float
    {
        if ($this->relationLoaded('reviews')) {
            return round((float) $this->reviews->avg('rating'), 1);
        }

        return round((float) $this->reviews()->avg('rating'), 1);
    }

    public function getTotalResenasAttribute(): int
    {
        if ($this->relationLoaded('reviews')) {
            return $this->reviews->count();
        }

        return $this->reviews()->count();
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
