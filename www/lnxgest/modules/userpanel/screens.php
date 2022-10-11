<?php
if ($_GET["section"] == '') 
{
	$numscreen = "100";
	
}
if ($_GET["section"] == 'spool') 
{
	$numscreen = "";
	$displaytitle = "Cola de impresión";
}


if ($_GET["section"] == 'rrhh')
{
        $numscreen = "";
        $displaytitle = "RRHH";
}

if ($_GET["section"] == 'dz' && $_GET["action"] == ''){$numscreen = ""; $displaytitle = "Gestion de desplazamientos";}

if ($_GET["section"] == 'dz' && $_GET["action"] == 'new'){$numscreen = ""; $displaytitle = "Nuevo - Gestion desplazamientos";}
if ($_GET["section"] == 'dz' && $_GET["action"] == 'edit'){$numscreen = ""; $displaytitle = "Editando - Gestion desplazamientos";}


if ($_GET["section"] == 'gastos' && $_GET["action"] == ''){$numscreen = ""; $displaytitle = "Gestion de gastos";}

if ($_GET["section"] == 'gastos' && $_GET["action"] == 'new'){$numscreen = ""; $displaytitle = "Nuevo - Gestion de gastos";}
if ($_GET["section"] == 'gastos' && $_GET["action"] == 'edit'){$numscreen = ""; $displaytitle = "Editando - Gestion de gastos";}

if ($_GET["section"] == 'bloques' ){$numscreen = ""; $displaytitle = "Gestion de bloques";}

if ($_GET["section"] == 'regblock' ){$numscreen = ""; $displaytitle = "Registros bloqueados";}

?>
