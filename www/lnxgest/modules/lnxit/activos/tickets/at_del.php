<?php
$idticket = $_GET["id"];
$idactivolinea = $_GET["idline"];

$ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."ita_tickets where id = '".$idactivolinea."' ");
$row = mysqli_fetch_assoc($ConsultaMySql);

$idactivo = $row['idactivo'];

$ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."ita_activos where id = '".$idactivo."' ");
$row = mysqli_fetch_assoc($ConsultaMySql);

$nombreactivo = $row['nombre'];

?>
<p></p>
<div align="center">
<?php echo '<form name="form1" action="index.php?module=lnxit&section=ticketactivos&id='.$idticket.'&action=save" method="post">'; ?>
	<table width="300" class="msgaviso">
	<tr><td class="maintitle">mensaje:
	<input type="hidden" name="haccion" value="delete">
	<?php
	echo '<input type="hidden" name="hidline" value="'.$_GET["idline"].'">';
	echo '<input type="hidden" name="hidticket" value="'.$idticket.'">';
	?>
	</td></tr>
	<tr><td>
	<?php
	echo '<p>¿Desea borrar el activo relacionado: ?</p>';
	
	echo $nombreactivo;
	?>
	</td></tr>
	<tr><td align="center">
	<input class="btnsubmit" name="btnnuevo" value="Eliminar" type="submit"> 
	<?php
	echo '<a class="btnenlacecancel" href="index.php?module=lnxit&section=ticketactivos&id=67">Cancelar</a>';
	?>
	
	
	
	</td></tr>
	</table>
</form>
</div>
	
