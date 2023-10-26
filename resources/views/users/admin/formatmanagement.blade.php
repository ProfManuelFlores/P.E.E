<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formatos</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
</head>
<body>
    @include('plantillas.admin.navbar')
    <header>
        @include('sweetalert::alert')
    </header>
    <section>
        <div>
            <p class="title text-center py-10">Formatos</p>
        </div>
        <div class="Format_admin_contents">
            <table class="table w-3/4 text-center align-items-center">
                <thead class="head_table">
                    <tr>
                        <th class="Format_admin_contents_head">Documento</th>
                        <th class="Format_admin_contents_head">Formato</th>
                        <th class="Format_admin_contents_head">Nombre formato</th>
                        <th class="Format_admin_contents_head">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($formatos as $formato)
                        <tr>
                            <td class="Format_admin_contents_rows">{{$formato->Name}}</td>
                            <td class="Format_admin_contents_rows"><a href="{{route('Descargar_formato',$formato->IdFormats)}}"><button class="button">Descargar</button></a></td>
                            <td class="Format_admin_contents_rows">{{$formato->NameFile}}</td>
                            <td class="Format_admin_contents_rows">
                                <form action="{{route('UpdateFormat',$formato->IdFormats)}}" method="POST" enctype="multipart/form-data" class="flex justify-center">
                                    @csrf
                                    <input type="file" name="format" id="format">
                                    <button class="button">Cambiar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
</body>
</html>