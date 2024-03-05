<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> @yield('title','Hotel Tuki...se libero el tuki')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <main>
        Hola
    </main>
    <!--
    @auth
        <p>Bienvenido{{ auth()->user()->name }}</p>
            @if (auth()->user()->id_rol==1)
                <p>Cliente</p>
                    <nav>
                        <menu>
                            <a href="#">Hacer Una Reserva</a>
                            <a href="#">Consultar Reservas</a>
                            <a href="{{ route('soport') }}">Soporte</a>
                        </menu>
                    </nav>
            @elseif (auth()->user()->id_rol==2)
                <p>Room Service</p>
                    <nav>
                        <menu>
                            <a href="#">Cargar Un Pedido</a>
                            <a href="{{ route('soport') }}">Soporte</a>
                        </menu>
                    </nav>
            @elseif (auth()->user()->id_rol==3)
                <p>Mesero</p>
                    <nav>
                        <menu>
                            <a href="#">Cargar Un Pedido</a>
                            <a href="#">Cancelar Pedido</a>
                            <a href="{{ route('soport') }}">Soporte</a>
                        </menu>
                    </nav>
            @elseif (auth()->user()->id_rol==4)
                <p>Instructor</p>
                    <nav>
                        <menu>
                            <a href="{{ route('employee.index') }}">Gestionar Empleados</a>
                            <a href="#">Gestionar Hoteles</a>
                            <a href="{{ route('soport') }}">Soporte</a>
                        </menu>
                    </nav>
            @elseif (auth()->user()->id_rol==5)
                <p>Recepcionista</p>
                    <nav>
                        <menu>
                            <a href="#">Gestionar Reserva</a>
                            <a href="{{ route('soport') }}">Soporte</a>
                        </menu>
                    </nav>
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
                <nav>
                    <ol>
                        <li><a href='/'>Iniciar sesión</li>
                        <li><a href='/'>Registrame</li>
                        <li><a href='#'>Nuestra Misión</li>
                        <li><a href='#'>Acerca de nosotros</li>
                    </ol>
                <nav>
            @endguest
                -->

</body>
@yield('content')
</html>


