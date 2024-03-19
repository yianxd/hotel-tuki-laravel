<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> @yield('title','Hotel Tuki...se libero el tuki')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    @auth
        <p>Bienvenido{{ auth()->user()->name }}</p>
            @if (auth()->user()->id_rol==1)
                    <p>Instructor</p>
                    <nav class="navbar navbar-expand-lg bg-body-tertiary" >
                        <menu>
                            <a class="navbar-brand" href="{{ route('room.index') }}">Gestionar Habitaciones</a>
                            <a class="navbar-brand" href="{{ route('service.index') }}">Gestionar Servicios</a>
                            <a class="navbar-brand" href="{{ route('user.index') }}">Gestionar Usuarios</a>
                            <a class="navbar-brand" href="{{ route('soport') }}">Soporte</a>
                        </menu>
                    </nav>
            @elseif (auth()->user()->id_rol==2)
                <p>Recepcionista</p>
                    <nav>
                        <menu>
                            <a href="#">Gestionar Reserva</a>
                            <a href="{{ route('soport') }}">Soporte</a>
                        </menu>
                    </nav>
            @elseif (auth()->user()->id_rol==3)
                <p>Room Service</p>
                    <nav>
                        <menu>
                            <a class="navbar-brand" href="{{ route('bill.index') }}">gestiona factura</a>
                            <a class="navbar-brand" href="{{ route('soport') }}">Soporte</a>
                        </menu>
                    </nav>
            @elseif (auth()->user()->id_rol==4)
                <p>Mesero</p>
                    <nav>
                        <menu>
                            <a href="#">Cargar Un Pedido</a>
                            <a href="#">Cancelar Pedido</a>
                            <a href="{{ route('soport') }}">Soporte</a>
                        </menu>
                    </nav>
            @elseif (auth()->user()->id_rol==5)

                    <nav class="navbar navbar-expand-lg bg-body-tertiary" >
                        <menu>
                            <a class="navbar-brand" href="{{ route('customer.create')}}">Hacer Una Reserva</a>
                            <a class="navbar-brand" href="{{ route('customer.index')}}">Consultar Reservas</a>
                            <a class="navbar-brand" href="{{ route('soport') }}">Soporte</a>
                        </menu>
                    </nav>
                    <p>Cliente</p>
            @else
            <p>Rol no encontrado</p>
            @endif

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button>
                Cerrar sesión
            </button>
        </form>
        @endauth
            @guest
                <nav class="navbar navbar-expand-lg bg-body-tertiary" >
                    <ol>
                        <div class="container-fluid">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li>
                                <a class="navbar-brand" href='/'>Home</a>
                            </li>
                            <li>
                                <a class="navbar-brand" href='#'>Nuestra Misión</a>
                            </li>
                            <li>
                                <a class="navbar-brand" href='#'>Acerca de nosotros</a>
                            </li>
                            <li class="nav-item">
                                <a class="navbar-brand"  href='{{route('login')}}'>Iniciar sesión</a>
                            </li>
                            <li>
                                <a class="navbar-brand" href='{{route('user.create')}}'>Registrar</a>
                            </li>
                        </ul>

                        </div>
                    </ol>
                </nav>
            @endguest
</body>
@yield('content')
</html>




