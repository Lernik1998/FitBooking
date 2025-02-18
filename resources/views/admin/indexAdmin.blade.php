@extends('base')

@section('Title', 'Principal de Admin')

@section('CSS')
    @vite('resources/css/app.css')
@endsection

@section('Header') {{--Este es el header --}}

    <header class="bg-gray-900 text-white p-4 shadow-md flex justify-between items-center">
        <h1 class="text-2xl font-semibold ml-64">FitBooking</h1>
    </header>
    @include('admin.navbarAdmin') <!-- Incluir el navbar -->
@endsection

@section('Content') {{--Aqui irá el body--}}

        <!-- Contenido principal -->
        <main class="ml-64 flex-1 p-6 min-h-screen">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">📌 Panel de Control</h2>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Tarjeta 1 -->

                <a href="{{ route('reservations.index') }}">
                    <div class="bg-white p-6 rounded-lg shadow-md border">
                        <h3 class="text-lg font-semibold text-gray-800">📋 Gestión de Reservas</h3>
                        <p class="text-gray-600 mt-2">Modifica y administra las reservas de los clientes.</p>
                    </div>
                </a>

                <a href="{{ route('instructors.bindAct') }}">
                    <div class="bg-white p-6 rounded-lg shadow-md border">
                        <h3 class="text-lg font-semibold text-gray-800">👨‍🏫 Asignar Instructores</h3>
                        <p class="text-gray-600 mt-2">Asigna instructores a las diferentes actividades.</p>
                    </div>
                </a>
            </div>

            <!-- Sección de información general -->
            <section class="mt-10 bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-xl font-semibold text-gray-800 mb-4">📈 Información General y Estadísticas</h2>
                <p class="text-gray-600">
                    Aquí se mostrarán las métricas más relevantes sobre la actividad del sistema.
                </p>
                <!-- Muestro grafico con los usuarios y sus reservas -->
                <div class="mt-6">
                    <canvas id="myChart"></canvas>
                </div>

                <!-- Incluir Chart.js -->
                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

                <script>
                    document.addEventListener("DOMContentLoaded", function () {
                        // Datos desde Laravel (pasados como JSON para ser usados en JavaScript)
                        const reservationsCount = {{ $reservations->count() }};
                        const usersCount = {{ $users->count() }};
                        const activitiesCount = {{ $activities->count() }};
                        const plansCount = {{ $plans->count() }};
                        const cpuLoad = {{ json_encode($cpuCarga) }}; // Array con 3 valores de carga del CPU

                        const ctx = document.getElementById('myChart').getContext('2d');
                        const myChart = new Chart(ctx, {
                            type: 'bar', // Tipo de gráfico
                            data: {
                                labels: ['Reservas', 'Usuarios', 'Actividades', 'Planes', 'CPU (5 min)',],
                                datasets: [{
                                    label: 'Datos del sistema y usuarios',
                                    data: [
                                        reservationsCount,
                                        usersCount,
                                        activitiesCount,
                                        plansCount,
                                        cpuLoad[1],
                                    ],
                                    backgroundColor: [
                                        'rgba(54, 162, 235, 0.6)', // Azul
                                        'rgba(255, 99, 132, 0.6)', // Rojo
                                        'rgba(255, 206, 86, 0.6)', // Amarillo
                                        'rgba(75, 192, 192, 0.6)', // Verde
                                        'rgba(153, 102, 255, 0.6)', // Morado
                                        'rgba(255, 159, 64, 0.6)', // Naranja
                                        'rgba(201, 203, 207, 0.6)' // Gris
                                    ],
                                    borderColor: [
                                        'rgba(54, 162, 235, 1)',
                                        'rgba(255, 99, 132, 1)',
                                        'rgba(255, 206, 86, 1)',
                                        'rgba(75, 192, 192, 1)',
                                        'rgba(153, 102, 255, 1)',
                                        'rgba(255, 159, 64, 1)',
                                        'rgba(201, 203, 207, 1)'
                                    ],
                                    borderWidth: 1
                                }]
                            },
                            options: {
                                responsive: true,
                                scales: {
                                    y: {
                                        beginAtZero: true
                                    }
                                }
                            }
                        });
                    });
                </script>

            </section>

            <div class="mt-4 p-4 bg-gray-100 rounded mb-10">
                <h3 class="text-lg font-semibold text-gray-700">Datos del Sistema</h3>
                <p><strong>Sistema Operativo:</strong> {{ $sistema }}</p>
                <p><strong>Carga del CPU:</strong> {{ implode(', ', $cpuCarga) }}</p>
            </div>
        </main>
    </div>
@endsection