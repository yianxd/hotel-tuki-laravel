<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Booking extends Model
{
    use HasFactory;

    protected $table = "bookings";

    protected $primaryKey = 'id_booking';

    protected $fillabel =[
        'id_booking',
        'amount_rooms',
        'document',
        'amount_people',
        'date_start',
        'date_end',
        'price'
    ];


}
