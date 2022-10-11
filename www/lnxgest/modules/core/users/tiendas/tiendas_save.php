<?php
$fhaccion = $_POST["haccion"];
$fhiduser = $_POST["hiduser"];
$fhidtienda = $_POST["hidtienda"];
$flsttiendas = $_POST["lsttiendas"];
$flstterminal = $_POST["lstterminal"];

$fchkdft = $_POST["chkdft"];

if($fchkdft == '' || $fchkdft=='0'){$fchkdft = "0";}

if($fchkdft == '1')
{
	$sqlusuario = $mysqli->query("update ".$prefixsql."userstiendas set dft = '0' where iduser = '".$fhiduser."'");
}

if($fhaccion == "new")
{
	$sqlusuario = $mysqli->query("insert into ".$prefixsql."userstiendas (iduser, idtienda, dft, idterminal) VALUES ('".$fhiduser."', '".$flsttiendas."', '".$fchkdft."', '0' )");
}

if($fhaccion == "update")
{
	$sqlusuario = $mysqli->query("update ".$prefixsql."userstiendas set dft = '".$fchkdft."', idterminal = '".$flstterminal."' where id = '".$fhidtienda."'");
	
}

if($fhaccion == "delete")
{

	$sqltercero = $mysqli->query("delete from ".$prefixsql."userstiendas where id = '".$fhidtienda."'");

}




if(isset($_POST["btnguardar"])) 
	{
		$url_atras = "index.php?&module=core&&section=utiendas&id=".$fhiduser;
		
		header( "Location: ".$url_atras );
	}
	if(isset($_POST["btnaplicar"])) 
	{
		
		$url_atras = "index.php?module=core&&section=utiendas&action=edit&id=".$fhiduser."&idtienda=".$fhidtienda."&upd=ate";
		header( "Location: ".$url_atras );
	}


	
	?>