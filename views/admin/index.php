<div class="min-h-screen bg-white py-8 px-4 lg:px-12">
    <div class="max-w-screen-2xl mx-auto">

        <?php include_once __DIR__ . "../../templates/userLogInfo.php"; ?>

        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-2xl font-bold text-gray-900">Panel de Administrador</h1>
            <p class="text-sm text-gray-500 mt-0.5">Bienvenido al panel de control del sistema</p>
        </div>

        <!-- Acceso Rápido -->
        <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-3">Acceso Rápido</p>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-5 mb-10">

            <a href="/usuario?mode=INS"
               class="flex items-center gap-5 p-6 bg-white border border-gray-200 rounded-xl shadow-sm hover:border-gray-300 hover:shadow-md transition-all">
                <div class="flex-shrink-0 w-14 h-14 flex items-center justify-center rounded-xl bg-gray-100">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24">
                        <g fill="none">
                            <circle cx="12" cy="8" r="4" stroke="#374151" stroke-linecap="round"/>
                            <path fill="#374151" fill-rule="evenodd"
                                  d="M15.276 16a11 11 0 0 0-4.37-.446c-1.64.162-3.191.686-4.456 1.517c-1.264.832-2.196 1.943-2.648 3.208a.5.5 0 1 0 .941.336C5.11 19.588 5.885 18.64 7 17.907s2.508-1.21 4.005-1.358c.55-.054 1.103-.063 1.649-.028A2 2 0 0 1 14 16z"
                                  clip-rule="evenodd"/>
                            <path stroke="#374151" stroke-linecap="round" d="M18 14v8m4-4h-8"/>
                        </g>
                    </svg>
                </div>
                <div>
                    <p class="text-base font-semibold text-gray-900">Crear Usuario</p>
                    <p class="text-sm text-gray-500 mt-0.5">Añadir un nuevo usuario</p>
                </div>
            </a>

            <a href="/libro?mode=INS"
               class="flex items-center gap-5 p-6 bg-white border border-gray-200 rounded-xl shadow-sm hover:border-gray-300 hover:shadow-md transition-all">
                <div class="flex-shrink-0 w-14 h-14 flex items-center justify-center rounded-xl bg-gray-100">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 20 20">
                        <path fill="#374151"
                              d="M14 3H6a1 1 0 0 0-1 1v11h4.022q.047.516.185 1H5a1 1 0 0 0 1 1h3.6q.276.538.657 1H6a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v5.207a5.5 5.5 0 0 0-1-.185V4a1 1 0 0 0-1-1M6 5v1a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V5a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1m1 0h6v1H7zm12 9.5a4.5 4.5 0 1 1-9 0a4.5 4.5 0 0 1 9 0m-4-2a.5.5 0 0 0-1 0V14h-1.5a.5.5 0 0 0 0 1H14v1.5a.5.5 0 0 0 1 0V15h1.5a.5.5 0 0 0 0-1H15z"/>
                    </svg>
                </div>
                <div>
                    <p class="text-base font-semibold text-gray-900">Agregar Libro</p>
                    <p class="text-sm text-gray-500 mt-0.5">Registrar un nuevo libro</p>
                </div>
            </a>

            <a href="/documento?mode=INS"
               class="flex items-center gap-5 p-6 bg-white border border-gray-200 rounded-xl shadow-sm hover:border-gray-300 hover:shadow-md transition-all">
                <div class="flex-shrink-0 w-14 h-14 flex items-center justify-center rounded-xl bg-gray-100">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 48 48">
                        <path fill="#374151"
                              d="M10.5 8.25c0-.966.784-1.75 1.75-1.75H24v8.75A3.75 3.75 0 0 0 27.75 19h9.75v20.75a1.75 1.75 0 0 1-1.75 1.75H24.26a13 13 0 0 1-1.88 2.5h13.37A4.25 4.25 0 0 0 40 39.75V18.414a2.25 2.25 0 0 0-.659-1.59L27.177 4.658A2.25 2.25 0 0 0 25.586 4H12.25A4.25 4.25 0 0 0 8 8.25v14.746a13 13 0 0 1 2.5-.756zm24.982 8.25H27.75c-.69 0-1.25-.56-1.25-1.25V7.518zM24 35c0 6.075-4.925 11-11 11S2 41.075 2 35s4.925-11 11-11s11 4.925 11 11m-10-7a1 1 0 1 0-2 0v6H6a1 1 0 1 0 0 2h6v6a1 1 0 1 0 2 0v-6h6a1 1 0 1 0 0-2h-6z"/>
                    </svg>
                </div>
                <div>
                    <p class="text-base font-semibold text-gray-900">Agregar Documento</p>
                    <p class="text-sm text-gray-500 mt-0.5">Registrar un nuevo documento</p>
                </div>
            </a>

            <a href="/usuarios/gestionar"
               class="flex items-center gap-5 p-6 bg-white border border-gray-200 rounded-xl shadow-sm hover:border-gray-300 hover:shadow-md transition-all">
                <div class="flex-shrink-0 w-14 h-14 flex items-center justify-center rounded-xl bg-gray-100">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24">
                        <g fill="none" stroke="#374151" stroke-width="1.5">
                            <circle cx="9" cy="6" r="4"/>
                            <path stroke-linecap="round" d="M15 9a3 3 0 1 0 0-6"/>
                            <ellipse cx="9" cy="17" rx="7" ry="4"/>
                            <path stroke-linecap="round" d="M18 14c1.754.385 3 1.359 3 2.5c0 1.03-1.014 1.923-2.5 2.37"/>
                        </g>
                    </svg>
                </div>
                <div>
                    <p class="text-base font-semibold text-gray-900">Gestión de Usuarios</p>
                    <p class="text-sm text-gray-500 mt-0.5">Administrar usuarios existentes</p>
                </div>
            </a>

            <a href="/gestionar/libros"
               class="flex items-center gap-5 p-6 bg-white border border-gray-200 rounded-xl shadow-sm hover:border-gray-300 hover:shadow-md transition-all">
                <div class="flex-shrink-0 w-14 h-14 flex items-center justify-center rounded-xl bg-gray-100">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 256 256">
                        <path fill="#374151"
                              d="M208 24H72a32 32 0 0 0-32 32v168a8 8 0 0 0 8 8h144a8 8 0 0 0 0-16H56a16 16 0 0 1 16-16h136a8 8 0 0 0 8-8V32a8 8 0 0 0-8-8m-8 160H72a31.8 31.8 0 0 0-16 4.29V56a16 16 0 0 1 16-16h128Z"/>
                    </svg>
                </div>
                <div>
                    <p class="text-base font-semibold text-gray-900">Gestión de Libros</p>
                    <p class="text-sm text-gray-500 mt-0.5">Administrar libros existentes</p>
                </div>
            </a>

            <a href="/repositorio/gestionar"
               class="flex items-center gap-5 p-6 bg-white border border-gray-200 rounded-xl shadow-sm hover:border-gray-300 hover:shadow-md transition-all">
                <div class="flex-shrink-0 w-14 h-14 flex items-center justify-center rounded-xl bg-gray-100">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 34 32">
                        <g fill="#374151">
                            <path d="M1.512 28H19.5c.827 0 1.5-.673 1.5-1.5v-19c0-.023-.01-.043-.013-.065a.4.4 0 0 0-.013-.062a.5.5 0 0 0-.122-.227L13.853.147a.5.5 0 0 0-.289-.135C13.543.01 13.523 0 13.5 0H1.506C.676 0 0 .673 0 1.5v25c0 .827.678 1.5 1.512 1.5M14 1.707L19.293 7H14.5a.5.5 0 0 1-.5-.5zM1 1.5c0-.276.227-.5.506-.5H13v5.5c0 .827.673 1.5 1.5 1.5H20v18.5a.5.5 0 0 1-.5.5H1.512A.506.506 0 0 1 1 26.5z"/>
                            <path d="M4.5 12h12a.5.5 0 0 0 0-1h-12a.5.5 0 0 0 0 1m0 4h12a.5.5 0 0 0 0-1h-12a.5.5 0 0 0 0 1"/>
                        </g>
                    </svg>
                </div>
                <div>
                    <p class="text-base font-semibold text-gray-900">Gestión de Documentos</p>
                    <p class="text-sm text-gray-500 mt-0.5">Administrar documentos existentes</p>
                </div>
            </a>

            <a href="https://analytics.google.com/analytics/web/?utm_source=marketingplatform.google.com&utm_medium=et&utm_campaign=marketingplatform.google.com%2Fabout%2Fanalytics%2F#/p452859533/reports/intelligenthome?params=_u..nav%3Dmaui"
               target="_blank"
               class="flex items-center gap-5 p-6 bg-white border border-gray-200 rounded-xl shadow-sm hover:border-gray-300 hover:shadow-md transition-all">
                <div class="flex-shrink-0 w-14 h-14 flex items-center justify-center rounded-xl bg-gray-100">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 16 16">
                        <path fill="#374151" d="M1.75 13.25V1.5H.5v12a1.24 1.24 0 0 0 1.22 1H15.5v-1.25z"/>
                        <path fill="#374151" d="M3.15 8H4.4v3.9H3.15zm3.26-4h1.26v7.9H6.41zm3.27 2h1.25v5.9H9.68zm3.27-3.5h1.25v9.4h-1.25z"/>
                    </svg>
                </div>
                <div>
                    <p class="text-base font-semibold text-gray-900">Estadísticas</p>
                    <p class="text-sm text-gray-500 mt-0.5">Google Analytics</p>
                </div>
            </a>

        </div>

        <!-- Estadísticas Recientes -->
        <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-3">Estadísticas Recientes</p>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-10">

            <div class="bg-white border border-gray-200 rounded-xl shadow-sm p-5">
                <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-3">Libros Registrados</p>
                <p class="text-4xl font-bold text-gray-900 mb-4"><?= $totalLibros; ?></p>
                <div class="flex items-center gap-3">
                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium bg-green-50 text-green-700 ring-1 ring-green-200">
                        <span class="w-1.5 h-1.5 rounded-full bg-green-500"></span>
                        <?= $bookStatistics["activeCount"] ?> Activos
                    </span>
                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium bg-red-50 text-red-700 ring-1 ring-red-200">
                        <span class="w-1.5 h-1.5 rounded-full bg-red-500"></span>
                        <?= $bookStatistics["inactiveCount"] ?> Inactivos
                    </span>
                </div>
            </div>

            <div class="bg-white border border-gray-200 rounded-xl shadow-sm p-5">
                <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-3">Documentos Registrados</p>
                <p class="text-4xl font-bold text-gray-900 mb-4"><?= $totalDocumentos; ?></p>
                <div class="flex items-center gap-3">
                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium bg-green-50 text-green-700 ring-1 ring-green-200">
                        <span class="w-1.5 h-1.5 rounded-full bg-green-500"></span>
                        <?= $documentStatistics["activeCount"] ?> Activos
                    </span>
                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium bg-red-50 text-red-700 ring-1 ring-red-200">
                        <span class="w-1.5 h-1.5 rounded-full bg-red-500"></span>
                        <?= $documentStatistics["inactiveCount"] ?> Inactivos
                    </span>
                </div>
            </div>

            <div class="bg-white border border-gray-200 rounded-xl shadow-sm p-5">
                <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-3">Usuarios Registrados</p>
                <p class="text-4xl font-bold text-gray-900 mb-4"><?= $totalUsuarios; ?></p>
                <div class="flex items-center gap-3">
                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium bg-green-50 text-green-700 ring-1 ring-green-200">
                        <span class="w-1.5 h-1.5 rounded-full bg-green-500"></span>
                        <?= $userStatistics["activeCount"] ?> Activos
                    </span>
                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium bg-red-50 text-red-700 ring-1 ring-red-200">
                        <span class="w-1.5 h-1.5 rounded-full bg-red-500"></span>
                        <?= $userStatistics["inactiveCount"] ?> Inactivos
                    </span>
                </div>
            </div>

        </div>

        <!-- Últimas Actividades -->
        <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-3">Últimas Actividades</p>
        <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left">
                    <thead>
                        <tr class="bg-gray-50 border-b border-gray-200">
                            <th class="px-4 py-3.5 text-xs font-semibold text-gray-500 uppercase tracking-wider">Usuario</th>
                            <th class="px-4 py-3.5 text-xs font-semibold text-gray-500 uppercase tracking-wider">Actividad</th>
                            <th class="px-4 py-3.5 text-xs font-semibold text-gray-500 uppercase tracking-wider">Fecha</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        <?php foreach ($accessLog as $log): ?>
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-4 py-3 font-medium text-gray-900">
                                    <?= $log->id == $crrntUserId ? $log->user_id . ' <span class="text-xs text-gray-400 font-normal">(Tú)</span>' : $log->user_id ?>
                                </td>
                                <td class="px-4 py-3 text-gray-600">
                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium bg-blue-50 text-blue-700 ring-1 ring-blue-200">
                                        Inicio de Sesión
                                    </span>
                                </td>
                                <td class="px-4 py-3 text-gray-500 whitespace-nowrap">
                                    <?php
                                        $meses = ['enero','febrero','marzo','abril','mayo','junio','julio','agosto','septiembre','octubre','noviembre','diciembre'];
                                        $ts = strtotime($log->fecha_acceso);
                                        echo date('d', $ts) . ' de ' . $meses[date('n', $ts) - 1] . ' de ' . date('Y, g:i A', $ts);
                                    ?>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>