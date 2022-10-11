<?php

if($_COOKIE["lnxrecoverymode"] == "ON")
{

    if ($_GET["action"] == "" ){include("modules/backup/inicio.php");}
    if ($_GET["action"] == "presave" ){include("modules/backup/preprocesa.php");}
    if ($_GET["action"] == "save" ){include("modules/backup/restaura.php");}
    if ($_GET["action"] == "del" ){include("modules/backup/elimina.php");}
    
}
?>