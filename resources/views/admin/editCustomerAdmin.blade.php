@extends('base')

@section('Title', 'Editar cliente')

@section('CSS')

    @vite('resources/css/app.css')

@endsection

@section('Header') {{--Este es el header --}}
    <div class="bg-gray-900 text-white p-4 shadow-md flex justify-between items-center ml-64">
        <h1 class="text-3xl font-bold">Editar cliente</h1>
    </div>

    @include('admin.navbarAdmin') <!-- Incluir el navbar -->
@endsection

@section('Content') {{--Aqui irá el body--}}

    <div class=" text-white font-bold py-2 px-4 rounded ml-64">

        @include('formBase', [
            'titleForm' => 'Formulario para editar un cliente',
            'action' => route('customer.update', $customer), // Ruta para enviar el formulario al controlador
            'method' => 'PUT'
        ])
    </div>
@endsection