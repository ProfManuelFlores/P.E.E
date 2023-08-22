<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/EstiloLogin.css') }}">
    <title>Log In</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <header>

    </header>
    <section>
        <div class="flex items-center">
            <div>
                <img src="{{ asset('assets/images/logosinfondo.png') }}"
                    alt="Logo Universidad Politecnica De Quintana Roo" class="hidden lg:block">
            </div>
            <div
                class="w-full max-w-sm p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
                <form class="space-y-6" method="POST" action="{{ route('login') }}">
                    @csrf
                    <h5 class="text-xl font-medium text-gray-900 dark:text-white">Bienvenido</h5>
                    <div>
                        <label for="Matricula"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Matrícula</label>
                        <input type="text" name="name" id="name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            placeholder="tu matricula" required>
                    </div>
                    <div>
                        <label for="password"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Contraseña</label>
                        <input type="password" name="password" id="password" placeholder="••••••••"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            required>
                    </div>
                    <div class="flex items-start">
                        <div class="flex items-start">
                            <div class="flex items-center h-5">

                            </div>
                        </div>
                        <a href="#" data-modal-target="defaultModal" data-modal-toggle="defaultModal"
                            class="ml-auto text-sm text-red-900 hover:underline dark:text-red-700">Olvidastes tu contraseña?</a>
                    </div>
                    <button type="submit"
                        class="w-full text-white bg-red-900 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Iniciar Sesión</button>
                    <div class="text-sm font-medium text-gray-500 dark:text-gray-300">
                        No Registrado? <a href="#" class="text-red-900 hover:underline dark:text-red-700" data-modal-target="defaultModal" data-modal-toggle="defaultModal">
                            Obtener Acceso</a>
                    </div>
                </form>
            </div>
        </div>
    </section>
    @include('plantillas.commun.modals')
</body>

</html>
