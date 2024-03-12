<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductsController extends Controller
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
            $products = Products::all();
        } else {
            $products = Products::where('id_producto', 'like', "%$texto%")
                         ->orWhere('nombre_producto', 'like', "%$texto%")
                         ->orWhere('description', 'like', "%$texto%")
                         ->orWhere('cantidad', 'like', "%$texto%")
                         ->orWhere('price', 'like', "%$texto%")
                         ->get();
        }
        return view('products.index',compact('products','texto'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
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
            'id_producto' => 'required|numeric|min:100|max:999',
            'nombre_producto' => 'required|string|min:1',
            'description' => 'required|string|min:1',
            'cantidad' => 'required|numeric',
            'price' => 'required|numeric',
        ],
        [
            'id_producto.min' => 'El ID de producto debe tener al menos 3 dígitos.',
            'id_producto.max' => 'El ID de producto no puede tener más de 3 dígitos.',
            'nombre_producto.required' => 'El nombre del producto es obligatorio.',
            'description.required' => 'La descripción del producto es obligatoria.',
            'cantidad.required' => 'La cantidad del producto es obligatoria.',
            'cantidad.numeric' => 'La cantidad del producto debe ser un número.',
            'price.required' => 'El precio del producto es obligatorio.',
            'price.numeric' => 'El precio del producto debe ser un número.',
        ]);

        $product = new Products;
        $product->id_producto = $request->input('id_producto');
        $product->nombre_producto = $request->input('nombre_producto');
        $product->description = $request->input('description');
        $product->cantidad = $request->input('cantidad');
        $product->price = $request->input('price');
        $product->save();
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id_producto
     * @return \Illuminate\Http\Response
     */
    public function show($id_producto)
    {
        $product = Products::findOrFail($id_producto);
        if(!$product) {
            dd("No se encontró ningún producto con el ID proporcionado.");
        }
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id_producto
     * @return \Illuminate\Http\Response
     */
    public function edit($id_producto)
    {
        $product = Products::findOrFail($id_producto);
        if(!$product) {
            dd("No se encontró ningún producto con el ID proporcionado.");
        }
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id_producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_producto)
    {
        $product = Products::findOrFail($id_producto);
        $product->id_producto = $request->input('id_producto');
        $product->nombre_producto = $request->input('nombre_producto');
        $product->description = $request->input('description');
        $product->cantidad = $request->input('cantidad');
        $product->price = $request->input('price');
        $product->save();
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id_producto
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_producto)
    {
        $product = Products::findOrFail($id_producto);
        $product->delete();
        return redirect()->route('products.index');
    }
}
