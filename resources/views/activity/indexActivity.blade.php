@extends('base')

@section('Title', 'Actividades principales')

@section('CSS')

    @vite('resources/css/app.css')

@endsection

@section('Header') {{--Este es el header --}}

@include('layouts.navbar') <!-- Incluir el navbar -->


@section('Content') {{--Aqui irá el body--}}
    <div class="container mx-auto px-4 py-12">
        <h1 class="text-4xl font-bold text-center text-gray-900 mb-8">Actividades principales</h1>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @forelse($activities as $activity)
                <div
                    class="bg-white rounded-lg shadow-lg p-4 flex flex-col justify-between hover:shadow-xl transition duration-300 ease-in-out">
                    <div class="flex flex-col">
                        <h2 class="text-2xl font-bold text-gray-900 mb-4">{{ $activity->name }}</h2>
                        <p class="text-xl text-gray-600 mb-4">{{ $activity->description }}</p>
                        <p class="text-xl font-bold text-gray-900 mb-4">Precio:{{ $activity->price }},00€ /semanal</p>
                        <p class="text-xl text-gray-600">
                            Duración:
                            @if ($activity->duration == 1)
                                1 hora
                            @else
                                45 minutos
                            @endif
                        </p>
                    </div>

                    {{--<dd>{{ $activity->image }}</dd>--}}
                    <div class="flex justify-center">
                        <img src="/images/acts/{{ $activity->image }}" alt="Imagen de la actividad"
                            class="object-cover w-48 h-48 rounded-full">
                    </div>

                    <div class="mt-4">
                        <a href="{{ route('login') }}"
                            class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">Ver
                            más</a>
                    </div>
                </div>
            @empty
                <div class="col-span-3 text-center">
                    <h2 class="text-2xl font-bold text-gray-900">No hay actividades disponibles</h2>
                </div>
            @endforelse
        </div>
    </div>

@endsection

@section('Footer') {{--Este es el footer --}}
    @include('layouts.footer') 
@endsection