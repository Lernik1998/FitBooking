{{--@vite('resources/css/app.css')--}}
<nav class="flex flex-row p-4 text-white bg-gray-800">
    <div class="container flex justify-between items-center mx-auto">
        <div class="flex flex-row space-x-6">
            <ul class="flex flex-row space-x-6">
                <li>
                    <a class="nav-link hover:text-gray-300" href="{{ route('customer.index') }}">Inicio</a>
                </li>
                <li>
                    <a class="nav-link hover:text-gray-300" href="{{ route('activities.index') }}">Actividades</a>
                </li>
                <li>
                    <a class="nav-link hover:text-gray-300" href="{{ route('plans.index') }}">Planes</a>
                </li>
                <li class="text-ligth">
                    {{-- <a class="nav-link" href="{{ route('reservas') }}">Reservas</a>--}}
                </li>
                <li class="text-ligth">
                    {{--<a class="nav-link" href="{{ route('contacto') }}">Contacto</a>--}}
                </li>
            </ul>
        </div>

        <div class="flex flex-row space-x-6">
            <ul class="flex flex-row space-x-6">
                <li>
                    <a class="nav-link hover:text-gray-300" href="{{ route('profile.edit') }}">Perfil</a>
                    {{--
                    <x-responsive-nav-link :href="route('profile.edit')">
                        {{ __('Profile') }}
                    </x-responsive-nav-link>--}}
                </li>
                <li>
                    <form action="{{ route('logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="dropdown-item">Cerrar sesión</button>
                    </form>

                </li>
            </ul>
        </div>
    </div>

    <!-- Settings Dropdown -->
    <!-- <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 text-sm font-medium leading-4 text-gray-500 bg-white rounded-md border border-transparent transition duration-150 ease-in-out hover:text-gray-700 focus:outline-none">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ms-1">
                                <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot> -->

    <!-- <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link> -->

    <!-- Authentication -->
    <form method="POST" action="{{ route('logout') }}">
        @csrf

        <!-- <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link> -->
    </form>
    </x-slot>
    </x-dropdown>
    </div>
    </div>
    </div>
    </div>
    </div>
</nav>