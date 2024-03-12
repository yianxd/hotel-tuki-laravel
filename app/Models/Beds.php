<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beds extends Model
{
    use HasFactory;

    protected $table = "beds";

    protected $fillable = [
        'id_number',
        'descripcion',
    ];
}
