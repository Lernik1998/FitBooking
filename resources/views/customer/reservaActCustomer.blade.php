@extends('base')

@section('Title', 'Reservas de cliente')

@section('CSS')
    @vite('resources/css/app.css')
@endsection

@section('Header') {{--Este es el header --}}
    @include('customer.navbarCustomer') <!-- Incluir el navbar -->
    <h1 class="text-4xl text-gray-900 text-center mb-10 mt-10">Reserva de la actividad {{ $reservation->activity->name }}
    </h1>
@endsection

@section('Content') {{--Aqui irá el body--}}
    <div class="flex items-center justify-center">
        <div class="bg-white rounded-lg shadow-lg p-6 md:w-1/2">
            <h2 class="text-2xl font-bold text-gray-900 text-center mb-4">{{ $reservation->activity->name }}</h2>
            <p class="text-lg text-gray-600 text-center mb-4">{{ $reservation->activity->description }}</p>
            <p class="text-xl font-bold text-gray-900 text-center">{{ $reservation->activity->price }} €/ semanal</p>
            <p class="text-xl font-bold text-gray-900 text-center mb-4">Duración: {{ $reservation->activity->duration }}h</p>

            <img src="{{ asset('images/acts/' . $reservation->activity->image) }}"
                alt="Imagen de la actividad {{ $reservation->activity->name }}" class="w-48 h-48 mx-auto rounded-full">

            <form action="{{ route('reservations.destroy', $reservation->id) }}" method="POST"
                class="flex items-center justify-center mt-4 space-x-4">
                @csrf
                @method('DELETE')
                <button type="submit"
                    class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-full shadow-lg transition duration-300 ease-in-out">Cancelar
                    Reserva</button>
                <!-- Botón para volver -->
                <button
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full shadow-lg transition duration-300 ease-in-out">
                    <a href="{{ route('activities.index') }}">Volver</a>
                </button>
            </form>
        </div>
    </div>

@endsection

@section('Footer') {{--Este es el footer --}}

    <div style="position: fixed; bottom: 0; width: 100%;">
        @include('layouts.footer')
    </div>

@endsection