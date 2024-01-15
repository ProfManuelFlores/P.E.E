<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Log In</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <header>

    </header>
    <section class="body__login">
        <div class="main_body__login">
            <div class="image__holder__login">
                <img src="{{ asset('assets/images/logosinfondo.png') }}"
                    alt="Logo Universidad Politecnica De Quintana Roo">
            </div>
            <div class="form__login">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <label class="subtitle text-center">Bienvenido a la Plataforma de Estancias,Estadías y Servicio social</label>
                    <label for="email-user" class="subtitle">Correo</label>
                    <input type="email" name="email" id="email">
                    <label for="password-user" class="subtitle">Contraseña</label>
                    <input type="password" name="password" id="password">
                    <a href="#" data-modal-target="defaultModal" data-modal-toggle="defaultModal"
                        class="form__login__href">¿Olvidastes tu
                        contraseña?</a>
                    <button class="button">
                        Iniciar Sesion
                    </button>
                    <div class="form__login__help1">
                        ¿No tienes cuenta o no puedes ingresar? <a href="#" class="form__login__help2"
                            data-modal-target="defaultModal" data-modal-toggle="defaultModal">
                            Obtener Acceso</a>
                    </div>
                </form>|
            </div>
        </div>
    </section>
    @include('plantillas.commun.modals')
</body>

</html>
