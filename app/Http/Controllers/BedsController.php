<?php
namespace App\Http\Controllers;

use App\Models\Beds;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BedsController extends Controller
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
            $beds = Beds::all();
        } else {
            $beds = Beds::where('id_number', 'like', "%$texto%")
                         ->orWhere('descripcion', 'like', "%$texto%")
                         ->get();
        }
        return view('beds.index',compact('beds','texto'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('beds.create');

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
            'descripcion' => 'required|string|max:250',
        ],
        [
            'id_number.min' => 'El número de identificación debe tener al menos 3 dígitos.',
            'id_number.max' => 'El número de identificación no puede tener más de 3 dígitos.',
            'descripcion.max' => 'No puede escribir más de 250 caracteres.',
        ]);

        $beds = new Beds;
        $beds->id_number = $request->input('id_number');
        $beds->descripcion = $request->input('descripcion');
        $beds->save();
        return redirect()->route('beds.index');
    }
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
        $beds = Beds::findOrFail($id_number);
        return view('beds.edit', compact('beds'));
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
        $beds = Beds::findOrFail($id_number);
        $beds->id_number = $request->input('id_number');
        $beds->descripcion = $request->input('descripcion');
        $beds->save();
        return redirect()->route('beds.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_number)
    {
        $beds = Beds::findOrFail($id_number);
        $beds->delete();
        return redirect()->route('beds.index');
    }
}
