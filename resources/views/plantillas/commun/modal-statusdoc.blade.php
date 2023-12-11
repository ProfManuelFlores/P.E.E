
<!-- Main modal -->
<div id="authentication-modalstatus{{$index}}" tabindex="-1" aria-hidden="true"
    class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button"
                class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                data-modal-hide="authentication-modalstatus{{$index}}">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="px-6 py-6 lg:px-8 text-center">
                <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Estados del documento</h3>
                @foreach ($DocumentosAlumno as $index => $doc)
                    @if ($doc->IdTypeDoc == $formato->IdTypeDoc)
                        @foreach ($statusDoc as $status)
                            @if ($doc->IdStatusDoc == $status->IdStatus)
                                <p class="py-10">Estado de documento por administrador</p>
                                <button class="button-{{ $doc->IdStatusDoc }}"
                                    disabled>{{ $status->Desc_Status }}</button>
                            @endif
                            @if ($doc->IdStatusDocAcademic == $status->IdStatus)
                                <p class="py-10">Estado de documento por asesor académico</p>
                            <button class="button-{{ $doc->IdStatusDocAcademic }}"
                                disabled>{{ $status->Desc_Status }}</button>
                            @endif
                            @if ($doc->IdStatusDocEnterprise == $status->IdStatus)
                                <p class="py-10">Estado de documento por asesor empresarial</p>
                            <button class="button-{{ $doc->IdStatusDocEnterprise }}"
                                disabled>{{ $status->Desc_Status }}</button>
                            @endif
                        @endforeach
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</div>
