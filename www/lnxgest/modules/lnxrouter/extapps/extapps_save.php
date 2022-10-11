<?php
$idempresa = $_POST["hidempresa"];
$fchkorangehrm = $_POST["chkorangehrm"];
	if($fchkorangehrm == ''){$fchkorangehrm = '0';}
$forangehrm_url = $_POST["orangehrm_url"];
$forangehrm_lnxrouter = $_POST["orangehrm_lnxrouter"];
$forangehrm_passrouter = $_POST["orangehrm_passrouter"];
$forangehrm_ftp = $_POST["orangehrm_ftp"];
$forangehrm_ftpuser = $_POST["orangehrm_ftpuser"];
$forangehrm_ftppassword = $_POST["orangehrm_ftppassword"];
$forangehrm_ftpsyncin = $_POST["orangehrm_ftpsyncin"];
$forangehrm_ftpsyncout = $_POST["orangehrm_ftpsyncout"];



$fchksuitecrm = $_POST["chksuitecrm"];
	if($fchksuitecrm == ''){$fchksuitecrm = '0';}
$fsuitecrm_ftp = $_POST["suitecrm_ftp"];
$fsuitecrm_ftpuser = $_POST["suitecrm_ftpuser"];
$fsuitecrm_ftppassword = $_POST["suitecrm_ftppassword"];
$fsuitecrm_ftpsyncin = $_POST["suitecrm_ftpsyncin"];
$fsuitecrm_ftpsyncout = $_POST["suitecrm_ftpsyncout"];



if($_POST["haccion"] == "update")
{
	
	$sqllnxrouter = $mysqli->query("delete from ".$prefixsql."router where idempresa = '".$idempresa."'");
	
	$sqllnxrouter = $mysqli->query("insert into ".$prefixsql."router (idempresa, opcion, valor) values ('".$idempresa."', 'orangehrm_activo', '".$fchkorangehrm."') ");
	$sqllnxrouter = $mysqli->query("insert into ".$prefixsql."router (idempresa, opcion, valor) values ('".$idempresa."', 'orangehrm_publicurl', '".$forangehrm_url."') ");
	$sqllnxrouter = $mysqli->query("insert into ".$prefixsql."router (idempresa, opcion, valor) values ('".$idempresa."', 'orangehrm_routerurl', '".$forangehrm_lnxrouter."') ");
	$sqllnxrouter = $mysqli->query("insert into ".$prefixsql."router (idempresa, opcion, valor) values ('".$idempresa."', 'orangehrm_routerpass', '".$forangehrm_passrouter."') ");
	$sqllnxrouter = $mysqli->query("insert into ".$prefixsql."router (idempresa, opcion, valor) values ('".$idempresa."', 'orangehrm_ftp', '".$forangehrm_ftp."') ");
	$sqllnxrouter = $mysqli->query("insert into ".$prefixsql."router (idempresa, opcion, valor) values ('".$idempresa."', 'orangehrm_ftpuser', '".$forangehrm_ftpuser."') ");
	$sqllnxrouter = $mysqli->query("insert into ".$prefixsql."router (idempresa, opcion, valor) values ('".$idempresa."', 'orangehrm_ftppassword', '".$forangehrm_ftppassword."') ");
	$sqllnxrouter = $mysqli->query("insert into ".$prefixsql."router (idempresa, opcion, valor) values ('".$idempresa."', 'orangehrm_ftpsyncin', '".$forangehrm_ftpsyncin."') ");
	$sqllnxrouter = $mysqli->query("insert into ".$prefixsql."router (idempresa, opcion, valor) values ('".$idempresa."', 'orangehrm_ftpsyncout', '".$forangehrm_ftpsyncout."') ");

	$sqllnxrouter = $mysqli->query("insert into ".$prefixsql."router (idempresa, opcion, valor) values ('".$idempresa."', 'suitecrm_activo', '".$fchksuitecrm."') ");
	$sqllnxrouter = $mysqli->query("insert into ".$prefixsql."router (idempresa, opcion, valor) values ('".$idempresa."', 'suitecrm_ftp', '".$fsuitecrm_ftp."') ");
	$sqllnxrouter = $mysqli->query("insert into ".$prefixsql."router (idempresa, opcion, valor) values ('".$idempresa."', 'suitecrm_ftpuser', '".$fsuitecrm_ftpuser."') ");
	$sqllnxrouter = $mysqli->query("insert into ".$prefixsql."router (idempresa, opcion, valor) values ('".$idempresa."', 'suitecrm_ftppassword', '".$suitecrm_ftppassword."') ");
	$sqllnxrouter = $mysqli->query("insert into ".$prefixsql."router (idempresa, opcion, valor) values ('".$idempresa."', 'suitecrm_ftpsyncin', '".$suitecrm_ftpsyncin."') ");
	$sqllnxrouter = $mysqli->query("insert into ".$prefixsql."router (idempresa, opcion, valor) values ('".$idempresa."', 'suitecrm_ftpsyncout', '".$suitecrm_ftpsyncout."') ");
}
$url_atras = "index.php?module=lnxrouter&section=extapps";
header( "refresh:2;url=".$url_atras );
	echo '<div align="center">
	<table width="300" class="msgaviso">
	<tr><td class="maintitle">mensaje:</td></tr>
	<tr><td>Cambios efectuados con éxito</td></tr>
	<tr><td align="center"><a class="btnedit" href="'.$url_atras.'">Aceptar</a></td></tr>
	</table></div>';
?>