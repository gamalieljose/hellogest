<?php
if(lnx_check_perm(1000) > 0)
{
if ($_GET["section"] == '' && $_GET["action"] == ''){header("location: index.php?module=crm&section=camp");}

if ($_GET["section"] == 'camp' && $_GET["action"] == ''){include("./modules/crm/camp/camp.php");}
if ($_GET["section"] == 'camp' && $_GET["action"] == 'new'){include("./modules/crm/camp/camp_new.php");}
if ($_GET["section"] == 'camp' && $_GET["action"] == 'edit'){include("./modules/crm/camp/camp_edit.php");}
if ($_GET["section"] == 'camp' && $_GET["action"] == 'del'){include("./modules/crm/camp/camp_del.php");}
if ($_GET["section"] == 'camp' && $_GET["action"] == 'save'){include("./modules/crm/camp/camp_save.php");}

if ($_GET["section"] == 'campterceros' && $_GET["action"] == ''){include("./modules/crm/camp/terceros.php");}
if ($_GET["section"] == 'campseg' && $_GET["action"] == ''){include("./modules/crm/camp/seg_camp.php");}

if ($_GET["section"] == 'campseg' && $_GET["action"] == 'new'){include("./modules/crm/camp/seguimiento_new.php");}
if ($_GET["section"] == 'campseg' && $_GET["action"] == 'edit'){include("./modules/crm/camp/seguimiento_edit.php");}
if ($_GET["section"] == 'campseg' && $_GET["action"] == 'del'){include("./modules/crm/camp/seguimiento_del.php");}
if ($_GET["section"] == 'campseg' && $_GET["action"] == 'save'){include("./modules/crm/camp/seguimiento_save.php");}


if ($_GET["section"] == 'camputils' && $_GET["action"] == ''){include("./modules/crm/camp/camputils.php");}
if ($_GET["section"] == 'camputils' && $_GET["action"] == 'save'){include("./modules/crm/camp/camputils_save.php");}

if ($_GET["section"] == 'phonecalls' && $_GET["action"] == ''){include("./modules/crm/phonecalls/phonecalls.php");}
if ($_GET["section"] == 'phonecalls' && $_GET["action"] == 'new'){include("./modules/crm/phonecalls/phonecalls_new.php");}
if ($_GET["section"] == 'phonecalls' && $_GET["action"] == 'edit'){include("./modules/crm/phonecalls/phonecalls_edit.php");}
if ($_GET["section"] == 'phonecalls' && $_GET["action"] == 'del'){include("./modules/crm/phonecalls/phonecalls_del.php");}
if ($_GET["section"] == 'phonecalls' && $_GET["action"] == 'save'){include("./modules/crm/phonecalls/phonecalls_save.php");}

if ($_GET["section"] == 'seguimientos' && $_GET["action"] == ''){include("./modules/crm/seguimientos/seg.php");}
if ($_GET["section"] == 'seguimientos' && $_GET["action"] == 'new'){include("./modules/crm/seguimientos/seg_new.php");}
if ($_GET["section"] == 'seguimientos' && $_GET["action"] == 'edit'){include("./modules/crm/seguimientos/seg_edit.php");}
if ($_GET["section"] == 'seguimientos' && $_GET["action"] == 'del'){include("./modules/crm/seguimientos/seg_del.php");}
if ($_GET["section"] == 'seguimientos' && $_GET["action"] == 'save'){include("./modules/crm/seguimientos/seg_save.php");}
if ($_GET["section"] == 'seguimientos' && $_GET["action"] == 'view'){include("./modules/crm/seguimientos/seg_view.php");}


if ($_GET["section"] == 'import' && $_GET["action"] == ''){include("./modules/crm/import/import.php");}
if ($_GET["section"] == 'import' && $_GET["action"] == 'step1'){include("./modules/crm/import/step1.php");}
if ($_GET["section"] == 'import' && $_GET["action"] == 'step2'){include("./modules/crm/import/step2.php");}
if ($_GET["section"] == 'import' && $_GET["action"] == 'step3'){include("./modules/crm/import/step3.php");}

}
else{lnx_permdenegado();}
?>

