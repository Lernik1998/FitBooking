@extends('base')

@section('Title', 'Gestion de planes del cliente')

@section('Header') {{--Este es el header --}}

@include('customer.navbarCustomer') <!-- Incluir el navbar -->

@vite('resources/css/app.css')

@section('Content') {{--Aqui irá el body--}}

    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold text-gray-900 mb-4">Información del plan {{ $plan->name }}</h1>

        <div class="bg-white shadow-md rounded px-8 py-6">
            <p class="text-lg"><strong>Descripción:</strong> {{ $reservation->plan->description }}</p>
            <p class="text-lg"><strong>Precio:</strong> {{ $reservation->plan->price }},00 € por mes</p>
            <img src="{{ asset('images/plans/' . $reservation->plan->image) }}"
                alt="Imagen del plan {{ $reservation->plan->name }}" class="w-48 h-48 mx-auto">
        </div>

        <div class="mt-12 flex justify-center">
            <form action="{{ route('reservations.destroy', $reservation->id) }}" method="POST" class="inline-block">
                @csrf
                @method('DELETE')
                <button type="submit" class="inline-block px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">Cancelar
                    suscripcion</button>

                <!-- Botón para volver -->
                <a href="{{ route('plans.index') }}"
                    class="inline-block px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Volver</a>
            </form>
        </div>
    </div>

@endsection

@section('Footer') {{--Este es el footer --}}

    <div style="position: fixed; bottom: 0; width: 100%;">
        @include('layouts.footer')
    </div>

@endsection