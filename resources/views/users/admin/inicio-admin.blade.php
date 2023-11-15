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
        <div class="grid grid-cols-1 text-center">
            <div class="py-10">
                <p class="title text-center">Usuarios en plataforma</p>
                <p class="subtitle">Usuarios totales</p>
                <p class="subtitle text-primary-color">{{$stadisticusers}}</p>
            </div>
            <div class="py-10">
                <p class="title text-center">Usuarios con procesos (totales)</p>
                <div class="grid grid-cols-1 md:grid-cols-3 py-10">
                    @foreach ($stadisticusersprocess as $index => $processstadistic)
                        @foreach ($typeprocess as $p)
                            @if ($p->IdProcess == $index)
                                <div class="py-8">
                                    <p class="subtitle">{{$p->Desc_Process}}</p>
                                    <p class="subtitle text-primary-color">{{$processstadistic}}</p>
                                </div>
                            @endif
                        @endforeach
                    @endforeach
                </div>
                <p class="title text-center">Usuarios en plataforma (periodo actual)</p>
                <div class="grid grid-cols-1 md:grid-cols-3 py-10">
                    @foreach ($stadisticusersprocessnow as $index => $processstadisticnow)
                        @foreach ($typeprocess as $p)
                            @if ($p->IdProcess == $index)
                                <div class="py-8">
                                    <p class="subtitle">{{$p->Desc_Process}}</p>
                                    <p class="subtitle text-primary-color">{{$processstadisticnow}}</p>
                                </div>
                            @endif
                        @endforeach
                    @endforeach
                </div>
            </div>
        </div>
    </section>
</body>

</html>