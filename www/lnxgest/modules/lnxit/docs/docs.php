<?php
include("modules/lnxit/tickets/tabs.php");

echo '<p> </p>';

if($_GET["action"] == ''){include("modules/lnxit/docs/docs_list.php");}
if($_GET["action"] == 'new'){include("modules/lnxit/docs/docs_new.php");}
if($_GET["action"] == 'del'){include("modules/lnxit/docs/docs_del.php");}
if($_GET["action"] == 'save'){include("modules/lnxit/docs/docs_save.php");}

?>