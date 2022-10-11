<?php

	$numscreen = "0";
	$displaytitle = "Gestión de ficheros";
	
if($_GET["section"] == "edit" && $_GET["id"] > 0)
{
	$numscreen = "0";
	$displaytitle = "Gestión de ficheros - Editando";
}

if ($_GET["section"] == 'cat') {$numscreen = "0"; $displaytitle = "Categorias de archivo";}
if ($_GET["section"] == 'catnew') {$numscreen = "0"; $displaytitle = "Nueva categoria de archivo";}
if ($_GET["section"] == 'catedit') {$numscreen = "0"; $displaytitle = "Editando categoria de archivo";}
if ($_GET["section"] == 'catdel') {$numscreen = "0"; $displaytitle = "Eliminar categoria de archivo";}

if ($_GET["section"] == 'icf') {$numscreen = "0"; $displaytitle = "Indexación contenido de los ficheros";}
if ($_GET["section"] == 'icfsave') {$numscreen = "0"; $displaytitle = "Indexación en proceso...";}
?>