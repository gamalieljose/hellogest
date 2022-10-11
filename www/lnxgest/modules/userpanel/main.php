<?php
if(lnx_check_perm(6000) > 0)
{
if (($_GET["section"] == 'perfil' || $_GET["section"] == '') && $_GET["action"] == ''){include("modules/userpanel/perfil/perfil.php");}
if ($_GET["section"] == 'perfil' && $_GET["action"] == 'edit'){include("modules/userpanel/perfil/perfil_edit.php");}
if ($_GET["section"] == 'perfil' && $_GET["action"] == 'save'){include("modules/userpanel/perfil/perfil_save.php");}

if ($_GET["section"] == 'perfil_addons'){include("modules/userpanel/perfil/perfil_addons.php");}


if ($_GET["section"] == 'spool' && $_GET["action"] == ''){include("modules/userpanel/spool/spool.php");}
if ($_GET["section"] == 'spool' && $_GET["action"] == 'del'){include("modules/userpanel/spool/spool_del.php");}
if ($_GET["section"] == 'spool' && $_GET["action"] == 'save'){include("modules/userpanel/spool/spool_save.php");}

if ($_GET["section"] == 'regblock' && $_GET["action"] == ''){include("modules/userpanel/regblock/regblock.php");}
if ($_GET["section"] == 'regblock' && $_GET["action"] == 'save'){include("modules/userpanel/regblock/regblock_save.php");}

if(lnx_check_perm(5001) > 0)
{
if ($_GET["section"] == 'rrhh' && $_GET["action"] == ''){include("modules/userpanel/rrhh/rrhh.php");}
}

if ($_GET["section"] == 'dz' && $_GET["action"] == ''){include("modules/userpanel/desplaza/dz_list.php");}
if ($_GET["section"] == 'dz' && $_GET["action"] == 'new'){include("modules/userpanel/desplaza/dz_new.php");}
if ($_GET["section"] == 'dz' && $_GET["action"] == 'edit'){include("modules/userpanel/desplaza/dz_edit.php");}
if ($_GET["section"] == 'dz' && $_GET["action"] == 'del'){include("modules/userpanel/desplaza/dz_del.php");}
if ($_GET["section"] == 'dz' && $_GET["action"] == 'save'){include("modules/userpanel/desplaza/dz_save.php");}

if ($_GET["section"] == 'principal' && $_GET["action"] == ''){include("modules/userpanel/principal/principal.php");}

if ($_GET["section"] == 'bloques' && $_GET["action"] == ''){include("modules/userpanel/bloques/bloques.php");}
if ($_GET["section"] == 'bloques' && $_GET["action"] == 'new'){include("modules/userpanel/bloques/bloques_new.php");}
if ($_GET["section"] == 'bloques' && $_GET["action"] == 'edit'){include("modules/userpanel/bloques/bloques_edit.php");}
if ($_GET["section"] == 'bloques' && $_GET["action"] == 'del'){include("modules/userpanel/bloques/bloques_del.php");}
if ($_GET["section"] == 'bloques' && $_GET["action"] == 'save'){include("modules/userpanel/bloques/bloques_save.php");}


if ($_GET["section"] == 'logoff'){include("modules/userpanel/logoff/logoff.php");}
}
else{lnx_permdenegado();}

?>
