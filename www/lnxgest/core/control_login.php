<?php
require("core/cfpc.php");

$sqlaux = $mysqli->query("select * from ".$prefixsql."users_config where opcion = 'ALLOW_LOGIN' "); 
$rowaux = mysqli_fetch_assoc($sqlaux);
$permitido_login = $rowaux["valor"];

$sqlaux = $mysqli->query("select * from ".$prefixsql."users_config where opcion = 'IDUSERALLOWED' "); 
$rowaux = mysqli_fetch_assoc($sqlaux);
$iduser_allow = $rowaux["valor"];


if ($_GET["control"] == 'login')
{

	$usuario = $_POST["txtusername"];
	$password = $_POST["txtpassword"];
	$dispositivo = $_POST["txtdevice"];
	$password = md5($password);
	$sqlusers = $mysqli->query("select * from ".$prefixsql."users where username = '".$usuario."' and password = '".$password."' and activo = '1'");

	$existe = $sqlusers->num_rows;

	
	
	if ($existe == '1')
	{
		$campos = mysqli_fetch_assoc($sqlusers);
		$userid = $campos['id'];
		$ididioma = $campos['ididioma'];
		$dbuidmulti = $campos['uidmulti'];
		$lnxuserset_showcods = $campos["userset_showcods"];
		$lnxuserset_viewlists = $campos["userset_viewlists"];
		
		$sqllang = $mysqli->query("select * from ".$prefixsql."dic_idiomas where id = '".$ididioma."'");
		$camposlang = mysqli_fetch_assoc($sqllang);
		$userlang = $camposlang["fichero"];
		
		if($permitido_login == "YES" || ($permitido_login == "NO" && $iduser_allow == $userid))
		{
			if($_POST["chkmantenersesion"] == "1")
			{
				// Mantiene la sesi�n iniciada y Caduca en un a�o 
						setcookie('lnxuserid', $userid, time() + 365 * 24 * 60 * 60); 		
						setcookie('lnxuserlang', $userlang, time() + 365 * 24 * 60 * 60); 
						setcookie('lnxuseridlang', $ididioma, time() + 365 * 24 * 60 * 60);
						setcookie('lnxshowmenu', "mostrar", time() + 365 * 24 * 60 * 60);
						setcookie('lnxuserset_showcods', $lnxuserset_showcods, time() + 365 * 24 * 60 * 60);
						setcookie('lnxuserset_viewlists', $lnxuserset_viewlists, time() + 365 * 24 * 60 * 60);
						
						
			}
			else
			{
				//apertura normal de sesi�n
				setcookie("lnxuserid",$userid);	
				setcookie("lnxuserlang",$userlang);
				setcookie("lnxuseridlang",$ididioma);
				setcookie('lnxshowmenu', "mostrar");
				setcookie('lnxuserset_showcods', $lnxuserset_showcods);
				setcookie('lnxuserset_viewlists', $lnxuserset_viewlists);
			}
			ini_set("session.gc_maxlifetime","2592000"); //segundos en 30 dias
			ini_set("session.cookie_lifetime","2592000");
			session_start();
			$uidsession = session_id();
			
			if($dispositivo == "**RECOVERY**") 
			{
				setcookie('lnxrecoverymode', "ON" );
			}


			$_SESSION["lnxuid"] = $uidsession;
			if($_POST["chkmantenersesion"] == "1")
					{
						setcookie('lnxlastuidsession', $uidsession, time() + 365 * 24 * 60 * 60);	
					}
					else
					{
						setcookie('lnxlastuidsession', $uidsession );	
					}
					
					$lbl_useragente = addslashes($_SERVER['HTTP_USER_AGENT']);
			
			
			$fechahoy = date("Y-m-d H:i:s");
			
			
			
			$maxconexion = $dbuidmulti;

			$sqluidsession = $mysqli->query("insert into ".$prefixsql."users_uid (iduser, uidsession, useragente, fecha, nomsesion) values ('".$userid."', '".$uidsession."', '".$lbl_useragente."', '".$fechahoy."', '".$dispositivo."')");

			$cnssql= $mysqli->query("select * from ".$prefixsql."users_uid where iduser = '".$userid."' order by fecha desc limit ".$maxconexion);	
			while($col = mysqli_fetch_array($cnssql))
			{
				$fechadelsesion = $col["fecha"];
			}
			
			$sqluidsession = $mysqli->query("delete from ".$prefixsql."users_uid where iduser = '".$userid."' and fecha < '".$fechadelsesion."'");
			
			header('Location: index.php');
		}
		else
		{
			header('Location: index.php?pass=no');
		}
		
		
	}
	else
	{
			header('Location: index.php?pass=no');
	}
}
if ($_GET["control"] == 'logoff')
{
	$uidsession = session_id();
	$sqluidsession = $mysqli->query("delete from ".$prefixsql."users_uid where iduser = '".$_COOKIE["lnxuserid"]."' and uidsession = '".$uidsession."'");
		

	setcookie("lnxuserid","0");	
	setcookie("lnxuserlang","0");	
	setcookie("lnxuseridlang","0");
	setcookie('lnxlastuidsession', "" );
	setcookie('lnxuserset_showcods', "");
	setcookie('lnxrecoverymode', "" );
	setcookie('lnxuserset_viewlists', "" );
	
	
	
	
	session_destroy();
	
	header('Location: index.php');
}


?>