<?php


if ($_GET["section"] == ""){include("modules/tpv/iniciotpv.php");}

if ($_GET["section"] == "tpv" && $_GET["action"] == "new"){include("modules/tpv/tpv/tpv_new.php");}
if ($_GET["section"] == "tpv" && $_GET["action"] == "view"){include("modules/tpv/tpv/mainview.php");}
if ($_GET["section"] == "tpv" && $_GET["action"] == "cerrar"){include("modules/tpv/tpv/tpv_validar.php");}
if ($_GET["section"] == "tpv" && $_GET["action"] == "cerrarsave"){include("modules/tpv/tpv/tpv_validar_save.php");}
    if ($_GET["section"] == "tpv" && $_GET["action"] == "onlyprint"){include("modules/tpv/tpv/tpv_onlyprint.php");}

if ($_GET["section"] == "tpv" && $_GET["action"] == "cajon"){include("modules/tpv/tpv/tpv_cajon.php");}
if ($_GET["section"] == "tpv" && $_GET["action"] == "cajonsave"){include("modules/tpv/tpv/tpv_cajon_save.php");}

if ($_GET["section"] == "cajon" && $_GET["action"] == "view"){include("modules/tpv/tpv/tpv_cajon_view.php");}
if ($_GET["section"] == "cajon" && $_GET["action"] == "edit"){include("modules/tpv/tpv/tpv_cajon_edit.php");}


if ($_GET["section"] == "tpv" && $_GET["action"] == "add"){include("modules/tpv/tpv/tpv_add.php");}
if ($_GET["section"] == "tpv" && $_GET["action"] == "addcustom"){include("modules/tpv/tpv/tpv_addcustom.php");}
if ($_GET["section"] == "tpv" && $_GET["action"] == "barcode"){include("modules/tpv/tpv/tpv_barcode.php");}
if ($_GET["section"] == "tpv" && $_GET["action"] == "dellinea"){include("modules/tpv/tpv/tpv_dellinea.php");}





if ($_GET["section"] == "tpvactions" && $_GET["action"] == ""){include("modules/tpv/tpvactions/tpva_menu.php");}
if ($_GET["section"] == "tpvactions" && $_GET["action"] == "modtpv"){include("modules/tpv/tpvactions/tpva_modtpv.php");}
if ($_GET["section"] == "tpvactions" && $_GET["action"] == "modtpvsave"){include("modules/tpv/tpvactions/tpva_modtpv_save.php");}
if ($_GET["section"] == "tpvactions" && $_GET["action"] == "draft"){include("modules/tpv/tpvactions/tpva_draft.php");}
if ($_GET["section"] == "tpvactions" && $_GET["action"] == "draftsave"){include("modules/tpv/tpvactions/tpva_draft_save.php");}
if ($_GET["section"] == "tpvactions" && $_GET["action"] == "del"){include("modules/tpv/tpvactions/tpva_del.php");}
if ($_GET["section"] == "tpvactions" && $_GET["action"] == "delsave"){include("modules/tpv/tpvactions/tpva_delsave.php");}

if ($_GET["section"] == "tpvactions" && $_GET["action"] == "print"){include("modules/tpv/tpvactions/tpva_print.php");}
if ($_GET["section"] == "tpvactions" && $_GET["action"] == "printrs"){include("modules/tpv/tpvactions/tpva_printrs.php");}


if ($_GET["section"] == "cfgterm" && $_GET["action"] == ""){include("modules/tpv/config/term.php");}
if ($_GET["section"] == "cfgterm" && $_GET["action"] == "edit"){include("modules/tpv/config/term_edit.php");}
if ($_GET["section"] == "cfgterm" && $_GET["action"] == "save"){include("modules/tpv/config/term_save.php");}

//Campos personalizados globales (para todos los TPV)
if ($_GET["section"] == "cfgcg" && $_GET["action"] == ""){include("modules/tpv/config/cfgcg.php");}
if ($_GET["section"] == "cfgcg" && $_GET["action"] == "new"){include("modules/tpv/config/cfgcg_new.php");}
if ($_GET["section"] == "cfgcg" && $_GET["action"] == "edit"){include("modules/tpv/config/cfgcg_edit.php");}
if ($_GET["section"] == "cfgcg" && $_GET["action"] == "del"){include("modules/tpv/config/cfgcg_del.php");}
if ($_GET["section"] == "cfgcg" && $_GET["action"] == "save"){include("modules/tpv/config/cfgcg_save.php");}


if ($_GET["section"] == "cfgia" && $_GET["action"] == ""){include("modules/tpv/config/cfgia.php");}
if ($_GET["section"] == "cfgia" && $_GET["action"] == "new"){include("modules/tpv/config/cfgia_new.php");}
if ($_GET["section"] == "cfgia" && $_GET["action"] == "edit"){include("modules/tpv/config/cfgia_edit.php");}
if ($_GET["section"] == "cfgia" && $_GET["action"] == "del"){include("modules/tpv/config/cfgia_del.php");}
if ($_GET["section"] == "cfgia" && $_GET["action"] == "save"){include("modules/tpv/config/cfgia_save.php");}

if ($_GET["section"] == "cfgtermproduct" && $_GET["action"] == ""){include("modules/tpv/config/cfgtermproduct.php");}
if ($_GET["section"] == "cfgtermproduct" && $_GET["action"] == "new"){include("modules/tpv/config/cfgtermproduct_new.php");}
if ($_GET["section"] == "cfgtermproduct" && $_GET["action"] == "save"){include("modules/tpv/config/cfgtermproduct_save.php");}



if ($_GET["section"] == "list" && $_GET["action"] == ""){include("modules/tpv/lista/listado.php");}

if ($_GET["section"] == "ct" && $_GET["action"] == ""){include("modules/tpv/tpv/ct.php");}
if ($_GET["section"] == "ct" && $_GET["action"] == "save"){include("modules/tpv/tpv/ct_save.php");}

if ($_GET["section"] == "mov" && $_GET["action"] == ""){include("modules/tpv/mov/mov.php");}
if ($_GET["section"] == "movprint" && $_GET["action"] == ""){include("modules/tpv/mov/mov_print.php");}
if ($_GET["section"] == "movprint" && $_GET["action"] == "print"){include("modules/tpv/mov/mov_docprint.php");}

if ($_GET["section"] == "pagos" && $_GET["action"] == ""){include("modules/tpv/pagos/pagos.php");}
if ($_GET["section"] == "pagos" && $_GET["action"] == "new"){include("modules/tpv/pagos/pagos_new.php");}
if ($_GET["section"] == "pagos" && $_GET["action"] == "edit"){include("modules/tpv/pagos/pagos_edit.php");}
if ($_GET["section"] == "pagos" && $_GET["action"] == "del"){include("modules/tpv/pagos/pagos_del.php");}
if ($_GET["section"] == "pagos" && $_GET["action"] == "save"){include("modules/tpv/pagos/pagos_save.php");}

?>
