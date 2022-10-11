<?php
$idactivo = $_POST["hidactivo"];
$idlicencia = $_POST["hidlicencia"];
$haccion = $_POST["haccion"];

$ftxtproducto = addslashes($_POST["txtproducto"]);
$ftxtlicencia = addslashes($_POST["txtlicencia"]);
$fdpkfecha = $_POST["dpkfecha"];

$fano = substr($fdpkfecha, 6, 4);  
$fmes = substr($fdpkfecha, 3, 2);  
$fdia = substr($fdpkfecha, 0, 2);  

$cfecha = $fano."-".$fmes."-".$fdia;

$foptinfopass = $_POST["optinfopass"];
$fhcontrol_infopass = $_POST["hcontrol_infopass"];
$ftxtidinfopass = $_POST["txtidinfopass"];

$sqlaux = $mysqli->query("select * from ".$prefixsql."ita_activos where id = '".$idactivo."' "); 
$rowaux = mysqli_fetch_assoc($sqlaux);
$dbtratarcomo = $rowaux["tratarcomo"];
$dbidtercero = $rowaux["idtercero"];


$finfpas_txtusuario = addslashes($_POST["infpas_txtusuario"]);
$finfpas_txtpassword = base64_encode($_POST["infpas_txtpassword"]); 
$finfpas_txtemail = addslashes($_POST["infpas_txtemail"]);
$finfpas_txtdonde = addslashes($_POST["infpas_txtdonde"]);
$finfpas_txturlweb = addslashes($_POST["infpas_txturlweb"]);
$finfpas_txtnotas = addslashes($_POST["infpas_txtnotas"]);

if ($haccion == 'new')
{
	if($dbtratarcomo == '1')
	{
		$ftxtlicadquiridas = $_POST["txtlicadquiridas"];
		$sqllic = $mysqli->query("insert into ".$prefixsql."it_licensing (idactivo, producto, licencia, idtercero, fecha, idlic, cantidad, idinfopass) VALUES ('".$idactivo."', '".$ftxtproducto."', '".$ftxtlicencia."', '0', '".$cfecha."', '0', '".$ftxtlicadquiridas."', '0' )");	

		//Validamos las opciones de infopass
		$sqlaux = $mysqli->query("select max(id) as ultimoid from ".$prefixsql."it_licensing "); 
		$rowaux = mysqli_fetch_assoc($sqlaux);
		$dbultimoid = addslashes($rowaux["ultimoid"]);

		if($foptinfopass == "existente" && $fhcontrol_infopass == "OK" && $ftxtidinfopass > 0)
		{
			$sqlaux = $mysqli->query("update ".$prefixsql."it_licensing set idinfopass = '".$ftxtidinfopass."' where id = '".$dbultimoid."'");
		}

				
		if($foptinfopass == "nuevoinfopass" && $finfpas_txtusuario <> "")
		{
			//Creamos el infopass
			$sqllic = $mysqli->query("insert into ".$prefixsql."it_infopass (usuario, password, email, donde, notas, idtercero, urlweb) VALUES ('".$finfpas_txtusuario."', '".$finfpas_txtpassword."', '".$finfpas_txtemail."', '".$finfpas_txtdonde."', '".$finfpas_txtnotas."', '".$dbidtercero."', '".$finfpas_txturlweb."')");	
			$sqlaux = $mysqli->query("select max(id) as ultimoid from ".$prefixsql."it_infopass "); 
			$rowaux = mysqli_fetch_assoc($sqlaux);
			$dbultimoidinfopass = addslashes($rowaux["ultimoid"]);

			$sqlaux = $mysqli->query("update ".$prefixsql."it_licensing set idinfopass = '".$dbultimoidinfopass."' where id = '".$dbultimoid."'");
			
			$sqllic = $mysqli->query("insert into ".$prefixsql."it_infopass_perm (idusuario, idgrupo, idinfopass) VALUES ('".$_COOKIE["lnxuserid"]."', '0', '".$dbultimoidinfopass."')");	
			

		}

	}
	else 
	{
		$foptlicencia = $_POST["optlicencia"];
		if($foptlicencia > 0)
		{

			
			$sqlaux = $mysqli->query("select * from ".$prefixsql."it_licensing where id = '".$foptlicencia."' "); 
			$rowaux = mysqli_fetch_assoc($sqlaux);
			$ftxtproducto = addslashes($rowaux["producto"]);
			$ftxtlicencia = addslashes($rowaux["licencia"]);


			$sqllic = $mysqli->query("insert into ".$prefixsql."it_licensing (idactivo, producto, licencia, idtercero, fecha, idlic, cantidad, idinfopass) VALUES ('".$idactivo."', '".$ftxtproducto."', '".$ftxtlicencia."', '0', '".$cfecha."', '".$foptlicencia."', '1', '0' )");	
		}			
	}
	
	
}
if ($haccion == 'update')
{

	if($dbtratarcomo == '1')
	{
		$ftxtlicadquiridas = $_POST["txtlicadquiridas"];
		$sqllic = $mysqli->query("update ".$prefixsql."it_licensing set idactivo = '".$idactivo."', producto = '".$ftxtproducto."', licencia = '".$ftxtlicencia."', idtercero = '0', fecha = '".$cfecha."', idlic = '0', cantidad = '".$ftxtlicadquiridas."' where id = '".$idlicencia."'");

		$sqllic = $mysqli->query("update ".$prefixsql."it_licensing set producto = '".$ftxtproducto."', licencia = '".$ftxtlicencia."' where idlic = '".$idlicencia."'");

		
		if($foptinfopass == "existente" && $fhcontrol_infopass == "OK" )
		{
			$sqlaux = $mysqli->query("update ".$prefixsql."it_licensing set idinfopass = '".$ftxtidinfopass."' where id = '".$idlicencia."'");
		}


		if($foptinfopass == "nuevoinfopass" && $finfpas_txtusuario <> "")
		{
			//Creamos el infopass
			$sqllic = $mysqli->query("insert into ".$prefixsql."it_infopass (usuario, password, email, donde, notas, idtercero, urlweb) VALUES ('".$finfpas_txtusuario."', '".$finfpas_txtpassword."', '".$finfpas_txtemail."', '".$finfpas_txtdonde."', '".$finfpas_txtnotas."', '".$dbidtercero."', '".$finfpas_txturlweb."')");	
			$sqlaux = $mysqli->query("select max(id) as ultimoid from ".$prefixsql."it_infopass "); 
			$rowaux = mysqli_fetch_assoc($sqlaux);
			$dbultimoidinfopass = addslashes($rowaux["ultimoid"]);

			$sqlaux = $mysqli->query("update ".$prefixsql."it_licensing set idinfopass = '".$dbultimoidinfopass."' where id = '".$idlicencia."'");
			
			$sqllic = $mysqli->query("insert into ".$prefixsql."it_infopass_perm (idusuario, idgrupo, idinfopass) VALUES ('".$_COOKIE["lnxuserid"]."', '0', '".$dbultimoidinfopass."')");	
			

		}



	}
	else 
	{
		$foptlicencia = $_POST["optlicencia"];
		if($foptlicencia > 0)
		{
			
			$sqlaux = $mysqli->query("select * from ".$prefixsql."it_licensing where id = '".$foptlicencia."' "); 
			$rowaux = mysqli_fetch_assoc($sqlaux);
			$ftxtproducto = addslashes($rowaux["producto"]);
			$ftxtlicencia = addslashes($rowaux["licencia"]);

			$sqllic = $mysqli->query("update ".$prefixsql."it_licensing set idactivo = '".$idactivo."', producto = '".$ftxtproducto."', licencia = '".$ftxtlicencia."', idtercero = '0', fecha = '".$cfecha."', idlic = '".$foptlicencia."', cantidad = '1', idinfopass = '0' where id = '".$idlicencia."'");


		}
	}

	
}


if ($haccion == 'delete')
{
	$sqllic = $mysqli->query("delete from ".$prefixsql."it_licensing where id = '".$idlicencia."'");

	if ($_POST["chkborrarlics"] == '1')
	{
		$sqllic = $mysqli->query("delete from ".$prefixsql."it_licensing where idlic = '".$idlicencia."'");
	}
	else 
	{
		$sqllic = $mysqli->query("update ".$prefixsql."it_licensing set idlic = '0' where idlic = '".$idlicencia."' ");
	}
	
}

$urlatras = "index.php?module=lnxit&section=activos&ss=licensing&id=".$idactivo;
header( "Location: ".$urlatras );


?>