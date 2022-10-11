<?php
$idactivo = $_POST["hidactivo"];
$haccion = $_POST["haccion"];

$fchkactivo = $_POST["chkactivo"];
	if ($fchkactivo == ''){$fchkactivo = '0';}
$ftxtref = $_POST["txtref"];
$flsttercero = $_POST["lsttercero"];
$flsttipomant = $_POST["lsttipomant"];
$ftxtfinicio = $_POST["txtfinicio"];
	$fano = substr($ftxtfinicio, 6, 4);  
	$fmes = substr($ftxtfinicio, 3, 2);  
	$fdia = substr($ftxtfinicio, 0, 2);  

	$cftxtfinicio = $fano.'-'.$fmes.'-'.$fdia;

$ftxtffin = $_POST["txtffin"];
	$fano = substr($ftxtffin, 6, 4);  
	$fmes = substr($ftxtffin, 3, 2);  
	$fdia = substr($ftxtffin, 0, 2);  

	$cftxtffin = $fano.'-'.$fmes.'-'.$fdia;
	

$fslthchh = $_POST["slthchh"];
$fslthcmm = $_POST["slthcmm"];
	
$ftxtdescripcion = $_POST["txtdescripcion"];

$ftxthcontratadas = $fslthchh.":".$fslthcmm.":00";

if ($haccion == 'new')
{
	$sqltercero= $mysqli->query("insert into ".$prefixsql."it_mant (ref, idtercero, idtipo, finicio, ffin, hcontratado, hrestantes, descripcion, activo) VALUES ('".$ftxtref."', '".$flsttercero."', '".$flsttipomant."', '".$cftxtfinicio."', '".$cftxtffin."', '".$ftxthcontratadas."', '".$ftxthcontratadas."', '".$ftxtdescripcion."', '".$fchkactivo."' )");
	
}
if ($haccion == 'update')
{

	$sqltercero= $mysqli->query("update ".$prefixsql."it_mant set ref = '".$ftxtref."', idtercero = '".$flsttercero."', idtipo = '".$flsttipomant."', finicio = '".$cftxtfinicio."', ffin = '".$cftxtffin."', hcontratado = '".$ftxthcontratadas."', descripcion = '".$ftxtdescripcion."', activo = '".$fchkactivo."' where id = '".$idactivo."'");
	
}
if ($haccion == 'delete')
{
	$sqltercero= $mysqli->query("delete from ".$prefixsql."it_mant where id = '".$idactivo."'");
	
}

$urlatras = "index.php?module=lnxit&section=mant";
header( "refresh:2;url=".$urlatras );
	echo '<div align="center">
	<table width="300" class="msgaviso">
	<tr><td class="maintitle">mensaje:</td></tr>
	<tr><td>Cambios efectuados con éxito</td></tr>
	<tr><td align="center"><a class="btnedit" href="'.$urlatras.'">Aceptar</a></td></tr>
	</table></div>';

?>