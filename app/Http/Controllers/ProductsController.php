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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Obtener el texto de búsqueda del parámetro de la solicitud
        $texto = $request->input('texto');

        // Si no se proporciona ningún texto de búsqueda, obtener todos los productos
        if (!$texto) {
            $products = Products::all();
        } else {
            // Si se proporciona texto de búsqueda, filtrar los productos por varios campos
            $products = Products::where('id_producto', 'like', "%$texto%")
                         ->orWhere('nombre_producto', 'like', "%$texto%")
                         ->orWhere('description', 'like', "%$texto%")
                         ->orWhere('cantidad', 'like', "%$texto%")
                         ->orWhere('price', 'like', "%$texto%")
                         ->get();
        }

        // Devolver la vista 'index' con los productos y el texto de búsqueda
        return view('products.index', compact('products', 'texto'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Devolver la vista para crear un nuevo producto
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
        // Validar los datos de la solicitud para almacenar un nuevo producto
        $request->validate([
            'id_producto' => 'required|numeric|min:100|max:999',
            'nombre_producto' => 'required|string|min:1',
            'description' => 'required|string|min:1',
            'cantidad' => 'required|numeric',
            'price' => 'required|numeric',
        ],
        [
            'id_producto.min' => 'El ID de producto debe tener al menos 1 dígito.',
            'id_producto.max' => 'El ID de producto no puede tener más de 3 dígitos.',
            'nombre_producto.required' => 'El nombre del producto es obligatorio.',
            'description.required' => 'La descripción del producto es obligatoria.',
            'cantidad.required' => 'La cantidad del producto es obligatoria.',
            'cantidad.numeric' => 'La cantidad del producto debe ser un número.',
            'price.required' => 'El precio del producto es obligatorio.',
            'price.numeric' => 'El precio del producto debe ser un número.',
        ]);

        // Crear una nueva instancia del producto y guardarlo en la base de datos
        $product = new Products;
        $product->id_producto = $request->input('id_producto');
        $product->nombre_producto = $request->input('nombre_producto');
        $product->description = $request->input('description');
        $product->cantidad = $request->input('cantidad');
        $product->price = $request->input('price');
        $product->save();

        // Redirigir a la página de índice de productos
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
        // Buscar el producto con el ID proporcionado
        $product = Products::findOrFail($id_producto);

        // Si no se encuentra el producto, mostrar un mensaje de error
        if (!$product) {
            dd("No se encontró ningún producto con el ID proporcionado.");
        }

        // Devolver la vista 'show' con el producto encontrado
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
        // Buscar el producto con el ID proporcionado para editarlo
        $product = Products::findOrFail($id_producto);

        // Si no se encuentra el producto, mostrar un mensaje de error
        if (!$product) {
            dd("No se encontró ningún producto con el ID proporcionado.");
        }

        // Devolver la vista 'edit' con el producto encontrado
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
        // Buscar el producto con el ID proporcionado para actualizarlo
        $product = Products::findOrFail($id_producto);

        // Actualizar los datos del producto con los datos de la solicitud
        $product->id_producto = $request->input('id_producto');
        $product->nombre_producto = $request->input('nombre_producto');
        $product->description = $request->input('description');
        $product->cantidad = $request->input('cantidad');
        $product->price = $request->input('price');
        $product->save();

        // Redirigir a la página de índice de productos
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
        // Buscar el producto con el ID proporcionado para eliminarlo
        $product = Products::findOrFail($id_producto);
        $product->delete();

        // Redirigir a la página de índice de productos
        return redirect()->route('products.index');
    }
}
