<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;
use App\Models\Room;


class RoomController extends Controller
{
    /**

    * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $texto = $request->input('texto');
        if (!$texto) {
            $rooms = Room::all();
        } else {
            $rooms = Room::where('id_number', 'like', "%$texto%")
                         ->orWhere('id_type', 'like', "%$texto%")
                         ->orWhere('capacity', 'like', "%$texto%")
                         ->orWhere('state', 'like', "%$texto%")
                         ->orWhere('price', 'like', "%$texto%")
                         ->get();
        }
        return  view('room.index',compact('rooms','texto'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('room.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_number' => 'required|numeric|min:100|max:999',
            'id_type' => 'required|string|min:1',
            'capacity' => 'required|string|min:1|max:100',
            'price' => 'required|numeric',
        ],
        [
            'id_number.min' => 'El número de identificación debe tener al menos 3 dígitos.',
            'id_number.max' => 'El número de identificación no puede tener más de 3 dígitos.',
            'id_number.unique' => 'Ya existe una habitación con este número.',
            'id_type.required' => 'Debe asociar el número de identificación con un tipo de habitación.',
            'capacity.min' => 'La capacidad debe tener al menos 1 caracter.',
            'capacity.max' => 'La capacidad no puede tener más de 5 caracteres.',
            'price.required' => 'El precio de la habitación es obligatorio.',
            'price.numeric' => 'El precio de la habitación debe ser un número.',
        ]);

        $rooms = new Room;
        $rooms->id_number = $request->input('id_number');
        $rooms->id_type = $request->input('id_type');
        $rooms->capacity = $request->input('capacity');
        $rooms->price = $request->input('price');
        $rooms->state = 'Disponible';
        $rooms->save();
        return redirect()->route('room.index');
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_number)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_number)
    {
        $rooms = Room::findOrFail($id_number);
        if(!$rooms) {
            dd("No se encontró ninguna habitación con el ID proporcionado.");
        }
        return view('room.edit', compact('rooms'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_number)
    {
        //
        $rooms = Room::findOrFail($id_number);
        $rooms->id_number = $request->input('id_number');
        $rooms->id_type = $request->input('id_type');
        $rooms->capacity = $request->input('capacity');
        $rooms->state = $request->input('state');
        $rooms->price = $request->input('price');
        $rooms->save();
        return redirect()->route('room.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_number)
    {
        $rooms = Room::findOrFail($id_number);
        $rooms->delete();
        return redirect()->route('room.index');
    }
}
