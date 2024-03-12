@extends('layouts.navbar')

@section('title', 'Facturas')


@section('content')

<div class="col-lx-12">
    <div class="table-responsive">
        <h1 class="text-center py-3">Facturas</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Opciones</th>
                    <th>Numero de factura</th>
                    <th>Documento</th>
                    <th>fecha</th>
                </tr>
            </thead>
            <tbody>
                @if (count($bill)<=0)
                    <tr>
                        <td colspan="7">No hay facturas</td>
                    </tr>
                @else
                @foreach ($bill as $bill)
                <tr>
                    <td>
                        <a href="{{ route('bills.show',$bill->id_bill)}}" class="btn btn-success btn-sm">ver factura</a>
                    </td>
                    <td>{{$bill->id_bill}}</td>
                    <td>{{$bill->document}}</td>
                    <td>{{$bill->date}}</td>
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>
    </div>
</div>

</div>
</div>


@endsection
