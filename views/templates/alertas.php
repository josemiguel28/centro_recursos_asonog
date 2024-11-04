<?php
/*
foreach ($alertas as $key => $alerta):

    foreach ($alerta as $mensaje):
        echo "<div class='text-center text-sm $key'>";
        echo $mensaje;
        echo "</div>";
    endforeach;

endforeach;
*/
?>
<?php foreach ($alertas as $key => $alerta): ?>
    <div
            class="relative w-full max-w-80 mx-auto flex flex-wrap items-center justify-center py-3 pl-4 pr-14 rounded-lg text-sm [transition:all_0.5s_ease] border-solid group"
            style="
                    border-color: <?php echo $key === 'success' ? '#28a745' : '#b22b2b'; ?>;
                    background: linear-gradient(<?php echo $key === 'success' ? '#28a7451a' : '#b22b2b1a'; ?>, <?php echo $key === 'success' ? '#28a7451a' : '#b22b2b1a'; ?>);
                    color: <?php echo $key === 'success' ? '#28a745' : '#b22b2b'; ?>;
                    "
    >
        <p class="flex flex-row items-center mr-auto gap-x-2 text-center justify-center">
            <?php if ($key === 'success'): ?>
                <!-- Ícono de verificación (check) para success -->
                <svg
                        stroke="currentColor"
                        fill="none"
                        stroke-width="2"
                        viewBox="0 0 24 24"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        height="28"
                        width="28"
                        class="h-7 w-7"
                        style="color: #28a745;"
                        xmlns="http://www.w3.org/2000/svg"
                >
                    <path d="M20 6L9 17l-5-5"></path>
                </svg>
            <?php else: ?>
                <!-- Ícono de advertencia para errores u otros -->
                <svg
                        stroke="currentColor"
                        fill="none"
                        stroke-width="2"
                        viewBox="0 0 24 24"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        height="28"
                        width="28"
                        class="h-7 w-7"
                        style="color: #b22b2b;"
                        xmlns="http://www.w3.org/2000/svg"
                >
                    <path d="m21.73 18-8-14a2 2 0 0 0-3.48 0l-8 14A2 2 0 0 0 4 21h16a2 2 0 0 0 1.73-3Z"></path>
                    <path d="M12 9v4"></path>
                    <path d="M12 17h.01"></path>
                </svg>
            <?php endif; ?>

            <?php foreach ($alerta as $mensaje): ?>
                <?php echo $mensaje; ?>
            <?php endforeach; ?>
        </p>
    </div>
<?php endforeach; ?>







