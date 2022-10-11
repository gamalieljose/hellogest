<?php
$fhiddocumento = $_POST["hiddoc"];


//FV
$ConsultaMySql= $mysqli->query("delete from ".$prefixsql.$lnxinvoice." where id = '".$fhiddocumento."'");

//FV Detalles
$ConsultaMySql= $mysqli->query("delete from ".$prefixsql.$lnxinvoice."_lineas where ".$campomasterid." = '".$fhiddocumento."'");

//FV Detalles tax
$ConsultaMySql= $mysqli->query("delete from ".$prefixsql.$lnxinvoice."_lineas_tax where ".$campomasterid." = '".$fhiddocumento."'");

//FV Impuestos
$ConsultaMySql= $mysqli->query("delete from ".$prefixsql.$lnxinvoice."_tax where ".$campomasterid." = '".$fhiddocumento."'");

//FV numeros de serie
$ConsultaMySql= $mysqli->query("delete from ".$prefixsql.$lnxinvoice."_sn where ".$campomasterid." = '".$fhiddocumento."'");


$urlatras = 'index.php?module='.$lnxinvoice;

header("Location: ".$urlatras);

	
	?>