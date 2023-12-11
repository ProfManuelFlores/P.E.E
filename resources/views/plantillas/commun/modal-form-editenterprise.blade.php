<!-- Main modal -->
<div id="authentication-modal{{ $index }}" tabindex="-1" aria-hidden="true"
    class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button"
                class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                data-modal-hide="authentication-modal{{ $index }}">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="px-6 py-6 lg:px-8">
                <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Editando empresa
                    {{ $enterprise->Name }}</h3>
                <form class="space-y-6" action="{{ route('UpdateEnterprise', $enterprise->Rcf) }}" method="POST">
                    @csrf
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            email</label>
                        <input type="email" name="Email" id="Email" value="{{ $enterprise->Email }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            placeholder="name@company.com">
                    </div>
                    <div>
                        <label for=""
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">RCF</label>
                        <input type="text" name="Rcf" id="Rcf" value="{{ $enterprise->Rcf }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                    </div>
                    <div>
                        <label for=""
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">DIRECCIÓN</label>
                        <input type="text" name="Address" id="Address" value="{{ $enterprise->Address }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                    </div>
                    <div>
                        <label for=""
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NOMBRE</label>
                        <input type="text" name="Name" id="Name" value="{{ $enterprise->Name }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                    </div>
                    <div>
                        <label for=""
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Página Web</label>
                        <input type="text" name="Webpage" id="WebPage" value="{{ $enterprise->WebPage }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                    </div>
                    <div>
                        <label for=""
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NÚMERO DE TELÉFONO</label>
                        <input type="text" name="Phone_Number" id="Phone_Number"
                            value="{{ $enterprise->Phone_Number }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                    </div>
                    <div>
                        <label for="society" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tipo
                            de empresa</label>
                        <select name="society" id="society"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                            @foreach ($society as $se)
                                <option value="{{ $se->IdTypeSociety }}"
                                    {{ $enterprise->IdSociety == $se->IdTypeSociety ? 'selected' : '' }}>
                                    {{ $se->Desc_Society }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="size"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tamaño de
                            empresa</label>
                        <select name="size" id="size"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                            @foreach ($sizes as $s)
                                <option value="{{ $s->IdSize }}"
                                    {{ $enterprise->IdSize == $s->IdSize ? 'selected' : '' }}>{{ $s->Desc_size }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    @admin()
                    <button class="button">Actualizar</button>
                    @endadmin
                </form>
            </div>
        </div>
    </div>
</div>
