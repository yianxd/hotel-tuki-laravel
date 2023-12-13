<?php

namespace App\Http\Controllers;

use App\Models\type_room;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class TypeRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $typeRooms = Type_Room::all();
        return view('type_room.index', compact('typeRooms'));
    }

    public function create()
    {
        return view('type_room.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
        ]);

        Type_Room::create($data);

        return redirect()->route('type_room.index')->with('success', 'Tipo de habitación creado exitosamente.');
    }

    public function show(Type_Room $typeRoom)
    {
        return view('type_room.show', compact('typeRoom'));
    }

    public function edit(Type_Room $typeRoom)
    {
        return view('type_room.edit', compact('typeRoom'));
    }

    public function update(Request $request, Type_Room $typeRoom)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
        ]);

        $typeRoom->update($data);

        return redirect()->route('type_room.index')->with('success', 'Tipo de habitación actualizado exitosamente.');
    }

    public function destroy(Type_Room $typeRoom)
    {
        $typeRoom->delete();

        return redirect()->route('type_room.index')->with('success', 'Tipo de habitación eliminado exitosamente.');
    }
}
