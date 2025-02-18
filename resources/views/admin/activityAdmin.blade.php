@extends('base')

@section('Title', 'Gestión de actividades Admin')

@section('CSS')
    @vite('resources/css/app.css')
@endsection

@section('Header') {{--Este es el header --}}
    <div class="bg-gray-900 text-white p-4 shadow-md flex justify-between items-center">
        <h1 class="text-3xl font-bold ml-64">Gestión de actividades</h1>
        @include('admin.navbarAdmin') <!-- Incluir el navbar -->
    </div>
@endsection

@section('Content') {{--Aqui irá el body--}}

    <div class="ml-72 mr-6">

        @if (session('success'))
            <div class="rounded-lg bg-green-100 border border-green-400 p-4 mb-4 text-green-700 mt-4">
                {{ session('success') }}
            </div>
        @endif

        <!-- Para crear una actividad -->
        <div class="mb-4 mt-4 p-4 rounded">
            <a href="{{route('activities.create')}}"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Crear actividad</a>
        </div>

        <!-- Recorro todas las actividades disponibles -->
        <section class="mt-10 mb-10 bg-white p-4 rounded flex flex-col gap-4">
            <div class=" bg-white p-4 rounded flex flex-col gap-4">
                <h2 class="text-3xl font-bold text-center text-gray-900">Actividades disponibles</h2>

                <!-- Aquí se cargan las actividades -->
                @forelse($activities as $activity)
                    <div class="mb-4 card bg-white rounded-lg shadow-lg p-4">
                        <h2 class="card-title bg-gray-100 rounded-t-lg p-4">{{ $activity->name }}</h2>
                        <p class="card-text p-4">{{ $activity->description }}</p>
                        <p class="card-text p-4">Precio: {{ $activity->price }},00€</p>
                        <p class="card-text p-4">Duración:
                            @if ($activity->duration == 1)
                                1 hora
                            @else
                                45 minutos
                            @endif
                        </p>

                        <div class="flex justify-end gap-4 p-4">
                            <button>
                                <a href="{{route('activities.edit', $activity->id)}}"
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"> Editar
                                </a>
                            </button>

                            {{-- Borrar una actividad --}}
                            <form action="{{route('activities.destroy', $activity->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-4">Borrar</button>
                            </form>
                        </div>
                    </div>
                @empty
                    <p class="text-gray-600">No hay actividades disponibles</p>
                @endforelse
            </div>
        </section>
    </div>
@endsection
