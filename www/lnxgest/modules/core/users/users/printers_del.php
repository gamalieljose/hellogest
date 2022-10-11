<?php
$iduser = $_GET["id"];
$idprinter = $_GET["idprintuser"];

$url_atras = "index.php?&module=core&section=users_printers&id=".$iduser."&upd=ate";

$sqljobs = $mysqli->query("select * From ".$prefixsql."printjobs where idprinter = '".$idprinter."' ");
$existe = $sqljobs->num_rows;


if($existe > "0")
{
	

	header( "refresh:2;url=".$urlatras );
	echo '<div align="center">
	<table width="300">
	<tr class="maintitle"><td>Eliminación de impresora<td></tr>

	<tr><td>La impresora aún contiene documentos en cola </br>
	Elimine primero los documentos en cola para poder eliminar la impresora del usuario</br>
	</br>
	<a href="'.$url_atras.'" class="btnedit">Aceptar</a>
	<td></tr>

	</table>
	</div>';

}
else
{
	
	$sqljobs = $mysqli->query("delete From ".$prefixsql."usersprinters where idprinter = '".$idprinter."' and iduser = '".$iduser."'");
	header( "Location: ".$url_atras );
}
?>