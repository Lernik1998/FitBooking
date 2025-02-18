@extends('base')

@section('Title', 'Crear plan desde Admin')

@section('CSS')
    @vite('resources/css/app.css')
@endsection

@section('Header') {{--Este es el header --}}   
    <div class="bg-gray-900 text-white p-4 shadow-md flex justify-between items-center ml-64">
        <h1 class="text-3xl font-bold">Crear plan</h1>
    </div>

    @include('admin.navbarAdmin')<!-- Incluir el navbar -->
@endsection

@section('Content') {{--Aqui irá el body--}}

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

<!-- Mensaje de exito en la creación de un plan -->
@if (session('success'))
<div class="bg-green-100 border border-green-500 text-green-700 px-4 py-3 rounded relative mt-4 mb-4" role="alert">
    <strong class="font-bold">Exito!</strong>
    <span class="block sm:inline">{{ session('success') }}</span>
</div>
@endif

<!-- Botón para volver atrás -->
<a href="{{ route('plans.index') }}"
    class="inline-block px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 ml-10 mt-10">Volver</a>

@include('plan.formPlan', [
    'titleForm' => 'Formulario para crear un plan',
    'action' => route('plans.store'),
    'method' => 'POST'
])
</div>
@endsection