<?php
$fhaccion = $_POST["haccion"];
$fhiddic = $_POST["hiddic"];


$ftxttabla = addslashes($_POST["txttabla"]);
$ftxtid = addslashes($_POST["txtid"]);
$ftxtfecha = addslashes($_POST["txtfecha"]);
$ftxtcodigo = addslashes($_POST["txtcodigo"]);
$ftxtdescripcion = addslashes($_POST["txtdescripcion"]);
$ftxttipo = addslashes($_POST["txttipo"]);
$ftxturl = addslashes($_POST["txturl"]);


if ($fhaccion == "new")
{
	$sqldic = $mysqli->query("insert into ".$prefixsql."dic_historico_cfg (tabla, campoid, fecha, codigo, descripcion, tipo, url) VALUES ('".$ftxttabla."', '".$ftxtid."', '".$ftxtfecha."', '".$ftxtcodigo."', '".$ftxtdescripcion."', '".$ftxttipo."', '".$ftxturl."')");
}

if ($fhaccion == "update")
{

	$sqldic = $mysqli->query("update ".$prefixsql."dic_historico_cfg set tabla = '".$ftxttabla."', campoid = '".$ftxtid."', fecha = '".$ftxtfecha."', codigo = '".$ftxtcodigo."', descripcion = '".$ftxtdescripcion."', tipo = '".$ftxttipo."', url = '".$ftxturl."' where id = '".$fhiddic."'");
	
}

if ($fhaccion == "delete")
{

	$sqldic = $mysqli->query("delete from ".$prefixsql."dic_historico_cfg where id = '".$fhiddic."'");
	
}



	header( "Location: index.php?module=core&section=dic&subs=terhisto" );

?>

