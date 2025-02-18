@extends('base')

@section('Title', 'Gestión de instructores Admin')

@section('CSS')
    @vite('resources/css/app.css')
@endsection

@section('Header') {{--Este es el header --}}
    <div class="bg-gray-900 text-white p-4 shadow-md flex justify-between items-center ml-64">
        <h1 class="text-3xl font-bold">Asignación de instructores a actividades</h1>
    </div>

    @include('admin.navbarAdmin') <!-- Incluir el navbar -->
@endsection

@section('Content') {{--Aqui irá el body--}}

    <div class="p-6 bg-white border-b border-gray-200 ml-64">

        <!-- Muestro mensaje de exito -->
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mt-10 mb-4" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        <!-- Muestro todos los instructores disponibles -->
        <h1 class="text-2xl font-semibold ml-50 mb-4">Instructores disponibles</h1>

        <ul class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
            @forelse ($instructors as $instructor)
                <li class="bg-white p-4 rounded shadow-md">
                    <div class="flex flex-col">
                        <h1 class="text-2xl font-bold">{{ $instructor->name }}</h1>
                        <h1 class="text-2xl font-bold">{{ $instructor->surname }}</h1>
                        <p class="text-gray-600 text-sm">Teléfono: {{ $instructor->phone }}</p>
                        <p class="text-2xl font-bold mt-4">{{ $instructor->email }}</p>
                    </div>

                    <!-- Cargo las actividades sin instructor asignado en un Select -->
                    <div class="flex flex-col mt-4">
                        <label for="activity" class="font-semibold text-lg text-gray-700 mb-2">Asignar a:</label>

                        <select name="activity" id="activity"
                            class="block px-4 py-2 w-full text-gray-900 rounded-md border border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            <option value="">Selecciona una actividad</option>
                            @forelse ($activities as $activity)
                                <option value="{{ $activity->id }}">{{ $activity->name }}</option>
                            @empty
                                <option value="">No hay actividades disponibles</option>
                            @endforelse
                        </select>

                        @if ($activities->isNotEmpty())
                            <form action="{{ route('instructors.bind', [$activity->id, $instructor->id]) }}" method="POST">
                                @csrf
                                <button type="submit"
                                    class="mt-4 bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Asignar</button>
                            </form>
                        @endif

                    </div>

                </li>
            @empty
                <p>No hay instructores disponibles.</p>
            @endforelse
        </ul>
    </div>



@endsection

@section('Footer') {{--Este es el footer --}}

@endsection