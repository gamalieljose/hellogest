<?php

if ($_GET["section"] == 'cuentascajas' && $_GET["action"] == ''){include("modules/bancos/cuentascajas/cuentascajas.php");}
if ($_GET["section"] == 'cuentascajas' && $_GET["action"] == 'new'){include("modules/bancos/cuentascajas/cuentascajas_new.php");}
if ($_GET["section"] == 'cuentascajas' && $_GET["action"] == 'edit'){include("modules/bancos/cuentascajas/cuentascajas_edit.php");}
if ($_GET["section"] == 'cuentascajas' && $_GET["action"] == 'del'){include("modules/bancos/cuentascajas/cuentascajas_del.php");}
if ($_GET["section"] == 'cuentascajas' && $_GET["action"] == 'save'){include("modules/bancos/cuentascajas/cuentascajas_save.php");}


if ($_GET["section"] == 'bancos' && $_GET["action"] == ''){include("modules/bancos/bancos/bancos.php");}
if ($_GET["section"] == 'bancos' && $_GET["action"] == 'new'){include("modules/bancos/bancos/bancos_new.php");}
if ($_GET["section"] == 'bancos' && $_GET["action"] == 'edit'){include("modules/bancos/bancos/bancos_edit.php");}
if ($_GET["section"] == 'bancos' && $_GET["action"] == 'del'){include("modules/bancos/bancos/bancos_del.php");}
if ($_GET["section"] == 'bancos' && $_GET["action"] == 'save'){include("modules/bancos/bancos/bancos_save.php");}


if ($_GET["section"] == 'fpago' && $_GET["action"] == ''){include("modules/bancos/fpago/fpago.php");}
if ($_GET["section"] == 'fpago' && $_GET["action"] == 'new'){include("modules/bancos/fpago/fpago_new.php");}
if ($_GET["section"] == 'fpago' && $_GET["action"] == 'edit'){include("modules/bancos/fpago/fpago_edit.php");}
if ($_GET["section"] == 'fpago' && $_GET["action"] == 'del'){include("modules/bancos/fpago/fpago_del.php");}
if ($_GET["section"] == 'fpago' && $_GET["action"] == 'save'){include("modules/bancos/fpago/fpago_save.php");}

if ($_GET["section"] == 'cpago' && $_GET["action"] == ''){include("modules/bancos/cpago/cpago.php");}
if ($_GET["section"] == 'cpago' && $_GET["action"] == 'new'){include("modules/bancos/cpago/cpago_new.php");}
if ($_GET["section"] == 'cpago' && $_GET["action"] == 'edit'){include("modules/bancos/cpago/cpago_edit.php");}
if ($_GET["section"] == 'cpago' && $_GET["action"] == 'del'){include("modules/bancos/cpago/cpago_del.php");}
if ($_GET["section"] == 'cpago' && $_GET["action"] == 'save'){include("modules/bancos/cpago/cpago_save.php");}

if ($_GET["section"] == 'tiposcuenta' && $_GET["action"] == ''){include("modules/bancos/tiposcuenta/tipocuenta.php");}
if ($_GET["section"] == 'tiposcuenta' && $_GET["action"] == 'new'){include("modules/bancos/tiposcuenta/tipocuenta_new.php");}
if ($_GET["section"] == 'tiposcuenta' && $_GET["action"] == 'edit'){include("modules/bancos/tiposcuenta/tipocuenta_edit.php");}
if ($_GET["section"] == 'tiposcuenta' && $_GET["action"] == 'del'){include("modules/bancos/tiposcuenta/tipocuenta_del.php");}
if ($_GET["section"] == 'tiposcuenta' && $_GET["action"] == 'save'){include("modules/bancos/tiposcuenta/tipocuenta_save.php");}
?>

