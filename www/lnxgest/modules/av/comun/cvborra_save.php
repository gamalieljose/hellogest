<?php
$fhiddocumento = $_POST["hiddoc"];

$ConsultaMySql= $mysqli->query("update ".$prefixsql.$lnxinvoice." set codigoint = '0', codigo = '(PROV ".$fhiddocumento.")' where id = '".$fhiddocumento."'");

if($lnxinvoice == "ac")
{
	include("modules/".$lnxinvoice."/cstock/borrastock.php");
}





$urlatras = 'index.php?module='.$lnxinvoice.'&section=main&action=view&id='.$fhiddocumento;

header("Location: ".$urlatras);

	
	?>