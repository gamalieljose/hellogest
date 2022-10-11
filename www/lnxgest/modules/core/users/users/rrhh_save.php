<?php
$fhiduser = $_POST["hiduser"];
$flstorangehrm_userid = $_POST["lstorangehrm_userid"];


$sqlrrhh = $mysqli->query("delete from ".$prefixsql."users_app where iduser = '".$fhiduser."'");

$sqlrrhh= $mysqli->query("insert into ".$prefixsql."users_app (iduser, app, idremote) VALUES ('".$fhiduser."', 'orangehrm', '".$flstorangehrm_userid."')");


$urlatras = "index.php?&module=core&section=rrhh&id=".$fhiduser;	
$mensaje = "Cambios aplicados con éxito";
header( "refresh:2;url=".$urlatras );
	echo '<div align="center">
	<table width="300" class="msgaviso">
	<tr><td class="maintitle">mensaje:</td></tr>
	<tr><td>'.$mensaje.'</td></tr>
	<tr><td align="center"><a class="btnedit" href="'.$urlatras.'">Aceptar</a></td></tr>
	</table></div>';
	
	
	?>