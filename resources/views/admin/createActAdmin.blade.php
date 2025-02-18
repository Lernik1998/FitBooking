@extends('base')

@section('Title', 'Crear actividad')  

@section('CSS')
    @vite('resources/css/app.css')
@endsection

@section('Header') {{--Este es el header --}}
    <div class="bg-gray-900 text-white p-4 shadow-md flex justify-between items-center">
        <h1 class="text-3xl font-bold ml-64">Crear actividad</h1>
        @include('admin.navbarAdmin') <!-- Incluir el navbar -->
    </div>
@endsection

@section('Content') {{--Aqui irá el body--}}

    <div class="ml-72">

        {{--'instructors' => $instructors,--}}
        @include('activity.formActivity', [
            'titleForm' => 'Formulario para crear una actividad',
            'action' => route('activities.store'),
            'method' => 'POST'
        ])

        <!-- Botón para volver -->
        <a href="{{ route('admin.activityAdmin') }}"
            class="inline-block px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 mt-4">Volver</a>

    </div>
@endsection