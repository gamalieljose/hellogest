<?php
if(lnx_check_perm(5000) > 0)
{
if (($_GET["section"] == 'nominas' || $_GET["section"] == '') && $_GET["action"] == ''){include("modules/hr/nominas/nominas.php");}
if ($_GET["section"] == 'nominas' && $_GET["action"] == 'new'){include("modules/hr/nominas/nominas_new.php");}
if ($_GET["section"] == 'nominas' && $_GET["action"] == 'edit'){include("modules/hr/nominas/nominas_edit.php");}
if ($_GET["section"] == 'nominas' && $_GET["action"] == 'del'){include("modules/hr/nominas/nominas_del.php");}
if ($_GET["section"] == 'nominas' && $_GET["action"] == 'save'){include("modules/hr/nominas/nominas_save.php");}


if ($_GET["section"] == 'gastos' && $_GET["inf"] == '' && $_GET["action"] == ''){include("modules/hr/gastos/gastos.php");}
if ($_GET["section"] == 'gastos' && $_GET["inf"] == '1' && $_GET["action"] == ''){include("modules/hr/gastos/inf1.php");}
}
else{lnx_permdenegado();}
?>
