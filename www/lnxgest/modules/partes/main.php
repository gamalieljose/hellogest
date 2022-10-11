<?php
if ($_GET["section"] == '' && $_GET["action"] == '' ){include("modules/partes/partes/listado.php");}
if ($_GET["section"] == 'partes' && $_GET["action"] == 'new' ){include("modules/partes/partes/partes_new.php");}
if ($_GET["section"] == 'partes' && $_GET["action"] == 'edit' ){include("modules/partes/partes/partes_edit.php");}
if ($_GET["section"] == 'partes' && $_GET["action"] == 'save' ){include("modules/partes/partes/partes_save.php");}

	if ($_GET["section"] == 'partes' && $_GET["action"] == 'editactions' ){include("modules/partes/partes/partes_actions.php");}
	if ($_GET["section"] == 'partes' && $_GET["action"] == 'firmar' ){include("modules/partes/partes/partes_firma.php");}
	if ($_GET["section"] == 'partes' && $_GET["action"] == 'firmarremoto' ){include("modules/partes/partes/partes_firmarremoto.php");}

	if ($_GET["section"] == 'partes' && $_GET["action"] == 'borrarremoto' ){include("modules/partes/partes/partes_borrarremoto.php");}

if ($_GET["section"] == 'partes' && $_GET["action"] == 'sync' ){include("modules/partes/partes/sync.php");}


?>

