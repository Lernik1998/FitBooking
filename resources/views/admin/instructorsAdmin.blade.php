@extends('base')

@section('Title', 'Gestión de instructores Admin')

@section('CSS')

    @vite('resources/css/app.css')

@endsection

@section('Header') {{--Este es el header --}}
    <header class="bg-gray-900 text-white p-4 shadow-md flex justify-between items-center ml-64">
        <h1 class="text-3xl font-bold">Gestión de instructores</h1>
    </header>
    @include('admin.navbarAdmin') <!-- Incluir el navbar -->

@endsection

@section('Content') {{--Aqui irá el body--}}
    <div class="ml-72 mt-10">

        <!-- Gestion de errores -->
        @if ($errors->any())
            <div class="w-full text-red-600 alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('success'))
            <div class="text-green-500 text-center text-lg">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('instructors.create') }}"
            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-10">Crear instructor</a>

        <!-- Recorro los instructores -->

        <div class="grid grid-cols-3 gap-4 mt-10">
            @forelse ($instructors as $instructor)
                <div class="bg-white p-4 rounded shadow-md">
                    <h1 class="text-2xl font-bold mb-2">{{ $instructor->name }}</h1>
                    <p class="text-xl font-semibold mb-2">{{ $instructor->surname }}</p>
                    <p class="text-gray-600 mb-2">{{ $instructor->phone }}</p>
                    <p class="text-xl font-semibold mb-2">{{ $instructor->email }}</p>

                    <p class="text-xl font-semibold mb-2">
                        Disponibilidad:
                        <span class="{{ $instructor->is_active ? 'text-green-500' : 'text-red-500' }}">
                            {{ $instructor->is_active ? 'Disponible' : 'No disponible' }}
                        </span>
                    </p>

                    <img src="{{ asset('images/instructors/' . $instructor->image) }}" alt=""
                        class="h-48 w-48 rounded-full mb-6">

                    <a href="{{ route('instructors.edit', $instructor->id) }}"
                        class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded mt-10">Editar</a>

                    <form action="{{ route('instructors.destroy', $instructor->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded mt-4">Eliminar</button>
                    </form>
                </div>
            @empty
                <div class="text-center mt-10 mb-10 col-span-3">
                    <p class="text-gray-600 text-2xl text-center mt-10 mb-10">No hay instructores disponibles</p>
                </div>
            @endforelse
        </div>
    </div>

@endsection