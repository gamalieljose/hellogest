<?php
$fhaccion = $_POST["haccion"];
$fhiddic = $_POST["hiddic"];
$ftxtformacontacto = addslashes($_POST["txtformacontacto"]);
$ftxtfichero = addslashes($_POST["txtfichero"]);

if ($fhaccion == "new")
{
	$sqldic = $mysqli->query("insert into ".$prefixsql."dic_idiomas (idioma, fichero) VALUES ('".$ftxtformacontacto."', '".$ftxtfichero."')");
}

if ($fhaccion == "update")
{

	$sqldic = $mysqli->query("update ".$prefixsql."dic_idiomas set idioma = '".$ftxtformacontacto."', fichero = '".$ftxtfichero."' where id = '".$fhiddic."'");
	
}

if ($fhaccion == "delete")
{

	$sqldic = $mysqli->query("delete from ".$prefixsql."dic_idiomas where id = '".$fhiddic."'");
	
}



	header( "Location: index.php?module=core&section=dic&subs=idiomas" );

?>

