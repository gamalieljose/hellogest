<?php
$fhaccion = $_POST["haccion"];
$idactivo = $_POST["hidactivo"];
$fchkactivo = $_POST["chkactivo"];

if($fhaccion == "new")
{
	foreach($fchkactivo as $chkidactivo)
	{		
		$sqlactivovinculado = $mysqli->query("delete from ".$prefixsql."ita_activos_vinc where idactivo = '".$idactivo."' and idvinculado = '".$chkidactivo."' "); 
		$sqlactivovinculado = $mysqli->query("delete from ".$prefixsql."ita_activos_vinc where idactivo = '".$chkidactivo."' and idvinculado = '".$idactivo."' "); 

		$sqlactivovinculado = $mysqli->query("insert into ".$prefixsql."ita_activos_vinc (idactivo, idvinculado) values('".$idactivo."', '".$chkidactivo."') ");
		$sqlactivovinculado = $mysqli->query("insert into ".$prefixsql."ita_activos_vinc (idactivo, idvinculado) values('".$chkidactivo."', '".$idactivo."') ");
		
	}
}

$url_atras = "index.php?module=lnxit&section=activos&ss=vinculos&id=".$idactivo."&tab=3";
header('Location: '.$url_atras);
?>

