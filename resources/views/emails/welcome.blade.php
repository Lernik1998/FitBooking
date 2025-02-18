<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 text-gray-800">
    <div class="max-w-2xl mx-auto p-6 bg-white rounded-lg shadow-md mt-10">
        <h1 class="text-2xl font-bold mb-4">¡Hola, {{ $name }}!</h1>
        <p class="mb-4">Gracias por registrarte en <strong>FitWorking</strong>. Adjunto encontrarás un manual de usuario
            en PDF.</p>
        <p class="mb-4">Saludos, <br> El equipo de FitWorking</p>
        <div class="mt-6">
            <a href="{{ $filePath }}" class="inline-block px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                Descargar Manual
            </a>
        </div>
    </div>
</body>

</html>