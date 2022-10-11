<?php
$fhaccion = $_POST["haccion"];
$idtipo = $_POST["hidtipo"];
$ftxttipo = $_POST["txttipo"];




if ($fhaccion == 'new')
{
	$sqltercero= $mysqli->query("insert into ".$prefixsql."productos_tipo (tipo) VALUES ('".$ftxttipo."')");
}
if ($fhaccion == 'update')
{
	$sqltercero= $mysqli->query("update ".$prefixsql."productos_tipo set tipo = '".$ftxttipo."' where id = '".$idtipo."'");
}
if ($fhaccion == 'delete')
{
	$sqltercero= $mysqli->query("delete from ".$prefixsql."productos_tipo where id = '".$idtipo."'");
}


$url_atras = "index.php?module=almacen&section=tipo";
header( "refresh:2;url=".$url_atras );
	echo '<div align="center">
	<table width="300" class="msgaviso">
	<tr><td class="maintitle">mensaje:</td></tr>
	<tr><td>Cambios efectuados con éxito</td></tr>';
	echo '<tr><td align="center"><a class="btnedit" href="'.$url_atras.'">Aceptar</a></td></tr>';
	echo '</table></div>';

?>

?>