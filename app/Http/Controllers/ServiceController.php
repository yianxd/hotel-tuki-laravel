<?php

namespace App\Http\Controllers;

use App\Models\service;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $services = Service::all();
        return view('service.index', compact('services'));
    }

    public function create()
    {
        return view('service.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'value' => 'required|numeric',
            'name' => 'required|string',
        ]);

        Service::create($data);

        return redirect()->route('service.index')->with('success', 'Servicio creado exitosamente.');
    }

    public function show(Service $service)
    {
        return view('service.show', compact('service'));
    }

    public function edit(Service $service)
    {
        return view('service.edit', compact('service'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'value' => 'required|numeric',
            'name' => 'required|string',
        ]);

        Service::create($data);

        return redirect()->route('service.index')->with('success', 'Servicio actualizado exitosamente.');
    }

    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        $service->delete();

        return redirect()->route('service.index')->with('success', 'Servicio eliminado exitosamente.');
    }
}
