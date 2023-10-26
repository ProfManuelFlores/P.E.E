<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Periodos</title>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    @include('plantillas.admin.navbar')
    <header>

    </header>
    <section>
        <div class="">
            <p class="title py-8 text-center">Periodos de documentos</p>
        </div>
        <div class="table_container">
            <table id="periods" class="cell-border hover general_table">
                <a href="{{ route('CreatePeriod') }}"><button class="button">Crear Periodo</button> </a>
                <thead class="head_table">
                    <tr>
                        <th>Periodo</th>
                        <th>Fase 1</th>
                        <th>Fase 2</th>
                        <th>Fase 3</th>
                    </tr>
                </thead>
                <tbody class="body_table">
                    @foreach ($periodos as $periodo)
                        <tr>
                            <td>{{ $periodo->IdPeriod }}</td>
                            @for ($phase = 1; $phase <= 3; $phase++)
                                <td>
                                    <a href="{{ route('UpdatePeriod', [$periodo->IdPeriod, $phase]) }}">
                                        <button class="button">
                                            {{ $periodo->{"Phase{$phase}"} == 0 ? 'Activar' : 'Desactivar' }}
                                        </button>
                                    </a>
                                </td>
                            @endfor
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <p class="title py-8 text-center"> Guia de documentos por periodo</p>
        <div class="grid grid-cols-1 justify-items-center md:grid-cols-3 p-3 ">
            <div class="text-center subtitle py-3 ">
                <p class="py-2">Fase 1</p>
                <p>Carta de presentacion</p>
                <p>Carta de aceptacion</p>
            </div>
            <div class="text-center subtitle py-3 ">
                <p class="py-2">Fase 2</p>
                <p>cedula de registro</p>
                <p>definicion de proyecto</p>
            </div>
            <div class="text-center subtitle py-3 ">
                <p class="py-2">Fase 3</p>
                <p>carta de liberacion</p>
            </div>
        </div>
    </section>
</body>
<script>
    $(document).ready(function() {
        $('#periods').DataTable({
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
