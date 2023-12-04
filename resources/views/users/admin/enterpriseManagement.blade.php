<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Empresas</title>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    @admin()
    @include('plantillas.admin.navbar')
    @endadmin
    @student()
    @include('plantillas.alumno.navbar');
    @endstudent
    @include('sweetalert::alert')
    <header>

    </header>
    <section>
        <div class="">
            <p class="title p-10 text-center">Empresas</p>
        </div>
        <div class="table_container">
            <table id="enterprise" class="cell-border hover general_table">
                <thead class="head_table">
                    <tr>
                        <th>Rfc</th>
                        <th>Nombre</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody class="body_table">
                    @foreach ($enterprises as $index => $enterprise)
                        <tr>
                            <td>{{ $enterprise->Rcf }}</td>
                            <td>{{ $enterprise->Name }}</td>
                            <td>
                                <div class="action_buttons">
                                    @include('plantillas.commun.modal-form-editenterprise')
                                    <button class="button" data-modal-target="authentication-modal{{ $index }}"
                                        data-modal-toggle="authentication-modal{{ $index }}">Ver datos</button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @admin()
        <div class="options_user">
            <p class="subtitle py-12 text-center">Subir Empresas (Multiples) </p>
            <form action="{{route('NewEnterprise')}}" method="POST" class="text-center block" enctype="multipart/form-data">
                @csrf
                <label for="file" class="NewUserForm_Label">Archivo csv</label>
                <input type="file" name="CSV_E" id="CSV_E" class="py-2">
                <button class="button-1">Agregar masivamente</button>
            </form>
        </div>
        @endadmin
    </section>
</body>
<script>
    $(document).ready(function() {
        $('#enterprise').DataTable({
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
