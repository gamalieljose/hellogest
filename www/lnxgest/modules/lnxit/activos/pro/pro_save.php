<?php
$idactivo = $_POST["hidactivo"];
$idlinea = $_POST["hidlinea"];
$haccion = $_POST["haccion"];

$flsttercero = $_POST["lsttercero"];
$ftxtnotas = addslashes($_POST["txtnotas"]);



if ($haccion == 'new')
{
	$sqltercero= $mysqli->query("insert into ".$prefixsql."ita_pro (idactivo, idtercero, notas) VALUES ('".$idactivo."', '".$flsttercero."', '".$ftxtnotas."' )");
	
	
}
if ($haccion == 'update')
{

	$sqltercero= $mysqli->query("update ".$prefixsql."ita_pro set idtercero = '".$flsttercero."', notas = '".$ftxtnotas."' where id = '".$idlinea."'");
	
}
if ($haccion == 'delete')
{
	$sqltercero= $mysqli->query("delete from ".$prefixsql."ita_pro where id = '".$idlinea."'");
	
}

$urlatras = "index.php?module=lnxit&section=activos&ss=proveedores&id=".$idactivo;
header( "refresh:2;url=".$urlatras );
	echo '<div align="center">
	<table width="300" class="msgaviso">
	<tr><td class="maintitle">mensaje:</td></tr>
	<tr><td>Cambios efectuados con éxito</td></tr>
	<tr><td align="center"><a class="btnedit" href="'.$urlatras.'">Aceptar</a></td></tr>
	</table></div>';

?>