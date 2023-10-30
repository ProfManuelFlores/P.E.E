<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Usuarios</title>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    @include('plantillas.admin.navbar')
    <header>
        @php
            $buttonConfig = [
                0 => ['class' => 'button-1', 'text' => 'aceptar', 'value' => 1],
                1 => ['class' => 'button-0', 'text' => 'pendiente', 'value' => 0],
                2 => ['class' => 'button-2', 'text' => 'ver observación', 'value' => 2],
            ];
        @endphp
    </header>
    <section>
        <div class="">
            <p class="title p-2 text-center">Documentos de ???</p>
        </div>
        <div class="table_container">
            <table id="documents" class="cell-border hover general_table">
                <thead class="head_table">
                    <tr>
                        <th class="hidden">IdDoc</th>
                        <th>Nombre de documento</th>
                        <th>estado</th>
                        <th>archivo</th>
                        <th>acciones</th>
                    </tr>
                </thead>
                <tbody class="body_table">
                    @foreach ($typedocuments as $type)
                        <tr>
                            <td class="hidden">{{ $type->IdTypeDoc }}</td>
                            <td>{{ $type->Desc_Document }}</td>
                            <td>
                                @foreach ($documents as $doc)
                                    @if ($doc->IdTypeDoc == $type->IdTypeDoc)
                                        @foreach ($statusdoc as $status)
                                            @if ($doc->IdStatusDoc == $status->IdStatus)
                                                <button class="button-{{ $doc->IdStatusDoc }}"
                                                    disabled>{{ $status->Desc_Status }}</button>
                                            @else
                                            @endif
                                        @endforeach
                                    @endif
                                @endforeach
                            </td>
                            <td>
                                @foreach ($documents as $doc)
                                    @if ($doc->IdTypeDoc == $type->IdTypeDoc)
                                        <a href="{{ route('SeeDocument', $doc->NameFile) }}" class="button">ver
                                            documento</a>
                                        <input type="text" value="{{ $doc->NameFile }}"
                                            class="border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-color focus:border-primary-color dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-color dark:focus:border-primary-color">
                                    @endif
                                @endforeach
                            </td>
                            <td>
                                @foreach ($documents as $index => $doc)
                                    @if ($doc->IdTypeDoc == $type->IdTypeDoc && array_key_exists($doc->IdStatusDoc, $buttonConfig))
                                        @if ($doc->IdStatusDoc == 2)
                                            <button data-modal-target="authentication-modal{{ $index }}"
                                                data-modal-toggle="authentication-modal{{ $index }}"
                                                class="{{ $buttonConfig[$doc->IdStatusDoc]['class'] }}">
                                                {{ $buttonConfig[$doc->IdStatusDoc]['text'] }}
                                            </button>
                                            @include('plantillas.commun.modal-form-comments')
                                        @else
                                            <a
                                                href="{{ route('changestatus', [$doc->IdDocuments, $buttonConfig[$doc->IdStatusDoc]['value']]) }}">
                                                <button class="{{ $buttonConfig[$doc->IdStatusDoc]['class'] }}">
                                                    {{ $buttonConfig[$doc->IdStatusDoc]['text'] }}
                                                </button>
                                            </a>
                                        @endif
                                    @endif
                                @endforeach
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
</body>
<script>
    $(document).ready(function() {
        $('#documents').DataTable({
            dom: "Bfrtip",
            buttons: {
                dom: {
                    button: {
                        className: 'btn'
                    }
                },
            }
        });
    });
</script>

</html>
