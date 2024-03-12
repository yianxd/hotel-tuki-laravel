<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Carbon;


class CustomerController extends Controller
{

    public function index(){
        $booking=DB::table('bookings')
                    ->select('id','id_number','document','amount_people','date_start','date_end','price')
                    ->get();
        return view('customer.index',compact('booking'));

    }

    public function store(Request $request){
        $request->validate([
            'amount_people'=>'required|numeric|min:1|max:5',
            'date_start'=>'required|date',
            'date_end'=>'required|date'
        ]
    );

        $booking =new Booking;
        $booking->document=$request->input('document');
        $booking->id_number=$request->input('id_number');
        $booking->amount_people=$request->input('amount_people');
        $booking->date_start=$request->input('date_start');
        $booking->date_end=$request->input('date_end');
        $booking->price=$request->input('price');
        $booking->save();


        return redirect()->route('customer.index')->with('succes','Reserva creada:3');
    }

    public function create(){

        $room=DB::table('rooms')
                ->select('id_number','id_type','capacity','state')
                ->where('state','=',1)
                ->get();

        return view('customer.create',compact('room'));
    }

    public function destroy($id_booking)
    {
        //

        $booking = Booking::findOrFail($id_booking);
        $booking->delete();
        return redirect()->route('customer.index');
    }
}
