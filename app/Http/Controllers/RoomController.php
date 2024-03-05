<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;
use App\Models\room;


class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $texto=trim($request->get('texto'));
        $rooms=DB::table('rooms')
                         ->select('id_number','id_type','capacity')
                         ->where('id_number','LIKE','%'.$texto.'%')
                         ->orWhere('id_type','LIKE','%'.$texto.'%')
                         ->orWhere('capacity','Like','%'.$texto.'%')
                         ->paginate(10);
        return  view('Room.index',compact('room','texto'));
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
        $rooms = new User;
        $rooms->id_number = $request->input('id_number');
        $rooms->id_type = $request->input('id_type');
        $rooms->capacity = $request->input('capacity');
        $rooms->save();
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
        //
        $rooms=room::finOrFail($id_number);
        return view('room.edit',compact('room'));

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
        $customer = User::findOrFail($id);
        $rooms->id_number = $request->input('id_number');
        $rooms->id_type = $request->input('id_type');
        $rooms->capacity = $request->input('capacity');
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
        //
        $rooms=Customer::findOrFail($id_number);
        $rooms->delete();
        return redirect()->route('room.index');
    }
}
