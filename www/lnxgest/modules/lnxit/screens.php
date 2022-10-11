<?php
if ($_GET["section"] == 'tickets') 
{
	$numscreen = "2000";
	$displaytitle = "Gestion Tickets";
	
}

if ($_GET["section"] == 'config' ) {$displaytitle = "Configuración";}

if ($_GET["section"] == 'tickets' && $_GET["subsection"] == 'list') {$displaytitle = "Listado tickets";}

if ($_GET["section"] == 'tickets' && $_GET["action"] == 'new') {$displaytitle = "Nuevo ticket"; $numscreen = "2001";}
if ($_GET["section"] == 'tickets' && $_GET["action"] == 'edit') {$displaytitle = "Editando ticket";}
if ($_GET["section"] == 'tickets' && $_GET["action"] == 'del') {$displaytitle = "Eliminar ticket";}
if ($_GET["section"] == 'seguimiento' ) {$displaytitle = "Editando ticket";}
if ($_GET["section"] == 'docs' ) {$displaytitle = "Editando ticket";}
if ($_GET["section"] == 'print' ) {$displaytitle = "Imprimir ticket";}

if ($_GET["section"] == 'buscaseg' ) {$displaytitle = "Buscar por seguimientos";}

if ($_GET["section"] == 'cat' && $_GET["action"] == '') {$displaytitle = "Categorias";}
if ($_GET["section"] == 'cat' && $_GET["action"] == 'new') {$displaytitle = "Nueva categoria";}
if ($_GET["section"] == 'cat' && $_GET["action"] == 'edit') {$displaytitle = "Editando categoria";}

if ($_GET["section"] == 'partes' && $_GET["action"] == '') {$displaytitle = "Partes de trabajo";}
if ($_GET["section"] == 'gcalendar' && $_GET["action"] == ''){$displaytitle = "Calendario de Google";}

if ($_GET["section"] == 'cloud' ) {$displaytitle = "Gestión de servicios cloud";}

if ($_GET["section"] == 'infopass' ) {$displaytitle = "Gestión de contraseñas infopass"; $numscreen = "2020";}

if ($_GET["section"] == 'activos' && $_GET["ss"] == 'tipos'){$displaytitle = "Tipos de activos";}
if ($_GET["section"] == 'activos' && $_GET["ss"] == 'estados'){$displaytitle = "Estado de los activos";}
if ($_GET["section"] == 'activos' && $_GET["ss"] == 'ficheros'){$displaytitle = "Ficheros del activo";}
if ($_GET["section"] == 'tiposmant' && $_GET["ss"] == '') {$displaytitle = "Tipos de contrato";}

if ($_GET["section"] == 'activosrc' ) {$displaytitle = "Control Remoto de activos";}


if ($_GET["section"] == 'activos' && $_GET["ss"] == 'activo'  && $_GET["action"] == 'new'  ){$displaytitle = "Nuevo Activo";}

if ($_GET["section"] == 'colas' && $_GET["action"] == '') {$displaytitle = "Colas de trabajo";}
if ($_GET["section"] == 'colas' && $_GET["action"] == 'new') {$displaytitle = "Nueva cola de trabajo";}
if ($_GET["section"] == 'colas' && $_GET["action"] == 'edit') {$displaytitle = "Editando cola de trabajo";}
if ($_GET["section"] == 'colas' && $_GET["action"] == 'del') {$displaytitle = "Eliminar cola de trabajo";}



if ($_GET["section"] == 'tipoticket' && $_GET["action"] == '') {$displaytitle = "Tipo de ticket";}
if ($_GET["section"] == 'tipoticket' && $_GET["action"] == 'new') {$displaytitle = "Nuevo - Tipo de ticket";}
if ($_GET["section"] == 'tipoticket' && $_GET["action"] == 'edit') {$displaytitle = "Editando - Tipo de ticket";}
if ($_GET["section"] == 'tipoticket' && $_GET["action"] == 'del') {$displaytitle = "Eliminar - Tipo de ticket";}

if ($_GET["section"] == 'informes' ) {$displaytitle = "informes y estadisticas";}

if ($_GET["section"] == 'docum' ) {$displaytitle = "Documentación";}
if ($_GET["section"] == 'docum' && $_GET["action"] == 'new' ) {$displaytitle = "Nueva documentación";}
if ($_GET["section"] == 'docum' && $_GET["action"] == 'view' ) 
{
	$iddocum = $_GET["id"];
	$sqlaux = $mysqli->query("select * from ".$prefixsql."it_docum where id = '".$iddocum."'"); 
	$rowaux = mysqli_fetch_assoc($sqlaux);
	$dbtitulo = $rowaux["titulo"];
	$displaytitle = "Documentación - ".$dbtitulo;
}
if ($_GET["section"] == 'docum' && $_GET["action"] == 'newpage' ) {$displaytitle = "Ampliar documentación";}
if ($_GET["section"] == 'docum' && $_GET["action"] == 'delpage' ) {$displaytitle = "Eliminar registro de documentación";}
if ($_GET["section"] == 'docum' && $_GET["action"] == 'del' ) {$displaytitle = "Eliminar documentación";}


?>