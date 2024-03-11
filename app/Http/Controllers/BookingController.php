<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $texto=trim($request->get('texto'));
        $booking=DB::table('bookings')
                    ->select('id_booking','amount_rooms','document','amount_people','date_start','date_end','price')
                    ->where('id_booking','LIKE','%'.$texto.'%')
                    ->orWhere('amount_rooms','LIKE','%'.$texto.'%')
                    ->orWhere('document','LIKE'.'%'.$texto.'%')
                    ->orderBy('id_booking','asc')
                    ->paginate(10);
        return view('booking.index',compact('booking','texto'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Booking.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'amount_rooms'=>'required|numeric|min:1|max:5',
            'document'=>'requiere|numeric|min:5|max:99999999999',
            'amount_people'=>'requiered|numeric|min:1|max:5',
            'date_start'=>'required|date',
            'date_end'=>'required|date'
        ],
        [
            'amount_rooms.required'=>'Campo Obligatorio',
            'amount_rooms.numeric'=>'Unicamente numeros',
            'amount_rooms.min'=>'Minimo una habitacion',
            'amount_rooms.max'=>'Maximo 5 habitaciones',
            'amount_people.required'=>'Campo Obligatorio',
            'amount_people.numeric'=>'Unicamente numeros',
            'amount_people.min'=>'Minimo una persona',
            'amount_people.max'=>'Maximo 5 personas',
            'document.required'=>'Campo Obligatorio',
            'document.numeric'=>'Unicamente numeros',
            'document.min'=>'Escriba minimo 5 caraceteres',
            'document.max'=>'Supera el maximo de caracteres',
            'date_start.required'=>'Campo obligatorio',
            'date_start.date'=>'debe ser una fecha',
            'date_end.required'=>'Campo obligatorio',
            'date_end.date'=>'debe ser una fecha'


        ]
    );

        $booking =new Booking;
        $booking->document=$request->input('document');
        $booking->amount_rooms=$request->input('amount_rooms');
        $booking->amount_people=$request->input('amount_people');
        $booking->date_start=$request->input('date_start');
        $booking->date_end=$request->input('date_end');
        $booking->save();
        return redirect()->route('booking.index')->with('succes','Reserva creada:3');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show(Booking $booking)
    {
        //
        return view('booking.show',compact('booking'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function edit($id_booking)
    {
        //
        $booking=Booking::findOrFail($id_booking);
        return view('service.edit',compact('booking'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_booking)
    {
        //

        $request->validate([
            'amount_rooms'=>'required|numeric|min:1|max:5',
            'amount_people'=>'requiered|numeric|min:1|max:5',
            'date_start'=>'required|date',
            'date_end'=>'required|date'
        ],
        [
            'amount_rooms.required'=>'Campo Obligatorio',
            'amount_rooms.numeric'=>'Unicamente numeros',
            'amount_rooms.min'=>'Minimo una habitacion',
            'amount_rooms.max'=>'Maximo 5 habitaciones',
            'amount_people.required'=>'Campo Obligatorio',
            'amount_people.numeric'=>'Unicamente numeros',
            'amount_people.min'=>'Minimo una persona',
            'amount_people.max'=>'Maximo 5 personas',
            'date_start.required'=>'Campo obligatorio',
            'date_start.date'=>'debe ser una fecha',
            'date_end.required'=>'Campo obligatorio',
            'date_end.date'=>'debe ser una fecha'


        ]
    );

        $booking =Booking::findOrFail($id_booking);
        $booking->amount_rooms=$request->input('amount_rooms');
        $booking->amount_people=$request->input('amount_people');
        $booking->date_start=$request->input('date_start');
        $booking->date_end=$request->input('date_end');
        $booking->save();
        return redirect()->route('booking.index')->with('succes','Reserva creada:#');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_booking)
    {
        //

        $booking = Booking::findOrFail($id_booking);
        $booking->delete();
        return redirect()->route('booking.index');
    }
}
