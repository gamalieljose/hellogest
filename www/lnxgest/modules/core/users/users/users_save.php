<?php
$fhaccion = $_POST["haccion"];
$fhiduser = $_POST["hiduser"];
$ftxtpassword = $_POST["txtpassword"];
$ftxtpassword2 = $_POST["txtpassword2"];

$flstempresa = $_POST["lstempresa"];

$ftxtdisplay = $_POST["txtdisplay"];
$ftxtuser = $_POST["txtuser"];
$ftxttel = $_POST["txttel"];
$ftxtemail = $_POST["txtemail"];
$ftxtdir = $_POST["txtdir"];
$ftxtcp = $_POST["txtcp"];
$ftxtpobla = $_POST["txtpobla"];
$fcbprovincias = $_POST["cbprovincias"];
$fcbpais = $_POST["cbpais"];
$ftxtncuenta = $_POST["txtncuenta"];
$fchkactivo = $_POST["chkactivo"];
$flstidioma = $_POST["lstidioma"];
$ftxtnif = $_POST["txtnif"];

$fchk_userset_showcods = $_POST["chk_userset_showcods"];
if($fchk_userset_showcods == ''){$fchk_userset_showcods = 0;}
$fopt_userset_viewlists = $_POST["opt_userset_viewlists"];


$ftxtuidsession = $_POST["txtmultiuidmulti"];
$fchkmultiuidmulti = $_POST["chkmultiuidmulti"];

 	
$ftlgm_groupid = addslashes($_POST["txttlgmidgrupo"]);


if($fchkactivo == '' || $fchkactivo=='0'){$fchkactivo = "0";}


$cambiopass = "no"; //no cambia password
$avisonocambiopass = "no"; //no mostrar mensaje cambio password
$mensaje = "Cambios efectuados con éxito";
$urlatras = "index.php?&module=core&section=users";
$guardarcambios = "si";

if($ftxtpassword == '' && $ftxtpassword2 == '')
{
	//no se cambia contraseña
	$cambiopass = "no";
	$mensaje = "Cambios efectuados con éxito";
}
else
{
	if($ftxtpassword == $ftxtpassword2)
	{
		//cambiamos password
		$cambiopass = "si";
		$guardarcambios = "si";
		$mensaje = "Cambios efectuados con éxito";
	}
	else
	{
		//las contraseñas no coinciden
		$cambiopass = "no";
		$guardarcambios = "no";
		$mensaje = "Las contraseñas no coinciden";
		if($fhaccion == "new"){$urlatras = "index.php?&module=core&section=users&action=new";}
		if($fhaccion == "update"){$urlatras = "index.php?&module=core&section=users&action=edit&id=".$fhiduser;}
	}	
}

$ftxtpassword = md5($ftxtpassword);

if($guardarcambios == "si")
{

	if($fhaccion == "new")
	{
		
		$ssql = "insert into ".$prefixsql."users (username, password, display, ncuenta, tel, dir, cp, pobla, idprov, idpais, email, activo, ididioma, nif, uidmulti, tlgm_groupid, idempresa, userset_showcods, userset_viewlists ) VALUES ('".$ftxtuser."', '".$ftxtpassword."', '".$ftxtdisplay."', '".$ftxtncuenta."', '".$ftxttel."', '".$ftxtdir."', '".$ftxtcp."', '".$ftxtpobla."', '".$fcbprovincias."', '".$fcbpais."', '".$ftxtemail."', '".$fchkactivo."', '".$flstidioma."', '".$ftxtnif."', '".$ftxtuidsession."', '".$ftlgm_groupid."', '".$flstempresa."', '".$fchk_userset_showcods."', '".$fopt_userset_viewlists."')";
		$sqlusuario = $mysqli->query($ssql);
		

		$sqlaux = $mysqli->query("select max(id) as valor from ".$prefixsql."users");
		$rowaux = mysqli_fetch_assoc($sqlaux);
		$userid = $rowaux["valor"];

		$fchkemailactivos = $_POST["chkemailactivos"];
			if($fchkemailactivos == ''){$fchkemailactivos = '0';}
		$fchktlgmactivos = $_POST["chktlgmactivos"];
			if($fchktlgmactivos == ''){$fchktlgmactivos = '0';}
		$fchkemailtickets = $_POST["chkemailtickets"];
			if($fchkemailtickets == ''){$fchkemailtickets = '0';}
		$fchktlgmtickets = $_POST["chktlgmtickets"];
			if($fchktlgmtickets == ''){$fchktlgmtickets = '0';}
		$fchkemailcalls = $_POST["chkemailcalls"];
			if($fchkemailcalls == ''){$fchkemailcalls = '0';}
		$fchktlgmcalls = $_POST["chktlgmcalls"];
			if($fchktlgmcalls == ''){$fchktlgmcalls = '0';}

		$sqlaux = $mysqli->query("insert into ".$prefixsql."users_notifica (iduser, opcion, email, telegram) values ('".$userid."', 'ACTIVOS', '".$fchkemailactivos."', '".$fchktlgmactivos."')");
		$sqlaux = $mysqli->query("insert into ".$prefixsql."users_notifica (iduser, opcion, email, telegram) values ('".$userid."', 'TICKETS', '".$fchkemailtickets."', '".$fchktlgmtickets."')");
		$sqlaux = $mysqli->query("insert into ".$prefixsql."users_notifica (iduser, opcion, email, telegram) values ('".$userid."', 'LLAMADA', '".$fchkemailcalls."', '".$fchktlgmcalls."')");
		
	}
	if($fhaccion == "update")
	{
		if($cambiopass == 'si')
		{
			$sqltercero = $mysqli->query("update ".$prefixsql."users set 
			username = '".$ftxtuser."', 
			password = '".$ftxtpassword."', 
			display = '".$ftxtdisplay."', 
			ncuenta = '".$ftxtncuenta."', 
			tel = '".$ftxttel."', 
			dir = '".$ftxtdir."', 
			cp = '".$ftxtcp."', 
			pobla = '".$ftxtpobla."', 
			idprov = '".$fcbprovincias."', 
			idpais = '".$fcbpais."', 
			email = '".$ftxtemail."', 
			activo = '".$fchkactivo."', 
			ididioma = '".$flstidioma."', 
			idempresa = '".$flstempresa."', 
			nif = '".$ftxtnif."',
			uidmulti = '".$ftxtuidsession."', 
			tlgm_groupid = '".$ftlgm_groupid."', 
			userset_showcods = '".$fchk_userset_showcods."', 
			userset_viewlists = '".$fopt_userset_viewlists."' 
			where id = '".$fhiduser."'");

			$userid = $fhiduser;
		}
		if($cambiopass == 'no')
		{
			
			$sqltercero = $mysqli->query("update ".$prefixsql."users set 
			username = '".$ftxtuser."',  
			display = '".$ftxtdisplay."', 
			ncuenta = '".$ftxtncuenta."', 
			tel = '".$ftxttel."', 
			dir = '".$ftxtdir."', 
			cp = '".$ftxtcp."', 
			pobla = '".$ftxtpobla."', 
			idprov = '".$fcbprovincias."', 
			idpais = '".$fcbpais."', 
			email = '".$ftxtemail."', 
			activo = '".$fchkactivo."', 
			ididioma = '".$flstidioma."', 
			idempresa = '".$flstempresa."', 
			nif = '".$ftxtnif."', 
			uidmulti = '".$ftxtuidsession."', 
			tlgm_groupid = '".$ftlgm_groupid."', 
			userset_showcods = '".$fchk_userset_showcods."', 
			userset_viewlists = '".$fopt_userset_viewlists."'    
			where id = '".$fhiduser."'");

			$userid = $fhiduser;
		}
		
		
		//chkuidsession - los checks para eliminar sesiones
		
		foreach($_POST["chkuidsession"] as $check) 
		{
			$sqltercero = $mysqli->query("delete from ".$prefixsql."users_uid where iduser = '".$fhiduser."' and uidsession = '".$check."' ");
		}
		
//Checks de avisos
$sqltercero = $mysqli->query("delete from ".$prefixsql."users_notifica where iduser = '".$userid."' ");

$fchkemailactivos = $_POST["chkemailactivos"];
	if($fchkemailactivos == ''){$fchkemailactivos = '0';}
$fchktlgmactivos = $_POST["chktlgmactivos"];
	if($fchktlgmactivos == ''){$fchktlgmactivos = '0';}
$fchkemailtickets = $_POST["chkemailtickets"];
	if($fchkemailtickets == ''){$fchkemailtickets = '0';}
$fchktlgmtickets = $_POST["chktlgmtickets"];
	if($fchktlgmtickets == ''){$fchktlgmtickets = '0';}
$fchkemailcalls = $_POST["chkemailcalls"];
	if($fchkemailcalls == ''){$fchkemailcalls = '0';}
$fchktlgmcalls = $_POST["chktlgmcalls"];
	if($fchktlgmcalls == ''){$fchktlgmcalls = '0';}

$sqlaux = $mysqli->query("insert into ".$prefixsql."users_notifica (iduser, opcion, email, telegram) values ('".$userid."', 'ACTIVOS', '".$fchkemailactivos."', '".$fchktlgmactivos."')");
$sqlaux = $mysqli->query("insert into ".$prefixsql."users_notifica (iduser, opcion, email, telegram) values ('".$userid."', 'TICKETS', '".$fchkemailtickets."', '".$fchktlgmtickets."')");
$sqlaux = $mysqli->query("insert into ".$prefixsql."users_notifica (iduser, opcion, email, telegram) values ('".$userid."', 'LLAMADA', '".$fchkemailcalls."', '".$fchktlgmcalls."')");



	}
	if($fhaccion == "delete")
	{
		$sqltercero = $mysqli->query("delete from ".$prefixsql."users where id = '".$fhiduser."'");
		$sqltercero = $mysqli->query("delete from ".$prefixsql."usersgroup where iduser = '".$fhiduser."'");
		$sqltercero = $mysqli->query("delete from ".$prefixsql."usersprinters where iduser = '".$fhiduser."'");
		$sqltercero = $mysqli->query("delete from ".$prefixsql."userstiendas where iduser = '".$fhiduser."'");
		$sqltercero = $mysqli->query("delete from ".$prefixsql."users_correo where iduser = '".$fhiduser."'");
		$sqltercero = $mysqli->query("delete from ".$prefixsql."permisosgrupos where iduser = '".$fhiduser."'");
		$sqltercero = $mysqli->query("delete from ".$prefixsql."users_uid where iduser = '".$fhiduser."'");
		$sqltercero = $mysqli->query("delete from ".$prefixsql."users_notifica where iduser = '".$fhiduser."'");
		
	}



	
}

if(isset($_POST["btnguardar"])) 
	{
		$url_atras = "index.php?module=terceros&section=terceros";
		header( "refresh:2;url=".$url_atras );
	}
	if(isset($_POST["btnaplicar"])) 
	{
		
		$url_atras = "index.php?&module=core&section=users&action=edit&id=".$fhiduser."&upd=ate";
		header( "Location: ".$url_atras );
	}
	
header( "refresh:2;url=".$urlatras );
	echo '<div align="center">
	<table width="300" class="msgaviso">
	<tr><td class="maintitle">mensaje:</td></tr>
	<tr><td>'.$mensaje.'</td></tr>
	<tr><td align="center"><a class="btnedit" href="'.$urlatras.'">Aceptar</a></td></tr>
	</table></div>';
	
?>