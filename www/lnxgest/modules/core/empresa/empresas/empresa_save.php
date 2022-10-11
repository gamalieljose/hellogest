<?php
$fhidempresa = $_POST["hidempresa"];
$fhaccion = $_POST["haccion"];

$fchkactivo = $_POST["chkactivo"];
	if($fchkactivo == ''){$fchkactivo = '0';}
$ftxtrazonsocial = addslashes($_POST["txtrazonsocial"]);
$ftxtnomcomercial = $_POST["txtnomcomercial"];
	if($ftxtnomcomercial == '')
	{
		$ftxtnomcomercial = $ftxtrazonsocial;
	}
	else
	{
		$ftxtnomcomercial = addslashes($ftxtnomcomercial);
	}
$ftxtnif = addslashes($_POST["txtnif"]);
$ftxttel = $_POST["txttel"];
$ftxtemail = $_POST["txtemail"];
$fcbpais = $_POST["cbpais"];
$fcbprovincias = $_POST["cbprovincias"];
$ftxtdir = $_POST["txtdir"];
$ftxtcp = $_POST["txtcp"];
$ftxtpobla = $_POST["txtpobla"];

$ftxtresponsable = $_POST["txtresponsable"];
$ftxtresponsablenif = $_POST["txtresponsablenif"];

$fchkcontabilidad = $_POST["chkcontabilidad"];

$ftxtrm = addslashes($_POST["txtrm"]);
if($fchkcontabilidad == ''){$fchkcontabilidad = '0';}


if ($fhaccion == "new")
{
	$cnsmarca = $mysqli->query("insert into ".$prefixsql."empresas (activo, razonsocial, nomcomercial, nif, idpais, idprov, cp, pobla, dir, tel, email, responsable, nifresponsable, contabilidad, regmer) values('".$fchkactivo."', '".$ftxtrazonsocial."', '".$ftxtnomcomercial."', '".$ftxtnif."', '".$fcbpais."', '".$fcbprovincias."', '".$ftxtcp."', '".$ftxtpobla."', '".$ftxtdir."', '".$ftxttel."', '".$ftxtemail."', '".$ftxtresponsable."', '".$ftxtresponsablenif."', '".$fchkcontabilidad."', '".$ftxtrm."')");
}

if ($fhaccion == "update")
{
	
	$cnsmarca = $mysqli->query("update ".$prefixsql."empresas set activo = '".$fchkactivo."', razonsocial = '".$ftxtrazonsocial."', nomcomercial = '".$ftxtnomcomercial."', nif = '".$ftxtnif."', idpais = '".$fcbpais."', idprov = '".$fcbprovincias."', cp = '".$ftxtcp."', pobla = '".$ftxtpobla."', dir = '".$ftxtdir."', tel = '".$ftxttel."', email = '".$ftxtemail."', responsable = '".$ftxtresponsable."', nifresponsable = '".$ftxtresponsablenif."', contabilidad = '".$fchkcontabilidad."', regmer = '".$ftxtrm."'  where id = '".$fhidempresa."'");
}

if ($fhaccion == "delete")
{
	
	$cnsmarca = $mysqli->query("delete from ".$prefixsql."empresas where id = '".$fhidempresa."'");
}


$url_atras = "index.php?module=core&section=empresas";



header( "Location: ".$url_atras );

	?>