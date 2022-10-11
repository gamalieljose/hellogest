<?php


if ($_GET["section"] == 'trimestre' && $_GET["action"] == ''){include("modules/balance/trimestre/trimestre.php");}
if ($_GET["section"] == 'trimestre' && $_GET["action"] == 'resultado'){include("modules/balance/trimestre/trimestre_rs.php");}
if ($_GET["section"] == 'trimestre' && $_GET["action"] == 'resultadoprint'){include("modules/balance/trimestre/trimestre_rs_print.php");}

if ($_GET["section"] == 'com' && $_GET["action"] == ''){include("modules/balance/com/filtro.php");}
if ($_GET["section"] == 'com' && $_GET["action"] == 'resultado'){include("modules/balance/com/filtro_rs.php");}

if ($_GET["section"] == 'mod347' && $_GET["action"] == ''){include("modules/balance/mod347/mod347.php");}
if ($_GET["section"] == 'mod347' && $_GET["action"] == 'resultado'){include("modules/balance/mod347/mod347_rs.php");}



?>