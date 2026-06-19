<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\DB;

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
        'cargo_envio',
        'estado',
        'notas',
    ];

    protected function casts(): array
    {
        return [
            'fecha'             => 'date',
            'hora_recordatorio' => 'datetime:H:i',
            'precio_total'      => 'decimal:2',
            'cargo_envio'       => 'decimal:2',
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

    public function shipmentTracking(): HasOne
    {
        return $this->hasOne(ShipmentTracking::class);
    }

    protected static function booted(): void
    {
        static::updated(function (Order $order) {
            if ($order->wasChanged('estado')) {
                $order->syncShipmentTrackingForEstado();
            }
        });
    }

    public function syncShipmentTrackingForEstado(): void
    {
        DB::transaction(function () {
            if ($this->estado === 'en_ruta') {
                $this->shipmentTracking()->updateOrCreate(
                    ['order_id' => $this->id],
                    [
                        'agencia' => $this->lugar_despacho ?: 'Sin agencia',
                        'fecha_envio' => now()->toDateString(),
                        'fecha_limite_retiro' => ShipmentTracking::calcularFechaLimiteRetiro(now()),
                        'cliente_retiro' => false,
                        'fecha_retiro_real' => null,
                        'admin_cobro' => false,
                        'fecha_cobro' => null,
                    ]
                );

                return;
            }

            if ($this->estado === 'entregado' && $this->shipmentTracking) {
                $this->shipmentTracking->update([
                    'cliente_retiro' => true,
                    'fecha_retiro_real' => $this->shipmentTracking->fecha_retiro_real ?? now()->toDateString(),
                ]);
            }
        });
    }

    // ── Accessors ───────────────────────────────────────

    // Ganancia total del pedido
    public function getGananciaTotalAttribute(): float
    {
        return $this->orderItems->sum(function ($item) {
            $costo = $item->precio_inversion_aplicado ?? $item->product?->precio_inversion ?? 0;

            return ($item->precio_unitario - $costo - $item->descuento_aplicado)
                   * $item->cantidad;
        });
    }

    // Cantidad total de productos en el pedido
    public function getCantidadTotalAttribute(): int
    {
        return $this->orderItems->sum('cantidad');
    }

    public function getTotalConEnvioAttribute(): float
    {
        return (float) $this->precio_total + (float) $this->cargo_envio;
    }

    public function clienteTelefonoNormalizado(): ?string
    {
        $telefono = preg_replace('/\D+/', '', (string) ($this->user?->numero_contacto ?? ''));

        return $telefono !== '' ? $telefono : null;
    }

    public function puedeEnviarRecordatorioWhatsapp(): bool
    {
        return (bool) $this->clienteTelefonoNormalizado()
            && ($this->estado === 'en_ruta' || $this->fecha?->isToday());
    }

    public function whatsappRecordatorioMensaje(): string
    {
        $cliente = $this->user?->name ?: 'cliente';
        $hora = $this->hora_recordatorio?->format('H:i');
        $fecha = $this->fecha?->format('d/m/Y');
        $items = $this->orderItems->map(function ($item) {
            return '- ' . ($item->product?->nombre ?? 'Producto') . ' x ' . $item->cantidad;
        })->implode("\n");

        if ($this->estado === 'en_ruta') {
            $mensaje = "Hola, buenos días {$cliente}. Le recordamos que su pedido #{$this->id} ya fue enviado";
        } else {
            $accion = $this->envio_o_entrega === 'Entrega'
                ? 'proceder con la entrega'
                : 'pasar a retirar su paquetito';

            $mensaje = "Hola, buenos días {$cliente}. Le recordamos que el día de hoy puede {$accion}";
        }

        if ($hora) {
            $mensaje .= " a partir de las {$hora}";
        }

        $mensaje .= " sobre su pedido #{$this->id}.";

        if ($fecha) {
            $mensaje .= "\nFecha del pedido: {$fecha}.";
        }

        if ($items !== '') {
            $mensaje .= "\nDetalles del pedido:\n{$items}";
        }

        $mensaje .= "\nSubtotal: $" . number_format((float) $this->precio_total, 2);
        $mensaje .= "\nEnvío: $" . number_format((float) $this->cargo_envio, 2);
        $mensaje .= "\nTotal final: $" . number_format((float) $this->total_con_envio, 2);

        if ($this->lugar_despacho) {
            $mensaje .= "\nLugar de despacho: {$this->lugar_despacho}";
        }

        if ($this->lugar_de_recibir) {
            $mensaje .= "\nLugar de recibir: {$this->lugar_de_recibir}";
        }

        return $mensaje;
    }

    public function whatsappRecordatorioUrl(): ?string
    {
        $telefono = $this->clienteTelefonoNormalizado();

        if (! $telefono || ! $this->puedeEnviarRecordatorioWhatsapp()) {
            return null;
        }

        return 'https://wa.me/' . $telefono . '?text=' . urlencode($this->whatsappRecordatorioMensaje());
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
