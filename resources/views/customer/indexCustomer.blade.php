@extends('base')

@section('Title', 'Cliente de FitBooking')

@section('CSS')

@vite('resources/css/app.css')

@section('Header') {{--Este es el header --}}

    @include('customer.navbarCustomer')

@endsection

@section('Content') {{--Aqui irá el body--}}

    <div class="container mx-auto px-6 py-10">
        <h1 class="mb-6 text-3xl font-bold text-center text-gray-800">Tu salud es lo más importante</h1>
        <p class="mb-6 text-lg text-center text-gray-700 leading-relaxed">
            El metabolismo es el proceso mediante el cual el cuerpo convierte los alimentos en energía. Factores como la
            edad, el sexo y la composición corporal afectan la tasa metabólica.
        </p>

        <ul class="mb-10 space-y-3 text-gray-700 text-lg">
            <li class="flex items-center"><span class="text-blue-500 text-2xl mr-3">✓</span> El metabolismo basal representa
                el 60-75% del gasto calórico diario.</li>
            <li class="flex items-center"><span class="text-blue-500 text-2xl mr-3">✓</span> Las personas con más masa
                muscular queman más calorías en reposo.</li>
            <li class="flex items-center"><span class="text-blue-500 text-2xl mr-3">✓</span> El ejercicio de alta intensidad
                puede aumentar el metabolismo hasta 48 horas después.</li>
        </ul>

        <h2 class="mb-6 text-2xl font-semibold text-center text-gray-800">Alcanza tus objetivos</h2>
        <p class="mb-6 text-lg text-center text-gray-700 leading-relaxed">
            La actividad física regular mejora la salud cardiovascular, reduce el estrés y fortalece el sistema inmune.
        </p>

        <ul class="mb-10 space-y-3 text-gray-700 text-lg">
            <li class="flex items-center"><span class="text-green-500 text-2xl mr-3">✓</span> 30 minutos de ejercicio al día
                reducen el riesgo de enfermedades crónicas en un 30%.</li>
            <li class="flex items-center"><span class="text-green-500 text-2xl mr-3">✓</span> El 70% de los adultos no
                realizan suficiente actividad física.</li>
            <li class="flex items-center"><span class="text-green-500 text-2xl mr-3">✓</span> El entrenamiento de fuerza
                mejora la densidad ósea y previene la osteoporosis.</li>
        </ul>

        <h3 class="mb-6 text-2xl font-semibold text-center text-gray-800">Completa tu estilo de vida</h3>

        <div class="p-6 bg-gray-100 rounded-lg shadow-lg">
            <h6 class="text-lg font-semibold text-gray-800">Fitness funcional de alta intensidad</h6>
            <p class="text-gray-700">Entrenamiento dirigido por un entrenador adaptado a ti.</p>

            <img src="/images/ownimgs/fitgirl.jpg" alt="Chica entrenando"
                class="object-cover my-4 h-80 w-2/5 rounded-lg shadow-lg mx-auto">

            <p class="text-gray-700 leading-relaxed">
                CrossFit es un programa de fitness que produce resultados mensurables a través de cambios en el estilo de
                vida,
                centrados en el entrenamiento y la nutrición. Los entrenamientos consisten en movimientos funcionales de
                alta
                intensidad y constantemente variados, y son más divertidos y efectivos entre amigos en un gimnasio CrossFit
                local.
            </p>
        </div>

        <h4 class="mt-10 mb-6 text-2xl font-semibold text-center text-gray-800">Comparte tu locura </h4>
        <p class="mb-6 text-lg text-center text-gray-700 leading-relaxed">
            Un entorno saludable motiva a las personas a mantenerse activas y mejorar su bienestar.
        </p>

        <ul class="mb-10 space-y-3 text-gray-700 text-lg">
            <li class="flex items-center"><span class="text-purple-500 text-2xl mr-3">✓</span> Las personas que entrenan en
                grupo tienen un 50% más de probabilidades de mantener la rutina.</li>
            <li class="flex items-center"><span class="text-purple-500 text-2xl mr-3">✓</span> El apoyo social reduce el
                estrés y mejora la adherencia a hábitos saludables.</li>
            <li class="flex items-center"><span class="text-purple-500 text-2xl mr-3">✓</span> La interacción en actividades
                físicas grupales mejora el estado de ánimo y la motivación.</li>
        </ul>

    </div>
@endsection

@section('Footer') {{--Este es el footer --}}
    <!-- Incluyo el componente Footer -->
    @include('layouts.footer')

@endsection