@extends('base')

@section('Title', 'Gestión de usuarios Admin')

@section('CSS')

    @vite('resources/css/app.css')

@endsection

@section('Header') {{--Este es el header --}}
    <div class="bg-gray-900 text-white p-4 shadow-md flex justify-between items-center">
        <h1 class="text-3xl font-bold ml-64">Gestión de usuarios</h1>
        @include('admin.navbarAdmin') <!-- Incluir el navbar -->
    </div>
@endsection

@section('Content') {{--Aqui irá el body--}}

    <div class="ml-72 mr-6">

        <button
            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full shadow-lg transition duration-300 ease-in-out mt-10 mb-4">
            <!-- Crear usuarios -->
            <a href="{{ route('customer.create') }}">Crear cliente</a>
        </button>

        <!-- Muestro mensaje de exito -->
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative text-center mt-4 mb-4"
                role="alert">
                <strong class="font-bold">Exito!</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        <!-- Pongo los usuarios en una tabla -->
        <section class="mt-10 mb-10 bg-white rounded shadow-md ">

            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                Nombre</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                Email</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                Rol</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                Estado</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                Fecha creación del usuario</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($users as $user)
                                                <tr>
                                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $user->name }}</td>
                                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $user->email }}</td>
                                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $user->role }}</td>
                                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">@if ($user->is_active)
                                                        <span
                                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Conectado</span>
                                                    @else
                                                        <span
                                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">Desconectado</span>
                                                    @endif</
                             td>
                                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $user->created_at }}</td>
                                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                                        <a href="{{ route('customer.edit', $user->id)}}"
                                                            class="text-indigo-600 hover:text-indigo-900 inline-block">Editar</a>
                                                        <form action="{{ route('customer.destroy', $user->id) }}" method="POST" class="inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="text-red-600 hover:text-red-900">Eliminar</button>
                                                        </form>
                                                    </td>
                                                </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-center">No hay
                                    usuarios</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </section>
    </div>
@endsection