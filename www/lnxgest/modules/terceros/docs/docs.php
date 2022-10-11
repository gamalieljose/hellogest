<?php
include("modules/terceros/botones.php");

if($_GET["frmaction"] == ''){include("modules/terceros/docs/docs_list.php");}
if($_GET["frmaction"] == 'new'){include("modules/terceros/docs/docs_new.php");}
if($_GET["frmaction"] == 'del'){include("modules/terceros/docs/docs_del.php");}
if($_GET["frmaction"] == 'save'){include("modules/terceros/docs/docs_save.php");}


?>