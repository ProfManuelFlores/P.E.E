<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form PDF</title>
    <style>
        body {
            font-family: 'DejaVu Sans', sans-serif;
            font-size: 10px;
        }
        .table-form {
            width: 100%;
            border-collapse: collapse;
        }
        .table-form th, .table-form td {
            padding: 2px;
            text-align: center;
            vertical-align: middle;
            border: 1px solid #000;
        }
        .table-form textarea {
            width: 100%;
            padding: 2px;
            font-size: 8px;
            resize: none;
        }
        .table-form label {
            margin-bottom: 0;
            font-weight: bold;
        }
        .text-center {
            text-align: center;
        }
        .p-2 {
            padding: 2px;
        }
        .mx-auto {
            margin: auto;
        }
        .mt-3 {
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <main>
        <p class="text-center"><b>Universidad Politécnica de Quintana Roo</b><br>Dirección de Vinculación, Difusión y Extensión Universitaria</p>
        <div>
            <div class="d-flex justify-content-between p-2">
                <div>
                    Estancia placeholder
                </div>
                <div>
                    Fecha y hora placeholder
                </div>
            </div>
            <table class="table-form mx-auto">
                <thead>
                    <tr>
                        <th colspan="2">Datos del Alumno</th>
                        <th colspan="2">Datos de Empresa</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><label for="nombreAlumno">Nombre:</label></td>
                        <td><textarea id="nombreAlumno" rows="2"></textarea></td>
                        <td><label for="nombreEmpresa">Nombre:</label></td>
                        <td><textarea id="nombreEmpresa" rows="2"></textarea></td>
                    </tr>
                    <tr>
                        <td><label for="grupo">Grupo:</label></td>
                        <td><textarea id="grupo" rows="2"></textarea></td>
                        <td><label for="asesorEmpresa">Asesor:</label></td>
                        <td><textarea id="asesorEmpresa" rows="2"></textarea></td>
                    </tr>
                    <tr>
                        <td><label for="asesorAcademico">Asesor:</label></td>
                        <td><textarea id="asesorAcademico" rows="2"></textarea></td>
                        <td><label for="puesto">Puesto:</label></td>
                        <td><textarea id="puesto" rows="2"></textarea></td>
                    </tr>
                </tbody>
            </table>
            <table class="table-form mx-auto mt-3">
                <thead>
                    <tr>
                        <th colspan="4">Datos de Proyecto</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="2"><label for="nombreProyecto">Nombre:</label></td>
                        <td colspan="2"><textarea id="nombreProyecto" rows="2"></textarea></td>
                    </tr>
                    <tr>
                        <td colspan="2"><label for="objetivoProyecto">Objetivo:</label></td>
                        <td colspan="2"><textarea id="objetivoProyecto" rows="2"></textarea></td>
                    </tr>
                </tbody>
            </table>
            <table class="table-form mx-auto mt-3">
                <thead>
                    <tr>
                        <th>Descripción de etapas del proyecto</th>
                        <th>Tiempo de duración de etapa</th>
                        <th colspan="2">Descripción de la competencia</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td rowspan="4"><textarea rows="4" placeholder="Input 1"></textarea></td>
                        <td colspan="2"><label for="semanas">Semanas</label></td>
                        <td rowspan="4"><textarea rows="4" placeholder="Input 4"></textarea></td>
                    </tr>
                    <tr>
                        <td colspan="2"><label for="horas">Horas</label></td>
                    </tr>
                    <tr>
                        <td><textarea id="semanas" rows="2" placeholder="Semanas"></textarea></td>
                        <td><textarea id="horas" rows="2" placeholder="Horas"></textarea></td>
                    </tr>
                    <tr>
                        <td colspan="2"></td> <!-- Empty row for spacing -->
                    </tr>
                </tbody>
            </table>
        </div>
    </main>
</body>
</html>
