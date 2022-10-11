<?php
$idinfopass = $_POST["hidinfopass"];
$haccion = $_POST["haccion"];

$flsttercero = $_POST["lsttercero"];
$ftxtusuario = $_POST["txtusuario"];
$ftxtpassword = base64_encode($_POST["txtpassword"]);
$ftxtemail = $_POST["txtemail"];
$ftxtdonde = $_POST["txtdonde"];
$ftxturlweb = $_POST["txturlweb"];
$ftxtnotas = $_POST["txtnotas"];



if ($haccion == 'new')
{
	$sqltercero= $mysqli->query("insert into ".$prefixsql."it_infopass (usuario, password, email, donde, notas, idtercero, urlweb) VALUES ('".$ftxtusuario."', '".$ftxtpassword."', '".$ftxtemail."', '".$ftxtdonde."', '".$ftxtnotas."', '".$flsttercero."', '".$ftxturlweb."' )");
	
	$ConsultaMySql= $mysqli->query("SELECT max(id) as contador from ".$prefixsql."it_infopass");
	$row = mysqli_fetch_assoc($ConsultaMySql);
	$idinfopass = $row['contador'];
	
	setcookie("lnxit_idtercero", $flsttercero);
	
	//Asignacion de permisos de infopass
	foreach ($_POST['chkgrupo'] as $idgrupo)
		{
		  $grupospermisos = $mysqli->query("insert into ".$prefixsql."it_infopass_perm (idusuario, idgrupo, idinfopass) values ('0', '".$idgrupo."', '".$idinfopass."')");
		}

	foreach ($_POST['chkusuario'] as $idusuario)
		{
		  $usuariospermisos = $mysqli->query("insert into ".$prefixsql."it_infopass_perm (idusuario, idgrupo, idinfopass) values ('".$idusuario."', '0', '".$idinfopass."')");
		}
	
}
if ($haccion == 'update')
{

	$sqltercero= $mysqli->query("update ".$prefixsql."it_infopass set usuario = '".$ftxtusuario."', password = '".$ftxtpassword."', email = '".$ftxtemail."', donde = '".$ftxtdonde."', notas = '".$ftxtnotas."', idtercero = '".$flsttercero."', urlweb = '".$ftxturlweb."' where id = '".$idinfopass."'");
	
	$sqltercero= $mysqli->query("delete from ".$prefixsql."it_infopass_perm where idinfopass = '".$idinfopass."'");
	
	//Asignacion de permisos de infopass
	foreach ($_POST['chkgrupo'] as $idgrupo)
		{
		  $grupospermisos = $mysqli->query("insert into ".$prefixsql."it_infopass_perm (idusuario, idgrupo, idinfopass) values ('0', '".$idgrupo."', '".$idinfopass."')");
		}

	foreach ($_POST['chkusuario'] as $idusuario)
		{
		  $usuariospermisos = $mysqli->query("insert into ".$prefixsql."it_infopass_perm (idusuario, idgrupo, idinfopass) values ('".$idusuario."', '0', '".$idinfopass."')");
		}
	
	
}
if ($haccion == "delete")
{
	$sqlinfopass = $mysqli->query("delete from ".$prefixsql."it_infopass where id = '".$idinfopass."'");
	$sqlinfopass = $mysqli->query("delete from ".$prefixsql."it_infopass_perm where idinfopass = '".$idinfopass."'");
}

$urlatras = "index.php?module=lnxit&section=infopass";
header( "Location: ".$urlatras );


?>