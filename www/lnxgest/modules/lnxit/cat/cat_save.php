<?php
$idcategoria = $_POST["hidcategoria"];
$haccion = $_POST["haccion"];

$ftxtcategoria = $_POST["txtcategoria"];



if ($haccion == 'new')
{
	$sqltercero= $mysqli->query("insert into ".$prefixsql."it_categorias (categoria) VALUES ('".$ftxtcategoria."' )");
	
}
if ($haccion == 'update')
{

	$sqltercero= $mysqli->query("update ".$prefixsql."it_categorias set categoria = '".$ftxtcategoria."' where id = '".$idcategoria."'");
	
}
if ($haccion == 'delete')
{
	$sqltercero= $mysqli->query("delete from ".$prefixsql."it_tickets where id = '".$idticket."'");
	$sqltercero= $mysqli->query("delete from ".$prefixsql."it_seguimiento where idticket = '".$idticket."'");
}

$urlatras = "index.php?module=lnxit&section=cat&subsection=";
header( "refresh:2;url=".$urlatras );
	echo '<div align="center">
	<table width="300" class="msgaviso">
	<tr><td class="maintitle">mensaje:</td></tr>
	<tr><td>Cambios efectuados con éxito</td></tr>
	<tr><td align="center"><a class="btnedit" href="'.$urlatras.'">Aceptar</a></td></tr>
	</table></div>';

?>