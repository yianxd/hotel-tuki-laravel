@extends('Layouts.navbar')

@section('content')
    <h1>Crear Factura</h1>
    <form method="POST" action="{{ route('bill.store') }}">
        @csrf
        <label for="id_customer">Documento cliente</label>
        <input type="number" name="id_customer" required>
        <input type="number" name="tax_percentage" value="15" required hidden>
        <label for="discount">Descuento</label>
        <input type="number" name="discount" required>
        <input type="number" name="total" id="" value="0.1" hidden>
        {{-- <label for="id_bookin">Numero de reserva</label>
        <input type="number" name="id_booking">
        <label for="id_service">Servicio</label>
        <input type="number" name="id_service">
        <label for="id_product">Productos</label>
        <input type="number" name="id_product">
        <label for="value">Valor</label>
        <input type="number" name="value"> --}}
        <a href="javascript:history.back()">volver</a>
        <input type="submit" class="btn btn-primary" value="Registro">
        <input type="reset" class="btn btn-danger" value="Cancelar">

    </form>
@endsection
