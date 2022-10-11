<?php
$idservicio = $_POST["hidservicio"];
$haccion = $_POST["haccion"];

$ftxtservicio = $_POST["txtservicio"];



if ($haccion == 'new')
{
	$sqltercero= $mysqli->query("insert into ".$prefixsql."ita_tipos (tipo) VALUES ('".$ftxtservicio."' )");
	
}
if ($haccion == 'update')
{

	$sqltercero= $mysqli->query("update ".$prefixsql."ita_tipos set tipo = '".$ftxtservicio."' where id = '".$idservicio."'");
	
}
if ($haccion == 'delete')
{
	//$sqltercero= $mysqli->query("delete from ".$prefixsql."it_tickets where id = '".$idticket."'");
	//$sqltercero= $mysqli->query("delete from ".$prefixsql."it_seguimiento where idticket = '".$idticket."'");
}

$urlatras = "index.php?module=lnxit&section=activos&ss=tipos";
header( "refresh:2;url=".$urlatras );
	echo '<div align="center">
	<table width="300" class="msgaviso">
	<tr><td class="maintitle">mensaje:</td></tr>
	<tr><td>Cambios efectuados con éxito</td></tr>
	<tr><td align="center"><a class="btnedit" href="'.$urlatras.'">Aceptar</a></td></tr>
	</table></div>';

?>