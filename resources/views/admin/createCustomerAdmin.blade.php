@extends('base')

@section('Title', 'Crear cliente de Admin') 

@section('CSS')

    @vite('resources/css/app.css')

@endsection

@section('Header') {{--Este es el header --}}
    <div class="bg-gray-900 text-white p-4 shadow-md flex justify-between items-center ml-64">
        <h1 class="text-3xl font-bold">Crear cliente</h1>
    </div>
@endsection

@section('Content') {{--Aqui irá el body--}}
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 ml-64">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">

                @include('admin.navbarAdmin') <!-- Incluir el navbar -->

                <form method="POST" action="{{ route('customer.store') }}">
                    @csrf

                    <!-- Nombre -->
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                            Nombre
                        </label>
                        <input
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            name="name" type="text" value="{{ old('name') }}" required />
                    </div>

                    <!-- Email -->
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                            Correo electrónico
                        </label>
                        <input
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            name="email" type="email" value="{{ old('email') }}" required />
                    </div>

                    <!-- Password -->
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                            Contraseña
                        </label>
                        <input
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            name="password" type="password" required />
                    </div>

                    <!-- Rol -->
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="role">
                            Rol
                        </label>
                        <select
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            name="role" required>
                            <option value="user">Cliente</option>
                            <option value="admin">Administrador</option>
                        </select>
                    </div>

                    <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                        Crear
                    </button>
                </form>


                <!-- Botón para volver atrás -->
                <a href="{{ route('admin.usuariosAdmin') }}"
                    class="inline-block px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Volver</a>
            </div>
        </div>
    </div>
@endsection