@extends('layouts.navbar')

@section('content')
    <body>
        <div class="container">
            <h4>Inicio De Seccion</h4>
            <div class="row">
                <div class="col-xl-12">
                    <form action="{{ route('login') }}" method="POST" novalidate>
                        @csrf
                        @if (session('mensaje'))
                            <h6>{{ session('mensaje') }}</h6>
                        @endif
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="control" name="email" id="" placeholder="Email" value="{{ old('email') }}">
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
                        <input type="submit" name="login" value="Login">
                    </form>
                </div>      
@endsection
