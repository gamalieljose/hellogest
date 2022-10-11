<?php
$fhaccion = $_POST["haccion"];
$fhidfichero = $_POST["hidfichero"];

$url_origen = $_POST["url_origen"];
$farchivo_module = $_POST["archivo_module"];
$farchivo_linea0 = $_POST["archivo_linea0"];
$farchivo_linea1 = $_POST["archivo_linea1"];
$farchivo_linea2 = $_POST["archivo_linea2"];
$farchivo_display = $_POST["archivo_display"];


if ($fhidfichero == '')
{
	header( "refresh:2;url=".$url_origen );
	
	echo '<div align="center">';
	echo '<table class="msgaviso">';
	echo '<tr class="maintitle"><td>Error editar fichero adjunto</td></tr>';
	echo '<tr><td>No se ha seleccionado ningun fichero</td></tr>';
	echo '<tr><td align="center"><a class="btnedit" href="'.$url_origen.'" >Aceptar</a></td></tr>';
	echo '</table></div>';
}
else
{
	$sqlfichero = $mysqli->query("select * from ".$prefixsql."ficheros_loc where id = '".$fhidfichero."'");
	$row = mysqli_fetch_assoc($sqlfichero);
	$dbidfichero = $row["idfichero"];
	$dbdisplay = $row["display"];
	
	$sqlfichero = $mysqli->query("select * from ".$prefixsql."ficheros where id = '".$dbidfichero."'");
	$row = mysqli_fetch_assoc($sqlfichero);
	$dbnombre = $row["nombre"];
	$dbdescripcion = $row["descripcion"];
	
	echo '<form name="form3" action ="index.php?module=ficheros&section=selsave" method="POST">';
	echo '<input type="hidden" name="haccion" value="selborra"/>';

	echo '<input type="hidden" name="url_origen" value="'.$url_origen.'"/>';
	echo '<input type="hidden" name="archivo_module" value="'.$farchivo_module.'"/>';
	echo '<input type="hidden" name="archivo_linea0" value="'.$farchivo_linea0.'"/>';
	echo '<input type="hidden" name="archivo_linea1" value="'.$farchivo_linea1.'"/>';
	echo '<input type="hidden" name="archivo_linea2" value="'.$farchivo_linea2.'"/>';
	echo '<input type="hidden" name="archivo_display" value="'.$farchivo_display.'"/>';
	
	echo '<input type="hidden" name="hidfichero" value="'.$fhidfichero.'"/>';
	

	echo '<div align="center">';
	echo '<table>';
	echo '<tr class="maintitle">';
	echo '<td>Campo</td>';
	echo '<td>Valor</td>';
	echo '</tr>';
	echo '<tr>';
	echo '<td>Nombre fichero:</td>';
	echo '<td>'.$dbnombre.'</td>';
	echo '</tr>';
	echo '<tr>';
	echo '<td>Descripcion</td>';
	echo '<td>'.$dbdescripcion.'</td>';
	echo '</tr>';
	echo '<tr>';
	echo '<td>Nota</td>';
	echo '<td>'.$dbdisplay.'</td>';
	echo '</tr>';
	echo '<tr><td colspan="2" align="center"><input type="submit" class="btnsubmit" value="Borrar" /> 
	<a href="'.$url_origen.'" class="btncancel">Cancelar</a></td></tr>';	
	echo '</table>
	</form>
		<p>&nbsp;</p><p>&nbsp;</p>';
		
		echo '</div>';

}

?>