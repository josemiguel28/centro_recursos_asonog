<?php 

    foreach ($alertas as $key => $alerta):
        
        foreach ($alerta as $mensaje):
            echo "<div class='alerta $key'>";
            echo $mensaje;
            echo "</div>";
        endforeach;
        
    endforeach;

?>