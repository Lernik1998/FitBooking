@vite('resources/css/app.css')

<nav class="flex flex-row p-4 text-white bg-gray-500">
    <div class="container flex justify-between items-center mx-auto">
        <!-- Logo o Nombre del sitio -->
        <!-- <a class="navbar-brand" href="{{ route('index') }}">FitWorking</a> -->

        <!-- Logo o Nombre del sitio -->
        <!-- <a class="navbar-brand" href="{{ route('index') }}">FitWorking</a> -->

        <!-- Botón para menú en móviles -->
        <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button> -->

        <!-- Menú -->
        <div class="flex flex-row">
            <ul class="flex flex-row gap-x-6">
                <li class="mr-6">
                    <a class="nav-link hover:text-blue-900" href="{{ route('index') }}">Inicio</a>
                </li>
                <li class="mr-6">
                    <a class="nav-link hover:text-blue-900" href="{{ route('activities.index') }}">Actividades</a>
                </li>
                <li class="mr-6">
                    <a class="nav-link hover:text-blue-900" href="{{ route('plans.index') }}">Planes</a>
                </li>

                <li>
                    {{--<a class="nav-link hover:text-blue-900"
                        href="{{ route('notifications.index') }}">Notificaciones</a>--}}
                </li>
            </ul>
        </div>

        <!-- Links de Autenticación -->
        <ul class="flex flex-row">
            @guest
                <li class="mr-6">
                    <a class="nav-link hover:text-gray-300" href="{{ route('login') }}">Iniciar sesión</a>
                </li>
                <li class="mr-6">
                    <a class="nav-link hover:text-gray-300" href="{{ route('register') }}">Registro</a>
                </li>
            @else
                <li class="relative">
                    <a class="nav-link hover:text-gray-300 dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        aria-expanded="false">
                        {{ Auth::user()->name }}
                    </a>
                    <ul class="hidden absolute right-0 mt-2 text-white bg-gray-800 rounded shadow-lg">
                        @if(Auth::user()->role === 'admin')
                            {{-- <li><a class="dropdown-item" href="{{ route('admin.dashboard') }}">Admin</a></li>--}}
                        @endif
                        <li>
                            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="block px-4 py-2 text-sm hover:bg-gray-700">Logout</button>
                            </form>
                        </li>
                    </ul>
                </li>
            @endguest
        </ul>
    </div>
</nav>