<?php
$idservicio = $_POST["hidservicio"];
$haccion = $_POST["haccion"];

$ftxttipomant = $_POST["txttipomant"];



if ($haccion == 'new')
{
	$sqltercero= $mysqli->query("insert into ".$prefixsql."it_tipomant (tipomant) VALUES ('".$ftxttipomant."' )");
	
}
if ($haccion == 'update')
{

	$sqltercero= $mysqli->query("update ".$prefixsql."it_tipomant set tipomant = '".$ftxttipomant."' where id = '".$idservicio."'");
	
}
if ($haccion == 'delete')
{
	$sqltercero= $mysqli->query("delete from ".$prefixsql."it_tipomant where id = '".$idservicio."'");
	
}

$urlatras = "index.php?module=lnxit&section=tiposmant";
header( "refresh:2;url=".$urlatras );
	echo '<div align="center">
	<table width="300" class="msgaviso">
	<tr><td class="maintitle">mensaje:</td></tr>
	<tr><td>Cambios efectuados con éxito</td></tr>
	<tr><td align="center"><a class="btnedit" href="'.$urlatras.'">Aceptar</a></td></tr>
	</table></div>';

?>