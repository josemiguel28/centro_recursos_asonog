<section class="min-h-screen bg-white py-8 px-4 lg:px-12">

    <div class="max-w-screen-2xl mx-auto">

        <!-- Header -->
        <div class="flex items-center justify-between mb-6">
            <div class="flex items-center gap-4">
                
                <?php
                include_once __DIR__ . "/../../templates/components/btn_back.php";
                btnBack("/admin");
                ?>

                <div>
                    <h1 class="text-2xl font-bold text-gray-900">Gestión de Libros</h1>
                    <p class="text-sm text-gray-500 mt-0.5">Administra el catálogo de libros del sistema</p>
                </div>
            </div>

            <a href="/libro?mode=INS">
                <button type="button"
                    class="flex items-center gap-2 px-4 py-2 text-sm font-semibold text-white bg-yellow-400 hover:bg-primary-300 rounded-lg transition-colors">
                    <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path clip-rule="evenodd" fill-rule="evenodd"
                            d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                    </svg>
                    Agregar Libro
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
                            <th scope="col" class="px-4 py-3.5 text-xs font-semibold text-gray-500 uppercase tracking-wider">Título</th>
                            <th scope="col" class="px-4 py-3.5 text-xs font-semibold text-gray-500 uppercase tracking-wider">Autor</th>
                            <th scope="col" class="px-4 py-3.5 text-xs font-semibold text-gray-500 uppercase tracking-wider">Categoría</th>
                            <th scope="col" class="px-4 py-3.5 text-xs font-semibold text-gray-500 uppercase tracking-wider">Estado</th>
                            <th scope="col" class="px-4 py-3.5 text-xs font-semibold text-gray-500 uppercase tracking-wider text-right">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">

                        <?php foreach ($libros as $libro) : ?>

                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-4 py-3 text-gray-400 text-xs font-mono">
                                    #<?= $libro->id; ?>
                                </td>
                                <td class="px-4 py-3">
                                    <div class="flex items-center gap-3">
                                        <img src="/imagenesLibros/<?= $libro->imagen; ?>" alt="portada"
                                            class="w-8 h-10 object-cover rounded shadow-sm flex-shrink-0">
                                        <span class="font-medium text-gray-900 truncate max-w-[360px]">
                                            <?= $libro->titulo; ?>
                                        </span>
                                    </div>
                                </td>
                                <td class="px-4 py-3 text-gray-600">
                                    <?= $libro->autor; ?>
                                </td>
                                <td class="px-4 py-3 text-gray-600">
                                    <?= $libro->id_categoria; ?>
                                </td>
                                <td class="px-4 py-3">
                                    <?php if ($libro->estado === "INA") : ?>
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
                                        <a href="/libro?mode=DSP&id=<?= $libro->id ?>"
                                            class="inline-flex items-center px-3 py-1.5 text-xs font-medium text-gray-700 bg-gray-100 hover:bg-gray-200 rounded-lg transition-colors">
                                            Ver
                                        </a>
                                        <a href="/libro?mode=UPD&id=<?= $libro->id ?>"
                                            class="inline-flex items-center px-3 py-1.5 text-xs font-medium text-blue-700 bg-blue-50 hover:bg-blue-100 rounded-lg transition-colors">
                                            Editar
                                        </a>
                                        <a href="/libro?mode=DEL&id=<?= $libro->id ?>"
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

        <!-- Pagination -->
        <div class="flex items-center justify-between mt-4">
            <p class="text-sm text-gray-500">
                Mostrando <span class="font-medium text-gray-700"><?= $total > 0 ? (($page - 1) * $perPage) + 1 : 0 ?></span>
                –
                <span class="font-medium text-gray-700"><?= min($page * $perPage, $total) ?></span>
                de <span class="font-medium text-gray-700"><?= $total ?></span> libros
            </p>

            <?php if ($lastPage > 1) : ?>
                <div class="flex items-center gap-1">
                    <!-- Anterior -->
                    <?php if ($page > 1) : ?>
                        <a href="?page=<?= $page - 1 ?>"
                            class="inline-flex items-center px-3 py-1.5 text-sm text-gray-600 bg-white border border-gray-200 rounded-lg hover:bg-gray-50 transition-colors">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                            </svg>
                            Anterior
                        </a>
                    <?php else : ?>
                        <span class="inline-flex items-center px-3 py-1.5 text-sm text-gray-300 bg-white border border-gray-100 rounded-lg cursor-not-allowed">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                            </svg>
                            Anterior
                        </span>
                    <?php endif; ?>

                    <!-- Páginas numeradas -->
                    <?php
                    $start = max(1, $page - 2);
                    $end   = min($lastPage, $page + 2);
                    ?>

                    <?php if ($start > 1) : ?>
                        <a href="?page=1" class="inline-flex items-center justify-center w-9 h-9 text-sm text-gray-600 bg-white border border-gray-200 rounded-lg hover:bg-gray-50 transition-colors">1</a>
                        <?php if ($start > 2) : ?>
                            <span class="px-1 text-gray-400">…</span>
                        <?php endif; ?>
                    <?php endif; ?>

                    <?php for ($i = $start; $i <= $end; $i++) : ?>
                        <?php if ($i === $page) : ?>
                            <span class="inline-flex items-center justify-center w-9 h-9 text-sm font-semibold text-white bg-gray-800 rounded-lg">
                                <?= $i ?>
                            </span>
                        <?php else : ?>
                            <a href="?page=<?= $i ?>" class="inline-flex items-center justify-center w-9 h-9 text-sm text-gray-600 bg-white border border-gray-200 rounded-lg hover:bg-gray-50 transition-colors">
                                <?= $i ?>
                            </a>
                        <?php endif; ?>
                    <?php endfor; ?>

                    <?php if ($end < $lastPage) : ?>
                        <?php if ($end < $lastPage - 1) : ?>
                            <span class="px-1 text-gray-400">…</span>
                        <?php endif; ?>
                        <a href="?page=<?= $lastPage ?>" class="inline-flex items-center justify-center w-9 h-9 text-sm text-gray-600 bg-white border border-gray-200 rounded-lg hover:bg-gray-50 transition-colors"><?= $lastPage ?></a>
                    <?php endif; ?>

                    <!-- Siguiente -->
                    <?php if ($page < $lastPage) : ?>
                        <a href="?page=<?= $page + 1 ?>"
                            class="inline-flex items-center px-3 py-1.5 text-sm text-gray-600 bg-white border border-gray-200 rounded-lg hover:bg-gray-50 transition-colors">
                            Siguiente
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </a>
                    <?php else : ?>
                        <span class="inline-flex items-center px-3 py-1.5 text-sm text-gray-300 bg-white border border-gray-100 rounded-lg cursor-not-allowed">
                            Siguiente
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </span>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>

    </div>
</section>

</div>
</section>