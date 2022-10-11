<?php
$idfichero = $_GET["idfichero"];
$ftxtbanco = $_POST["txtbanco"];
$haccion = $_POST["haccion"];

$ftxtfichero = $_POST["txtfichero"];
$fhidfichero = $_POST["hidfichero"];

$ftxtnombrefichero = $_POST["txtnombrefichero"];
$flblextension = $_POST["lblextension"];

$flstpropietario = $_POST["lstpropietario"];

//indexacion

$fchkindexa = $_POST["chkindexa"];
$minchr = $_POST["txtminchr"];
$maxchr = $_POST["txtmaxchr"];
$vecesrepiteparaok = $_POST["txtrepite"];
$ftxtclaves = $_POST["txtclaves"];

if ($haccion == 'new')
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


		//Asignacion de permisos de infopass
		foreach ($_POST['chkgrupo'] as $idgrupo)
		{
		  $grupospermisos = $mysqli->query("insert into ".$prefixsql."ficheros_perm (idfichero, iduser, idgroup) values ('".$dbcontador."', '0', '".$idgrupo."')");
		}

	foreach ($_POST['chkusuario'] as $idusuario)
		{
		  $usuariospermisos = $mysqli->query("insert into ".$prefixsql."ficheros_perm (idfichero, iduser, idgroup) values ('".$dbcontador."', '".$idusuario."', '0')");
		}
	$idficheroindex = $dbcontador;
	
}
if ($haccion == 'update')
{
	$sqlfichero = $mysqli->query("update ".$prefixsql."ficheros set descripcion = '".$ftxtfichero."', nombre = '".$ftxtnombrefichero.".".$flblextension."', iduser = '".$flstpropietario."' where id = '".$fhidfichero."'");

		
	$sqlfichero = $mysqli->query("delete from ".$prefixsql."ficheros_perm where idfichero = '".$fhidfichero."'");
	
	//Asignacion de permisos de infopass
	foreach ($_POST['chkgrupo'] as $idgrupo)
		{
		  $grupospermisos = $mysqli->query("insert into ".$prefixsql."ficheros_perm (idfichero, iduser, idgroup) values ('".$fhidfichero."', '0', '".$idgrupo."')");
		}

	foreach ($_POST['chkusuario'] as $idusuario)
		{
		  $usuariospermisos = $mysqli->query("insert into ".$prefixsql."ficheros_perm (idfichero, iduser, idgroup) values ('".$fhidfichero."', '".$idusuario."', '0')");
		}

	$idficheroindex = $fhidfichero;

}
if ($haccion == 'delete')
{
	$auxsumas = $mysqli->query("SELECT * from ".$prefixsql."ficheros where id = '".$fhidfichero."' ");
	$auxrow = mysqli_fetch_assoc($auxsumas);
	$dbficheroint = $auxrow["fichero"];
	$extension = $auxrow["extension"];
	$dbdirfichero = $auxrow["dirfichero"];
	
	
	$rutafichero = $lnxrutaficheros.$dbdirfichero;
	unlink($rutafichero."/".$dbficheroint);
	
	
	$sqlfichero= $mysqli->query("delete from ".$prefixsql."ficheros where id = '".$fhidfichero."'");
	$sqlfichero= $mysqli->query("delete from ".$prefixsql."ficheros_loc where idfichero = '".$fhidfichero."'");
	$sqlfichero= $mysqli->query("delete from ".$prefixsql."ficheros_perm where idfichero = '".$fhidfichero."'");
	$sqlfichero= $mysqli->query("delete from ".$prefixsql."ficheros_keyword where idfichero = '".$fhidfichero."'");
}

//Indexación del documento:
if ($haccion == 'new' || $haccion == 'update')
{
	$sqlfichero = $mysqli->query("delete from ".$prefixsql."ficheros_keyword where idfichero = '".$idficheroindex."'");

	if(strlen(trim($ftxtclaves)) > 0)
	{
		if($fchkindexa == 'auto')
		{

			$texto = $ftxtclaves;

			$arvocal = array("á", "à", "ä", "Á", "À", "Ä");
			$texto = str_replace($arvocal, "a", $texto);

			$arvocal = array("é", "è", "ë", "É", "È", "Ë");
			$texto = str_replace($arvocal, "e", $texto);
			
			$arvocal = array("í", "ì", "ï", "Í", "Ì", "Ï");
			$texto = str_replace($arvocal, "i", $texto);

			$arvocal = array("ó", "ò", "ö", "Ó", "Ò", "Ö");
			$texto = str_replace($arvocal, "o", $texto);

			$arvocal = array("ú", "ù", "ü", "Ú", "Ù", "Ü");
			$texto = str_replace($arvocal, "u", $texto);

			$texto = preg_replace("([^A-Za-z0-9 @.,])", "", $texto);

			$palabras = explode(" ", $texto);

			$textofiltrado = array();

			foreach ($palabras as $palabra)
			{
				if (strlen($palabra) >= $minchr && strlen($palabra) <= $maxchr )
				{
					array_push($textofiltrado, strtolower($palabra));
				}
			}
			
			$valores = array_count_values($textofiltrado);

			$palabrasclave = "";
			foreach ($valores as $clave => $veces)
			{
				if($veces >= $vecesrepiteparaok)
				{
					$palabrasclave = $palabrasclave.$clave." ";
				}
				
			}

			$ftxtclaves = $palabrasclave;
		}



		$ftxtclaves = addslashes(strtolower($ftxtclaves));
		$sqlpalabras = $mysqli->query("insert into ".$prefixsql."ficheros_keyword (idfichero, palabrasclave) values ('".$idficheroindex."', '".$ftxtclaves."')");
	}

}



header( "Location: index.php?module=ficheros" );
	


	
?>