<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $table = "rooms";

    protected $primaryKey = 'id_number';

    protected $fillable = [
        'id_number',
        'id_type',
        'capacity',
        'salary',
    ];
}
