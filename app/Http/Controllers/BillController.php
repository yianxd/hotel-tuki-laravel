<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Detail_bill;

class BillController extends Controller
{
    public function index()
    {
        $facturas = Bill::all();
        return view('bill.index', compact('facturas'));
    }

    public function show($id)
    {
        $bill = Bill::with('customer')->findOrFail($id);
        //return view('facturas.show', compact('factura'));
    }

    public function create()
    {
        $clientes = Customer::all();
        return view('bill.create', compact('clientes'));

    }

    public function store(Request $request)
    {
        $bill=new Bill;
        $bill->id_customer=$request->input('id_customer');
        $bill->tax_percentage=$request->input('tax_percentage');
        $bill->discount=$request->input('discount');
        $bill->total=$request->input('total');
        $bill->save();
        return redirect()->route('bill.index');

    }

    public function edit($id)
    {
        $factura = Factura::with('cliente')->findOrFail($id);
        $clientes = Cliente::all();
        //return view('facturas.edit', compact('factura', 'clientes', 'reservas'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_cliente' => 'required|exists:clientes,id',
            'fecha_factura' => 'required|date',
            'porcent_impuesto' => 'required|numeric',
            'descuento' => 'required|numeric',
            'total' => 'required|numeric',
            'id_reserva' => 'nullable|exists:reservas,id',
        ]);

        $factura = Factura::findOrFail($id);
        $factura->update($request->all());

        //return redirect()->route('facturas.index')->with('success', 'Factura actualizada exitosamente');
    }

    public function destroy($id)
    {
        $factura = Factura::findOrFail($id);
        $factura->delete();

        //return redirect()->route('facturas.index')->with('success', 'Factura eliminada exitosamente');
    }
}
