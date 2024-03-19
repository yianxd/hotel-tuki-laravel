<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Room;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Obtener el texto de búsqueda del parámetro de la solicitud
        $texto = $request->input('texto');

        // Si no se proporciona ningún texto de búsqueda, obtener todas las habitaciones
        if (!$texto) {
            $rooms = Room::all();
        } else {
            // Si se proporciona texto de búsqueda, filtrar las habitaciones por varios campos
            $rooms = Room::where('id_number', 'like', "%$texto%")
                         ->orWhere('id_type', 'like', "%$texto%")
                         ->orWhere('capacity', 'like', "%$texto%")
                         ->orWhere('state', 'like', "%$texto%")
                         ->orWhere('price', 'like', "%$texto%")
                         ->get();
        }

        // Devolver la vista 'index' con las habitaciones y el texto de búsqueda
        return view('room.index', compact('rooms', 'texto'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Devolver la vista para crear una nueva habitación
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
        // Validar los datos de la solicitud para almacenar una nueva habitación
        $request->validate([
            'id_number' => ['required', 'numeric', 'min:100', 'max:999', Rule::unique('rooms', 'id_number')],
            'id_type' => 'required|string|min:1',
            'capacity' => 'required|numeric|min:1|max:100',
        ]);

        // Crear una nueva instancia de la habitación y guardarla en la base de datos
        $rooms = new Room;
        $rooms->id_number = $request->input('id_number');
        $rooms->id_type = $request->input('id_type');
        $rooms->capacity = $request->input('capacity');
        $rooms->state = 1;
        $rooms->price = $request->input('price');
        $rooms->save();

        // Redirigir a la página de índice de habitaciones
        return redirect()->route('room.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id_number
     * @return \Illuminate\Http\Response
     */
    public function show($id_number)
    {
        // No se implementa la funcionalidad de mostrar una habitación específica
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id_number
     * @return \Illuminate\Http\Response
     */
    public function edit($id_number)
    {
        // Buscar la habitación con el ID proporcionado para editarla
        $rooms = Room::findOrFail($id_number);

        // Si no se encuentra la habitación, mostrar un mensaje de error
        if (!$rooms) {
            dd("No se encontró ninguna habitación con el ID proporcionado.");
        }

        // Devolver la vista 'edit' con la habitación encontrada
        return view('room.edit', compact('rooms'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id_number
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_number)
    {
        // Buscar la habitación con el ID proporcionado para actualizarla
        $rooms = Room::findOrFail($id_number);
        $rooms->id_number = $request->input('id_number');
        $rooms->id_type = $request->input('id_type');
        $rooms->capacity = $request->input('capacity');
        $rooms->state = $request->input('state');
        $rooms->save();

        // Redirigir a la página de índice de habitaciones
        return redirect()->route('room.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id_number
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_number)
    {
        // Buscar la habitación con el ID proporcionado para eliminarla
        $rooms = Room::findOrFail($id_number);
        $rooms->delete();

        // Redirigir a la página de índice de habitaciones
        return redirect()->route('room.index');
    }
}
