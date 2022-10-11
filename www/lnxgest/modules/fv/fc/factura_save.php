<?php
$fhiddocumento = $_POST["hiddoc"];
$ftxtfactura = $_POST["txtfactura"];



$ConsultaMySql= $mysqli->query("update ".$prefixsql.$lnxinvoice." set factura = '".$ftxtfactura."' where id = '".$fhiddocumento."'");


$url_atras = "index.php?module=".$lnxinvoice."&section=main&action=view&id=".$fhiddocumento;


header( "Location: ".$url_atras );

	
?>