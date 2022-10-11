<?php
$idcola = $_POST["hidcola"];
$haccion = $_POST["haccion"];

$ftxtcola = addslashes($_POST["txtcola"]);




if ($haccion == 'new')
{
	$sqlcolas = $mysqli->query("insert into ".$prefixsql."it_colas (cola) VALUES ('".$ftxtcola."' )");
	
	$ConsultaMySql= $mysqli->query("SELECT max(id) as contador from ".$prefixsql."it_colas");
	$row = mysqli_fetch_assoc($ConsultaMySql);
	$idcola = $row["contador"];
	
	//Asignacion de permisos de infopass
	foreach ($_POST["chkusuario"] as $idusuario)
		{
		  $grupospermisos = $mysqli->query("insert into ".$prefixsql."it_colas_perm (idcola, idusuario) values ('".$idcola."', '".$idusuario."')");
		}


	
}
if ($haccion == 'update')
{

$sqlcolas = $mysqli->query("update ".$prefixsql."it_colas  set cola = '".$ftxtcola."' where id = '".$idcola."'");

$sqlcolas = $mysqli->query("delete from ".$prefixsql."it_colas_perm where idcola = '".$idcola."'");
	

//Asignacion de permisos de infopass
	foreach ($_POST["chkusuario"] as $idusuario)
		{
		  $grupospermisos = $mysqli->query("insert into ".$prefixsql."it_colas_perm (idcola, idusuario) values ('".$idcola."', '".$idusuario."')");
		}
	
	
}
if ($haccion == 'delete')
{
	$sqltercero= $mysqli->query("delete from ".$prefixsql."it_colas where id = '".$idcola."'");
	$sqltercero= $mysqli->query("delete from ".$prefixsql."it_colas_perm where idcola = '".$idcola."'");
}

$urlatras = "index.php?module=lnxit&section=colas";
header( "Location: ".$urlatras );
	

?>