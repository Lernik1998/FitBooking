@extends('base')

@section('Title', 'Editar plan')    

@section('CSS')
    @vite('resources/css/app.css')
@endsection

@section('Header') {{--Este es el header --}}
    <header class="bg-gray-900 text-white p-4 shadow-md flex justify-between items-center">
        <h1 class="text-3xl font-bold ml-64">Editar plan desde el Admin</h1>
    </header>

    @include('admin.navbarAdmin') <!-- Incluir el navbar -->
@endsection

@section('Content') {{--Aqui irá el body--}}
    <div class="mt-11">
        <!-- Botón para volver atrás -->
        <a href="{{ route('plans.index') }}"
            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded ml-80 ">
            Volver
        </a>

        @include('plan.formPlan', [
            'titleForm' => 'Formulario para editar un plan',
            'action' => route('plans.update', $plan->id), // Ruta para enviar el formulario al controlador
            'method' => 'PUT'
        ])
    </div>
@endsection