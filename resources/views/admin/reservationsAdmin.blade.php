@extends('base')

@section('Title', 'Gestión de reservas por el admin')   

@section('CSS')

    @vite('resources/css/app.css')

@endsection

@section('Header') {{--Este es el header --}}
    <header class="bg-gray-900 text-white p-4 shadow-md flex justify-between items-center">
        <h1 class="text-3xl font-bold text-center ml-64">Gestión de reservas</h1>
    </header>

    <!-- Incluyo el componente Header -->
    @include('admin.navbarAdmin')
@endsection

@section('Content') {{--Aqui irá el body--}}

    <div class="ml-72">

        <!-- Mensajes de exito o error -->
        @if (session('success'))
            <div class="text-green-500 text-center text-lg">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="text-red-500 text-center text-lg">
                {{ session('error') }}
            </div>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-10">
            @forelse ($Datosreservations as $reservation)

                <div class="bg-white p-4 rounded shadow-md">
                    <p class="text-lg font-bold">Número de reserva {{ $reservation->id}}</p>

                    <p class="text-lg">Cliente: {{ $reservation->name}}</p>

                    <p class="text-lg">Precio: {{ $reservation->price}},00 €/semanal</p>

                    <p class="text-lg mb-4">Fecha de la reserva: {{ $reservation->created_at}}</p>

                    <!-- Hay que determinar si es un Plan o una Actividad -->
                    @if ($reservation->plan_id)
                        <!-- <p class="text-lg">Plan: {{ $reservation->plan_id }}</p> -->
                        <img src="/images/plans/{{ $reservation->plan_image }}" alt="Imagen del Plan" class="w-48 h-48 rounded">
                    @endif

                    @if ($reservation->activity_id)
                        <!-- <p class="text-lg">Actividad: {{ $reservation->activity_id}}</p> -->
                        <img src="/images/acts/{{ $reservation->activity_image }}" alt="Imagen de la Actividad"
                            class="w-48 h-48 rounded">
                    @endif

                    <!-- <h1>{{ $reservation->reservation_id }}</h1> -->
                    <!-- Boton para eliminar la reserva -->
                    <form action="{{ route('reservations.destroy', $reservation->reservation_id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded mt-8">Eliminar</button>
                    </form>
                </div>

            @empty
                <p class="text-2xl font-bold text-center text-gray-900">No hay reservas realizadas</p>
            @endforelse
        </div>
    </div>
@endsection