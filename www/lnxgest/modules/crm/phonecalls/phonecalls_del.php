<?php
$idregistro = $_GET["id"];

$sqlaux = $mysqli->query("select * from ".$prefixsql."crm_phonecalls where id = '".$idregistro."' "); 
$rowaux = mysqli_fetch_assoc($sqlaux);
$dbfecha = $rowaux["fecha"];
$dbidcreado = $rowaux["idcreado"];
$dbidasignado = $rowaux["idasignado"];
$dbidtercero = $rowaux["idtercero"];
$dbidcontacto = $rowaux["idcontacto"];
$dbnota = $rowaux["nota"];
$dbtelefono = $rowaux["telefono"];
$dbtelefono2 = $rowaux["telefono2"];
$dbidestado = $rowaux["idestado"];
$dbidprioridad = $rowaux["idprioridad"];

$sqlaux = $mysqli->query("select id, razonsocial from ".$prefixsql."terceros where id = '".$dbidtercero."' "); 
$rowaux = mysqli_fetch_assoc($sqlaux);
$lbl_tercero = $rowaux["razonsocial"];

$sqlaux = $mysqli->query("select id, nombre from ".$prefixsql."terceroscontactos where id = '".$dbidcontacto."' "); 
$rowaux = mysqli_fetch_assoc($sqlaux);
$lbl_contacto = $rowaux["nombre"];

?>

<form name="formulario1" id="formulario1" action="index.php?module=crm&section=phonecalls&action=save" method="POST">
<input type="hidden" name="haccion" value="delete"/>
<input type="hidden" name="hidregistro" value="<?php echo $idregistro; ?>"/>


<div align="center">
	<table style="max-width: 400px; width: 100%;" class="msgaviso">
	<tr><td class="maintitle">mensaje:</td></tr>
	<tr><td><b>¿Desea Eliminar esta llamada?</b></td></tr>
	<tr><td><?php echo $dbfecha; ?></td></tr>
	<tr><td><?php echo $lbl_tercero; ?></td></tr>
	<tr><td><?php echo $lbl_contacto; ?></td></tr>
	<tr><td><?php echo $dbnota; ?></td></tr>
	
	<tr><td>&nbsp;</td></tr>
	<tr><td align="center">
	<input class="btnsubmit" name="btneliminar" value="Eliminar" type="submit">
	<a class="btncancel" href="index.php?module=crm&section=phonecalls">Cancelar</a>
	</td></tr>
	</table>
</div>


</form>