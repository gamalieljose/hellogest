<?php
$idservicio = $_POST["hidservicio"];
$haccion = $_POST["haccion"];

$ftxtservicio = $_POST["txtservicio"];



if ($haccion == 'new')
{
	$sqltercero= $mysqli->query("insert into ".$prefixsql."ita_estados (estado) VALUES ('".$ftxtservicio."' )");
	
}
if ($haccion == 'update')
{

	$sqltercero= $mysqli->query("update ".$prefixsql."ita_estados set estado = '".$ftxtservicio."' where id = '".$idservicio."'");
	
}
if ($haccion == 'delete')
{
	$sqltercero= $mysqli->query("delete from ".$prefixsql."ita_estados where id = '".$idservicio."'");
}

$urlatras = "index.php?module=lnxit&section=activos&ss=estados";
header( "refresh:2;url=".$urlatras );
	echo '<div align="center">
	<table width="300" class="msgaviso">
	<tr><td class="maintitle">mensaje:</td></tr>
	<tr><td>Cambios efectuados con éxito</td></tr>
	<tr><td align="center"><a class="btnedit" href="'.$urlatras.'">Aceptar</a></td></tr>
	</table></div>';

?>