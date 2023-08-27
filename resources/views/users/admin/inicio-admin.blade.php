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
        <div class="gradient">
            <select name="" id="">
                <option value="+">hola</option>
                <option value="+">Mundo</option>
                <option value="+">hola</option>
                <option value="+">mundo</option>
            </select>
        </div>
    </section>
    @include('plantillas.commun.footer')
</body>

</html>