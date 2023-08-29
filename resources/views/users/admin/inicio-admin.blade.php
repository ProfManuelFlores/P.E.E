<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inicio</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    @include('plantillas.admin.navbar')
    <header>

    </header>
    <section>
        <div class="home_admin">
            <div class="home_top_admin">
                <p class="title">Bienvenido: [nombre de usuario]</p>
            </div>
            <div class="home_botton_admin">
                <div class="home_botton_admin_present">
                    <p class="subtitle"> Periodo Actual </p>
                </div>
                <div class="home_botton_admin_general">
                    <p class="subtitle"> General </p>
                </div>
            </div>
        </div>
    </section>
    @include('plantillas.commun.footer')
</body>

</html>