<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Log In</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://www.google.com/recaptcha/api.js"></script>
</head>

<body style="background-image: url('{{asset('assets/images/LogoCafe.jpg')}}'); background-size: cover; background-position: center center; background-repeat: no-repeat; background-attachment: fixed;">
    @include('sweetalert::alert')
    <header>

    </header>
    <section class="body__login">
        <div class="main_body__login">
            <div class="image__holder__login">
                <img src="{{ asset('assets/images/logosinfondo.png') }}"
                    alt="Logo Universidad Politecnica De Quintana Roo">
            </div>
            <div class="form__login">
                <form method="POST" action="{{ route('login') }}" id="login">
                    @csrf
                    <label class="subtitle text-center">Bienvenido a la Plataforma de Estancias,Estadías y Servicio
                        social</label>
                    <label for="email-user" class="subtitle">Correo</label>
                    <input type="email" name="email" value="{{ old('email') }}" id="email">
                    @error('email')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                    <label for="password-user" class="subtitle">Contraseña</label>
                    <input type="password" name="password" id="password">
                    <a href="#" data-modal-target="defaultModal" data-modal-toggle="defaultModal"
                        class="form__login__href">¿Olvidaste tu
                        contraseña?</a>
                    <button class="g-recaptcha button" 
                        data-sitekey="{{ config('services.recaptch.site_key') }}" 
                        data-callback='onSubmit'
                        data-action='Login'>Iniciar Sesion
                    </button>
                    <div class="form__login__help1">
                        ¿No tienes cuenta o no puedes ingresar? <a href="#" class="form__login__help2"
                            data-modal-target="defaultModal" data-modal-toggle="defaultModal">
                            Obtener Acceso</a>
                    </div>
                    <div>
                        {{ $errors->first('g-recaptcha-response')}} 
                    </div>
                </form>|
            </div>
        </div>
    </section>
    @include('plantillas.commun.modals')
    <script>
        function onSubmit(token) {
            document.getElementById("g-recaptcha-response").value = token;
            document.getElementById("login").submit();
        }
    </script>
</body>

</html>
