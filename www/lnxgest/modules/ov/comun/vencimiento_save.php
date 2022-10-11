<?php
$fhiddocumento = $_POST["hiddoc"];
$ftxtfecha = $_POST["txtfecha"];
$ftxtvencimiento = $_POST["txtvencimiento"];

$fano = substr($ftxtfecha, 6, 4);  
$fmes = substr($ftxtfecha, 3, 2);  
$fdia = substr($ftxtfecha, 0, 2);  

$ftxtfecha = $fano.'-'.$fmes.'-'.$fdia;

$fano = substr($ftxtvencimiento, 6, 4);  
$fmes = substr($ftxtvencimiento, 3, 2);  
$fdia = substr($ftxtvencimiento, 0, 2);  

$ftxtvencimiento = $fano.'-'.$fmes.'-'.$fdia;

$ConsultaMySql= $mysqli->query("update ".$prefixsql.$lnxinvoice." set fecha = '".$ftxtfecha."', vencimiento = '".$ftxtvencimiento."' where id = '".$fhiddocumento."'");


$urlatras = 'index.php?module='.$lnxinvoice.'&section=main&action=view&id='.$fhiddocumento;
header("Location: ".$urlatras);

	 
	?>