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

    public function show($id_bill){

        $bills = Bill::all();
        $bill = $bills->find($id_bill);
        $pdf = Pdf::loadView('bill.show',$bill);
        return $pdf->stream();
    }
}
