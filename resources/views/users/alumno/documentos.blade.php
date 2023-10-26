<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Documentos de {{ $proceso->Desc_Process }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
</head>

<body>
    @include('plantillas.alumno.navbar')
    @include('sweetalert::alert')
    <header>

    </header>
    <section>
        <div>
            <p class="title text-center py-10"> Documentos de {{ $proceso->Desc_Process }}</p>
            <a href="{{route('SingupPeriod',$proceso->IdProcess)}}" class="flex justify-center">
                <button class="button"> Alta en periodo </button>
            </a>
        </div>
        <div class="Documentos_alumno_contents">
            <table class="w-3/4 text-left">
                <thead class="head_table">
                    <tr>
                        <th class="Documentos_alumno_contents_rows">Documento</th>
                        <th class="Documentos_alumno_contents_rows">Formato</th>
                        <th class="Documentos_alumno_contents_rows">Estado</th>
                        <th class="Documentos_alumno_contents_rows">Acciones</th>
                    </tr>
                </thead>
                <tbody class="">
                    @foreach ($formatos as $formato)
                        @if ($formato->Name != 'Guia de uso')
                            <tr>
                                <td class="Documentos_alumno_contents_rows">{{ $formato->Desc_Document }}</td>
                                <td class="Documentos_alumno_contents_rows">
                                    <a href="{{ route('Descargar_formato', $formato->IdFormat) }}">
                                        <button class="button">Descargar</button>
                                    </a>
                                </td>
                                <td class="Documentos_alumno_contents_rows">
                                    @foreach ($DocumentosAlumno as $doc)
                                        @if ($doc->IdTypeDoc == $formato->IdTypeDoc)
                                            @foreach ($statusDoc as $status)
                                                @if ($doc->IdStatusDoc == $status->IdStatus)
                                                    <button class="button" disabled>{{$status->Desc_Status}}</button>
                                                @endif
                                            @endforeach
                                        @endif
                                    @endforeach
                                </td>
                                <td class="flex Documentos_alumno_contents_rows">
                                    <form action="{{route('UploadDocument',$proceso->IdProcess)}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                            @foreach ($DocumentosAlumno as $doc)
                                                @if ($doc->IdTypeDoc == $formato->IdTypeDoc)
                                                <a href="{{route('SeeDocument',$doc->NameFile)}}" class="button">ver documento</a>
                                                    <input type="text" value="{{ $doc->NameFile }}" class="border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-color focus:border-primary-color dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-color dark:focus:border-primary-color">
                                                    @if ($doc->IdStatusDoc != 1)
                                                        <button class="button">Cancelar</button>
                                                    @endif
                                                @else
                                                    @if (($formato->IdTypeDoc == 0 || $formato->IdTypeDoc == 1) && $processperiod->Phase1 == 1)
                                                        <input type="file" name="doc" id="doc">
                                                        <button class="button">Enviar</button>
                                                    @elseif (($formato->IdTypeDoc == 2 || $formato->IdTypeDoc == 3) && $processperiod->Phase2 == 1)
                                                        <input type="file" name="doc" id="doc">
                                                        <button class="button">Enviar</button>
                                                    @elseif (($formato->IdTypeDoc == 4 || $formato->IdTypeDoc == 5) && $processperiod->Phase3 == 1)
                                                        <input type="file" name="doc" id="doc">
                                                        <button class="button">Enviar</button>
                                                    @endif
                                                @endif
                                            @endforeach
                                    </form>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
</body>

</html>
