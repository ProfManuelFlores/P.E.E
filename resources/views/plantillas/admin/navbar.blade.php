<nav class="navbar__Admin">
    <div class="navbar_content_admin">
        <div class="navbar__Admin__holder">
            <img src="{{ asset('assets/images/logosinfondo.png') }}" alt="Logo Universidad Politecnica De Quintana Roo">
        </div>
        <button data-collapse-toggle="navbar-dropdown" type="button" class="navbar_Admin_button"
            aria-controls="navbar-dropdown" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M1 1h15M1 7h15M1 13h15" />
            </svg>
        </button>
        <div class="navbar_content_links" id="navbar-dropdown">
            <ul class="navbar_content_links_normal">
                <li class="navbar_content_links_contents">
                    <a href="#">Inicio</a>
                </li>
                <li class="navbar_content_links_contents">
                    <a href="#">Registros</a>
                </li>
                <li class="navbar_content_links_contents">
                    <a href="#">Usuarios</a>
                </li>
                <li>
                    <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar"
                        class="navbar_dropwdown">Registros
                        <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg>
                    </button>
                    <div id="dropdownNavbar" class="navbar_content_dropdown">
                        <ul class="text-sm text-gray-700 dark:text-gray-400" aria-labelledby="dropdownLargeButton">
                            <li>
                                <a href="">Estancias I</a>
                            </li>
                            <li>
                                <a href="">Estancias II</a>
                            </li>
                            <li>
                                <a href="">Estadias</a>
                            </li>
                            <li>
                                <a href="">Estadias Nacionales</a>
                            </li>
                            <li>
                                <a href="">Servicio Social</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="navbar_content_links_contents">
                    <a href="#">Cerrar Sesion</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
