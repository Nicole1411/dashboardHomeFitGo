@extends('layouts.authmenu')

@section('login')
<div class="body" style="background-image: url({{URL::asset('img/splash.webp')}}); background-size: cover; background-position: center;">
    <div class="container-body">
        <div class="container ">
            <div class="center">
                <div class="title-text">
                    <img src="{{URL::asset('img/iconhome.png')}}" style="width: 150px; height: 140px;" class="mb-3">
                    <h3 class="mb-2  custom-h3">Bienvenid@s a Home Fit Go! 👋</h3>
                    <p class="mb-4">Inicia sesión en tu cuenta y comienza la aventura.</p>
                    {{-- Otros elementos aquí --}}
                </div>
                <form class="form" action="{{ route('ingresar') }}" method="POST">
                    @csrf

                    <div class="input-block">
                        <input class="input" type="text" name="NICKNAMEPERSONA" id="NICKNAMEPERSONA" required="">
                        <label for="username">Usuario</label>
                    </div>
                    <div class="input-block">
                        <input class="input" type="password" name="CONTRASENIAPERSONA" id="CONTRASENIAPERSONA" required="">
                        <label for="pass">Contraseña</label>
                    </div>
                    <br>
                    <div class="input-block">
                        @error('message')
                        <p class='text-danger font-weight-bold'>
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                    <button class="sign" type="submit">Iniciar Sesión</button>
                </form>
            </div>
        </div>
    </div>
</div>
{{-- <div class="container1">
    <div class="left">
        <div class="img">
            <img src="{{URL::asset('img/iconhome.png')}}" style="width: 150px; height: 140px;" class="mb-3">
        </div>

    </div>
</div> --}}

 @endsection



