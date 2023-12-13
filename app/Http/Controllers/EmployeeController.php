<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $texto=trim($request->get('texto'));
        $user=DB::table('users')
                         ->select('id','name','last_name','phone','email','id_rol')
                         ->where('last_name','LIKE','%'.$texto.'%')
                         ->orWhere('name','LIKE','%'.$texto.'%')
                         ->orWhere('id','Like','%'.$texto.'%')
                         ->orderBy('last_name','asc')
                         ->paginate(10);
        return  view('Employee.index',compact('user','texto'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Employee.create');
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
        $user =new User;
        $user->id_rol=$request->input('type_user');
        $user->name=$request->input('name');
        $user->last_name=$request->input('last_name');
        $user->email=$request->input('email');
        $user->user_name=$request->input('user_name');
        $user->phone=$request->input('phone');
        $user->password=Hash::make($request->input('password'));
        $user->save();

        Employee::create([
            'id_user'=>User::latest('id')->first()->id,
            'rol'=>$request->rol,
            'addres'=>$request->addres,
            'salary'=>$request->salary
        ]);
        return redirect()->route('employee.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //
            $employee = User::findOrFail($id);
            $employee->name = $request->input('name');
            $employee->last_name = $request->input('last_name');
            $employee->user_name = $request->input('user_name');
            $employee->phone = $request->input('phone');
            $employee->id_rol = $request->input('type_user');
            $employee->email = $request->input('email');
            $employee->password = Hash::make($request->input('password'));
            $employee->save();

            return redirect()->route('employee.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $employee=Employee::findOrFail($id);
        $employee->delete();
        return redirect()->route('employee.index');

    }
}
