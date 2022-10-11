<?php
$fhaccion = $_POST["haccion"];
$fhiduser = $_POST["hiduser"];
$fhidmail = $_POST["hidmail"];
$ftxtpassword = addslashes($_POST["txtpassword"]);
$ftxtdisplay = addslashes($_POST["txtdisplay"]);
$ftxtuser = $_POST["txtuser"];
$ftxttel = $_POST["txttel"];
$ftxtemail = $_POST["txtemail"];
$ftxtsmtp = $_POST["txtsmtp"];
$ftxtpie = addslashes($_POST["txtpie"]);
$fchkdft = $_POST["chkdft"];

$ftxtsmtpport = $_POST["txtsmtpport"];
$flsttipoconex = $_POST["lsttipoconex"];

$ftxtcuenta = addslashes($_POST["txtcuenta"]);

if($fchkdft == '' || $fchkdft=='0'){$fchkdft = "0";}

if($fchkdft == '1')
{
	$sqlusuario = $mysqli->query("update ".$prefixsql."users_correo set dft = '0' where iduser = '".$fhiduser."'");
}

if($fhaccion == "new")
{
	
	$sqlusuario = $mysqli->query("insert into ".$prefixsql."users_correo (
	iduser, display, usuario, password, smtpserver, email, dft, notapie, port, tipoconex, nomcuenta) VALUES ('".$fhiduser."', '".$ftxtdisplay."', '".$ftxtuser."', '".$ftxtpassword."', '".$ftxtsmtp."', '".$ftxtemail."', '".$fchkdft."', '".$ftxtpie."', '".$ftxtsmtpport."', '".$flsttipoconex."', '".$ftxtcuenta."')");
}
if($fhaccion == "update")
{

	$sqltercero= $mysqli->query("update ".$prefixsql."users_correo set 
	usuario = '".$ftxtuser."', 
	display = '".$ftxtdisplay."', 
	password = '".$ftxtpassword."', 
	smtpserver = '".$ftxtsmtp."', 
	email = '".$ftxtemail."', 
	dft = '".$fchkdft."', 
	notapie = '".$ftxtpie."', 
	port = '".$ftxtsmtpport."', 
	tipoconex = '".$flsttipoconex."', 
	nomcuenta = '".$ftxtcuenta."' 
	where id = '".$fhidmail."'");

}

if($fhaccion == "delete")
{

	$sqltercero = $mysqli->query("delete from ".$prefixsql."users_correo where id = '".$fhidmail."'");

}




if(isset($_POST["btnguardar"])) 
	{
		$url_atras = "index.php?&module=core&section=correo&id=".$fhiduser;
		
		header( "Location: ".$url_atras );
	}
	if(isset($_POST["btnaplicar"])) 
	{
		
		$url_atras = "index.php?module=core&section=correo&action=edit&id=".$fhiduser."&idmail=".$fhidmail."&upd=ate";
		header( "Location: ".$url_atras );
	}



	
	?>