<?php

namespace App\Http\Controllers;

use App\Models\room;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\type_room;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rooms = Room::all();
        $types = Type_Room::all();
        return view('room.index', compact('rooms','types'));

    }

    public function create()
    {
        return view('room.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'number' => 'required|integer',
            'id_type' => 'required|exists:type_rooms,id',
            'fee' => 'required|numeric',
            'capacity' => 'required|integer',
            'image' => 'required|string',
        ]);

        Room::create($data);

        return redirect()->route('room.index')->with('success', 'Habitación creada exitosamente.');
    }

    public function show(Room $room)
    {
        return view('room.show', compact('room'));
    }

    public function edit(Room $room)
    {
        return view('room.edit', compact('room'));
    }

    public function update(Request $request, Room $room)
    {
        $data = $request->validate([
            'number' => 'required|integer',
            'id_type' => 'required|exists:type_rooms,id',
            'fee' => 'required|numeric',
            'capacity' => 'required|integer',
            'image' => 'required|string',
        ]);

        $room->update($data);

        return redirect()->route('room.index')->with('success', 'Habitación actualizada exitosamente.');
    }

    public function destroy(Room $room)
    {
        $room->delete();

        return redirect()->route('room.index')->with('success', 'Habitación eliminada exitosamente.');
    }
}
