<?php
$fhaccion = $_POST["haccion"];
$fhidregistro = $_POST["hidregistro"];

$fdpkfecha = $_POST["dpkfecha"];
$ftiempohh = $_POST["tiempohh"];
$ftiempomin = $_POST["tiempomin"];
$flsttercero = $_POST["lsttercero"];
$flstcontacto = $_POST["lstcontacto"];
$flstcampana = $_POST["lstcampana"];
$ftxtseguimiento = addslashes($_POST["txtseguimiento"]);

$fchkacllamada = $_POST["chkacllamada"];
	if($fchkacllamada == ''){$fchkacllamada = "0";}
$fchkacvisita = $_POST["chkacvisita"];
	if($fchkacvisita == ''){$fchkacvisita = "0";}
$fchkacemail = $_POST["chkacemail"];
	if($fchkacemail == ''){$fchkacemail = "0";}
$fchkacotros = $_POST["chkacotros"];
	if($fchkacotros == ''){$fchkacotros = "0";}


$temp = explode("/", $fdpkfecha);
$fdpkfecha = $temp[2]."-".$temp[1]."-".$temp[0];
$ffechaseg = $fdpkfecha." ".$ftiempohh.":".$ftiempomin.":00";

$fhficheroone = $_POST["hficheroone"];
$ftxtfichero = addslashes($_POST["txtfichero"]);
$flstpublico = $_POST["lstpublico"];
	if($flstpublico == '1')
	{
		$flstpropietario = '0';
	}
	else
	{
		$flstpropietario = $_COOKIE["lnxuserid"];
	}
$flstcat = $_POST["lstcat"];
$foptrsseg = $_POST["optrsseg"];



if($fhaccion == "new")
{
	$sqlseg = $mysqli->query("insert into ".$prefixsql."crm_seg (idtercero, idcontacto, idcamp, seguimiento, fecha, llamada, visita, email, otros, rsseg) values('".$flsttercero."', '".$flstcontacto."', '".$flstcampana."', '".$ftxtseguimiento."', '".$ffechaseg."', '".$fchkacllamada."', '".$fchkacvisita."', '".$fchkacemail."', '".$fchkacotros."', '".$foptrsseg."') "); 
	
	$sqlaux = $mysqli->query("select max(id) as contador from ".$prefixsql."crm_seg"); 
	$rowaux = mysqli_fetch_assoc($sqlaux);
	$idseguimiento = $rowaux["contador"];
}

if($fhaccion == "update")
{
    $sqlseg = $mysqli->query("update ".$prefixsql."crm_seg set idtercero = '".$flsttercero."', idcontacto = '".$flstcontacto."', idcamp = '".$flstcampana."', seguimiento = '".$ftxtseguimiento."', fecha = '".$ffechaseg."', llamada = '".$fchkacllamada."', visita = '".$fchkacvisita."', email = '".$fchkacemail."', otros = '".$fchkacotros."', rsseg = '".$foptrsseg."' where id = '".$fhidregistro."'"); }

if($fhaccion == "delete")
{}

//Subida de ficheros
if($fhaccion == "new")
{
	
	if($fhficheroone == 'uploadfile' && is_uploaded_file($_FILES['fileficherito']['tmp_name']))
	{
		// Ruta archivos $lnxrutaficheros /lnxgest/files/
		$extension = end(explode(".", $_FILES['fileficherito']['name']));
		
		$extension = strtolower($extension);
		
		$dirano = "Y".date('Y');
		$dirmes = "M".date('m');
		
		$fechasubida = date("Y-m-d H:i:s");
		
		$rutafichero = $lnxrutaficheros.$extension;
		
		$rutafichero = $lnxrutaficheros.$dirano;
		
		if (file_exists($rutafichero))
		{
			//si existe la carpeta de la serie no hace nada
		}else
		{
			//como NO existe la carpeta de las serie se crea la carpeta correspondiente
			
			$oldmask = umask(0);
			//mkdir($rutafichero, 7777, true);
			mkdir($rutafichero, 0777);
			umask($oldmask);
		}
		
		$rutafichero = $lnxrutaficheros.$dirano."/".$dirmes;
		
		if (file_exists($rutafichero))
		{
			//si existe la carpeta de la serie no hace nada
		}else
		{
			//como NO existe la carpeta de las serie se crea la carpeta correspondiente
			
			$oldmask = umask(0);
			//mkdir($rutafichero, 7777, true);
			mkdir($rutafichero, 0777);
			umask($oldmask);
		}
		
		$dirsubida = $dirano."/".$dirmes;
		
		$fichero_nombre = $_FILES['fileficherito']['name'];
		$ficherotm = $_FILES['fileficherito']['type'];
		
		$sqlficheros= $mysqli->query("insert into ".$prefixsql."ficheros (fichero, nombre, extension, descripcion, tipomime, dirfichero, fsubido, iduser, sincroniza) VALUES ('X', '".$fichero_nombre."', '".$extension."', '".$ftxtfichero."', '".$ficherotm."', '".$dirsubida."', '".$fechasubida."', '".$flstpropietario."', '0')");

		$sqlficheros = $mysqli->query("select max(id) as contador from ".$prefixsql."ficheros ");
		$row = mysqli_fetch_assoc($sqlficheros);
		$dbcontador = $row["contador"];
		
		$fichero_nombrefin = $dbcontador.".".$extension;
		
		$sqlficheros= $mysqli->query("update ".$prefixsql."ficheros set fichero = '".$fichero_nombrefin."' where id = '".$dbcontador."'");

		move_uploaded_file($_FILES['fileficherito']['tmp_name'], $rutafichero."/".$fichero_nombrefin);

		
		$sqlficheros= $mysqli->query("insert into ".$prefixsql."ficheros_loc (idfichero, module, idlinea0, idlinea1, idlinea2, display, publico, idcat) values ('".$dbcontador."', 'crm_seg', '".$idseguimiento."', '0', '0', '".$ftxtfichero."', '".$flstpublico."', '".$flstcat."')");
	}


	
	if($fhficheroone == 'searchfile')
	{
		if(is_uploaded_file($_FILES['fileficherito']['tmp_name']))
		{
			unlink($_FILES['fileficherito']['tmp_name']);
		}

		$foptidficheroone = $_POST["optidficheroone"];

		if($foptidficheroone > 0)
		{
			$sqlaux = $mysqli->query("select * from ".$prefixsql."ficheros where id = '".$foptidficheroone."' "); 
			$rowaux = mysqli_fetch_assoc($sqlaux);
			$fchr_descripcion = $rowaux["descripcion"];
			$fchr_iduser = $rowaux["iduser"];
			if($fchr_iduser == '0'){$flstpublico = '1';}else{$flstpublico = '0';}

			$sqlficheros = $mysqli->query("insert into ".$prefixsql."ficheros_loc (idfichero, module, idlinea0, idlinea1, idlinea2, display, publico, idcat) values ('".$foptidficheroone."', 'crm_seg', '".$idseguimiento."', '0', '0', '".$fchr_descripcion."', '".$flstpublico."', '0')");
		}

	}
}

if($fhaccion == "delete")
{
	$sqlficheros = $mysqli->query("delete from ".$prefixsql."ficheros_loc where module = 'crm_seg' and idlinea0 = '".$fhidregistro."' ");
	$sqlficheros = $mysqli->query("delete from ".$prefixsql."crm_seg where id = '".$fhidregistro."' ");
}



if($fhaccion == "update")
{
	$ffchrborra = $_POST["fchrborra"];
	if($ffchrborra == 'borrafichero')
	{
		$sqlficheros = $mysqli->query("delete from ".$prefixsql."ficheros_loc where module = 'crm_seg' and idlinea0 = '".$fhidregistro."' ");
	}
	
	$sqlaux = $mysqli->query("select count(*) as contador from ".$prefixsql."ficheros_loc where module = 'crm_seg' and idlinea0 = '".$fhidregistro."' "); 
	$rowaux = mysqli_fetch_assoc($sqlaux);
	$existe_fichero = $rowaux["contador"];

	if($existe_fichero == '0' )
	{
		
		if($fhficheroone == 'uploadfile' && is_uploaded_file($_FILES['fileficherito']['tmp_name']))
		{
			echo '<p>Paso: 2</p>';
			// Ruta archivos $lnxrutaficheros /lnxgest/files/
			$extension = end(explode(".", $_FILES['fileficherito']['name']));
			
			$extension = strtolower($extension);
			
			$dirano = "Y".date('Y');
			$dirmes = "M".date('m');
			
			$fechasubida = date("Y-m-d H:i:s");
			
			$rutafichero = $lnxrutaficheros.$extension;
			
			$rutafichero = $lnxrutaficheros.$dirano;
			
			if (file_exists($rutafichero))
			{
				//si existe la carpeta de la serie no hace nada
			}else
			{
				//como NO existe la carpeta de las serie se crea la carpeta correspondiente
				
				$oldmask = umask(0);
				//mkdir($rutafichero, 7777, true);
				mkdir($rutafichero, 0777);
				umask($oldmask);
			}
			
			$rutafichero = $lnxrutaficheros.$dirano."/".$dirmes;
			
			if (file_exists($rutafichero))
			{
				//si existe la carpeta de la serie no hace nada
			}else
			{
				//como NO existe la carpeta de las serie se crea la carpeta correspondiente
				
				$oldmask = umask(0);
				//mkdir($rutafichero, 7777, true);
				mkdir($rutafichero, 0777);
				umask($oldmask);
			}
			
			$dirsubida = $dirano."/".$dirmes;
			
			$fichero_nombre = $_FILES['fileficherito']['name'];
			$ficherotm = $_FILES['fileficherito']['type'];
			
			$sqlficheros= $mysqli->query("insert into ".$prefixsql."ficheros (fichero, nombre, extension, descripcion, tipomime, dirfichero, fsubido, iduser, sincroniza) VALUES ('X', '".$fichero_nombre."', '".$extension."', '".$ftxtfichero."', '".$ficherotm."', '".$dirsubida."', '".$fechasubida."', '".$flstpropietario."', '0')");

			$sqlficheros = $mysqli->query("select max(id) as contador from ".$prefixsql."ficheros ");
			$row = mysqli_fetch_assoc($sqlficheros);
			$dbcontador = $row["contador"];
			
			$fichero_nombrefin = $dbcontador.".".$extension;
			
			$sqlficheros= $mysqli->query("update ".$prefixsql."ficheros set fichero = '".$fichero_nombrefin."' where id = '".$dbcontador."'");

			move_uploaded_file($_FILES['fileficherito']['tmp_name'], $rutafichero."/".$fichero_nombrefin);

			
			$sqlficheros= $mysqli->query("insert into ".$prefixsql."ficheros_loc (idfichero, module, idlinea0, idlinea1, idlinea2, display, publico, idcat) values ('".$dbcontador."', 'crm_seg', '".$fhidregistro."', '0', '0', '".$ftxtfichero."', '".$flstpublico."', '".$flstcat."')");
		}


		
		if($fhficheroone == 'searchfile')
		{
			if(is_uploaded_file($_FILES['fileficherito']['tmp_name']))
			{
				unlink($_FILES['fileficherito']['tmp_name']);
			}

			$foptidficheroone = $_POST["optidficheroone"];

			if($foptidficheroone > 0)
			{
				$sqlaux = $mysqli->query("select * from ".$prefixsql."ficheros where id = '".$foptidficheroone."' "); 
				$rowaux = mysqli_fetch_assoc($sqlaux);
				$fchr_descripcion = $rowaux["descripcion"];
				$fchr_iduser = $rowaux["iduser"];
				if($fchr_iduser == '0'){$flstpublico = '1';}else{$flstpublico = '0';}

				$sqlficheros = $mysqli->query("insert into ".$prefixsql."ficheros_loc (idfichero, module, idlinea0, idlinea1, idlinea2, display, publico, idcat) values ('".$foptidficheroone."', 'crm_seg', '".$fhidregistro."', '0', '0', '".$fchr_descripcion."', '".$flstpublico."', '0')");
			}

		}
	}
}

$url_atras = "index.php?module=crm&section=seguimientos";
if($_POST["hvolvercamp"] > 0)
{
	$url_atras = "index.php?module=crm&section=campterceros&idcamp=".$_POST["hvolvercamp"];
}
header("Location: ".$url_atras);
?>