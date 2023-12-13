<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail_bill extends Model
{
    use HasFactory;
    protected $table = "details_bills";

    protected $fillable = [
        'id_bills',
        'id_booking',
        'id_service',
        'id'
    ];
}
