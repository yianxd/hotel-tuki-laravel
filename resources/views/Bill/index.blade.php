@extends('layouts.navbar')

@section('content')

<div class="container">
    <h4>Facturas</h4>
    <div class="row">
        <div class="col-xl-12">
            <h1>Facturas</h1>
    <a href="{{ route('bill.create') }}" class="btn btn-success">Crear Factura</a>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Numero Factura</th>
                    <th>Documentoo Cliente</th>
                    <th>Porcentaje</th>
                    <th>Descuento</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($facturas as $factura)
                    <tr>
                        <td>{{ $factura->id }}</td>
                        {{-- <td>{{ $factura->cliente->nombre }} {{ $factura->cliente->apellido }}</td> --}}
                        <td>{{$factura->id_customer}}</td>
                        <td>{{ $factura->tax_percentage }}</td>
                        <td>{{ $factura->discount }}</td>
                        <td>{{ $factura->total }}</td>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
            </div>
        </div>

    </div>

</div>

@endsection
