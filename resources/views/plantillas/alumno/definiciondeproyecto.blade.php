<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Definicion de proyecto</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    @include('plantillas.alumno.navbar')
    <header>
        <div class="text-center py-10">
            <h1 class="title">Universidad Politecnica de Quintana Roo</h1>
            <h1 class="title">Direccion de vinculacion, difusion y extension universitaria</h1>
            <h1 class="title">Definicion de documento</h1>
            <form id="project-form" method="POST" action="{{ route('generatepdfdef') }}">
                <div class="columns-2 py-4">
                    <h3>PROCESO: {{ $periodos->Desc_Process }}</h3>
                    <h3>FECHA Y LUGAR: {{  $lugar }} A {{ $fecha }}</h3>
                </div>
                @csrf
                <div class="form_general">
                    <div class="grid grid-cols-1 gap-y-4">
                        @foreach (['Alumno' => ['Nombre Alumno', 'Grupo', 'Asesor Academico'], 'Empresa' => ['Nombre Empresa', 'Asesor Empresarial', 'Puesto'], 'Proyecto' => ['Nombre del proyecto', 'Objetivo del proyecto']] as $section => $fields)
                            <div class="border1 rounded-md shadow-sm">
                                <div class="flex items-center justify-between px-4 py-2 bg-gray-200 cursor-pointer" onclick="toggleCollapse(this)">
                                    <h3 class="text-lg font-semibold">{{ $section }}</h3>
                                    <span class="text-lg font-semibold">+</span>
                                </div>
                                <div class="p-4 space-y-2 hidden">
                                    @foreach ($fields as $index => $field)
                                        <div>
                                            <label class="text-sm font-medium" for="{{ strtolower($section) }}_{{ $index }}">{{ $field }}</label>
                                            <input type="text" id="{{ strtolower($section) }}_{{ $index }}" name="{{ strtolower($section) }}_{{ $index }}" class="block w-full mt-1 text-sm border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="py-4">
                        <button id="add-project-info" type="button" class="mt-4 px-4 py-2 bg-blue-500 text-white rounded-md">Agregar Información del Proyecto</button>
                    </div>
                    <div id="project-info-container" class="grid grid-cols-1 gap-y-4">
                        <div class="border1 rounded-md shadow-sm" id="etapa-1">
                            <div class="flex items-center justify-between px-4 py-2 bg-gray-200 cursor-pointer" onclick="toggleCollapse(this)">
                                <h3 class="text-lg font-semibold">Etapa 1</h3>
                                <span class="text-lg font-semibold">+</span>
                            </div>
                            <div class="p-4 space-y-4 hidden">
                                <div>
                                    <div class="flex items-center justify-between px-4 py-2 bg-gray-100">
                                        <h4 class="text-md font-semibold">Duración</h4>
                                    </div>
                                    <div class="p-4 space-y-2">
                                        @foreach(['Fecha de inicio', 'Fecha de fin', 'Horas'] as $index => $field)
                                            <div>
                                                <label class="text-sm font-medium" for="dateS_1_{{ $index }}">{{ $field }}</label>
                                                <input type="{{ $field === 'Horas' ? 'number' : 'date' }}" id="dateS_1_{{ $index }}" name="dateS_1_{{ $index }}" class="block w-full mt-1 text-sm border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div>
                                    <div class="flex items-center justify-between px-4 py-2 bg-gray-100">
                                        <h4 class="text-md font-semibold">Descripción de Competencias</h4>
                                    </div>
                                    <div class="p-4 space-y-2">
                                        @foreach(['Nombre de la etapa', 'Competencia'] as $index => $field)
                                            <div>
                                                <label class="text-sm font-medium" for="compS_1_{{ $index }}">{{ $field }}</label>
                                                @if($field === 'Competencia')
                                                    <textarea id="compS_1_{{ $index }}" name="compS_1_{{ $index }}" class="block w-full h-24 mt-1 text-sm border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"></textarea>
                                                @else
                                                    <input type="text" id="compS_1_{{ $index }}" name="compS_1_{{ $index }}" class="block w-full mt-1 text-sm border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
                                                @endif
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="py-4"></div>
                    <div id="additional-info" class="grid grid-cols-1 gap-y-4">
                        @foreach (['Actividades de Aprendizaje', 'Resultados de Aprendizaje', 'Evidencias', 'Instrumentos de Evaluación', 'Asignaturas', 'Topicos Recomendados', 'Estrategias Didacticas'] as $index => $field)
                            <div class="border1 rounded-md shadow-sm">
                                <div class="flex items-center justify-between px-4 py-2 bg-gray-200 cursor-pointer" onclick="toggleCollapse(this)">
                                    <h3 class="text-lg font-semibold">{{ $field }}</h3>
                                    <span class="text-lg font-semibold">+</span>
                                </div>
                                <div class="p-4 space-y-4 hidden">
                                    <label class="text-sm font-medium" for="info_{{ $index }}">{{ $field }}</label>
                                    <textarea id="info-{{ $index }}" name="info_{{ $index }}" class="block w-full h-24 mt-1 text-sm border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"></textarea>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="py-4">
                        <button type="submit" class="mt-4 px-4 py-2 bg-green-500 text-white rounded-md">Enviar</button>
                    </div>
                </div>
            </form>
        </div>
    </header>
    <section>

    </section>
    <footer>

    </footer>
</body>
<script>
    let projectCount = 1;
    let fieldCount = 1;

    function toggleCollapse(element) {
        const content = element.nextElementSibling;
        const icon = element.querySelector('span');
        if (content.classList.contains('hidden')) {
            content.classList.remove('hidden');
            icon.textContent = '-';
        } else {
            content.classList.add('hidden');
            icon.textContent = '+';
        }
    }

    document.getElementById('add-project-info').addEventListener('click', function(event) {
        event.preventDefault();
        if (projectCount < 15) {
            projectCount++;
            const container = document.getElementById('project-info-container');
            const newProjectInfo = container.children[0].cloneNode(true);

            newProjectInfo.querySelectorAll('input, textarea').forEach(input => {
                input.value = '';
                const oldId = input.id;
                input.id = oldId.replace(/-\d+$/, '') + '_' + fieldCount;
                input.name = oldId.replace(/-\d+$/, '') + '_' + fieldCount;
                fieldCount++;
            });

            newProjectInfo.querySelector('.hidden').classList.add('hidden'); // Hide the content
            newProjectInfo.id = `etapa-${projectCount}`;
            newProjectInfo.querySelector('h3').textContent = `Etapa ${projectCount}`;
            container.appendChild(newProjectInfo);
        } else {
            alert('No puedes agregar más de 15 secciones de Información del Proyecto.');
        }
    });
</script>
</html>
