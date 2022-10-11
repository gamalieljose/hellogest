<?php
include("modules/crm/camp/botonera.php");
?>
<div class="row">
	<div class="col maintitle" align="left">
		Opciones de exportación de ficheros
	</div>
</div>

<div class="row">
	<div class="col-sm-2" align="left">
		Formato Salida
	</div>
	<div class="col" align="left">
		<label><input type="radio" name="optformato" value="CSV" checked=""/> CSV</label>
		</br>
		<label><input type="radio" name="optformato" value="HTML" /> HTML</label>
	</div>
</div>

<div class="row">
	<div class="col-sm-2" align="left">
		Exportar
	</div>
	<div class="col" align="left">

	<label><input type="radio" name="optsalida" value="tododetalles" checked="" /> Exportar todos los detalles</label></br>


	</div>
</div>

<div align="center" class="rectangulobtnsguardar">

    <input type="button" class="btnsubmit" name="btnprocesar" value="Procesar" />

<?php echo ' <a href="index.php?module=crm&section=campterceros&id='.$idcamp.'" class="btncancel">Cancelar</a>'; ?>

</div>
