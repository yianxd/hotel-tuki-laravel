<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Room;

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
                    ->select('id_booking','id_number','document','amount_people','date_start','date_end','price')
                    ->where('document','LIKE','%'.$texto.'%')
                    ->orWhere('id_number','LIKE','%'.$texto.'%')
                    ->orderBy('id_booking','asc')
                    ->paginate(20);
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
        $room=DB::table('rooms')
        ->select('id_number','id_type','capacity','state')
        ->where('state','=',1)
        ->get();
        return view('booking.create',compact('room'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illumiwwnate\Http\Response
     */
    public function store(Request $request){
        //$fecha = Carbon::now()->format('Ymd');
        $request->validate([
            'amount_people'=>'required|numeric|min:1|max:5',
            'date_start'=>'required|date',
            'date_end'=>'required|date'
        ],
        [
            'amount_people.required'=>'Llene este campo porfa',
            'amount_people.max'=>'Maximo 5 personas por habitacion',
            'amount_people.min'=>'Minimo 1 personas por habitacion',
            'date_start.requiered'=>'Este campo es obligatorio',
            'date_start.requiered'=>'Este campo es obligatorio',
            'date_end.requiered'=>'Este campo es obligatorio',
        ]
    );

        $booking =new Booking;
        $booking->document=$request->input('document');
        $booking->id_number=$request->input('id_number');
        $booking->amount_people=$request->input('amount_people');
        $booking->date_start=$request->input('date_start');
        $booking->date_end=$request->input('date_end');
        $booking->price=$request->input('price');

        //if ($booking->date_start<$fecha){
            //xreturn redirect()->route('customer.create')->with('La fecha no puede menor a la actual');
        //}else{
            $booking->save();
            return redirect()->route('booking.index')->with('success','success');
        //}



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
        $rooms = Room::select('id_number', 'id_type', 'capacity', 'state','price')->get();
        return view('Booking.edit',compact('booking','rooms'));
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
            'amount_people'=>'required|numeric|min:1|max:5',
            'date_start'=>'required|date',
            'date_end'=>'required|date'
        ],
        [
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

        $booking->id_number=$request->input('id_number');
        $booking->amount_people=$request->input('amount_people');
        $booking->date_start=$request->input('date_start');
        $booking->date_end=$request->input('date_end');
        $booking->save();
        return redirect()->route('booking.index');
    }


    public function changeRoom($id_booking){

        $booking =  Booking::finOrFail($id_booking);
        $booking->id_number->input('room');
        $booking->save();

        return  redirect()->route('booking.edit');

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
