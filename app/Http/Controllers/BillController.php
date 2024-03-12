<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bill;
use Barryvdh\DomPDF\Facade\Pdf;

class BillController extends Controller
{
    //

    public function index() {
        $bill=Bill::all();

        return view('bill.index',compact('bill'));
    }

    public function pdf() {

        $bill=Bill::all();
        $pdf = Pdf::loadView('bill.pdf', compact('bill'));
        return $pdf->stream();
    }
}
