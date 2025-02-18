@extends('base')

@section('Title', 'Planes de FitBooking')

@section('CSS')

    @vite('resources/css/app.css')

@endsection

@section('Header') {{--Este es el header --}}

    @include('layouts.navbar') <!-- Incluir el navbar -->

@endsection

@section('Content') {{--Aqui irá el body--}}

    <div class="container mx-auto mt-4">
        <h1 class="text-3xl text-gray-900 text-center mb-4">Nuestros Planes</h1>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <!-- Recorro los planes disponibles -->
            @forelse($plans as $plan)
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <div class="flex items-center justify-between">
                        <h2 class="text-2xl text-gray-900">{{ $plan->name }}</h2>
                        <p class="text-xl">{{ $plan->price }}€ al mes</p>
                    </div>
                    <p class="mt-4">{{ $plan->description }}</p>

                    <div class="mt-6">
                        <!-- Muestro la imagen -->
                        @if ($plan->image)
                            <img src="/images/plans/{{ $plan->image }}" alt="Imagen del plan"
                                class="w-48 h-48 object-cover rounded-full mb-4">
                        @else
                            <img src="{{ asset('images/fitness.jpg') }}" alt="Imagen del plan"
                                class="w-48 h-48 object-cover rounded-full mb-4">
                        @endif
                    </div>

                    <a href="{{ route('login') }}"
                        class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">Seleccionar</a>
                </div>
            @empty
                <div class="col-span-3 text-center">
                    <h2 class="text-2xl text-gray-900">No hay planes disponibles</h2>
                </div>
            @endforelse
        </div>
    </div>
@endsection

@section('Footer') {{--Este es el footer --}}

    @include('layouts.footer')

@endsection