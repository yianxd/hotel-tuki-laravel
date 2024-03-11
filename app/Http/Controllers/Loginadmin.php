<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Loginadmin extends Controller
{
    public function index(){
        
        return view('auth.loginAdmin');
    }

    public function store(Request $request){
        $this->validate($request, [
            'email'=>'required|email',
            'password'=>'required',
            //'rol'            //completar el puto rol
        ]);

        if(!auth()->attempt($request->only('email', 'password'))){

            return back()->with('mensaje', 'Credenciales incorrectas');
        }
        return redirect('home');
      }
}
