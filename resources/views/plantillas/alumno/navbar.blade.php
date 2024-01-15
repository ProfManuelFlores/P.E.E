<nav class="navbar__Admin">
    <div class="navbar_content_admin">
        <a href="#" class="flex items-center">
            <img src="{{ asset('assets/images/logosinfondo.png') }}" class="mr-1 md:h-20 h-14" alt="Upqroo Logo" />
        </a>
        <button data-collapse-toggle="navbar-default" type="button" class="navbar_Admin_button"
            aria-controls="navbar-default" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M1 1h15M1 7h15M1 13h15" />
            </svg>
        </button>
        <div class="hidden w-full md:block md:w-auto" id="navbar-default">
            <ul class="navbar_content_links_contents">
                <li>
                    <a href="{{route('alumno')}}" class="navbar_content_links_pages">Inicio</a>
                </li>
                <li>
                    <a href="{{route('EnterpriseManagement')}}" class="navbar_content_links_pages">Empresas</a>
                </li>
                <li>
                    <a href="{{route('perfil')}}" class="navbar_content_links_pages">Perfil</a>
                </li>
                <li>
                    <a class="navbar_content_links_pages" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                        {{ __('Cerrar Sesión') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>
@include('sweetalert::alert')