@extends('layouts.navbar')

@section('content')
<head>
    <!--<link rel="stylesheet" href="{{ asset('css/login') }}">-->
</head>
<Section>
        <div class="container text-center mt-5 rounded">
            <h4>Inicio De Sesion</h4>
            <div class="row text-center">
                <div class="col-xl-12">
                    <form action="{{ route('login') }}" method="POST" novalidate>
                        @csrf
                        @if (session('mensaje'))
                            <h6>{{ session('mensaje') }}</h6>
                        @endif
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" id="" placeholder="Email" value="{{ old('email') }}">
                        </div>
                        @error('email')
                            <h6>{{ $message }}</h6>
                        @enderror
                        <div class="form-group">
                            <label for="password">Contraseña</label>
                            <input type="password" class="form-control" name="password" id="" placeholder="Password">
                        </div>
                        @error('password')
                        <h6>{{ $message }}</h6>
                        @enderror
                        <input class="btn btn-primary my-2" type="submit" name="login" value="Login">
                        <script src="{{asset(js/login/login.js)}}"></script>
                    </form>
                </div>
</Section>
@endsection
