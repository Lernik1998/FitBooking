@extends('base')

@section('Title', 'Plan')

@section('CSS')
    @vite('resources/css/app.css')
@endsection

@section('Header') {{--Este es el header --}}

    @include('customer.navbarCustomer') <!-- Incluir el navbar -->
@endsection


@section('Content') {{--Aqui irá el body--}}
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-extrabold text-gray-900 text-center mt-10 animate-pulse">Información del plan
            {{ $plan->name }}
        </h1>
    </div>

    <div class="bg-white shadow-lg rounded-lg px-8 py-6 mt-4 mb-4">
        <h3 class="text-xl text-gray-900 text-center">{{ $plan->description }}</h3>

        <p class="text-center mt-4"><span class="font-bold">{{ $plan->price }},00 €</span> mensuales</p>
        <img class="w-48 h-48 mt-10 mb-10 mx-auto" src="{{ asset('images/plans/' . $plan->image) }}"
            alt="Foto del plan {{ $plan->name }}">
        <!-- Botón reserva del plan -->

        <div class="flex justify-center space-x-4">
            <form action="{{ route('reservations.store') }}" method="POST">
                @csrf
                <input type="hidden" name="plan_id" value="{{ $plan->id }}">
                <button type="submit"
                    class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full shadow-lg transition duration-300 ease-in-out">Reservar</button>

                <button
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full shadow-lg transition duration-300 ease-in-out">
                    <a href="{{ route('plans.index') }}">Volver</a>
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