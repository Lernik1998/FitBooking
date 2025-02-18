@extends('base')

@section('Title', 'Editar perfil de Admin')

@section('CSS')
    @vite('resources/css/app.css')
@endsection

@section('Header') {{--Este es el header --}}
    @include('admin.navbarAdmin') <!-- Incluir el navbar -->

    <div class="bg-gray-900 text-white p-4 shadow-md flex justify-between items-center ml-64">
        <h1 class="text-3xl font-bold">Gestión de perfil</h1>
    </div>

@endsection

@section('Content') {{--Aqui irá el body--}}

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 ml-64">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">

                @include('profile.partials.update-profile-information-form')

                @include('profile.partials.update-password-form')

                @include('profile.partials.delete-user-form')
            </div>
        </div>
    </div>

@endsection