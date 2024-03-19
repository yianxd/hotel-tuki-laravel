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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Obtener el texto de búsqueda del parámetro de la solicitud
        $texto = $request->input('texto');

        // Si no se proporciona ningún texto de búsqueda, obtener todas las camas
        if (!$texto) {
            $beds = Beds::all();
        } else {
            // Si se proporciona texto de búsqueda, filtrar las camas por ID o descripción
            $beds = Beds::where('id_number', 'like', "%$texto%")
                         ->orWhere('descripcion', 'like', "%$texto%")
                         ->get();
        }

        // Devolver la vista 'index' con las camas y el texto de búsqueda
        return view('beds.index', compact('beds', 'texto'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Devolver la vista para crear una nueva cama
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
        // Validar los datos de la solicitud para crear una nueva cama
        $request->validate([
            'id_number' => 'required|numeric|min:100|max:999',
            'descripcion' => 'required|string|max:250',
        ],
        [
            'id_number.min' => 'El número de identificación debe tener al menos 3 dígitos.',
            'id_number.max' => 'El número de identificación no puede tener más de 3 dígitos.',
            'descripcion.max' => 'No puede escribir más de 250 caracteres.',
        ]);

        // Crear una nueva instancia de la cama y guardarla en la base de datos
        $beds = new Beds;
        $beds->id_number = $request->input('id_number');
        $beds->descripcion = $request->input('descripcion');
        $beds->save();

        // Redirigir a la página de índice de camas
        return redirect()->route('beds.index');
    }
    public function show($id_number)
    {
        //

    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id_number
     * @return \Illuminate\Http\Response
     */
    public function edit($id_number)
    {
        // Encontrar la cama con el ID proporcionado para editar
        $beds = Beds::findOrFail($id_number);

        // Devolver la vista para editar la cama
        return view('beds.edit', compact('beds'));
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
        // Encontrar la cama con el ID proporcionado para actualizar
        $beds = Beds::findOrFail($id_number);

        // Actualizar los datos de la cama con los datos de la solicitud
        $beds->id_number = $request->input('id_number');
        $beds->descripcion = $request->input('descripcion');
        $beds->save();

        // Redirigir a la página de índice de camas
        return redirect()->route('beds.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id_number
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_number)
    {
        // Encontrar la cama con el ID proporcionado para eliminar
        $beds = Beds::findOrFail($id_number);

        // Eliminar la cama de la base de datos
        $beds->delete();

        // Redirigir a la página de índice de camas
        return redirect()->route('beds.index');
    }
}
