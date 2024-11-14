<!-- Barra de navegación superior -->
<header class="bg-white shadow-md p-4 mb-3">
    <div class="flex items-center justify-between">
        <h1 class="text-3xl font-bold">Panel de Administrador</h1>

        <!-- Botones de Navegación 

        <div>
            <button class="p-2 bg-blue-500 text-white rounded">Notificaciones</button>
            <button class="p-2 bg-blue-500 text-white rounded">Perfil</button>
        </div>
        -->
    </div>
</header>

<!-- Contenido Principal -->
<main class="p-6">
    <?php include_once __DIR__ . "../../templates/userLogInfo.php"; ?>

    <h2 class="text-2xl font-semibold mt-4 mb-4">Acceso Rápido</h2>
    <!-- Tarjetas de Acceso Rápido -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

        <div class="bg-gray-200 p-4 rounded-lg shadow cursor-pointer hover:bg-primary-300 flex items-center">
            <a href="/usuario?mode=INS" class="flex">
                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 24 24" class="me-4">
                    <g fill="none">
                        <circle cx="12" cy="8" r="4" stroke="#000000" stroke-linecap="round"/>
                        <path fill="#000000" fill-rule="evenodd"
                              d="M15.276 16a11 11 0 0 0-4.37-.446c-1.64.162-3.191.686-4.456 1.517c-1.264.832-2.196 1.943-2.648 3.208a.5.5 0 1 0 .941.336C5.11 19.588 5.885 18.64 7 17.907s2.508-1.21 4.005-1.358c.55-.054 1.103-.063 1.649-.028A2 2 0 0 1 14 16z"
                              clip-rule="evenodd"/>
                        <path stroke="#000000" stroke-linecap="round" d="M18 14v8m4-4h-8"/>
                    </g>
                </svg>
                <div>
                    <h3 class="text-xl font-semibold">Crear Usuario</h3>
                    <p class="text-gray-600">Añadir un nuevo usuario al sistema.</p>
                </div>
            </a>
        </div>

        <div class="bg-gray-200 p-4 rounded-lg shadow cursor-pointer hover:bg-primary-300 flex items-center">
            <a href="/libro?mode=INS" class="flex">
                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 20 20" class="me-4">
                    <path fill="#333333"
                          d="M14 3H6a1 1 0 0 0-1 1v11h4.022q.047.516.185 1H5a1 1 0 0 0 1 1h3.6q.276.538.657 1H6a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v5.207a5.5 5.5 0 0 0-1-.185V4a1 1 0 0 0-1-1M6 5v1a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V5a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1m1 0h6v1H7zm12 9.5a4.5 4.5 0 1 1-9 0a4.5 4.5 0 0 1 9 0m-4-2a.5.5 0 0 0-1 0V14h-1.5a.5.5 0 0 0 0 1H14v1.5a.5.5 0 0 0 1 0V15h1.5a.5.5 0 0 0 0-1H15z"/>
                </svg>
                <div>
                    <h3 class="text-xl font-semibold">Agregar un Libro</h3>
                    <p class="text-gray-600">Registrar un nuevo libro en el sistema.</p>
                </div>
            </a>
        </div>

        <div class="bg-gray-200 p-4 rounded-lg shadow cursor-pointer hover:bg-primary-300 flex items-center">
            <a href="/documento?mode=INS" class="flex">
                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 48 48" class="me-4">
                    <path fill="#333333"
                          d="M10.5 8.25c0-.966.784-1.75 1.75-1.75H24v8.75A3.75 3.75 0 0 0 27.75 19h9.75v20.75a1.75 1.75 0 0 1-1.75 1.75H24.26a13 13 0 0 1-1.88 2.5h13.37A4.25 4.25 0 0 0 40 39.75V18.414a2.25 2.25 0 0 0-.659-1.59L27.177 4.658A2.25 2.25 0 0 0 25.586 4H12.25A4.25 4.25 0 0 0 8 8.25v14.746a13 13 0 0 1 2.5-.756zm24.982 8.25H27.75c-.69 0-1.25-.56-1.25-1.25V7.518zM24 35c0 6.075-4.925 11-11 11S2 41.075 2 35s4.925-11 11-11s11 4.925 11 11m-10-7a1 1 0 1 0-2 0v6H6a1 1 0 1 0 0 2h6v6a1 1 0 1 0 2 0v-6h6a1 1 0 1 0 0-2h-6z"/>
                </svg>
                <div>
                    <h3 class="text-xl font-semibold">Agregar un Documento</h3>
                    <p class="text-gray-600">Registrar un nuevo documento en el sistema.</p>
                </div>
            </a>
        </div>

        <div class="bg-gray-200 p-4 rounded-lg shadow cursor-pointer hover:bg-primary-300 flex items-center">
            <a href="/usuarios/gestionar" class="flex">
                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 24 24" class="me-4">
                    <g fill="none" stroke="#333333" stroke-width="1.5">
                        <circle cx="9" cy="6" r="4"/>
                        <path stroke-linecap="round" d="M15 9a3 3 0 1 0 0-6"/>
                        <ellipse cx="9" cy="17" rx="7" ry="4"/>
                        <path stroke-linecap="round" d="M18 14c1.754.385 3 1.359 3 2.5c0 1.03-1.014 1.923-2.5 2.37"/>
                    </g>
                </svg>
                <div>
                    <h3 class="text-xl font-semibold">Gestión de Usuarios</h3>
                    <p class="text-gray-600">Revisar y gestiona los usuarios existentes.</p>
                </div>
            </a>
        </div>

        <div class="bg-gray-200 p-4 rounded-lg shadow cursor-pointer hover:bg-primary-300 flex items-center">
            <a href="/gestionar/libros" class="flex">
                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 256 256" class="me-4">
                    <path fill="#333333"
                          d="M208 24H72a32 32 0 0 0-32 32v168a8 8 0 0 0 8 8h144a8 8 0 0 0 0-16H56a16 16 0 0 1 16-16h136a8 8 0 0 0 8-8V32a8 8 0 0 0-8-8m-8 160H72a31.8 31.8 0 0 0-16 4.29V56a16 16 0 0 1 16-16h128Z"/>
                </svg>
                <div>
                    <h3 class="text-xl font-semibold">Gestion de Libros</h3>
                    <p class="text-gray-600">Revisa y gestiona los libros existentes.</p>
                </div>
            </a>
        </div>

        <div class="bg-gray-200 p-4 rounded-lg shadow cursor-pointer hover:bg-primary-300 flex items-center">
            <a href="/repositorio/gestionar" class="flex">
                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 34 32" class="me-2">
                    <g fill="#333333">
                        <path d="M1.512 28H19.5c.827 0 1.5-.673 1.5-1.5v-19c0-.023-.01-.043-.013-.065a.4.4 0 0 0-.013-.062a.5.5 0 0 0-.122-.227L13.853.147a.5.5 0 0 0-.289-.135C13.543.01 13.523 0 13.5 0H1.506C.676 0 0 .673 0 1.5v25c0 .827.678 1.5 1.512 1.5M14 1.707L19.293 7H14.5a.5.5 0 0 1-.5-.5zM1 1.5c0-.276.227-.5.506-.5H13v5.5c0 .827.673 1.5 1.5 1.5H20v18.5a.5.5 0 0 1-.5.5H1.512A.506.506 0 0 1 1 26.5z"/>
                        <path d="M4.5 12h12a.5.5 0 0 0 0-1h-12a.5.5 0 0 0 0 1m0 4h12a.5.5 0 0 0 0-1h-12a.5.5 0 0 0 0 1m0-8h5a.5.5 0 0 0 0-1h-5a.5.5 0 0 0 0 1m0 12h12a.5.5 0 0 0 0-1h-12a.5.5 0 0 0 0 1m0 4h12a.5.5 0 0 0 0-1h-12a.5.5 0 0 0 0 1"/>
                        <path d="M21.5 5H26v5.5c0 .827.673 1.5 1.5 1.5H33v18.5a.5.5 0 0 1-.5.5H14.512a.506.506 0 0 1-.512-.5v-1a.5.5 0 0 0-1 0v1c0 .827.678 1.5 1.512 1.5H32.5c.827 0 1.5-.673 1.5-1.5v-19c0-.023-.01-.043-.013-.065a.4.4 0 0 0-.013-.062a.5.5 0 0 0-.122-.227l-6.999-6.999a.5.5 0 0 0-.289-.134C26.543 4.01 26.523 4 26.5 4h-5a.5.5 0 0 0 0 1m6 6a.5.5 0 0 1-.5-.5V5.707L32.293 11z"/>
                        <path d="M23.5 16h6a.5.5 0 0 0 0-1h-6a.5.5 0 0 0 0 1m0 4h6a.5.5 0 0 0 0-1h-6a.5.5 0 0 0 0 1m0 4h6a.5.5 0 0 0 0-1h-6a.5.5 0 0 0 0 1m0 4h6a.5.5 0 0 0 0-1h-6a.5.5 0 0 0 0 1"/>
                    </g>
                </svg>
                <div>
                    <h3 class="text-xl font-semibold">Gestion de Documentos</h3>
                    <p class="text-gray-600">Revisa y gestiona los documentos existentes.</p>
                </div>
            </a>
        </div>

        <div class="bg-gray-200 p-4 rounded-lg shadow cursor-pointer hover:bg-primary-300 flex items-center flex">
            <a class="flex"
               href="https://analytics.google.com/analytics/web/?utm_source=marketingplatform.google.com&utm_medium=et&utm_campaign=marketingplatform.google.com%2Fabout%2Fanalytics%2F#/p452859533/reports/intelligenthome?params=_u..nav%3Dmaui"
               target="_blank">

                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 16 16" class="me-4">
                    <path fill="#333333" d="M1.75 13.25V1.5H.5v12a1.24 1.24 0 0 0 1.22 1H15.5v-1.25z"/>
                    <path fill="#333333"
                          d="M3.15 8H4.4v3.9H3.15zm3.26-4h1.26v7.9H6.41zm3.27 2h1.25v5.9H9.68zm3.27-3.5h1.25v9.4h-1.25z"/>
                </svg>
                <div>
                    <h3 class="text-xl font-semibold">Estadísticas del Sitio Web</h3>
                    <p class="text-gray-600">Monitorea la actividad del sitio con Google Analytics.</p>
                </div>

            </a>
        </div>
    </div>

    <h2 class="text-2xl font-semibold mb-4 mt-20">Estadísticas Recientes</h2>
    <!-- Tarjetas de Estadísticas -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <div class="bg-white p-4 rounded-lg shadow">
            <h3 class="text-xl ">Libros Registrados</h3>
            <div class="flex justify-around items-center mt-3">
                <p class="text-3xl "> <?= $totalLibros; ?> </p>

                <span class="flex items-center text-gray-500">
                    <span class="w-2.5 h-2.5 bg-green-500 rounded-full mr-2"></span>
                    <?= $bookStatistics["activeCount"] ?> Activos
                </span>
                <span class="flex items-center text-gray-500">
                    <span class="w-2.5 h-2.5 bg-red-600 rounded-full mr-2 "></span>
                    <?= $bookStatistics["inactiveCount"] ?> Inactivos
                </span>
            </div>

        </div>

        <div class="bg-white p-4 rounded-lg shadow">
            <h3 class="text-xl ">Documentos Registrados</h3>

            <div class="flex justify-around items-center mt-3">
                <p class="text-3xl "><?= $totalDocumentos; ?></p>
                <span class="flex items-center text-gray-500">
                    <span class="w-2.5 h-2.5 bg-green-600 rounded-full mr-2"></span>
                    <?= $documentStatistics["activeCount"] ?> Activos
                </span>
                <span class="flex items-center text-gray-500">
                    <span class="w-2.5 h-2.5 bg-red-600 rounded-full mr-2 "></span>
                    <?= $documentStatistics["inactiveCount"] ?> Inactivos
                </span>
            </div>

        </div>

        <div class="bg-white p-4 rounded-lg shadow">
            <h3 class="text-xl">Usuarios Registrados</h3>

            <div class="flex justify-around items-center mt-3">
                <p class="text-3xl"> <?= $totalUsuarios; ?> </p>
                <span class="flex items-center text-gray-500">
                    <span class="w-2.5 h-2.5 bg-green-500 rounded-full mr-2"></span>
                    <?= $userStatistics["activeCount"] ?> Activos
                </span>
                <span class="flex items-center text-gray-500">
                    <span class="w-2.5 h-2.5 bg-red-600 rounded-full mr-2 "></span>
                    <?= $userStatistics["inactiveCount"] ?> Inactivos
                </span>
            </div>

        </div>
    </div>

    <h2 class="text-2xl font-semibold mt-12 mb-4">Últimas Actividades</h2>
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

            <?php foreach ($accessLog as $log): ?>
                <tr>
                    <td class="p-4 border-b"><?= $log->id == $crrntUserId ? $log->user_id . " (Tú)" : $log->user_id  ?></td>
                    <td class="p-4 border-b">Inicio de Sesión</td>
                    <td class="p-4 border-b"><?= date("d \d\\e F \d\\e Y, g:i A", strtotime($log->fecha_acceso)) ?></td>
                </tr>
            <?php endforeach ?>

            </tbody>
        </table>
    </div>
</main>