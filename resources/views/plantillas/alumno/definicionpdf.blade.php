<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Document</title>
    <style>

                /* CSS para ajustar el tamaño del texto y la tabla */
        .table {
            width: 100%;
            table-layout: fixed;
        }

        .table td, .table th {
            padding: 5px;
            word-wrap: break-word; /* Permite que el texto se ajuste dentro de la celda */
        }

        .datos-big {
            width: 100%;
            font-size: 12px; /* Ajusta el tamaño del texto dentro del textarea */
            resize: none; /* Opcional: Evita que el usuario cambie el tamaño del textarea */
            box-sizing: border-box; /* Asegura que el padding se incluya en el tamaño total del textarea */
        }

        .text-center {
            font-size: 12px; /* Ajusta el tamaño del texto */
        }
        .container {
            position: relative;
            width: 100%;
        }

        .datos {
            width: 100%;
            text-align: center;
            background-color: #E1E1E1;
            border-bottom: 1px solid black;
        }

        .left,
        .right {
            position: absolute;
            display: inline-block;
        }

        .left {
            left: 0;
        }

        .right {
            right: 0;
        }

        .panel {
            background-color: #7A2A05;
            color: white;
        }

        table {
            width: 100%;
        }

        table td,
        table th {
            padding: 0;
            margin: 0;
        }

        input {
            padding: 0;
            margin: 0;
        }
    </style>
</head>

<body>
    <main>
        <small>
            <p class="text-center">
                <b>Universidad Politécnica de Quintana Roo</b><br>
                Dirección de Vinculación, Difusión y Extensión Universitaria
            </p>
            <small>
                <div class="container text-center py-5">
                    <div class="left"><b>Estancia:</b> <b>test</b></div>
                    <div class="right"><b>Fecha y lugar:</b> <b>Cancun Quintana Roo {fecha}</b></div>
                </div>
            </small>
        </small>
        <small>
            <div class="generales">
                <div class="panel">Datos Alumno:</div>
                <table class="table table-borderless">
                    <tr>
                        <th>
                            <div>
                                <small>
                                    <div class="text-center">Nombre</div>
                                    <input type="text" class="datos-big" name="nombre" id="nombre"
                                        value="{{ $request->alumno_0 }}">
                                </small>
                            </div>
                        </th>
                        <th>
                            <div>
                                <small>
                                    <div class="text-center">Grupo</div>
                                    <input type="text" class="datos-big" name="grupo" id="grupo" value="{{ $request->alumno_1 }}">
                                </small>
                            </div>
                        </th>
                    </tr>
                    <tr>
                        <th colspan="2">
                            <div>
                                <small>
                                    <div class="text-center">Asesor Académico</div>
                                    <input type="text" class="datos-big" name="asesor" id="asesor"
                                        value="{{ $request->alumno_2 }}">
                                </small>
                            </div>
                        </th>
                    </tr>
                </table>
                <div class="panel">Datos Empresa:</div>
                <table class="table table-borderless">
                    <tr>
                        <th>
                            <div>
                                <small>
                                    <div class="text-center">Nombre</div>
                                    <input type="text" class="datos-big" name="nombre" id="nombre"
                                    value="{{ $request->empresa_0 }}">
                                </small>
                            </div>
                        </th>
                        <th>
                            <div>
                                <small>
                                    <div class="text-center">Asesor Empresarial</div>
                                    <input type="text" class="datos-big" name="grupo" id="grupo"
                                        value="{{ $request->empresa_1 }}">
                                </small>
                            </div>
                        </th>
                    </tr>
                    <tr>
                        <th colspan="2">
                            <div>
                                <small>
                                    <div class="text-center">Puesto</div>
                                    <input type="text" class="datos-big" name="asesor" id="asesor"
                                        value="{{ $request->empresa_2 }}">
                                </small>
                            </div>
                        </th>
                    </tr>
                </table>
                <div class="panel">Datos Proyecto:</div>
                <table class="table table-borderless">
                    <tr>
                        <th colspan="2">
                            <div>
                                <small>
                                    <div class="text-center">Nombre</div>
                                    <input type="text" class="datos-big" name="nombre" id="nombre"
                                        value="{{ $request->proyecto_0 }}">
                                </small>
                            </div>
                        </th>
                    </tr>
                    <tr>
                        <th colspan="2">
                            <div>
                                <small>
                                    <div class="text-center">Asesor Empresarial</div>
                                    <input type="text" class="datos-big" name="grupo" id="grupo"
                                        value="{{ $request->proyecto_1 }}">
                                </small>
                            </div>
                        </th>
                    </tr>
                </table>
            </div>
            <small>
                <div>
                    <table class="table text-center">
                        <tr class="border border-dark">
                            <td class="border border-dark">Nombre de competencia</td>
                            <td class="border border-dark" colspan="2">Duración</td>
                            <td class="border border-dark">Descripción de competencia</td>
                        </tr>
                        <tr class="border border-dark">
                            <td class="border border-dark"></td>
                            <td class="border border-dark">semanas</td>
                            <td class="border border-dark">horas</td>
                            <td class="border border-dark"></td>
                        </tr>
                        <tr class="border border-dark">
                            <td class="border border-dark"><textarea class="datos-big">{{ $request->compS_1_0 }}</textarea></td>
                            <td class="border border-dark">
                                <div>
                                    {{ $request->dateS_1_0 }}
                                </div>
                                <div>
                                    {{ $request->dateS_1_1 }}
                                </div>
                            </td>
                            <td class="border border-dark">{{ $request->dateS_1_2 }}</td>
                            <td class="border border-dark"><textarea class="datos-big">{{ $request->compS_1_1 }}</textarea></td>
                        </tr>
                        <tr class="border border-dark">
                            <td class="border border-dark"><textarea></textarea></td>
                            <td class="border border-dark"><textarea></textarea></td>
                            <td class="border border-dark"><textarea></textarea></td>
                            <td class="border border-dark"><textarea></textarea></td>
                        </tr>
                        <tr class="border border-dark">
                            <td class="border border-dark"><textarea></textarea></td>
                            <td class="border border-dark"><textarea></textarea></td>
                            <td class="border border-dark"><textarea></textarea></td>
                            <td class="border border-dark"><textarea></textarea></td>
                        </tr>
                        <tr class="border border-dark">
                            <td class="border border-dark"><textarea></textarea></td>
                            <td class="border border-dark"><textarea></textarea></td>
                            <td class="border border-dark"><textarea></textarea></td>
                            <td class="border border-dark"><textarea></textarea></td>
                        </tr>
                        <tr class="border border-dark">
                            <td class="border border-dark"><textarea></textarea></td>
                            <td class="border border-dark"><textarea></textarea></td>
                            <td class="border border-dark"><textarea></textarea></td>
                            <td class="border border-dark"><textarea></textarea></td>
                        </tr>
                        <tr class="border border-dark">
                            <td class="border border-dark"><textarea></textarea></td>
                            <td class="border border-dark"><textarea></textarea></td>
                            <td class="border border-dark"><textarea></textarea></td>
                            <td class="border border-dark"><textarea></textarea></td>
                        </tr>
                        <tr class="border border-dark">
                            <td class="border border-dark"><textarea></textarea></td>
                            <td class="border border-dark"><textarea></textarea></td>
                            <td class="border border-dark"><textarea></textarea></td>
                            <td class="border border-dark"><textarea></textarea></td>
                        </tr>
                        <tr class="border border-dark">
                            <td class="border border-dark"><textarea></textarea></td>
                            <td class="border border-dark"><textarea></textarea></td>
                            <td class="border border-dark"><textarea></textarea></td>
                            <td class="border border-dark"><textarea></textarea></td>
                        </tr>
                        <tr class="border border-dark">
                            <td class="border border-dark"><textarea></textarea></td>
                            <td class="border border-dark"><textarea></textarea></td>
                            <td class="border border-dark"><textarea></textarea></td>
                            <td class="border border-dark"><textarea></textarea></td>
                        </tr>
                        <tr class="border border-dark">
                            <td class="border border-dark"><textarea></textarea></td>
                            <td class="border border-dark"><textarea></textarea></td>
                            <td class="border border-dark"><textarea></textarea></td>
                            <td class="border border-dark"><textarea></textarea></td>
                        </tr>
                        <tr class="border border-dark">
                            <td class="border border-dark"><textarea></textarea></td>
                            <td class="border border-dark"><textarea></textarea></td>
                            <td class="border border-dark"><textarea></textarea></td>
                            <td class="border border-dark"><textarea></textarea></td>
                        </tr>
                        <tr class="border border-dark">
                            <td class="border border-dark"><textarea></textarea></td>
                            <td class="border border-dark"><textarea></textarea></td>
                            <td class="border border-dark"><textarea></textarea></td>
                            <td class="border border-dark"><textarea></textarea></td>
                        </tr>
                        <tr class="border border-dark">
                            <td class="border border-dark"><textarea></textarea></td>
                            <td class="border border-dark"><textarea></textarea></td>
                            <td class="border border-dark"><textarea></textarea></td>
                            <td class="border border-dark"><textarea></textarea></td>
                        </tr>
                        <tr class="border border-dark">
                            <td class="border border-dark"><textarea></textarea></td>
                            <td class="border border-dark"><textarea></textarea></td>
                            <td class="border border-dark"><textarea></textarea></td>
                            <td class="border border-dark"><textarea></textarea></td>
                        </tr>
                    </table>
                </div>
            </small>
            <small>
                <div class="adicionales">
                    <table class="table text-center">
                        <tr>
                            <td class="border border-dark">Aprendizajes esperados</td>
                            <td class="border border-dark">Evidencias</td>
                            <td class="border border-dark">Instrumentos de evaluación</td>
                            <td class="border border-dark">Materias</td>
                        </tr>
                        <tr>
                            <td class="border border-dark"><textarea></textarea></td>
                            <td class="border border-dark"><textarea></textarea></td>
                            <td class="border border-dark"><textarea></textarea></td>
                            <td class="border border-dark"><textarea></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="2" class="border border-dark">Extra</td>
                            <td colspan="2" class="border border-dark">Extra 2</td>
                        </tr>
                        <tr>
                            <td colspan="2" class="border border-dark"><textarea></textarea></td>
                            <td colspan="2" class="border border-dark"><textarea></textarea></td>
                        </tr>
                    </table>
                </div>
            </small>
        </small>
    </main>
</body>

</html>
