<?php if ($mode === "UPD" || $mode === "DEL" || $mode === "INS") : ?>

    <div class="bg-primary-500 hover:bg-primary-300 font-medium rounded-lg <?= $mode === "DEL" ? 'bg-red-600 hover:bg-red-300' : '' ?>">
        <button type="submit"
                class="w-full text-white text-sm px-5 py-2.5 text-center ">
            <?= $mode === "DEL" ? 'Eliminar' : 'Guardar' ?>
        </button>
    </div>

<?php endif; ?>
