<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Carbon;


class CustomerController extends Controller
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
        return  view('Customer.index',compact('user','texto'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Customer.create');
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
        $customer = new User;
        $customer->id_rol = $request->input('type_user');
        $customer->name = $request->input('name');
        $customer->last_name = $request->input('last_name');
        $customer->email = $request->input('email');
        $customer->user_name = $request->input('user_name');
        $customer->phone = $request->input('phone');
        $customer->password = Hash::make($request->input('password'));
        $customer->save();

        Customer::create([
            'id_user'=>User::latest('id')->first()->id,
            'registration_date'=>$request->registration_date
        ]);


        return redirect()->route('login');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $customer=user::finOrFail($id);
        return view('customer.edit',compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //
        $customer = User::findOrFail($id);
        $customer->name = $request->input('name');
        $customer->last_name = $request->input('last_name');
        $customer->user_name = $request->input('user_name');
        $customer->phone = $request->input('phone');
        $customer->id_rol = $request->input('type_user');
        $customer->email = $request->input('email');
        $customer->password = Hash::make($request->input('password'));
        $customer->save();
        return redirect()->route('customer.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $customer=Customer::findOrFail($id);
        $customer->delete();
        return redirect()->route('customer.index');
    }
}
