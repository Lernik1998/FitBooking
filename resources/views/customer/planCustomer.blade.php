@extends('base')

@section('Title', 'Planes contratados del usuario')

@section('Header') {{--Este es el header --}}
<!-- <h1>Este es el header del plan</h1> -->

@include('customer.navbarCustomer') <!-- Incluir el navbar --> 

@vite('resources/css/app.css')

@section('Content') {{--Aqui irá el body--}}

    <h1 class="text-4xl text-gray-900 mb-2 mt-8 text-center">Planes contratados</h1>

    <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3">
        @forelse ($plans as $plan)
            <div class="bg-white rounded-lg shadow-md p-4 mt-6">
                <img class="w-full h-48 object-cover" src="{{ asset('images/plans/' . $plan->image) }}"
                    alt="Foto del plan {{ $plan->name }}">
                <h2 class="text-2xl  text-gray-900 mt-8 mb-6">{{ $plan->name }}</h2>
                <a href="{{ route('reservations.show', $plan->id) }}"
                    class="mt-4 bg-blue-500 hover:bg-blue-700 text-white  py-2 px-4 rounded">Gestionar mi plan</a>
            </div>
        @empty
            <div class="col-span-3 text-center">
                <h2 class="text-2xl  text-center text-gray-900 mt-16 bg-red-100">No tiene planes contratados
                </h2>
            </div>
        @endforelse
    </div>

    <!-- Otros planes disponibles -->
    <h3 class="text-2xl  text-center text-gray-900 mt-10 mb-4">Cambia tu plan e impulsa tu bienestar</h3>

    <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3 justify-items-center max-w-6xl mx-auto">
        @forelse ($otherPlans as $plan)
            <div class="bg-white rounded-lg shadow-md p-4">
                <img class="w-full h-48 object-cover" src="{{ asset('images/plans/' . $plan->image) }}"
                    alt="Foto del plan {{ $plan->name }}">
                <h2 class="text-2xl  text-gray-900 mt-4 mb-6">{{ $plan->name }}</h2>
                <a href="{{ route('plans.show', $plan->id) }}"
                    class="mt-4 bg-blue-500 hover:bg-blue-700 text-white  py-2 px-4 rounded">Ver actividades del plan</a>
            </div>
        @empty
        <div class="col-span-3 text-center bg-red-100 mt-10"> 
            <p class="text-center">No hay planes disponibles en FitBooking</p>
        </div>
           
        @endforelse
    </div>

@endsection

@section('Footer') {{--Este es el footer --}}

@include('layouts.footer')

@endsection