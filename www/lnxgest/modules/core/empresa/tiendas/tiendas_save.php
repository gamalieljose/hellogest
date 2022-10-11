<?php

$ftxttienda = $_POST["txttienda"];
$fhidtienda = $_POST["hidtienda"];
$fhaccion = $_POST["haccion"];

$flstempresa = $_POST["lstempresa"];

$ftxttel = $_POST["txttel"];
$ftxtemail = $_POST["txtemail"];
$fcbpais = $_POST["cbpais"];
$fcbprovincias = $_POST["cbprovincias"];
$ftxtdir = addslashes($_POST["txtdir"]);
$ftxtcp = $_POST["txtcp"];
$ftxtpobla = addslashes($_POST["txtpobla"]);



if ($fhaccion == 'new')
{
	$ConsultaMySql = $mysqli->query("insert into ".$prefixsql."tiendas (idempresa, tienda, tel, email, idpais, idprov, dir, cp, pobla) 
	values ('".$flstempresa."', '".$ftxttienda."', '".$ftxttel."', '".$ftxtemail."', '".$fcbpais."', '".$fcbprovincias."', '".$ftxtdir."', '".$ftxtcp."', '".$ftxtpobla."')");


	$sqlaux = $mysqli->query("select max(id) as ultimoid from ".$prefixsql."tiendas "); 
	$rowaux = mysqli_fetch_assoc($sqlaux);
	$dbultimoid = $rowaux["ultimoid"];

	$urlatras = 'index.php?&module=core&section=etiendas&action=edit&id='.$dbultimoid;
	
}

if ($fhaccion == 'update')
{
	$ConsultaMySql= $mysqli->query("update ".$prefixsql."tiendas set idempresa = '".$flstempresa."', tienda = '".$ftxttienda."', tel = '".$ftxttel."', email = '".$ftxtemail."', idpais = '".$fcbpais."', idprov = '".$fcbprovincias."', dir = '".$ftxtdir."', cp = '".$ftxtcp."', pobla = '".$ftxtpobla."' where id = '".$fhidtienda."'");
	
	$urlatras = 'index.php?&module=core&section=etiendas';
	
	
}

if ($fhaccion == 'delete')
{
	
	$ConsultaMySql= $mysqli->query("delete from ".$prefixsql."tiendas where id = '".$fhidtienda."'");
	$urlatras = 'index.php?&module=core&section=etiendas';
	
}

header( "Location: ".$urlatras );


?>