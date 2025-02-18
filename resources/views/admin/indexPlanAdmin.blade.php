@extends('base')

@section('Title', 'Gestión de planes Admin')

@section('CSS')

    @vite('resources/css/app.css')

@endsection

@section('Header') {{--Este es el header --}}

    <header class="bg-gray-900 text-white p-4 shadow-md flex justify-between items-center">
        <h1 class="text-3xl font-bold ">Gestión de planes</h1>
    </header>

    @include('admin.navbarAdmin') <!-- Incluir el navbar -->
@endsection

@section('Content') {{--Aqui irá el body--}}

    <body class="ml-64">
        <div class="mb-4 mt-4 bg-white p-4 rounded shadow-md">
            <!-- Mensaje exito creación de plan -->
            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4 mt-4"
                    role="alert">
                    <strong class="font-bold">Exito!</strong>
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif
        </div>

        <!-- Para crear un plan -->
        <div class="mb-4 mt-4p-4 rounded ml-10">
            <a href="{{ route('plans.create') }}"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Crear plan</a>
        </div>

        <h2 class="text-3xl font-bold text-center text-gray-900 mb-10 mt-4">Planes disponibles</h2>

        <!-- Pongo los planes en una tabla -->
        <div class="mb-4 mt-4p-4 rounded mr-10 ml-10">
            <table class="bg-white border border-gray-200 w-full">
                <thead class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <th class="py-3 px-6 text-left">Nombre</th>
                        <th class="py-3 px-6 text-left">Descripción</th>
                        <th class="py-3 px-6 text-left">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($plans as $plan)
                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                            <td class="py-3 px-6">{{ $plan->name }}</td>
                            <td class="py-3 px-6">{{ $plan->description }}</td>
                            <td class="py-3 px-6">
                                <a href="{{ route('plans.edit', $plan->id) }}"
                                    class="text-indigo-600 hover:text-indigo-900 inline-block">Editar</a>
                                <form action="{{ route('plans.destroy', $plan->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900 inline-block">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </body>
@endsection