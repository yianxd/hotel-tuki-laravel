<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;
    protected $fillable = ['id_cliente', 'fecha_factura', 'porcent_impuesto', 'descuento', 'total', 'id_reserva'];

    // Relación con clientes
    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'id_cliente');
    }

    // Relación con reservas
    public function reserva()
    {
        return $this->belongsTo(Reserva::class, 'id_reserva');
    }

}
