@extends('base')

@section('Title', 'Actividades de FitBooking')

@section('CSS')

    @vite('resources/css/app.css')

@endsection

@section('Header') {{--Este es el header --}}

    @include('customer.navbarCustomer')<!-- Incluir el navbar -->

@endsection

@section('Content') {{--Aqui irá el body--}}

    <!-- Mensaje de exito en la reserva -->
    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative text-center mt-4 mb-4"
            role="alert">
            <strong class="font-bold">Exito!</strong>
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif


    <h1 class="mb-4 text-3xl text-center text-gray-900 mt-4">Actividades disponibles</h1>


    <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3 mt-2">
        @forelse($activitiesReservadas as $activity)
            <div class="mb-4 bg-white rounded-lg shadow-md">
                <div class="text-center p-4">
                    <h2 class="text-2xl font-bold mb-4 animate-pulse">{{$activity->name}}</h2>
                    <p class="text-gray-600 mb-4 transition duration-300 ease-in-out hover:scale-105">{{$activity->description}}
                    </p>
                    <p class="text-gray-600 transition duration-300 ease-in-out hover:scale-105">Precio: {{$activity->price}},00
                        € por hora</p>

                    <!-- Muestro la imagen -->
                    <img src="/images/acts/{{ $activity->image }}" alt="Imagen de la actividad"
                        class="object-cover mx-auto w-32 h-32 rounded-full mb-4 mt-4">

                    <a href="{{ route('reservations.show', $activity->id) }}"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Gestionar mi
                        reserva</a>
                </div>
            </div>
        @empty
            <div class="col-span-3 text-center">
                <h2 class="text-2xl text-gray-900 mb-4 bg-red-100">No tiene actividades contratadas</h2>
                <p class="text-gray-600 text-center">Recuerde que las actividades de la semana están incluidas en el plan
                    Standard</p>
            </div>
        @endforelse
    </div>


    <h2 class="mb-10 mt-10 text-2xl text-gray-900 text-center">Actividades que no tienes reservadas y te estás
        perdiendo
        la
        oportunidad de practicar</h2>
    <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3 mt-2 mb-48">
        @forelse($otherActivities as $activity)
            <div class="bg-white rounded-lg shadow-md p-4">
                <div class="text-center">
                    <h2 class="text-2xl font-bold mb-4 text-gray-900">{{$activity->name}}</h2>
                    <p class="text-gray-600 mb-4">{{$activity->description}}</p>
                    <p class="text-gray-600">Precio: <span class="font-bold">{{$activity->price}},00 €</span> por semana</p>

                    <!-- Muestro la imagen -->
                    <img src="/images/acts/{{ $activity->image }}" alt="Imagen de la actividad"
                        class="object-cover mx-auto w-32 h-32 rounded-full">

                    <form action="{{ route('reservations.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="activity_id" value="{{ $activity->id }}">
                        <button type="submit"
                            class="mt-4 px-4 py-2 bg-blue-500 hover:bg-blue-700 text-white font-bold rounded-full">Reservar</button>
                    </form>
                </div>
            </div>
        @empty
            <div class="col-span-3 text-center">
                <p class="text-center text-xl text-gray-900 p-4 rounded-lg  bg-red-100">No hay más actividades disponibles para
                    reservar,
                    gracias
                    por confiar en nosotros.</p>
            </div>
        @endforelse
    </div>
@endsection


@section('Footer') {{--Este es el footer --}}
    @include('layouts.footer')
@endsection