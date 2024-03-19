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

/**
 * This PHP function retrieves services from the database based on a search query and displays them in
 * a paginated view.
 *
 * @param Request request The `index` function in your code snippet is a controller method that
 * retrieves services based on the search text provided in the request. Here's a breakdown of the
 * parameters used in the function:
 *
 * @return The `index` function is returning a view called `service.index` with the variables
 * `` and `` passed to it. The `` variable contains a paginated list of services
 * fetched from the database table `services` based on the search criteria provided in the ``
 * variable. The search is performed on the columns `name`, `value`, and `disponibility`
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

 /**
  * The function `store` validates and stores a new service with specific requirements and returns a
  * success message upon creation.
  *
  * @param Request request The `store` function in your code snippet is used to store a new service
  * based on the data provided in the request. Here's a breakdown of the validation rules and error
  * messages you have defined:
  *
  * @return The `store` function is returning a redirect response to the `service.index` route with a
  * success message "Servicio creado exitosamente."
  */
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

 /**
  * The update function in PHP validates and updates service information based on user input.
  *
  * @param Request request The `update` function in your code snippet is used to update a service based
  * on the provided request data. Here's a breakdown of the function:
  * @param id_service The `id_service` parameter in the `update` function represents the unique
  * identifier of the service that you want to update. This parameter is used to find the specific
  * service record in the database that needs to be updated. It is typically passed as a route
  * parameter when making a request to update a service
  *
  * @return The `update` function is returning a redirect response to the route named `service.index`.
  */
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

/**
 * The function `destroy` deletes a Service record by its ID and redirects to the service index page
 * with a success message.
 *
 * @param id The `destroy` function in the code snippet is a method typically found in a controller in
 * a Laravel application. It is responsible for deleting a specific `Service` record from the database
 * based on the provided `` parameter.
 *
 * @return The `destroy` function is returning a redirect response to the `service.index` route with a
 * success message "Servicio eliminado exitosamente."
 */
    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        $service->delete();
        return redirect()->route('service.index')->with('success', 'Servicio eliminado exitosamente.');
    }
}
