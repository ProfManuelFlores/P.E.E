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

    </header>
    <section>
        <div class="">
            <p class="title p-2 text-center">Procesos de alumnos</p>
        </div>
        <div class="table_container">
            <table id="users" class="cell-border hover general_table">
                <thead class="head_table">
                    <tr>
                        <th>Usuario</th>
                        <th>Proceso</th>
                        <th>Periodo</th>
                        <th>Documentos</th>
                    </tr>
                </thead>
                <tbody class="body_table">
                    @foreach ($processinfos as $process)
                        <tr>
                            <td>{{ $process->users }}</td>
                            @foreach ($typeprocess as $type)
                                @if ($process->IdTypeProcess == $type->IdProcess)
                                    <td>{{ $type->Desc_Process }}</td>
                                @endif
                            @endforeach
                            <td>{{ $process->IdPeriod }}</td>
                            <td>
                                <a href="{{route('SearchDocumentStudent',[$process->users . $process->IdTypeProcess,$process->users])}}">
                                    <button class="button">Ver Documentos</button>
                                </a>
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
        $('#users').DataTable({
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
