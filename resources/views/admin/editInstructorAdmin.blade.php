@extends('base')

@section('Title', 'Gestión de instructores Admin')

@section('CSS')
    @vite('resources/css/app.css')
@endsection

@section('Header') {{--Este es el header --}}
    <div class="bg-gray-900 text-white p-4 shadow-md flex justify-between items-center ml-64">
        <h1 class="text-3xl font-bold">Edición de instructor</h1>
    </div>

    @include('admin.navbarAdmin') <!-- Incluir el navbar -->
@endsection

@section('Content') {{--Aqui irá el body--}}

    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
            <a href="{{ route('instructors.index') }}"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded ml-72 mt-10">Volver</a>

            @include('instructor.formInstructor', [
                'titleForm' => 'Formulario para editar un instructor',
                'action' => route('instructors.update', $instructor->id),
                'method' => 'PUT'
            ])
        </div>
    </div>
@endsection