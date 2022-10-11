<?php
$fhaccion = $_POST["haccion"];
$idalmacen = $_POST["hidalmacen"];
$ftxtalmacen = $_POST["txtalmacen"];
$fchkdefecto = $_POST["chkdefecto"];

if ($fchkdefecto == ''){$fchkdefecto = '0';}

if ($fchkdefecto == '1' and $fhaccion <> 'delete')
{
	$sqltercero= $mysqli->query("update ".$prefixsql."almacenes set dft = '0' where id > '0'");
}

if ($fhaccion == 'new')
{
	$sqltercero= $mysqli->query("insert into ".$prefixsql."almacenes (almacen, dft) VALUES ('".$ftxtalmacen."', '".$fchkdefecto."')");
}
if ($fhaccion == 'update')
{
	$sqltercero= $mysqli->query("update ".$prefixsql."almacenes set almacen = '".$ftxtalmacen."', dft = '".$fchkdefecto."' where id = '".$idalmacen."'");
}
if ($fhaccion == 'delete')
{
	$sqltercero= $mysqli->query("delete from ".$prefixsql."almacenes where id = '".$idalmacen."'");
}


$url_atras = "index.php?module=almacen&section=wh";
header( "refresh:2;url=".$url_atras );
	echo '<div align="center">
	<table width="300" class="msgaviso">
	<tr><td class="maintitle">mensaje:</td></tr>
	<tr><td>Cambios efectuados con éxito</td></tr>';
	echo '<tr><td align="center"><a class="btnedit" href="'.$url_atras.'">Aceptar</a></td></tr>';
	echo '</table></div>';

?>