<!-- Barra de navegación superior -->
<header class="bg-white shadow-md p-4 mb-12">
    <div class="flex items-center justify-between">
        <h1 class="text-3xl font-semibold">Panel de Administrador</h1>
        <div>
            <button class="p-2 bg-blue-500 text-white rounded">Notificaciones</button>
            <button class="p-2 bg-blue-500 text-white rounded">Perfil</button>
        </div>
    </div>
</header>

<!-- Contenido Principal -->
<main class="p-6">
    <h2 class="text-2xl font-semibold mb-4">Estadísticas Recientes</h2>

    <!-- Tarjetas de Estadísticas -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <div class="bg-white p-4 rounded-lg shadow">
            <h3 class="text-xl ">Libros Registrados</h3>
            <p class="text-3xl ">1,250</p>
        </div>
        <div class="bg-white p-4 rounded-lg shadow">
            <h3 class="text-xl ">Documentos Totales</h3>
            <p class="text-3xl ">$12,500</p>
        </div>
        <div class="bg-white p-4 rounded-lg shadow">
            <h3 class="text-xl">Usuarios Activos</h3>
            <p class="text-3xl">450</p>
        </div>
    </div>

    <h2 class="text-2xl font-semibold mt-12 mb-4">Acceso Rápido</h2>
    <!-- Tarjetas de Acceso Rápido -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <div class="bg-blue-100 p-4 rounded-lg shadow cursor-pointer hover:bg-blue-200 flex items-center">
            <i class="fas fa-user-plus text-blue-600 mr-2"></i>
            <div>
                <h3 class="text-xl font-semibold">Crear Usuario</h3>
                <p class="text-gray-600">Añadir un nuevo usuario al sistema.</p>
            </div>
        </div>
        <div class="bg-blue-100 p-4 rounded-lg shadow cursor-pointer hover:bg-blue-200 flex items-center">
            <i class="fas fa-book text-blue-600 mr-2"></i>
            <div>
                <h3 class="text-xl font-semibold">Crear Libro</h3>
                <p class="text-gray-600">Registrar un nuevo libro en el sistema.</p>
            </div>
        </div>
        <div class="bg-blue-100 p-4 rounded-lg shadow cursor-pointer hover:bg-blue-200 flex items-center">
            <i class="fas fa-file-alt text-blue-600 mr-2"></i>
            <div>
                <h3 class="text-xl font-semibold">Ver Informes</h3>
                <p class="text-gray-600">Acceder a los informes de actividad.</p>
            </div>
        </div>
        <div class="bg-blue-100 p-4 rounded-lg shadow cursor-pointer hover:bg-blue-200 flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" class="me-4">
                <g fill="none" stroke="#333333" stroke-width="1.5">
                    <circle cx="9" cy="6" r="4" />
                    <path stroke-linecap="round" d="M15 9a3 3 0 1 0 0-6" />
                    <ellipse cx="9" cy="17" rx="7" ry="4" />
                    <path stroke-linecap="round" d="M18 14c1.754.385 3 1.359 3 2.5c0 1.03-1.014 1.923-2.5 2.37" />
                </g>
            </svg>
            <div>
                <h3 class="text-xl font-semibold">Gestión de Comentarios</h3>
                <p class="text-gray-600">Revisar y gestionar comentarios de usuarios.</p>
            </div>
        </div>
        <div class="bg-blue-100 p-4 rounded-lg shadow cursor-pointer hover:bg-blue-200 flex items-center">
            <i class="fas fa-cog text-blue-600 mr-2"></i>
            <div>
                <h3 class="text-xl font-semibold">Configuraciones</h3>
                <p class="text-gray-600">Ajustar la configuración del sistema.</p>
            </div>
        </div>
        <div class="bg-blue-100 p-4 rounded-lg shadow cursor-pointer hover:bg-blue-200 flex items-center">
            <i class="fas fa-chart-bar text-blue-600 mr-2"></i>
            <div>
                <h3 class="text-xl font-semibold">Ver Estadísticas</h3>
                <p class="text-gray-600">Acceder a estadísticas detalladas.</p>
            </div>
        </div>
    </div>


    <h2 class="text-2xl font-semibold mt-8 mb-4">Últimas Actividades</h2>
    <!-- Tabla de Actividades -->
    <div class="bg-white rounded-lg shadow">
        <table class="min-w-full border-collapse">
            <thead>
                <tr class="bg-gray-200">
                    <th class="p-4 text-left">Usuario</th>
                    <th class="p-4 text-left">Actividad</th>
                    <th class="p-4 text-left">Fecha</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="p-4 border-b">Juan Pérez</td>
                    <td class="p-4 border-b">Registrado</td>
                    <td class="p-4 border-b">2024-10-01</td>
                </tr>
                <tr>
                    <td class="p-4 border-b">María López</td>
                    <td class="p-4 border-b">Compra</td>
                    <td class="p-4 border-b">2024-10-02</td>
                </tr>
                <tr>
                    <td class="p-4 border-b">Carlos Torres</td>
                    <td class="p-4 border-b">Comentario</td>
                    <td class="p-4 border-b">2024-10-03</td>
                </tr>
            </tbody>
        </table>
    </div>
</main>