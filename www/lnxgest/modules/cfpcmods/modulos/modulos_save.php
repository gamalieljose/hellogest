<?php
$haccion = $_POST["haccion"];
$fhidmodulo = $_POST["hidmodulo"];
$ftxtidmodulo = $_POST["txtidmodulo"];
$ftxtmodulo = $_POST["txtmodulo"];
$ftxtdir = $_POST["txtdir"];
$fchkactivo = $_POST["chkactivo"];
if ($fchkactivo == ''){$fchkactivo = '0';}

if ($haccion == 'new')
{
	$sqltercero= $mysqli->query("insert into ".$prefixsql."modulos (idmod, display, activo, directorio) VALUES ('".$ftxtidmodulo."', '".$ftxtmodulo."', '".$fchkactivo."', '".$ftxtdir."')");
}
if ($haccion == 'update')
{
	$sqltercero= $mysqli->query("update ".$prefixsql."modulos set idmod = '".$ftxtidmodulo."', display = '".$ftxtmodulo."', activo = '".$fchkactivo."', directorio = '".$ftxtdir."'  where id = '".$fhidmodulo."'");
}
if ($haccion == 'delete')
{
	$sqltercero= $mysqli->query("delete from ".$prefixsql."modulos where id = '".$fhidmodulo."'");
}
header( "refresh:2;url=index.php?module=cfpcmods&section=modulos" );
	echo '<div align="center">
	<table width="300" class="msgaviso">
	<tr><td class="maintitle">mensaje:</td></tr>
	<tr><td>Cambios efectuados con éxito</td></tr>
	<tr><td align="center"><a class="btnedit" href="index.php?module=cfpcmods&section=modulos">Aceptar</a></td></tr>
	</table></div>';

?>