<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;

    protected $table = "inventory";

    protected $primaryKey = 'id_inventario';

    protected $fillable = [
        'id_inventario',
        'id_producto',
        'id_number',
        'stock',
        'responsable',
        'nota',
    ];
}
