
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <!-- Logo tipo de sitio -->

    @vite('resources/css/app.css')

    <div class="bg-gray-100 dark:bg-gray-600 h-screen flex flex-col justify-center">
        <img src="{{ asset('images/ownimgs/logo.png') }}" alt="Logo FitBooking" width="100" height="100"
            class="mx-auto rounded-full">
        <form method="POST" action="{{ route('login') }}"
            class="w-full sm:w-1/2 md:w-1/3 xl:w-1/4 mx-auto bg-white dark:bg-gray-700 shadow-md rounded px-8 pt-6 pb-8 mb-4">
            @csrf

            <!-- Email Address -->
            <div class="mb-4">
                <x-input-label for="email" :value="__('Correo electronico')"
                    class="block text-gray-700 text-sm font-bold mb-2" />
                <x-text-input id="email"
                    class="block w-full px-3 py-2 text-gray-700 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                    type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500 text-xs" />
            </div>

            <!-- Password -->
            <div class="mb-4">
                <x-input-label for="password" :value="__('Contraseña')"
                    class="block text-gray-700 text-sm font-bold mb-2" />

                <x-text-input id="password"
                    class="block w-full px-3 py-2 text-gray-700 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                    type="password" name="password" required autocomplete="current-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500 text-xs" />
            </div>

            <!-- Remember Me -->
            <div class="flex items-center justify-between">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox"
                        class="text-indigo-600 rounded border-gray-300 shadow-sm focus:ring-indigo-500" name="remember">
                    <span class="text-sm text-gray-300 ms-2">{{ __('Recordarme') }}</span>
                </label>

                @if (Route::has('password.request'))
                    <a class="text-sm text-gray-300 underline hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                        href="{{ route('password.request') }}">
                        {{ __('¿Olvidaste tu contraseña?') }}
                    </a>
                @endif
            </div>

            <div class="flex items-center justify-center mt-4">
                <x-primary-button class="w-full">
                    {{ __('Acceder') }}
                </x-primary-button>
            </div>
        </form>
    </div>