<?php
$diractual = dirname(__FILE__);

$directorios = explode("/", $diractual);

$iddir = '-1';

foreach ($directorios as $valor) 
{
		$iddir = $iddir + 1;
}

$hastadir = $iddir - 2;
$iddir = '-1';

foreach ($directorios as $valor) 
{
		$iddir = $iddir + 1;
		if($iddir <= $hastadir)
		{
			$nuevodirectorio = $nuevodirectorio.$directorios[$iddir].'/';

		}
}

$dircfpc = $nuevodirectorio."core/cfpc.php";
require($dircfpc);

//Cargamos variables de envio para telegram
$sqlaux = $mysqli->query("select * from ".$prefixsql."notifica where opcion = 'TLGM_ACTIV' "); 
$rowaux = mysqli_fetch_assoc($sqlaux);
$envioportlgmactivo = $rowaux["valor"];


$sqlaux = $mysqli->query("SELECT count(*) as contador FROM ".$prefixsql."ita_activos WHERE avisar = '1' and faviso <= '".$fechahoy."' "); 
$rowaux = mysqli_fetch_assoc($sqlaux);
$dbcontador = $rowaux["contador"];

if($envioportlgmactivo == '1' && $dbcontador > 0)
{
	//Cargamos las variables para usar con telegram
	$sqlaux = $mysqli->query("select * from ".$prefixsql."notifica where opcion = 'TLGM_BOTID' "); 
	$rowaux = mysqli_fetch_assoc($sqlaux);
	$tlgm_botid = $rowaux["valor"];

	$sqlaux = $mysqli->query("select * from ".$prefixsql."notifica where opcion = 'TLGM_TEXT' "); 
	$rowaux = mysqli_fetch_assoc($sqlaux);
	$tlgm_textcmd = $rowaux["valor"];

	$sqlaux = $mysqli->query("select * from ".$prefixsql."notifica where opcion = 'TLGM_FILE' "); 
	$rowaux = mysqli_fetch_assoc($sqlaux);
	$tlgm_filecmd = $rowaux["valor"];

	
$fechahoy = date("Y-m-d");
$fechahoymostrar = date("d/m/Y");

//Vamos a cargar todos los usuarios que tengan notificaciones mediante Telegram sobre los tickets abiertos

$arrayusuarios = array();

$cnssql= $mysqli->query("select DISTINCT(iduser) from ".$prefixsql."users_notifica where opcion = 'ACTIVOS' and telegram = '1' ");	
while($col = mysqli_fetch_array($cnssql))
{
	array_push ( $arrayusuarios , $col["iduser"] );
}

//Ahora ya tenemos el array de los usuarios

//Creamos un html temporal

$ficherohtmltemp = $lnxrutaficherostemp."usr/0/activos.html";

$file = fopen($ficherohtmltemp, "w");

    fwrite($file, '<html>'. PHP_EOL);
	fwrite($file, "<header>". PHP_EOL);
	fwrite($file, "<title>Listado de activos a caducar</title>". PHP_EOL);
	
	
	fwrite($file, "</header>". PHP_EOL);
	fwrite($file, '<meta charset="utf-8">'. PHP_EOL);
	fwrite($file, '<meta http-equiv="X-UA-Compatible" content="IE=edge">'. PHP_EOL);
	fwrite($file, '<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">'. PHP_EOL);

	fwrite($file, "<body>". PHP_EOL);
	fwrite($file, "<h2>Listado activos proximos a caducar</h2>". PHP_EOL);
	fwrite($file, "<h3>".$fechahoymostrar."</h3>". PHP_EOL);

	fwrite($file, '<table width="100%">'. PHP_EOL);
	fwrite($file, '<tr>'. PHP_EOL);
	fwrite($file, '   <th>Tercero</th>'. PHP_EOL);
	fwrite($file, '   <th>Activo</th>'. PHP_EOL);
	fwrite($file, '   <th>Caduca</th>'. PHP_EOL);
	fwrite($file, '</tr>'. PHP_EOL);

	$cnssql= $mysqli->query("SELECT * FROM ".$prefixsql."ita_activos WHERE avisar = '1' and faviso <= '".$fechahoy."' order by fcaducidad ASC ");	
	while($col = mysqli_fetch_array($cnssql))
	{
		fwrite($file, '<tr>'. PHP_EOL);
		fwrite($file, '   <th>'.$col["idtercero"].'</th>'. PHP_EOL);
		fwrite($file, '   <th>'.$col["nombre"].'</th>'. PHP_EOL);
		fwrite($file, '   <th>'.$col["fcaducidad"].'</th>'. PHP_EOL);
		fwrite($file, '</tr>'. PHP_EOL);
	}
	


	fwrite($file, '</table>'. PHP_EOL);
	fwrite($file, "</body>". PHP_EOL);
	fwrite($file, "</html>". PHP_EOL);

	fclose($file);
	
//Procedemos al envio con todos los usuarios que van a recibir los tickets


$cnssql= $mysqli->query("SELECT DISTINCT(iduser) FROM ".$prefixsql."users_notifica where opcion = 'ACTIVOS' and telegram = '1'");	
while($col = mysqli_fetch_array($cnssql))
{
	$idusuario = $col["iduser"];
	
	$sqlaux = $mysqli->query("select * from ".$prefixsql."users where id = '".$idusuario."' "); 
	$rowaux = mysqli_fetch_assoc($sqlaux);
	$tlgm_user_chatid = $rowaux["tlgm_groupid"];


	$textomensaje = 'Listado activos a caducar '.$fechahoymostrar;

	$tlgm_textcmd = str_replace("[[BOTID]]", $tlgm_botid, $tlgm_textcmd);
	$tlgm_textcmd = str_replace("[[CHATID]]", $tlgm_user_chatid, $tlgm_textcmd);
	$tlgm_textcmd = str_replace("[[CHATMSG]]", $textomensaje, $tlgm_textcmd);
	shell_exec($tlgm_textcmd);


	$tlgm_filecmd = str_replace("[[BOTID]]", $tlgm_botid, $tlgm_filecmd);
	$tlgm_filecmd = str_replace("[[CHATID]]", $tlgm_user_chatid, $tlgm_filecmd);
	$tlgm_filecmd = str_replace("[[CHATMSG]]", $textomensaje, $tlgm_filecmd);
	$tlgm_filecmd = str_replace("[[FILEPATH]]", $ficherohtmltemp, $tlgm_filecmd);

	shell_exec($tlgm_filecmd);
    
}


unlink($ficherohtmltemp);
}
?>
