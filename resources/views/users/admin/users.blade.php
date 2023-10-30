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
            <p class="title p-2 text-center">Usuarios en plataforma</p>
        </div>
        <div class="table_container">
            <table id="users" class="cell-border hover general_table">
                <thead class="head_table">
                    <tr>
                        <th>Email</th>
                        <th>Rol</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody class="body_table">
                    @foreach ($allusers as $index => $user)
                        <tr>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->role }}</td>
                            <td>
                                <div class="action_buttons">
                                    @include('plantillas.commun.modal-form-edituser')
                                    <button class="button" data-modal-target="authentication-modal{{ $index }}"
                                        data-modal-toggle="authentication-modal{{ $index }}">Editar</button>
                                    <button class="button">Eliminar</button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="options_user">
            <p class="subtitle py-12 text-center">Crear Usuario (Unico)</p>
            <form action="{{ route('CreateUserIn') }}" method="POST" class="text-center">
                @csrf
                <div class="NewUserForm">
                    <div>
                        <label for="email" class="NewUserForm_Label">Correo Electronico</label>
                        <input type="email" id="email" name="email" class="NewUserForm_Input" required>
                    </div>
                    <div>
                        <label for="password" class="NewUserForm_Label">Contraseña</label>
                        <input type="password" id="password" name="password" class="NewUserForm_Input" required>
                    </div>
                    <div>
                        <label for="role" class="NewUserForm_Label">Tipo de usuario</label>
                        <select name="role" id="role">
                            <option value=1>Administrador</option>
                            <option value=2>Alumno</option>
                            <option value=3>Asesor Empresarial</option>
                            <option value=4>Asesor Academico</option>
                        </select>
                    </div>
                </div>
                <div class="py-4">
                    <button class="button">+ Crear Usuario</button>
                </div>
            </form>
            <p class="subtitle py-12 text-center">Crear Usuarios (Multiples) </p>
            <form action="" method="POST" class="text-center block">
                <label for="file" class="NewUserForm_Label">Archivo csv</label>
                <input type="file" name="" id="" class="py-2">
            </form>
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
