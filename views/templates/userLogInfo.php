<div class="">

	<div class="text-3xl">
		<h4>Hola 👋, <span class="font-semibold"> <?php echo $crrntUser ?? '' ?> </span></h4>
	</div>
</div>

<?php if ($_SESSION["admin"]): ?>

<div class="barra-servicios">
	<a href="/admin" class="boton">Ver citas</a>
	<a href="/servicios" class="boton">Ver servicios</a>
	<a href="/servicios/crear" class="boton">Nuevo servicio</a>
</div>

<?php endif; ?>