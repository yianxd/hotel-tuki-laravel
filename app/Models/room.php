<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Room extends Controller
{
    //
    protected $table = "rooms";

    protected $primaryKey = 'id_number';

    protected $fillable = [
        'id_number',
        'id_type',
        'capacity',
        'state',
    ];
}
