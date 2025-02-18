@extends('base')

@section('Title', 'Inicio de FitBooking')

@section('CSS')

    @vite('resources/css/app.css')

@endsection

@section('Header')

    <!-- Incluir el navbar -->
    @include('layouts.navbar') 

@endsection

@section('Content')

    <section class="w-full">
        <h1 class="text-3xl font-bold text-gray-900 mb-10 mt-8 text-center">FitBooking</h1>
        <div class="text-center mb-20">
            {{--Inserto en video que se reproduce en un loop--}}
            <video width="500" controls loop autoplay class="rounded w-1/2 ml-20">
                <source src="{{ asset('videos/fitness.mp4') }}" type="video/mp4">
                Tu navegador no soporta el video.
            </video>
        </div>
    </section>

    <section class="w-full text-center mb-10">
        <h2 class="text-2xl font-bold text-gray-500 mb-6 text-center">Ponte en forma con un entrenamiento profesional,
            guiado y personalizado</h2>
        <div class="grid grid-cols-2">
            <h3 class="text-2xl font-bold text-gray-500 mb-4 text-center">No te lo pierdas</h3>

            <h5 class="text-2xl font-bold text-gray-500 mb-4 text-center">Atrevete</h5>
        </div>
    </section>

    <section class="w-full align-items-center">
        <div class="grid grid-cols-3 gap-4 w-full px-4 mt-10">
            <img class="rounded align-middle " src="{{ asset('images/ownimgs/crossfit.jpg') }}" alt="imagen fitness"
                width="500" height="500">
            <img class="rounded align-middle" src="{{ asset('images/ownimgs/trx.jpg') }}" alt="imagen fitness" width="500"
                height="500">
            <img class="rounded align-middle" src="{{ asset('images/ownimgs/pesa.jpg') }}" alt="imagen fitness" width="500"
                height="500">
        </div>
    </section>


    <section class="bg-gray-100 mt-28">
        <div class=" grid grid-cols-2">
            <div>
                <h3 class="text-2xl font-bold text-gray-500 mb-4 text-center">¿Qué hacemos?</h3>
                <p class="text-gray-700 text-center ml-10 mb-4">
                    FitBooking es mucho más que una plataforma.
                </p>

                <p class="text-gray-700 text-center ml-10">
                    Es tu compañero en el camino hacia un estilo de vida más
                    saludable. Conectamos a usuarios con entrenadores personales y expertos en nutrición para ofrecer planes
                    adaptados a cada necesidad. Nuestra misión es ayudarte a alcanzar tus objetivos de bienestar con una
                    experiencia de entrenamiento personalizada, profesional y motivadora. No importa si buscas mejorar tu
                    rendimiento, perder peso o simplemente sentirte mejor, en FitBooking te damos las herramientas y el
                    apoyo que necesitas para lograrlo.
                </p>
            </div>
            <div class="ml-36">
                <img class="align-content-center rounded" src="{{ asset('images/ownimgs/comunidad.jpg') }}"
                    alt="imagen fitness" width="550" height="500">
            </div>
        </div>
    </section>


    <section class="w-full text-center mb-10">
        <div class="grid grid-cols-3 gap-4 w-full px-4 mt-10 ml-36">

        </div>
    </section>

@endsection

@section('Footer')

    <!-- Incluyo el componente Footer -->
    @include('layouts.footer')

@endsection