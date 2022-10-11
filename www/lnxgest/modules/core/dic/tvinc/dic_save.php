<?php
$fhaccion = $_POST["haccion"];
$fhiddic = $_POST["hiddic"];
$ftxtlabela = addslashes($_POST["txtlabela"]);
$ftxtlabelb = addslashes($_POST["txtlabelb"]);


if ($fhaccion == "new")
{
	$sqldic = $mysqli->query("insert into ".$prefixsql."terceros_vinc_label (labela, labelb) VALUES ('".$ftxtlabela."', '".$ftxtlabelb."')");
}

if ($fhaccion == "update")
{

	$sqldic = $mysqli->query("update ".$prefixsql."terceros_vinc_label set labela = '".$ftxtlabela."', labelb = '".$ftxtlabelb."' where id = '".$fhiddic."'");
	
}

if ($fhaccion == "delete")
{

	$sqldic = $mysqli->query("delete from ".$prefixsql."terceros_vinc_label where id = '".$fhiddic."'");
	
}



	header( "Location: index.php?module=core&section=dic&subs=tvinc" );
	
?>

