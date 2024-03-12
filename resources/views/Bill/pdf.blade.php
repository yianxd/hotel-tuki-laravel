<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>FACTURA</title>
</head>
<body>

    <div class="col-lx-12">
        <div class="table-responsive">
            <h1 class="text-center py-3">Factura Hotel Tuki</h1>
            <table class="table table-striped">
                <thead>
                    <tr>

                        <th>Numero de factura</th>
                        <th>Numero de Reserva</th>
                        <th>Documento</th>
                        <th>fecha</th>
                        <th>total</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($bill)<=0)
                        <tr>
                            <td colspan="7">No hay resultados</td>
                        </tr>
                    @else
                    @foreach ($bill as $bill)
                    <tr>
                        <td>{{$bill->id_bill}}</td>
                        <td>{{$bill->id_booking}}</td>
                        <td>{{$bill->document}}</td>
                        <td>{{$bill->date}}</td>
                        <td>{{$bill->total}}</td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>

    </div>
    </div>



</body>
</html>

