<!-- Main modal -->
<div id="default-modal" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Registrarse en el proceso
                </h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="default-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5 space-y-4">
                <form action="{{ route('SingupPeriod', $proceso->IdProcess) }}" method="POST">
                    @csrf
                    <div class="mb-6">
                        <label for="enterprise">Empresa de proceso</label>
                        <select name="enterprise" id="enterprise"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                            @foreach ($enterprise as $e)
                                <option value="{{$e->Rcf}}">{{$e->Name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-6">
                        <label for="enterpriseadviser">Asesor Empresarial</label>
                        <select name="enterpriseadviser" id="enterpriseadviser"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                            @foreach ($enterpriseadvisers as $es)
                                <option value="{{$es->IdEnterpriseAdviser}}">{{$es->user}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-6">
                        <label for="academicadviser">Asesor Académico</label>
                        <select name="academicadviser" id="academicadviser"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                            @foreach ($academicadvisers as $as)
                                <option value="{{$as->IdAcademicAdvisor}}">{{$as->user}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="flex justify-center mb-6">
                        <button class="button"> Registrarse en el proceso </button>
                    </div>
                </form>
            </div>
            <!-- Modal footer -->
            <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">

            </div>
        </div>
    </div>
</div>
