<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ShipmentTracking extends Model
{
    use HasFactory;

    protected $table = 'shipment_tracking';

    protected $fillable = [
        'order_id',
        'agencia',
        'fecha_envio',
        'fecha_limite_retiro',
        'cliente_retiro',
        'fecha_retiro_real',
        'admin_cobro',
        'fecha_cobro',
        'notas_envio',
    ];

    protected function casts(): array
    {
        return [
            'fecha_envio' => 'date',
            'fecha_limite_retiro' => 'date',
            'cliente_retiro' => 'boolean',
            'fecha_retiro_real' => 'date',
            'admin_cobro' => 'boolean',
            'fecha_cobro' => 'date',
        ];
    }

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    public function isLockedForUpdates(): bool
    {
        if (in_array($this->order?->estado, ['entregado', 'cancelado'], true)) {
            return true;
        }

        return $this->cliente_retiro && $this->admin_cobro;
    }

    public function getEstadoBadgeAttribute(): array
    {
        if ($this->admin_cobro) {
            return ['label' => 'Cobrado', 'class' => 'bg-purple-100 text-purple-700'];
        }

        if ($this->cliente_retiro) {
            return ['label' => 'Retirado', 'class' => 'bg-green-100 text-green-700'];
        }

        if ($this->fecha_limite_retiro && $this->fecha_limite_retiro->lt(now()->startOfDay())) {
            return ['label' => 'Vencido', 'class' => 'bg-red-100 text-red-700'];
        }

        return ['label' => 'En tránsito', 'class' => 'bg-blue-100 text-blue-700'];
    }

    public static function calcularFechaLimiteRetiro(Carbon|string $fechaEnvio): Carbon
    {
        $fecha = $fechaEnvio instanceof Carbon ? $fechaEnvio->copy() : Carbon::parse($fechaEnvio);
        $limite = $fecha->copy();
        $diasHabiles = 0;

        while ($diasHabiles < 3) {
            $limite->addDay();

            if ($limite->isWeekend()) {
                continue;
            }

            $diasHabiles++;
        }

        return $limite->startOfDay();
    }
}
