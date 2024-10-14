<?php 

    foreach ($alertas as $key => $alerta):
        
        foreach ($alerta as $mensaje):
            echo "<div class='text-center $key'>";
            echo $mensaje;
            echo "</div>";
        endforeach;
        
    endforeach;

?>