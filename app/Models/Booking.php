<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use app\Models\User;


class Booking extends Model
{
    use HasFactory;

    protected $table = "booking";

    protected $primaryKey = 'id_booking';

    protected $fillabel =[
        'amount_rooms',
        'document',
        'amount_people',
        'date_start',
        'date_end',
        'price'
    ];

    // public function document()
    // {
    //     return $this->belongsTo(User::class, 'document');
    // }

}
