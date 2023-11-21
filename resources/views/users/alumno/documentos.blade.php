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
    @include('plantillas.commun.modal-dataprocess')
    <header>

    </header>
    <section>
        <div>
            <p class="title text-center py-10"> Documentos de {{ $proceso->Desc_Process }}</p>
            <div class="flex justify-center">
                <button data-modal-target="default-modal" data-modal-toggle="default-modal" class="button" type="button-2">
                    Alta en Periodo
                </button>
            </div>
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
                    @foreach ($formatos as $index => $formato)
                        @if ($formato->Name != 'Guia de uso')
                            @if (($formato->IdTypeDoc >= 5 && $proceso->IdProcess == 4) || $formato->IdTypeDoc < 5)
                                <tr>
                                    <td class="Documentos_alumno_contents_rows">{{ $formato->Desc_Document }}</td>
                                    <td class="Documentos_alumno_contents_rows">
                                        <a href="{{ route('Descargar_formato', $formato->IdFormat) }}">
                                            <button class="button">Descargar</button>
                                        </a>
                                    </td>
                                    <td class="Documentos_alumno_contents_rows">
                                        @include('plantillas.commun.modal-statusdoc')
                                        <button class="button" data-modal-target="authentication-modalstatus{{ $index }}"
                                            data-modal-toggle="authentication-modalstatus{{ $index }}">Ver Estados</button>
                                    </td>
                                    <td class="flex Documentos_alumno_contents_rows">
                                        @if (count($DocumentosAlumno->where('IdTypeDoc', $formato->IdFormat)) == 0)
                                            <form
                                                action="{{ route('UploadDocument', [$proceso->IdProcess, $formato->IdFormat]) }}"
                                                method="post" enctype="multipart/form-data">
                                                @csrf
                                                @if ($processperiod != null)
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
                                            </form>
                                        @else
                                            @foreach ($DocumentosAlumno as $index => $doc)
                                                @if ($doc->IdTypeDoc == $formato->IdTypeDoc)
                                                    <a href="{{ route('SeeDocument', $doc->NameFile) }}" class="button">ver
                                                        documento</a>
                                                    <input type="text" value="{{ $doc->NameFile }}"
                                                        class="border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-color focus:border-primary-color dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-color dark:focus:border-primary-color">
                                                    @if ($doc->IdStatusDoc != 1 && $doc->IdStatusDocAcademic != 1 && $doc->IdStatusDocEnterprise != 1)
                                                        <a href="{{route('cancelDocument', [$proceso->IdProcess,$doc->IdDoc])}}" class="button">Cancelar</a>
                                                        @if ($doc->IdStatusDoc == 2 || $doc->IdStatusDocAcademic == 2 || $doc->IdStatusDocEnterprise == 2)
                                                            <a data-modal-target="authentication-modals{{ $index }}"
                                                                data-modal-toggle="authentication-modals{{ $index }}"
                                                                class="button">Observacion</a>
                                                            @include('plantillas.commun.modal-form-comments')
                                                        @endif
                                                    @endif
                                                @endif
                                            @endforeach
                                        @endif
                                    </td>
                                </tr>
                            @endif
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
</body>

</html>
