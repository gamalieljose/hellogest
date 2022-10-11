<?php

$fhaccion = $_POST["haccion"];
$fhiddic = $_POST["hiddic"];
$ftxtcp = addslashes($_POST["txtcp"]);
$ftxtpobla = addslashes($_POST["txtpobla"]);
$flstprov = $_POST["cbprovincias"];
$flstpais = $_POST["cbpais"];



if ($fhaccion == "new")
{
	$sqldic = $mysqli->query("insert into ".$prefixsql."poblaciones (cp, poblacion, idprov, idpais) VALUES ('".$ftxtcp."', '".$ftxtpobla."', '".$flstprov."', '".$flstpais."')");
	
}

if ($fhaccion == "update")
{

	$sqldic = $mysqli->query("update ".$prefixsql."poblaciones set cp = '".$ftxtcp."', poblacion = '".$ftxtpobla."', idprov = '".$flstprov."', idpais = '".$flstpais."' where id = '".$fhiddic."'");
	
}

if ($fhaccion == "delete")
{

	$sqldic = $mysqli->query("delete from ".$prefixsql."poblaciones where id = '".$fhiddic."'");
	
}
	
$url_atras = "index.php?module=core&section=dic&subs=pobla";

if(isset($_POST["btnguardar"])) 
{
	$url_atras = "index.php?module=core&section=dic&subs=pobla";
	
}
if(isset($_POST["btnaplicar"])) 
{
	
	$url_atras = "index.php?module=core&section=dic&subs=pobla&action=edit&id=".$fhiddic."&upd=ate";
}

header( "Location: ".$url_atras );

?>

