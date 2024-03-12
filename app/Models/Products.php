<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $table = "products";

    protected $primaryKey = 'id_producto';

    protected $fillable = [
        'id_producto',
        'nombre_producto',
        'description',
        'cantidad',
        'price',
    ];
}
