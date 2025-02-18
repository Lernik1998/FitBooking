<div class="fixed top-0 left-0 h-screen w-64 bg-gray-900 text-white flex flex-col justify-between">
    <div class="p-4">
        <h1 class="text-lg font-semibold text-white mb-4">Menú de administración</h1>
        <ul class="mt-4 space-y-4">
            <li>
                <a href="{{ route('admin.indexAdmin') }}" class="block py-2 px-4 rounded hover:bg-gray-700 text-sm">📊
                    Inicio</a>
            </li>
            <li>
                <a href="{{ route('admin.usuariosAdmin') }}"
                    class="block py-2 px-4 rounded hover:bg-gray-700 text-sm">👥
                    Gestión de Usuarios</a>
            </li>
            <li>
                <a href="{{ route('admin.activityAdmin') }}"
                    class="block py-2 px-4 rounded hover:bg-gray-700 text-sm">🏋️‍♂️
                    Gestión de Actividades</a>
            </li>
            <li>
                <a href="{{ route('admin.planesAdmin') }}" class="block py-2 px-4 rounded hover:bg-gray-700 text-sm">📅
                    Gestión de Planes</a>
            </li>
            <li>
                <a href="{{ route('instructors.index') }}"
                    class="block py-2 px-4 rounded hover:bg-gray-700 text-sm">👨‍🏫
                    Gestión de Instructores</a>
            </li>
            <li>
                <a href="{{ route('profile.edit') }}" class="block py-2 px-4 rounded hover:bg-gray-700 text-sm">👤
                    Perfil</a>
            </li>
            <li>
                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="block py-2 px-4 rounded hover:bg-gray-700 text-sm">🚪 Cerrar
                        sesión</button>
                </form>
            </li>
        </ul>
    </div>
</div>