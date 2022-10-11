<?php
$flsttipo = $_POST["lsttipo"];
$ftxtfecha = $_POST["txtfecha"];
$ftxtfechafin = $_POST["txtfechafin"];

$fano = substr($ftxtfecha, 6, 4);  
$fmes = substr($ftxtfecha, 3, 2);  
$fdia = substr($ftxtfecha, 0, 2);  

$cfechainicio = $fano.'-'.$fmes.'-'.$fdia.' 00:00:00';

$fano = substr($ftxtfechafin, 6, 4);  
$fmes = substr($ftxtfechafin, 3, 2);  
$fdia = substr($ftxtfechafin, 0, 2);  

$cfechafin = $fano.'-'.$fmes.'-'.$fdia.' 23:59:59';

if ($flsttipo == "1"){include("modules/lnxit/stats/stats_1_rs.php");}
if ($flsttipo == "2"){include("modules/lnxit/stats/stats_2_rs.php");}
if ($flsttipo == "3"){include("modules/lnxit/stats/stats_3_rs.php");}
if ($flsttipo == "4"){include("modules/lnxit/stats/stats_4_rs.php");}


?>
