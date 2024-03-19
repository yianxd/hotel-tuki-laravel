<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(){
        // Método para mostrar el formulario de inicio de sesión
        return view('auth.login');
    }
    // Método para procesar el inicio de sesión
    public function store(Request $request){
        // Validar los datos enviados en la solicitud
        $this->validate($request, [
            'email'=>'required|email',
            'password'=>'required'
        ]);
        // Intentar autenticar al usuario con las credenciales proporcionadas
        if(!auth()->attempt($request->only('email', 'password'))){
            // Redirigir de vuelta al formulario con un mensaje de error si las credenciales son incorrectas
            return back()->with('mensaje', 'Credenciales incorrectas');
        }
        // Redirigir al usuario a la página de inicio si las credenciales son correctas
        return redirect('home');
    }
}
