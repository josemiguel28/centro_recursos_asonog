<?php
// Definir el color de fondo basado en las condiciones
$backgroundColor = '';
if ($mode === "DEL") {
    $backgroundColor = 'bg-red-300';
} elseif ($usuario->confirmado == 0 && $mode === "UPD") {
    $backgroundColor = 'bg-yellow-300';
}
?>

<div class="text-center text-sm font-semibold px-2 py-2 rounded-[1rem] <?= $backgroundColor; ?>">
    <?= $mode === "DEL" ? " Esta acción no se puede deshacer ⚠️" : "" ?>
    <?= ($usuario->confirmado == 0 && $mode === "UPD") ? " No se puede modificar un usuario sin confirmar ⚠️ " : "" ?>
</div>