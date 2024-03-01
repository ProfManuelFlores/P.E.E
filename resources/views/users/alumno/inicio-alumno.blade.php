<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Alumno</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    @include('plantillas.alumno.navbar')
    <header>

    </header>
    <section>
        <div class="home_alumno">
            <p class="title py-4">Bienvenidos</p>
            <div class="home_alumno_contents">
                @foreach ($procesos as $proceso)
                    <a href="{{ route('documentos_alumno', $proceso->IdProcess) }}">
                        <div class="container_alumno_cards">
                            <img src="{{ asset('svg/document-icon.svg') }}" alt="icon document">
                            <p class="py-5">{{ $proceso->Desc_Process }}</p>
                        </div>
                    </a>
                @endforeach
            </div>
            <div class="grid justify-items-center">
                <p class="title py-4">Guía de usuarios</p>
                @if ($formatos && $formatos->NameFile)
                    <embed class="w-full px-2 py-10 aspect-[2/3]" src="{{ asset('formats/' . $formatos->NameFile) }}">
                @else
                    <p class="text-red-500">Archivo no disponible</p>
                @endif
            </div>
        </div>
    </section>
</body>

</html>
