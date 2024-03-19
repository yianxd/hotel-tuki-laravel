<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use  Carbon\Carbon;


class CustomerController extends Controller
{

/**
 * The index function retrieves booking information from the database and passes it to the customer
 * index view.
 *
 * @return The `index` function is returning a view called `customer.index` with the data from the
 * `bookings` table. The data being selected from the `bookings` table includes the columns
 * `id_booking`, `id_number`, `document`, `amount_people`, `date_start`, `date_end`, and `price`. This
 * data is passed to the view using the `compact` method with
 */
    public function index(){
        $booking=DB::table('bookings')
                    ->select('id_booking','id_number','document','amount_people','date_start','date_end','price')
                    ->get();
        return view('customer.index',compact('booking'));

    }

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
            return redirect()->route('customer.index')->with('success','success');
        //}



    }

/**
 * The `create` function retrieves available rooms from the database and passes them to the view for
 * customer booking.
 *
 * @return In the `create()` method, a view named 'customer.create' is being returned with the data
 * from the 'rooms' table where the 'state' column is equal to 1. The data selected from the 'rooms'
 * table includes the columns 'id_number', 'id_type', 'capacity', and 'state'.
 */
    public function create(){

        $room=DB::table('rooms')
                ->select('id_number','id_type','capacity','state')
                ->where('state','=',1)
                ->get();

        return view('customer.create',compact('room'));
    }

    public function show($id_booking){

    }



/**
 * The function `destroy` deletes a booking record by its ID and redirects to the customer index page.
 *
 * @param id_booking The `id_booking` parameter in the `destroy` function is typically the unique
 * identifier of the booking that needs to be deleted. It is used to find the specific booking record
 * in the database and then delete it.
 *
 * @return The `destroy` function is returning a redirect response to the `customer.index` route after
 * deleting the booking with the given ``.
 */
    public function destroy($id_booking){
        $booking = Booking::findOnFail($id_booking);
        $booking->delete();
        return redirect()->route('customer.index');
    }
}
