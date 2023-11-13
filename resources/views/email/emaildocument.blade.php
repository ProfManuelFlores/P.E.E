<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <section class="grid grid-cols-1 gap-40 justify-items-center grid-rows-1">
        <div class="w-full max-w-screen-lg mx-auto">
            <img src="{{ asset('formats/arriba.png') }}" alt="" class="w-full h-auto">
        </div>
        <div class="text-justif">

            <a href="#"
                class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Estado de documento</h5>
                <p class="font-normal text-gray-700 dark:text-gray-400">
                    Buenas, estimado alumno/a de la universidad politecnica de quintana roo
                    su documento referente a su proceso de estancia se encuentra:
                    @if ($document->IdStatusDoc == 2)
                        Con Observacion:
                        {{$document->comment}}
                    @else
                        @switch($document->IdStatusDoc)
                            @case(0)
                                Aceptado
                                @break
                            @case(1)
                                Pendiente
                                @break
                            @default
                                
                        @endswitch
                    @endif
                    favor de revisarlo en la pagina
                </p>
            </a>

        </div>
        <div class="w-full max-w-screen-lg mx-auto">
            <img src="{{ asset('formats/abajo.png') }}" alt="" class="w-full h-auto">
        </div>
    </section>
</body>

</html>
