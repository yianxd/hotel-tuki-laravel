<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bill;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;

class BillController extends Controller
{
    //

    public function index() {
        $bill=Bill::all();

        return view('bill.index',compact('bill'));
    }

    public function show($document){

        $bill=Bill::select('id_booking','id_booking','document','date')->where('document','='.$document)->get();
        $pdf = Pdf::loadView('bill.show', compact('bill'));
        return $pdf->stream();
    }
}
