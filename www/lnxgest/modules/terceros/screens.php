<?php


if ($_GET["section"] == 'terceros' && $_GET["action"] == '') 
{
	$numscreen = "20";
	$displaytitle = "Terceros";
}
if ($_GET["section"] == 'terceros' && $_GET["action"] == 'new') 
{
	$numscreen = "";
	$displaytitle = "Nuevo Tercero";
}
if ($_GET["section"] == 'terceros' && $_GET["action"] == 'edit') 
{
	$numscreen = "";
	$displaytitle = "Editando Tercero";
}

if ($_GET["section"] == 'terceroslopd' ) 
{
	$numscreen = "";
	$displaytitle = "L.O.P.D. Tercero";
}

if ($_GET["section"] == 'docs' ) 
{
	$numscreen = "";
	$displaytitle = "Editando Tercero - Documentación";
}

if ($_GET["section"] == 'lopd') 
{
	$numscreen = "";
	$displaytitle = "Gestion plantillas LOPD";
}
if ($_GET["section"] == 'lopdcampos') {	$numscreen = ""; $displaytitle = "Campos personalizados LOPD";}

if ($_GET["section"] == 'terceros' && $_GET["action"] == 'del') 
{
	$numscreen = "";
	$displaytitle = "Borrar Tercero";
}

if ($_GET["section"] == 'contactos' && $_GET["action"] == '') 
{
	$numscreen = "";
	$displaytitle = "Contactos";
}
if ($_GET["section"] == 'contactos' && $_GET["action"] == 'new') 
{
	$numscreen = "";
	$displaytitle = "Nuevo contacto";
}
if ($_GET["section"] == 'contactos' && $_GET["action"] == 'edit') 
{
	$numscreen = "";
	$displaytitle = "Editando contacto";
}

if ($_GET["section"] == 'dir' && $_GET["action"] == '') 
{
	$numscreen = "";
	$displaytitle = "Direcciones";
}
if ($_GET["section"] == 'dir' && $_GET["action"] == 'new') 
{
	$numscreen = "";
	$displaytitle = "Nueva dirección";
}
if ($_GET["section"] == 'dir' && $_GET["action"] == 'edit') 
{
	$numscreen = "";
	$displaytitle = "Editando dirección";
}

if ($_GET["section"] == 'terceros' && ($_GET["action"] == 'print' || $_GET["action"] == 'printrs')) 
{
	$numscreen = "";
	$displaytitle = "Imprimir listado terceros";
}

if ($_GET["section"] == 'factu') 
{
	$numscreen = "";
	$displaytitle = "Facturación";
}

if ($_GET["section"] == 'historico' ) 
{
	$numscreen = "";
	$displaytitle = "Histórico";
}



if ($_GET["section"] == 'tercerosvinc' && $_GET["action"] == ''){$numscreen = ""; $displaytitle = "Vinculos";}
if ($_GET["section"] == 'tercerosvinc' && $_GET["action"] == 'new'){$numscreen = ""; $displaytitle = "Nuevo vínculo";}
if ($_GET["section"] == 'tercerosvinc' && $_GET["action"] == 'edit'){$numscreen = ""; $displaytitle = "Editando vínculo";}
if ($_GET["section"] == 'tercerosvinc' && $_GET["action"] == 'del'){$numscreen = ""; $displaytitle = "Eliminar vínculo";}



?>