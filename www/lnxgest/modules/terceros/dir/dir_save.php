<?php
//ini_set('display_errors','on'); 


$fidtercero = $_POST["hidtercero"]; //idterecro
$fhidregistro = $_POST["hidregistro"]; //idregistro

$fhaccion = $_POST["haccion"];

$fchkactivo = $_POST["chkactivo"];
$ftxtreferencia = $_POST["txtreferencia"];
$ftxtdir = $_POST["txtdir"];
$ftxtcp = $_POST["txtcp"];
$ftxtpobla = $_POST["txtpobla"];
$fcbpais = $_POST["cbpais"];
$fcbprovincias = $_POST["cbprovincias"];
$ftxtnotas = $_POST["txtnotas"];
$ftxttel = $_POST["txttel"];

if(lnx_check_perm(29))   // Acceso Direcciones
{


if ($fhaccion == 'new')
{
	$contactos= $mysqli->query("insert into ".$prefixsql."tercerosdir (idtercero, referencia, dir, cp, pobla, idprov, idpais, tel, activo, notas) values ('".$fidtercero."', '".$ftxtreferencia."', '".$ftxtdir."', '".$ftxtcp."', '".$ftxtpobla."', '".$fcbprovincias."', '".$fcbpais."', '".$ftxttel."', '".$fchkactivo."', '".$ftxtnotas."')");
	
}
if ($fhaccion == 'update')
{
	
	
	$contactos= $mysqli->query("update ".$prefixsql."tercerosdir set referencia = '".$ftxtreferencia."', dir = '".$ftxtdir."', cp = '".$ftxtcp."', pobla = '".$ftxtpobla."', idprov = '".$fcbprovincias."', idpais = '".$fcbpais."', tel = '".$ftxttel."', activo = '".$fchkactivo."', notas = '".$ftxtnotas."' where id = '".$fhidregistro."'");
	
	
}

if ($fhaccion == 'delete')
{
	
	$sqlcontacto= $mysqli->query("delete from ".$prefixsql."tercerosdir where id = '".$fhidregistro."'");
	
}

//Ingresa poblacion si no existe

$cnspobla = $mysqli->query("SELECT count(*) as contador FROM ".$prefixsql."poblaciones where cp = '".$ftxtcp."' and idprov = '".$fcbprovincias."' and idpais = '".$fcbpais."'");
$row = mysqli_fetch_assoc($cnspobla);

if ($row["contador"] == '0')
{
	//Solo si no encuentra el registro, este lo inserta
	$cnspobla = $mysqli->query("insert into ".$prefixsql."poblaciones (cp, poblacion, idprov, idpais) values('".$ftxtcp."', '".$ftxtpobla."', '".$fcbprovincias."', '".$fcbpais."')");
}

if(isset($_POST["btnguardar"])) 
{
	
	$url_atras = "index.php?module=terceros&section=dir&idtercero=".$fidtercero;
	header( "refresh:2;url=".$url_atras );
}
if(isset($_POST["btnaplicar"])) 
{
	
	$url_atras = "index.php?module=terceros&section=dir&action=edit&idtercero=".$fidtercero."&iddir=".$fhidregistro."&upd=ate";
	header( "Location: ".$url_atras );
}


echo '<div align="center">
	<table width="300" class="msgaviso">
	<tr><td class="maintitle">mensaje:</td></tr>
	<tr><td>Cambios aplicados con exito';
	echo'</td></tr>
	<tr><td align="center"><a class="btnedit" href="'.$url_atras.'">Aceptar</a> ';
	echo '</td></tr>
	</table></div>';





}
else
{
	lnx_permdenegado();
}
?>
