<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RegisterUsersController extends Controller
{
    /**
     * Muestra una lista de usuarios filtrada por un texto de búsqueda.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Obtener el texto de búsqueda y limpiar espacios en blanco
        $texto = trim($request->get('texto'));

        // Realizar consulta a la base de datos para obtener usuarios filtrados
        $user = DB::table('users')
                        ->select('typeDoc', 'document', 'name', 'last_name', 'phone', 'email', 'id_rol')
                        ->where('last_name', 'LIKE', '%' . $texto . '%')
                        ->orWhere('name', 'LIKE', '%' . $texto . '%')
                        ->orWhere('typeDoc', 'LIKE', '%' . $texto)
                        ->orWhere('document', 'LIKE', '%' . $texto . '%')
                        ->orderBy('document', 'asc')
                        ->paginate(10);

        // Retornar la vista 'User.index' con los usuarios y el texto de búsqueda
        return view('User.index', compact('user', 'texto'));
    }

    /**
     * Muestra el formulario para crear un nuevo usuario.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Retornar la vista 'Admin.RegisterUsers' para crear un nuevo usuario
        return view('Admin.RegisterUsers');
    }

    /**
     * Almacena un nuevo usuario en la base de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Crear un nuevo objeto User y asignar los valores del formulario
        $user = new User;
        $user->typeDoc = $request->input('typeDoc');
        $user->document = $request->input('document');
        $user->id_rol = $request->input('type_user');
        $user->name = $request->input('name');
        $user->last_name = $request->input('last_name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        // Hashear la contraseña antes de almacenarla en la base de datos
        $user->password = Hash::make($request->password);
        // Guardar el nuevo usuario en la base de datos
        $user->save();

        // Redirigir a una vista específica después de almacenar el usuario
        return view('');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($document)
    {
        //
        $user=User::findOrFail($document);
        return view('user.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$document)
    {
        //
        $request->validate([
            'name' =>'required|string|min:1|max:25',
            'last_name'=>'required|string|min:5|max:50',
            'email'=>'required|email|min:10|max:75',
            'phone'=>'required|numeric|min:10|max:10',
            'password'=>'required|min:7|max:100|',
            'password_confirm'=>'required|same:password'
        ],[

            'name.string'=>'No introduzca numeros',
            'name.required'=>'Obligatorio',
            'name.min'=>'Escriba minimo 2 caracter',
            'name.max'=>'Supera el limite de caracteres',
            'last_name.string'=>'No introduzca numeros',
            'last_name.required'=>'Obligatorio',
            'last_name.min'=>'Escriba minimo 2 caracter',
            'last_name.max'=>'Supera el limite de caracteres',
            'email.email'=>'No es valido como correo',
            'email.required'=>'Obligatorio',
            'email.min'=>'Escriba minimo 2 caracter',
            'email.max'=>'Supera el limite de caracteres',
            'phone.numeric'=>'No introduzca letras',
            'phone.required'=>'Obligatorio',
            'phone.min'=>'Escriba minimo 2 caracter',
            'phone.max'=>'Supera el limite de caracteres',
            'password.required'=>'Obligatorio',
            'password.min'=>'Escriba minimo 2 caracter',
            'password.max'=>'Supera el limite de caracteres',
        ]);

        $user=User::findOrFail($document);
        $user->typeDoc=$request->input('typeDoc');
        $user->document=$request->input('document');
        $user->id_rol=$request->input('type_user');
        $user->name=$request->input('name');
        $user->last_name=$request->input('last_name');
        $user->email=$request->input('email');
        $user->phone=$request->input('phone');
        $user->password=$request->input('password');
        $user->save();

        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($document)
    {
        //

        $user=User::findOrFail($document);
        $user->delete();
        return redirect()->route('user.index');
    }
}
