<?php


$numscreen = ""; 
$displaytitle = "Customer Relationship Management";

if ($_GET["section"] == 'camp' && $_GET["action"] == '') {$numscreen = ""; $displaytitle = "Listado campañas";}
if ($_GET["section"] == 'camp' && $_GET["action"] == 'new') {$numscreen = ""; $displaytitle = "Nueva campaña";}
if ($_GET["section"] == 'camp' && $_GET["action"] == 'edit') {$numscreen = ""; $displaytitle = "Editando campaña";}

if ($_GET["section"] == 'campterceros' && $_GET["action"] == '') {$numscreen = ""; $displaytitle = "Actividades campaña";}
if ($_GET["section"] == 'campseg' && $_GET["action"] == '') {$numscreen = ""; $displaytitle = "Seguimiento campaña";}

if ($_GET["section"] == 'campseg' && $_GET["action"] == 'new') {$numscreen = ""; $displaytitle = "Nuevo seguimiento";}
if ($_GET["section"] == 'campseg' && $_GET["action"] == 'edit') {$numscreen = ""; $displaytitle = "Editando seguimiento";}
if ($_GET["section"] == 'campseg' && $_GET["action"] == 'del') {$numscreen = ""; $displaytitle = "Borrar seguimiento";}

if ($_GET["section"] == 'phonecalls') {$numscreen = ""; $displaytitle = "Control de llamadas";}

if ($_GET["section"] == 'seguimientos'){$numscreen = ""; $displaytitle = "Seguimientos y anotaciones";}
?>