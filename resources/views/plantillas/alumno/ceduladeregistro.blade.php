<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> cedula de registro</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <header>
        <div class="text-center py-10">
            <h1 class="title">Universidad Politecnica de Quintana Roo</h1>
            <h1 class="title">Direccion de vinculacion, difusion y extension universitaria</h1>
            <h1 class="title">cedula de registro</h1>
        </div>
    </header>
    <section class="p-2 md:p-10">
        <form action="{{ route('pdfgenerateced') }}" method="POST">
            <div class="form_general">
                @csrf
                <div>
                    <div class="bg-primary-color py-2 md:py-5">
                        <p class="text-white p-2 subtitle">Datos de alumno/a</p>
                    </div>
                    <div class="text-center py-2 grid grid-cols-1 md:gap-4 md:grid-cols-4 md:py-5">
                        <div class="grid grid-cols-1">
                            <input type="text" name="apepalumno" id="apepalumno" class="inputs_line">
                            <label for="" class="label_line">Apellido paterno</label>
                        </div>
                        <div class="grid grid-cols-1">
                            <input type="text" name="apemalumno" id="apemalumno" class="inputs_line">
                            <label for="" class="label_line">Apellido materno</label>
                        </div>
                        <div class="grid grid-cols-1">
                            <input type="text" name="nombrealumno" id="nombrealumno" class="inputs_line"
                                value="{{ $datauser->First_name }}">
                            <label for="" class="label_line">Nombres</label>
                        </div>
                        <div class="grid grid-cols-1">
                            <input type="number" name="numerotelalumno" id="numerotelalumno" class="inputs_line">
                            <label for="" class="label_line">Numero de telefono</label>
                        </div>
                        <div class="grid grid-cols-1">
                            <input type="number" name="matricula" id="matricula" class="inputs_line"
                                value="{{ $datastudent->Tuition }}">
                            <label for="" class="label_line">Matricula</label>
                        </div>
                        <div class="grid grid-cols-1">
                            <select name="Carreraalumno" id="Carreraalumno">
                                @foreach ($carriers as $c)
                                    <option value="{{ $c->Desc_Carrier }}"
                                        {{ $c->IdCarrier == $datastudent->IdCarrier ? 'selected' : '' }}>
                                        {{ $c->Desc_Carrier }}</option>
                                @endforeach
                            </select>
                            <label for="" class="label_line">Carrera</label>
                        </div>
                        <div class="grid grid-cols-1">
                            <input type="email" name="emailalumno" id="emailalumno" class="inputs_line">
                            <label for="" class="label_line">Email (personal)</label>
                        </div>
                        <div class="grid grid-cols-1">
                            <input type="email" name="emailacademicoalumno" id="emailacademicoalumno"
                                class="inputs_line" value="{{ $datauser->email }}">
                            <label for="" class="label_line">Email (Institucional)</label>
                        </div>
                        <div class="grid grid-cols-1">
                            <input type="number" name="segurosocial" id="segurosocial" class="inputs_line">
                            <label for="" class="label_line">No.SS</label>
                        </div>
                        <div class="grid grid-cols-1 md:col-span-3">
                            <input type="text" name="direccionalumno" id="direccionalumno" class="inputs_line">
                            <label for="" class="label_line">Direccion</label>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="bg-primary-color py-2 md:py-5">
                        <p class="text-white p-5 subtitle">Datos de la empresa</p>
                    </div>
                    <div class="text-center py-2 grid grid-cols-1 md:gap-4 md:grid-cols-4 md:py-5">
                        <div class="grid grid-cols-1 md:col-span-2">
                            <input type="text" name="NombreEmpresa" id="NombreEmpresa">
                            <label for="">Nombre</label>
                        </div>
                        <div class="grid grid-cols-1">
                            <input type="text" name="tipoempresa" id="tipoempresa">
                            <label for="">Giro</label>
                        </div>
                        <div class="grid grid-cols-1">
                            <select name="tamañoempresa" id="tamañoempresa">
                                @foreach ($Size as $s)
                                    <option value="{{$s->Desc_size}}" {{ $s->IdSize == $dataenterprise->IdSize ? 'selected' : '' }}>{{$s->Desc_size}}</option>
                                @endforeach
                                <label for="">Tamaño</label>
                            </select>
                        </div>
                        <div class="grid grid-cols-1 md:col-span-4">
                            <input type="text" name="direccionempresa" id="direccionempresa">
                            <label for="">Direccion</label>
                        </div>
                        <div class="grid grid-cols-1">
                            <p class="subtitle py-4">Responsable de RRHH</p>
                        </div>
                        <div class="grid grid-cols-1">
                            <input type="text" name="apepHR" id="apepHR">
                            <label for="">Apellido paterno</label>
                        </div>
                        <div class="grid grid-cols-1">
                            <input type="text" name="apemHR" id="apemHR">
                            <label for="">Apellido materno</label>
                        </div>
                        <div class="grid grid-cols-1">
                            <input type="text" name="nombreHR" id="nombreHR">
                            <label for="">Nombre</label>
                        </div>
                        <div class="grid grid-cols-1">
                            <br>
                        </div>
                        <div class="grid grid-cols-1">
                            <input type="number" name="numeroHR" id="numeroHR" class="inputs_line">
                            <label for="" class="label_line">Telefono</label>
                        </div>
                        <div class="grid grid-cols-1">
                            <input type="number" name="EXTHR" id="EXTHR" class="inputs_line">
                            <label for="" class="label_line">Ext</label>
                        </div>
                        <div class="grid grid-cols-1">
                            <input type="email" name="emailHR" id="emailHR" class="inputs_line">
                            <label for="" class="label_line">E-mail</label>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="bg-primary-color py-2 md:py-5">
                        <p class="text-white p-2 subtitle">Datos del Asesor Empresarial</p>
                    </div>
                    <div class="text-center py-2 grid grid-cols-1 md:gap-4 md:grid-cols-4 md:py-5">
                        <div class="grid grid-cols-1">
                            <input type="text" name="apepEmp" id="apepEmp" class="inputs_line">
                            <label for="" class="label_line">Apellido paterno</label>
                        </div>
                        <div class="grid grid-cols-1">
                            <input type="text" name="apemEmp" id="apemEmp" class="inputs_line">
                            <label for="" class="label_line">Apellido materno</label>
                        </div>
                        <div class="grid grid-cols-1">
                            <input type="text" name="nombreEmp" id="nombreEmp" class="inputs_line">
                            <label for="" class="label_line">Nombres</label>
                        </div>
                        <div class="grid grid-cols-1">
                            <input type="text" name="cargoEMP" id="cargoEMP">
                            <label for="" class="label_line">Cargo</label>
                        </div>
                        <div class="grid grid-cols-1">
                            <input type="email" name="emailEMP" id="emailEMP" class="inputs_line"
                                value="{{ $process->IdEnterpriseAdviser }}">
                            <label for="" class="label_line">Email</label>
                        </div>
                        <div class="grid grid-cols-1">
                            <input type="number" name="numeroEMP" id="numeroEMP" class="inputs_line">
                            <label for="" class="label_line">Telefono</label>
                        </div>
                        <div class="grid grid-cols-1 md:col-span-2">
                            <input type="text" name="" id="" class="inputs_line" readonly>
                            <label for="" class="label_line">Firma</label>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="bg-primary-color py-2 md:py-5">
                        <p class="text-white p-2 subtitle">Datos de Asesor Academico</p>
                    </div>
                    <div class="text-center py-2 grid grid-cols-1 md:gap-4 md:grid-cols-4 md:py-5">
                        <div class="grid grid-cols-1">
                            <input type="text" name="apepACA" id="apepACA" class="inputs_line">
                            <label for="" class="label_line">Apellido paterno</label>
                        </div>
                        <div class="grid grid-cols-1">
                            <input type="text" name="apemACA" id="apemACA" class="inputs_line">
                            <label for="" class="label_line">Apellido materno</label>
                        </div>
                        <div class="grid grid-cols-1">
                            <input type="text" name="nombreACA" id="nombreACA" class="inputs_line">
                            <label for="" class="label_line">Nombres</label>
                        </div>
                        <div class="grid grid-cols-1">
                            <input type="text" name="cargoACA" id="cargoACA">
                            <label for="" class="label_line">Cargo</label>
                        </div>
                        <div class="grid grid-cols-1">
                            <input type="email" name="emailACA" id="emailACA" class="inputs_line"
                                value="{{ $process->IdAcademicAdvisor }}">
                            <label for="" class="label_line">Email</label>
                        </div>
                        <div class="grid grid-cols-1">
                            <input type="number" name="numeroACA" id="numeroACA" class="inputs_line">
                            <label for="" class="label_line">Telefono</label>
                        </div>
                        <div class="grid grid-cols-1 md:col-span-2">
                            <input type="text" name="" id="" class="inputs_line" readonly>
                            <label for="" class="label_line">Firma</label>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="bg-primary-color py-2 md:py-5">
                        <p class="text-white p-2 subtitle">Datos del proyecto</p>
                    </div>
                    <div class="text-center py-2 grid grid-cols-1 md:gap-4 md:grid-cols-4 md:py-5">
                        <div class="grid grid-cols-1 md:col-span-4">
                            <input type="text" name="nombreproyecto" id="nombreproyecto" class="inputs_line">
                            <label for="" class="label_line">Nombre del proyecto</label>
                        </div>
                    </div>
                </div>
            </div>
            <button class="button">Generar PDF</button>
        </form>
    </section>
</body>

</html>
