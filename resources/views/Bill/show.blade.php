@extends('layouts.navbar')

@section('title', 'Factura')

@section('content')

@if ($bill)

<h1>Factura Hotel Tuki</h1>
<p>Numero de factura: {{ $bill->id_bill }}</p>
<p>Numero de reserva: {{ $bill->id_booking }}</p>
<p>Numero de documento: {{ $bill->document }}</p>
<p>Fecha: {{ $bill->date }}</p>
<p>total: {{ $bill->total }}</p>

@endif


@endsection
