<h1 class="font-semibold text-2xl text-gray-800 leading-tight mb-6">
    {{ $titleForm }}
</h1>

<!-- Gestion de errores -->
@if ($errors->any())
    <div class="alert alert-danger text-red-600 w-full">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ $action }}" id="form-base" class="space-y-4 bg-white p-6 rounded-md shadow-md">
    @csrf <!-- Para evitar ataques CSRF -->
    @method($method)

    <!-- Campo NOMBRE -->
    <div class="flex flex-col">
        <label for="name" class="font-semibold text-lg text-gray-700 mb-2">Nombre</label>
        <input type="text" id="name" name="name"
            class="block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm text-gray-900"
            value="{{ old('name', isset($customer) ? $customer->name : '') }}">
    </div>

    <!-- Campo de EMAIL -->
    <div class="flex flex-col">
        <label for="email" class="font-semibold text-lg text-gray-700 mb-2">Correo electronico</label>
        <textarea id="email" name="email"
            class="block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm text-gray-900"
            rows="4">{{ old('email', isset($customer) ? $customer->email : '') }}</textarea>
    </div>

    <!-- Campo de ROL -->
    <div class="flex flex-col">
        <label for="role" class="font-semibold text-lg text-gray-700 mb-2">Rol</label>
        <select name="role" id="role"
            class="block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm text-gray-900">
            <option value="customer" {{ (isset($customer) && $customer->role == 'customer') ? 'selected' : '' }}>
                Cliente</option>
            <option value="admin" {{ (isset($customer) && $customer->role == 'admin') ? 'selected' : '' }}>
                Administrador
            </option>
        </select>
    </div>

    <!-- Botón de Enviar -->
    <div class="mt-6">
        <button type="submit" id="enviar"
            class="w-full flex justify-center py-3 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
            Enviar
        </button>
    </div>
</form>