<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InventoryController extends Controller
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

        // Si no se proporciona ningún texto de búsqueda, obtener todo el inventario
        if (!$texto) {
            $inventory = Inventory::all();
        } else {
            // Si se proporciona texto de búsqueda, filtrar el inventario por varios campos
            $inventory = Inventory::where('id_inventario', 'like', "%$texto%")
                         ->orWhere('id_producto', 'like', "%$texto%")
                         ->orWhere('id_number', 'like', "%$texto%")
                         ->orWhere('stock', 'like', "%$texto%")
                         ->orWhere('responsable', 'like', "%$texto%")
                         ->orWhere('nota', 'like', "%$texto%")
                         ->get();
        }

        // Devolver la vista 'index' con el inventario y el texto de búsqueda
        return view('inventory.index', compact('inventory', 'texto'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Devolver la vista para crear un nuevo elemento de inventario
        return view('inventory.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validar los datos de la solicitud para almacenar un nuevo elemento de inventario
        $request->validate([
            'id_inventario' => 'required|numeric|min:100',
            'id_producto' => 'required|string|min:1',
            'id_number' => 'required|numeric|min:101|max:609',
            'stock' => 'required|numeric',
            'responsable' => 'required|string|min:1',
            'nota' => 'nullable|string|max:255',
        ],
        [
            'id_inventario.min' => 'El ID de inventario debe tener al menos 3 dígitos.',
            'id_producto.required' => 'El ID del producto es obligatorio.',
            'id_number.min' => 'El número de habitación debe ser mayor o igual a 101.',
            'id_number.max' => 'El número de habitación debe ser menor o igual a 609.',
            'stock.required' => 'El stock es obligatorio.',
            'stock.numeric' => 'El stock debe ser un número.',
            'responsable.required' => 'El responsable es obligatorio.',
        ]);

        // Crear una nueva instancia del elemento de inventario y guardarlo en la base de datos
        $inventory = new Inventory;
        $inventory->id_inventario = $request->input('id_inventario');
        $inventory->id_producto = $request->input('id_producto');
        $inventory->id_number = $request->input('id_number');
        $inventory->stock = $request->input('stock');
        $inventory->responsable = $request->input('responsable');
        $inventory->nota = $request->input('nota');
        $inventory->save();

        // Redirigir a la página de índice de inventario
        return redirect()->route('inventory.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id_inventario
     * @return \Illuminate\Http\Response
     */
    public function show($id_inventario)
    {
        // Buscar el elemento de inventario con el ID proporcionado
        $inventory = Inventory::findOrFail($id_inventario);

        // Si no se encuentra el elemento de inventario, mostrar un mensaje de error
        if (!$inventory) {
            dd("No se encontró ningún inventario con el ID proporcionado.");
        }

        // Devolver la vista 'show' con el elemento de inventario encontrado
        return view('inventory.show', compact('inventory'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id_inventario
     * @return \Illuminate\Http\Response
     */
    public function edit($id_inventario)
    {
        // Buscar el elemento de inventario con el ID proporcionado para editarlo
        $inventory = Inventory::findOrFail($id_inventario);

        // Si no se encuentra el elemento de inventario, mostrar un mensaje de error
        if (!$inventory) {
            dd("No se encontró ningún inventario con el ID proporcionado.");
        }

        // Devolver la vista 'edit' con el elemento de inventario encontrado
        return view('inventory.edit', compact('inventory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id_inventario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_inventario)
    {
        // Buscar el elemento de inventario con el ID proporcionado para actualizarlo
        $inventory = Inventory::findOrFail($id_inventario);

        // Actualizar los datos del elemento de inventario con los datos de la solicitud
        $inventory->id_inventario = $request->input('id_inventario');
        $inventory->id_producto = $request->input('id_producto');
        $inventory->id_number = $request->input('id_number');
        $inventory->stock = $request->input('stock');
        $inventory->responsable = $request->input('responsable');
        $inventory->nota = $request->input('nota');
        $inventory->save();

        // Redirigir a la página de índice de inventario
        return redirect()->route('inventory.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id_inventario
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_inventario)
    {
        // Buscar el elemento de inventario con el ID proporcionado para eliminarlo
        $inventory = Inventory::findOrFail($id_inventario);

        // Eliminar el elemento de inventario de la base de datos
        $inventory->delete();

        // Redirigir a la página de índice de inventario
        return redirect()->route('inventory.index');
    }
}
