<?php
$tfacturar = $_POST['chkidfichero'];
 
foreach($tfacturar as $ticket){
    $valor = $ticket;
    $tickets_aux[] =" id = '".$valor. "' or ";
}
$valores = implode(' ', $tickets_aux);
$sql_valores = $valores." id = '0'";


?>

<div align="center">
<form name="form1" action ="index.php?module=ficheros&section=purgarsave" method="POST">
	<table class="msgaviso">
	<tr class="maintitle"><td>Eliminar archivos huerfanos</td></tr>
	<tr><td>Se va a proceder eliminar los siguientes archivos ¿Desea eliminarlos de forma definitiva?</td></tr>
	<tr><td align="center"><input type="submit" value="Eliminar" class="btnsubmit"/> <a href="index.php?module=ficheros&section=purgar" class="btncancel" >Cacnelar</a></td></tr>
	</table>
	
	<?php 
	
	echo '<input type="hidden" value="'.$sql_valores.'" name="hsqlids" />'; ?>
	
</form>
<p>&nbsp;</p><p>&nbsp;</p>
	
<?php

$ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."ficheros where ".$sql_valores." ");

echo '<table width="100%">';
echo '<tr class="maintitle">
		<td>Fichero</td>
		<td>Descripcion</td>
		<td>Directorio</td>
		<td>Fecha Subida</td>
		<td>Descarga</td>
	</tr>';
	
	while($ficheros = mysqli_fetch_array($ConsultaMySql))
	{
		echo '<tr>';
		echo '<td>'.$ficheros["nombre"].'</td>';
		echo '<td>'.$ficheros["descripcion"].'</td>';
		echo '<td>'.$ficheros["dirfichero"].'</td>';
		echo '<td>'.$ficheros["fsubido"].'</td>';
		echo '<td><a href="modules/ficheros/download.php?id='.$ficheros["id"].'" class="btnedit" >Download</a></td>';
		echo '</tr>';
	}
?>

</div>