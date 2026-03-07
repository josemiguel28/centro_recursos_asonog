<section class="min-h-screen bg-white py-8 px-4 lg:px-12">

    <div class="max-w-screen-2xl mx-auto">

        <!-- Header -->
        <div class="flex items-center justify-between mb-6">
            <div class="flex items-center gap-4">
                <a href="/admin">
                    <button type="button"
                        class="text-gray-600 hover:text-gray-900 hover:bg-gray-100 rounded-full p-2 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path fill="currentColor" d="m10 18l-6-6l6-6l1.4 1.45L7.85 11H20v2H7.85l3.55 3.55z"/>
                        </svg>
                    </button>
                </a>
                <div>
                    <h1 class="text-2xl font-bold text-gray-900">Gestión del Repositorio</h1>
                    <p class="text-sm text-gray-500 mt-0.5">Administra los documentos técnicos del sistema</p>
                </div>
            </div>

            <a href="/documento?mode=INS">
                <button type="button"
                    class="flex items-center gap-2 px-4 py-2 text-sm font-semibold text-white bg-gray-800 hover:bg-gray-700 rounded-lg transition-colors">
                    <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path clip-rule="evenodd" fill-rule="evenodd"
                            d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"/>
                    </svg>
                    Agregar Documento
                </button>
            </a>
        </div>

        <?php include_once __DIR__ . "/../../templates/alertas.php"; ?>

        <!-- Table card -->
        <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left">
                    <thead>
                        <tr class="bg-gray-50 border-b border-gray-200">
                            <th scope="col" class="px-4 py-3.5 text-xs font-semibold text-gray-500 uppercase tracking-wider w-16">ID</th>
                            <th scope="col" class="px-4 py-3.5 text-xs font-semibold text-gray-500 uppercase tracking-wider">Herramienta</th>
                            <th scope="col" class="px-4 py-3.5 text-xs font-semibold text-gray-500 uppercase tracking-wider">Tipo</th>
                            <th scope="col" class="px-4 py-3.5 text-xs font-semibold text-gray-500 uppercase tracking-wider">Temática</th>
                            <th scope="col" class="px-4 py-3.5 text-xs font-semibold text-gray-500 uppercase tracking-wider">Técnico(s)</th>
                            <th scope="col" class="px-4 py-3.5 text-xs font-semibold text-gray-500 uppercase tracking-wider">Fecha Emisión</th>
                            <th scope="col" class="px-4 py-3.5 text-xs font-semibold text-gray-500 uppercase tracking-wider">Estado</th>
                            <th scope="col" class="px-4 py-3.5 text-xs font-semibold text-gray-500 uppercase tracking-wider text-right">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">

                        <?php foreach ($documentos as $documento) : ?>

                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-4 py-3 text-gray-400 text-xs font-mono">
                                    #<?= $documento->id; ?>
                                </td>
                                <td class="px-4 py-3">
                                    <div class="flex items-center gap-3">
                                        <img src="/imagenesDocumentos/<?= $documento->imagen; ?>" alt="portada"
                                            class="w-8 h-10 object-cover rounded shadow-sm flex-shrink-0">
                                        <span class="font-medium text-gray-900 truncate max-w-[300px]">
                                            <?= $documento->nombre_herramienta; ?>
                                        </span>
                                    </div>
                                </td>
                                <td class="px-4 py-3 text-gray-600">
                                    <?= $documento->tipo_herramienta; ?>
                                </td>
                                <td class="px-4 py-3 text-gray-600">
                                    <?= $documento->tematica; ?>
                                </td>
                                <td class="px-4 py-3 text-gray-600 max-w-[200px]">
                                    <span class="line-clamp-1"><?= $documento->tecnico; ?></span>
                                </td>
                                <td class="px-4 py-3 text-gray-600 whitespace-nowrap">
                                    <?= $documento->fecha_emision; ?>
                                </td>
                                <td class="px-4 py-3">
                                    <?php if ($documento->estado === "INA") : ?>
                                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium bg-red-50 text-red-700 ring-1 ring-red-200">
                                            <span class="w-1.5 h-1.5 rounded-full bg-red-500"></span>
                                            Inactivo
                                        </span>
                                    <?php else : ?>
                                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium bg-green-50 text-green-700 ring-1 ring-green-200">
                                            <span class="w-1.5 h-1.5 rounded-full bg-green-500"></span>
                                            Activo
                                        </span>
                                    <?php endif; ?>
                                </td>
                                <td class="px-4 py-3">
                                    <div class="flex items-center justify-end gap-2">
                                        <a href="/documento?mode=DSP&id=<?= $documento->id ?>"
                                            class="inline-flex items-center px-3 py-1.5 text-xs font-medium text-gray-700 bg-gray-100 hover:bg-gray-200 rounded-lg transition-colors">
                                            Ver
                                        </a>
                                        <a href="/documento?mode=UPD&id=<?= $documento->id ?>"
                                            class="inline-flex items-center px-3 py-1.5 text-xs font-medium text-blue-700 bg-blue-50 hover:bg-blue-100 rounded-lg transition-colors">
                                            Editar
                                        </a>
                                        <a href="/documento?mode=DEL&id=<?= $documento->id ?>"
                                            class="inline-flex items-center px-3 py-1.5 text-xs font-medium text-red-700 bg-red-50 hover:bg-red-100 rounded-lg transition-colors">
                                            Eliminar
                                        </a>
                                    </div>
                                </td>
                            </tr>

                        <?php endforeach; ?>

                    </tbody>
                </table>
            </div>
        </div>

    </div>
</section>