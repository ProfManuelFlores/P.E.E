<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <style>
        .section {
            display: grid grid-template-columns: repeat(1, minmax(0, 1fr));
            grid-template-rows: repeat(1, minmax(0, 1fr));
            gap: 10rem;
            justify-items: center;
        }

        .body-image {
            width: 100%;
            max-width: 1024px;
        }

        .head-card {
            display: block;
            padding: 1.5rem;
            border-radius: 0.5rem;
            border-width: 1px;
            border-color: #E5E7EB;
            max-width: 24rem;
            background-color: #ffffff;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);
        }

        .text-head-card {
            margin-bottom: 0.5rem;
            font-size: 1.5rem;
            line-height: 2rem;
            font-weight: 700;
            letter-spacing: -0.025em;
            color: #111827;
        }

        .content-card {
            font-weight: 400;
            color: #374151;
        }
    </style>
    <section class="section"
        style="display: grid 
    grid-template-columns: repeat(1, minmax(0, 1fr)); 
    grid-template-rows: repeat(1, minmax(0, 1fr)); 
    gap: 10rem; 
    justify-items: center; ">
        <div class="" style="width: 100%;
        max-width: 1024px;">
            <img src="{{$message->embed(public_path('formats/arriba.png'))}}" alt="" class=""
                style="width: 100%; height: auto;">
        </div>
        <div class="" style="display:flex; justify-content: center; padding:10%;">
            <a href="#" class="head-card"
                style="display: block;
            padding: 1.5rem;
            border-radius: 0.5rem;
            border-width: 1px;
            border-color: #E5E7EB;
            max-width: 24rem;
            background-color: #ffffff;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);">
                <h5 class="text-head-card"
                    style="margin-bottom: 0.5rem;
                font-size: 1.5rem;
                line-height: 2rem;
                font-weight: 700;
                letter-spacing: -0.025em;
                color: #111827;">
                    Estado de documento</h5>
                <p class="" style="font-weight: 400;
                color: #374151;">
                    Buenas, estimado alumno/a de la universidad politecnica de quintana roo
                    su documento referente a su proceso de estancia se encuentra:
                    @if ($document->IdStatusDoc == 2)
                        Con Observacion:
                        {{ $document->comment }}
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
        <div class="">
            <img src="{{ $message->embed(public_path('formats/abajo.png')) }}" alt="" class="" style="width: 100%;
            max-width: 1024px;">
        </div>
    </section>
</body>

</html>
