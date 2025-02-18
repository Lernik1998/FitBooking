@extends('base')

@section('Title', 'Creación de un instructor de FitBooking Admin')

@section('CSS')

    @vite('resources/css/app.css')

@endsection

@section('Header') {{--Este es el header --}}
    <header class="bg-gray-900 text-white p-4 shadow-md flex justify-between items-center ml-64">
        <h1 class="text-3xl font-bold">Creación de un instructor de FitBooking</h1>
    </header>

    @include('admin.navbarAdmin')<!-- Incluir el navbar -->
@endsection

@section('Content') {{--Aqui irá el body--}}

    <div class="p-6 border-b border-gray-200">
        <!-- Botón para volver -->
        <a href="{{ route('instructors.index') }}"
            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded ml-72">Volver</a>

        @include('instructor.formInstructor', [
            'titleForm' => 'Formulario para crear un instructor de FitBooking',
            'action' => route('instructors.store'),
            'method' => 'POST'
        ])
    </div>

@endsection