<?php
$sqlaux = $mysqli->query("select * from ".$prefixsql."empresas where id = '".$_COOKIE["lnxcontaidempresa"]."'"); 
$rowaux = mysqli_fetch_assoc($sqlaux);
$dblblrz = $rowaux["razonsocial"];


	$numscreen = "";
	$displaytitle = "Contabilidad - ".$dblblrz;
	


?>