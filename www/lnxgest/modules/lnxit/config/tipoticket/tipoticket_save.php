<?php
$idtipoticket = $_POST["hidtipo"];
$haccion = $_POST["haccion"];

$fchlactivo = $_POST["chlactivo"];
    if($fchlactivo == ''){$fchlactivo = '0';}
$ftxttipoticket = addslashes($_POST["txttipoticket"]);



if ($haccion == 'new')
{
	$sqltercero= $mysqli->query("insert into ".$prefixsql."it_tipos (tipo, activo) VALUES ('".$ftxttipoticket."', '".$fchlactivo."' )");
	
}
if ($haccion == 'update')
{

	$sqltercero= $mysqli->query("update ".$prefixsql."it_tipos set tipo = '".$ftxttipoticket."', activo = '".$fchlactivo."' where id = '".$idtipoticket."'");
	
}
if ($haccion == 'delete')
{
	$sqltercero= $mysqli->query("delete from ".$prefixsql."it_tipos where id = '".$idtipoticket."'");
}

$urlatras = "index.php?module=lnxit&section=tipoticket";
header( "refresh:2;url=".$urlatras );
	echo '<div align="center">
	<table width="300" class="msgaviso">
	<tr><td class="maintitle">mensaje:</td></tr>
	<tr><td>Cambios efectuados con éxito</td></tr>
	<tr><td align="center"><a class="btnedit" href="'.$urlatras.'">Aceptar</a></td></tr>
	</table></div>';

?>