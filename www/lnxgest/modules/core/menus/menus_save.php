<?php
$fhaccion = $_POST["haccion"];
$fhidmenu = $_POST["hidmenu"];

$flstidmenu = $_POST["lstidmenu"]; //id menu padre
$flstmodulo = $_POST["lstmodulo"]; //nombre del módulo
$ftxtsection = $_POST["txtsection"]; if($ftxtsection == ""){$ftxtsection = "-";}
$ftxtdisplay = addslashes($_POST["txtdisplay"]);
$ftxtorden = $_POST["txtorden"];
$flstidpermiso = $_POST["lstidpermiso"];
$ftxtidshowlang = $_POST["txtidshowlang"];
$ftxticono = addslashes($_POST["txticono"]);

$ftxtidioma = $_POST["txtidioma"];


if ($fhaccion == "new")
{
	$sqldic = $mysqli->query("insert into ".$prefixsql."menus (idmenu, module, section, display, orden, idpermiso, icono) VALUES ('".$flstidmenu."', '".$flstmodulo."', '".$ftxtsection."', '".$ftxtdisplay."', '".$ftxtorden."', '".$flstidpermiso."', '".$ftxticono."')");
	
	$sqlaux = $mysqli->query("select max(id) as contador from ".$prefixsql."menus "); 
	$rowaux = mysqli_fetch_assoc($sqlaux);
	$ultimoidmenu = $rowaux["contador"];

	foreach ($ftxtidioma as $db_ididioma => $db_etiqueta) 
	{
		if($db_etiqueta <> '')
		{
			$sqldic = $mysqli->query("insert into ".$prefixsql."menus_lang (idmenu, idlang, etiqueta) values ('".$ultimoidmenu."', '".$db_ididioma."', '".$db_etiqueta."')");
		}
	}
}

if ($fhaccion == "update")
{
	$sqldic = $mysqli->query("update ".$prefixsql."menus set idmenu = '".$flstidmenu."', module = '".$flstmodulo."', section = '".$ftxtsection."', display = '".$ftxtdisplay."', orden = '".$ftxtorden."', idpermiso = '".$flstidpermiso."', icono = '".$ftxticono."' where id = '".$fhidmenu."'");
	
	$sqldic = $mysqli->query("delete from ".$prefixsql."menus_lang where idmenu = '".$fhidmenu."'");

	foreach ($ftxtidioma as $db_ididioma => $db_etiqueta) 
	{
		if($db_etiqueta <> '')
		{
			$sqldic = $mysqli->query("insert into ".$prefixsql."menus_lang (idmenu, idlang, etiqueta) values ('".$fhidmenu."', '".$db_ididioma."', '".$db_etiqueta."')");
		}
	}
}

if ($fhaccion == "delete")
{
	$sqldic = $mysqli->query("delete from ".$prefixsql."menus where id = '".$fhidmenu."'");
	
	$sqldic = $mysqli->query("delete from ".$prefixsql."menus_lang where idmenu = '".$fhidmenu."'");
}






$url_atras = "index.php?module=core&section=menus";

header( "Location: ".$url_atras );

?>

