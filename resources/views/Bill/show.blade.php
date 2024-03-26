
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
            @foreach ($bill as $bill)
                <tr>
                    <td>{{$bill->id_bill}}</td>
                    <td>{{$bill->id_booking}}</td>
                    <td>{{$bill->document}}</td>
                    <td>{{$bill->date}}</td>
                </tr>


            @endforeach
        </tbody>
</table>

