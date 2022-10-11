<?php
if(lnx_check_perm(5100) > 0)
{
//Tipo de gasto
if($_GET["section"] == 'cfg_tg' && $_GET["action"] == ''){include("modules/gastos/config/tipogasto/tg_list.php");}
if($_GET["section"] == 'cfg_tg' && $_GET["action"] == 'new'){include("modules/gastos/config/tipogasto/tg_new.php");}
if($_GET["section"] == 'cfg_tg' && $_GET["action"] == 'edit'){include("modules/gastos/config/tipogasto/tg_edit.php");}
if($_GET["section"] == 'cfg_tg' && $_GET["action"] == 'del'){include("modules/gastos/config/tipogasto/tg_del.php");}
if($_GET["section"] == 'cfg_tg' && $_GET["action"] == 'save'){include("modules/gastos/config/tipogasto/tg_save.php");}

//configuracion general
if($_GET["section"] == 'cfg' && $_GET["action"] == ''){include("modules/gastos/config/menu.php");}
if($_GET["section"] == 'cfg_main' && $_GET["action"] == ''){include("modules/gastos/config/general.php");}
if($_GET["section"] == 'cfg_main' && $_GET["action"] == 'save'){include("modules/gastos/config/general_save.php");}


if($_GET["section"] == 'gastos' && $_GET["action"] == ''){include("modules/gastos/gastos/gastos.php");}
if($_GET["section"] == 'gastos' && $_GET["action"] == 'new'){include("modules/gastos/gastos/gastos_new.php");}
if($_GET["section"] == 'gastos' && $_GET["action"] == 'edit'){include("modules/gastos/gastos/gastos_edit.php");}
if($_GET["section"] == 'gastos' && $_GET["action"] == 'del'){include("modules/gastos/gastos/gastos_del.php");}
if($_GET["section"] == 'gastos' && $_GET["action"] == 'save'){include("modules/gastos/gastos/gastos_save.php");}

if($_GET["section"] == 'viajes' && $_GET["action"] == ''){include("modules/gastos/viajes/viajes.php");}
if($_GET["section"] == 'viajes' && $_GET["action"] == 'new'){include("modules/gastos/viajes/viajes_new.php");}
if($_GET["section"] == 'viajes' && $_GET["action"] == 'edit'){include("modules/gastos/viajes/viajes_edit.php");}
if($_GET["section"] == 'viajes' && $_GET["action"] == 'save'){include("modules/gastos/viajes/viajes_save.php");}
if($_GET["section"] == 'viajes' && $_GET["action"] == 'view'){include("modules/gastos/viajes/viajes_view.php");}

    if($_GET["section"] == 'viajes' && $_GET["action"] == 'linenew'){include("modules/gastos/viajes/line_new.php");}
    if($_GET["section"] == 'viajes' && $_GET["action"] == 'lineedit'){include("modules/gastos/viajes/line_edit.php");}
    if($_GET["section"] == 'viajes' && $_GET["action"] == 'linedel'){include("modules/gastos/viajes/line_del.php");}
    if($_GET["section"] == 'viajes' && $_GET["action"] == 'linesave'){include("modules/gastos/viajes/line_save.php");}

if($_GET["section"] == 'flota' && $_GET["action"] == ''){include("modules/gastos/flota/flota_list.php");}
if($_GET["section"] == 'flota' && $_GET["action"] == 'new'){include("modules/gastos/flota/flota_new.php");}
if($_GET["section"] == 'flota' && $_GET["action"] == 'edit'){include("modules/gastos/flota/flota_edit.php");}
if($_GET["section"] == 'flota' && $_GET["action"] == 'del'){include("modules/gastos/flota/flota_del.php");}
if($_GET["section"] == 'flota' && $_GET["action"] == 'save'){include("modules/gastos/flota/flota_save.php");}
}
else{lnx_permdenegado();}
?>
