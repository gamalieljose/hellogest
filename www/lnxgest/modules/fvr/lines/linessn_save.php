<?php
$fhidlinea = $_POST["hidlinea"];
$fhiddocumento = $_POST["hiddocumento"];
$fhaccionlineasn = $_POST["haccionlineasn"];

$hidlineasn = $_POST["hidlineasn"];

$ftxtsn = $_POST["txtsn"];
$ftxtpn = $_POST["txtpn"];
$ftxtotro = $_POST["txtotro"];



if ($fhaccionlineasn == "new")
{
	$ConsultaMySql= $mysqli->query("insert into ".$prefixsql.$lnxinvoice."_sn (".$campomasterid.", idlinea, sn, pn, otro) values ('".$fhiddocumento."', '".$fhidlinea."', '".$ftxtsn."', '".$ftxtpn."', '".$ftxtotro."')");
	
	header("Location: index.php?module=".$lnxinvoice."&section=lines&action=edit&idlinea=".$fhidlinea."&id=".$fhiddocumento);
	
}

if ($fhaccionlineasn == "update")
{
	
	$ConsultaMySql= $mysqli->query("update ".$prefixsql.$lnxinvoice."_sn set sn = '".$ftxtsn."', pn = '".$ftxtpn."', otro = '".$ftxtotro."' where id = '".$hidlineasn."'");
	
	header("Location: index.php?module=".$lnxinvoice."&section=lines&action=edit&idlinea=".$fhidlinea."&id=".$fhiddocumento);
	
}
if ($fhaccionlineasn == "delete")
{
		
	$ConsultaMySql= $mysqli->query("delete from ".$prefixsql.$lnxinvoice."_sn where id = '".$hidlineasn."'");
	
	header("Location: index.php?module=".$lnxinvoice."&section=lines&action=edit&idlinea=".$fhidlinea."&id=".$fhiddocumento);
	
}
?>