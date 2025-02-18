@extends('base')

@section('Title', 'Editar actividad')

@section('CSS')
    @vite('resources/css/app.css')
@endsection

@section('Header') {{--Este es el header --}}

    <header class="bg-gray-900 text-white p-4 shadow-md flex justify-between items-center">
        <h1 class="text-3xl font-bold ml-64">Gestión de actividades</h1>
    </header>

    @include('admin.navbarAdmin') <!-- Incluir el navbar -->

@endsection

@section('Content') {{--Aqui irá el body--}}
    <div class="ml-72">
        <div class=" text-white font-bold py-2 px-4 rounded-md">
            @include('activity.formActivity', [
                'titleForm' => 'Formulario para editar una actividad',
                'action' => route('activities.update', $activity), // Ruta para enviar el formulario al controlador
                'method' => 'PUT'
            ])
        </div>
    </div>
@endsection