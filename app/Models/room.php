<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class room extends Model
{
    use HasFactory;

    protected $fillable = ['number', 'id_type', 'fee', 'capacity', 'image'];

    public function typeRoom()
    {
        return $this->belongsTo(TypeRoom::class, 'id_type');
    }
}
