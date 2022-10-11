<?php

if($_GET["section"] == 'modulos' && $_GET["action"] == ''){include("modules/cfpcmods/modulos/modulos.php");}
if($_GET["section"] == 'modulos' && $_GET["action"] == 'new'){include("modules/cfpcmods/modulos/modulos_new.php");}
if($_GET["section"] == 'modulos' && $_GET["action"] == 'edit'){include("modules/cfpcmods/modulos/modulos_edit.php");}
if($_GET["section"] == 'modulos' && $_GET["action"] == 'save'){include("modules/cfpcmods/modulos/modulos_save.php");}


if($_GET["section"] == 'permisos' && $_GET["action"] == ''){include("modules/cfpcmods/permisos/permisos.php");}
if($_GET["section"] == 'permisos' && $_GET["action"] == 'new'){include("modules/cfpcmods/permisos/permisos_new.php");}
if($_GET["section"] == 'permisos' && $_GET["action"] == 'edit'){include("modules/cfpcmods/permisos/permisos_edit.php");}
if($_GET["section"] == 'permisos' && $_GET["action"] == 'del'){include("modules/cfpcmods/permisos/permisos_del.php");}
if($_GET["section"] == 'permisos' && $_GET["action"] == 'save'){include("modules/cfpcmods/permisos/permisos_save.php");}
?>
