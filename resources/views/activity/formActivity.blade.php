@vite('resources/css/app.css')

<div class="p-6  max-w-3xl bg-white rounded-md shadow-md">
    <h1 class="mb-6 text-2xl font-semibold leading-tight text-gray-800">
        {{ $titleForm }}
    </h1>

    <!-- Gestion de errores -->
    @if ($errors->any())
        <div class="w-full text-red-600 alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Importante incluir enctype="multipart/form-data" para la gestión de archivos -->
    <form method="POST" action="{{ $action }}" id="form-base" class="space-y-4" enctype="multipart/form-data">
        @csrf <!-- Para evitar ataques CSRF -->
        @method($method)

        <!-- Campo NOMBRE -->
        <div>
            <label for="name" class="block mb-2 text-sm font-medium text-gray-700">Nombre</label>
            <input type="text" id="name" name="name" value="{{ old('name', isset($activity) ? $activity->name : '') }}"
                class="block px-4 py-2 w-full text-gray-900 rounded-md border border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
        </div>

        <!-- Campo de DESCRIPCION -->
        <div>
            <label for="description" class="block mb-2 text-sm font-medium text-gray-700">Descripción</label>
            <textarea id="description" name="description"
                class="block px-4 py-2 w-full text-gray-900 rounded-md border border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                rows="4">{{ old('description', isset($activity) ? $activity->description : '') }}</textarea>
        </div>

        <!-- Campo de IMAGEN -->
        <div>
            <label for="image" class="block mb-2 text-sm font-medium text-gray-700">Imagen</label>
            <input type="file" id="image" name="image" accept="image/*"
                value="{{ old('image', isset($activity) ? $activity->image : '') }}"
                class="block px-4 py-2 w-full text-gray-900 rounded-md border border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
        </div>

        <!-- Campo de PRECIO -->
        <div>
            <label for="price" class="block mb-2 text-sm font-medium text-gray-700">Precio</label>
            <input type="number" id="price" name="price"
                value="{{ old('price', isset($activity) ? $activity->price : '') }}"
                class="block px-4 py-2 w-full text-gray-900 rounded-md border border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
        </div>

        <!-- Campo del INSTRUCTOR NO EMPLEADO POR EL MOMENTO-->
        {{-- <div>
            <label for="instructor" class="block mb-2 text-sm font-medium text-gray-700">Instructor</label>
            <select name="instructor" id="instructor"
                class="block px-4 py-2 w-full text-gray-900 rounded-md border border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                @forelse ($instructors as $instructor)
                <option value="{{ $instructor->id }}" {{ (isset($activity) && $activity->instructor->id ==
                    $instructor->id) ? 'selected' : '' }}>
                    {{ $instructor->name }}</option>
                @empty
                <option value="">No hay instructores disponibles</option>
                @endforelse
            </select>
        </div>--}}
        <!-- Campo de DURACIÓN-->
        <div>
            <label for="duration" class="block mb-2 text-sm font-medium text-gray-700">Duración</label>
            <select name="duration" id="duration"
                class="block px-4 py-2 w-full text-gray-900 rounded-md border border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                <option value="1" {{ (isset($activity) && $activity->duration == '1') ? 'selected' : '' }}>
                    1h</option>
                <option value="4.5" {{ (isset($activity) && $activity->duration == '4.5') ? 'selected' : '' }}>
                    45 minutos
                </option>
            </select>
        </div>

        <!-- Botón de Enviar -->
        <div class="mt-6">
            <button type="submit" id="enviar"
                class="flex justify-center px-4 py-2 w-full text-sm font-medium text-white bg-gray-600 rounded-md border border-transparent shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Enviar
            </button>
        </div>
    </form>
</div>