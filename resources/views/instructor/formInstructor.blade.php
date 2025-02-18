<!-- Importante incluir enctype="multipart/form-data" para la gestión de archivos -->
<form action="{{ $action }}" method="POST" class="max-w-md mx-auto mt-10" enctype="multipart/form-data">
    @csrf
    <!-- Para evitar ataques CSRF -->
    @method($method)

    <!-- Campo NOMBRE -->
    <div>
        <label for="name" class="block mb-2 text-sm font-medium text-gray-700">Nombre</label>
        <input type="text" id="name" name="name" value="{{ old('name', isset($instructor) ? $instructor->name : '') }}"
            class="block px-4 py-2 w-full text-gray-900 rounded-md border border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
    </div>

    <!-- Campo APELLIDO -->
    <div>
        <label for="surname" class="block mb-2 text-sm font-medium text-gray-700">Apellido</label>
        <input type="text" id="surname" name="surname"
            value="{{ old('surname', isset($instructor) ? $instructor->surname : '') }}"
            class="block px-4 py-2 w-full text-gray-900 rounded-md border border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
    </div>

    <!-- Campo EMAIL -->
    <div>
        <label for="email" class="block mb-2 text-sm font-medium text-gray-700">Email</label>
        <input type="email" id="email" name="email"
            value="{{ old('email', isset($instructor) ? $instructor->email : '') }}"
            class="block px-4 py-2 w-full text-gray-900 rounded-md border border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
    </div>

    <!-- Campo TELEFONO -->
    <div>
        <label for="phone" class="block mb-2 text-sm font-medium text-gray-700">Telefono</label>
        <input type="text" id="phone" name="phone"
            value="{{ old('phone', isset($instructor) ? $instructor->phone : '') }}"
            class="block px-4 py-2 w-full text-gray-900 rounded-md border border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
    </div>

    <!-- Campo IMAGEN -->
    <div>
        <label for="image" class="block mb-2 text-sm font-medium text-gray-700">Imagen</label>
        <input type="file" id="image" name="image" accept="image/*"
            class="block px-4 py-2 w-full text-gray-900 rounded-md border border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
    </div>

    <!-- Campo DISPONIBILIDAD -->
    <div>
        <label for="is_active" class="block mb-2 text-sm font-medium text-gray-700">Disponibilidad</label>
        <select id="is_active" name="is_active"
            class="block px-4 py-2 w-full text-gray-900 rounded-md border border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            <option value="1" {{ (isset($instructor) && $instructor->is_active == 1) ? 'selected' : '' }}>Disponible
            </option>
            <option value="0" {{ (isset($instructor) && $instructor->is_active == 0) ? 'selected' : '' }}>No disponible
            </option>
        </select>
    </div>

    <!-- Botón de Enviar -->
    <div class="mt-6">
        <button type="submit" id="enviar"
            class="flex justify-center px-4 py-2 w-full text-sm font-medium text-white bg-gray-600 rounded-md border border-transparent shadow-sm hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
            Enviar
        </button>
    </div>
</form>