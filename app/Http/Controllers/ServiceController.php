<?php

namespace App\Http\Controllers;

use App\Models\service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        $texto=trim($request->get('texto'));
        $service=DB::table('services')
                         ->select('id_service','name','value','description','disponibility')
                         ->where('name','LIKE','%'.$texto.'%')
                         ->orWhere('value','LIKE','%'.$texto.'%')
                         ->orWhere('disponibility','Like','%'.$texto.'%')
                         ->orderBy('id_service','asc')
                         ->paginate(10);
        return  view('service.index',compact('service','texto'));
    }

    public function create()
    {
        return view('Service.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' =>  'required|string|min:2|max:15',
            'value' => 'required|numeric|min:1|max:200000',
            'description' => 'required|string|min:5|max:100',
            'disponibility' => 'required|numeric|min:1|max:1'
        ],
        [
            'name.min'=>'Escriba minimo 2 caracteres',
            'description.min'=>'Escriba minimo 5 caracteres',
            'name.max'=>'Supera el limite de caracteres',
            'description.max'=>'Supera el limite de caracteres',
            'value.numeric'=>'es campo debe ser un numero',
            'value.min'=>'Precio muy bajo',
            'value.max'=>'Precio muy alto',
            'name.required','value.requiered','description.required'=>'Campo obligatorio'
        ]
    );


        $service =new Service;
        $service->name=$request->input('name');
        $service->value=$request->input('value');
        $service->description=$request->input('description');
        $service->disponibility=$request->input('disponibility');
        $service->save();
        return redirect()->route('service.index')->with('success', 'Servicio creado exitosamente.');
    }

    public function show(Service $service)
    {
        return view('service.show', compact('service'));
    }

    public function edit($id_service)
    {
        $service=Service::findOrFail($id_service);
        return view('service.edit', compact('service'));
    }

    public function update(Request $request, $id_service)
    {

        $request->validate([
            'name' =>  'required|string|min:2|max:15',
            'value' => 'required|numeric|min:1|max:200000',
            'description' => 'required|string|min:5|max:100',
            'disponibility' => 'required|numeric|min:0|max:1'
        ],
        [
            'name.min'=>'Escriba minimo 2 caracteres',
            'description.min'=>'Escriba minimo 5 caracteres',
            'name.max'=>'Supera el limite de caracteres',
            'description.max'=>'Supera el limite de caracteres',
            'value.numeric'=>'es campo debe ser un numero',
            'value.min'=>'Precio muy bajo',
            'value.max'=>'Precio muy alto',
            'name.required','value.requiered','description.required'=>'Campo obligatorio'
        ]
    );


        $service =Service::findOrFail($id_service);
        $service->name=$request->input('name');
        $service->value=$request->input('value');
        $service->description=$request->input('description');
        $service->disponibility=$request->input('disponibility');
        $service->save();
        return redirect()->route('service.index');
    }

    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        $service->delete();
        return redirect()->route('service.index')->with('success', 'Servicio eliminado exitosamente.');
    }
}
