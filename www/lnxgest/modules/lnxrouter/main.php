<?php

if ($_GET["section"] == 'extapps' && $_GET["action"] == ''){include("modules/lnxrouter/extapps/extapps.php");}
if ($_GET["section"] == 'extapps' && $_GET["action"] == 'save'){include("modules/lnxrouter/extapps/extapps_save.php");}


?>