<?php
$foptresultado = $_POST["optresultado"];
//1 - Facturado por agente
//2 - Facturado por cliente agrupado por agente
$fchkfv = $_POST["chkfv"];
//all - no especifica serie de facturación

$fechainicio = $_POST["txtfecha"];
$fechafin = $_POST["txtfechafin"];
$serieventas = $_POST["lstfv"];


$fano = substr($fechainicio, 6, 4);  
$fmes = substr($fechainicio, 3, 2);  
$fdia = substr($fechainicio, 0, 2);  

$cfechainicio = $fano.'-'.$fmes.'-'.$fdia;

$fano = substr($fechafin, 6, 4);  
$fmes = substr($fechafin, 3, 2);  
$fdia = substr($fechafin, 0, 2);  

$cfechafin = $fano.'-'.$fmes.'-'.$fdia;


//$sqlcnsaux= $mysqli->query("select * from ".$prefixsql."series where id = '".$serieventas."'");
//	$row = mysqli_fetch_assoc($sqlcnsaux);
//	$lblserieventas = $row['serie'];

if($foptresultado == '1'){include("modules/balance/com/rs_agente.php");}
if($foptresultado == '2'){include("modules/balance/com/rs_clientes.php");}

?>




<p>&nbsp;</p>
<p>&nbsp;</p>