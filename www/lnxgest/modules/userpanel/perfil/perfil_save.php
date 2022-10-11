<?php
$fhiduser = $_POST["hiduser"];

$ftxtactualpassword = md5($_POST["txtactualpassword"]);
$ftxtnewpassword = $_POST["txtnewpassword"];
$ftxtnewpassword2 = $_POST["txtnewpassword2"];

$ftxtdisplay = $_POST["txtdisplay"];

$fhidsession = $_POST["hidsession"];
$ftxtdevice = $_POST["txtdevice"];

$ftxttlgmidgrupo = addslashes($_POST["txttlgmidgrupo"]);

$fchk_userset_showcods = $_POST["chk_userset_showcods"];
if($fchk_userset_showcods == ''){$fchk_userset_showcods = 0;}
$fopt_userset_viewlists = $_POST["opt_userset_viewlists"];


$ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."users where id = '".$fhiduser."'");
$row = mysqli_fetch_assoc($ConsultaMySql);
$dbpass = $row['password'];

if($ftxtactualpassword == $dbpass && ($ftxtnewpassword == $ftxtnewpassword2 && $ftxtnewpassword <> ''))
{
	//La contraseña coincide con el de la base de datos y las nuevas taqmbien coiciden, se procede al cambio de password
	
	$nuevopass = md5($ftxtnewpassword);
	
	$sqluser = $mysqli->query("update ".$prefixsql."users set password = '".$nuevopass."' where id = '".$fhiduser."'");

}

$sqluser = $mysqli->query("update ".$prefixsql."users set display = '".$ftxtdisplay."', tlgm_groupid = '".$ftxttlgmidgrupo."', userset_showcods = '".$fchk_userset_showcods."', userset_viewlists = '".$fopt_userset_viewlists."'  where id = '".$fhiduser."'");

$sqluser = $mysqli->query("update ".$prefixsql."users_uid set nomsesion = '".$ftxtdevice."' where uidsession = '".$fhidsession."'");


//Checks de avisos
$sqlusers_notifica = $mysqli->query("delete from ".$prefixsql."users_notifica where iduser = '".$fhiduser."' ");

$fchkemailactivos = $_POST["chkemailactivos"];
	if($fchkemailactivos == ''){$fchkemailactivos = '0';}
$fchktlgmactivos = $_POST["chktlgmactivos"];
	if($fchktlgmactivos == ''){$fchktlgmactivos = '0';}
$fchkemailtickets = $_POST["chkemailtickets"];
	if($fchkemailtickets == ''){$fchkemailtickets = '0';}
$fchktlgmtickets = $_POST["chktlgmtickets"];
	if($fchktlgmtickets == ''){$fchktlgmtickets = '0';}

$sqlaux = $mysqli->query("insert into ".$prefixsql."users_notifica (iduser, opcion, email, telegram) values ('".$fhiduser."', 'ACTIVOS', '".$fchkemailactivos."', '".$fchktlgmactivos."')");
$sqlaux = $mysqli->query("insert into ".$prefixsql."users_notifica (iduser, opcion, email, telegram) values ('".$fhiduser."', 'TICKETS', '".$fchkemailtickets."', '".$fchktlgmtickets."')");



$url_atras = "index.php?module=userpanel";

header( "refresh:2;url=".$url_atras );
	echo '<div align="center">
	<table width="300" class="msgaviso">
	<tr><td class="maintitle">mensaje:</td></tr>
	<tr><td align="center">Algunos de estos cambios no serán efectivos hasta que cierre la sesión';
	echo'</td></tr>
	<tr><td align="center"><a class="btnedit" href="'.$url_atras.'">Aceptar</a></td></tr>
	</table></div>';
	
?>