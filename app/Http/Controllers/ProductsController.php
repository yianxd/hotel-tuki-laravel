<?php

namespace App\Http\Controllers;

use App\Models\products;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Products::all();
        return view('products.index', compact('products'));
    }

    public function show($id)
    {
        $product = Products::findOrFail($id);
        return view('products.show', compact('product'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        // Lógica para almacenar un nuevo producto
        $data = $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|integer',
        ]);

        Products::create($data);

        return redirect()->route('products.index')->with('success', 'Producto creado correctamente');
    }

    public function edit($id)
    {
        $product = Products::findOrFail($id);
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        // Lógica para actualizar un producto existente
        $product = Products::findOrFail($id);

        $data = $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|numeric',
        ]);

        $product->update($data);

        return redirect()->route('products.index')->with('success', 'Producto actualizado correctamente');
    }

    public function destroy($id)
    {
        $product = Products::findOrFail($id);
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Producto eliminado correctamente');
    }
}
