<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RegisterAdminController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        //
        $texto=trim($request->get('texto'));
        $user=DB::table('users')
                        ->select('typeDoc','document','name','last_name','phone','email','id_rol')
                         ->where('last_name','LIKE','%'.$texto.'%')
                         ->orWhere('name','LIKE','%'.$texto.'%')
                         ->orWhere('typeDoc','LIKE','%'.$texto)
                         ->orWhere('document','Like','%'.$texto.'%')
                         ->orderBy('document','asc')
                         ->paginate(10);
        return  view('User.index',compact('user','texto'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Admin.RegisterAdmin');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //$request->validate([
        //    'password' => ['required', 'confirmed', 
        //        Rules\Password::min(8)
        //    ],
        //]);
       
        $user =new User;
        $user->typeDoc=$request->input('typeDoc');
        $user->document=$request->input('document');
        $user->id_rol=$request->input('type_user');
        $user->name=$request->input('name');
        $user->last_name=$request->input('last_name');
        $user->email=$request->input('email');
        $user->phone=$request->input('phone');
        $user->password=Hash::make($request->password);
        $user->save();

        return redirect()->route('login');

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
