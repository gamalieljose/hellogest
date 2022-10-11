<?php
$fhaccion = $_POST["haccion"];
$fhidregistro = $_POST["hidregistro"];
$flsttercero = $_POST["lsttercero"];
$flstcontacto = $_POST["lstcontacto"];
$flstasignado = $_POST["lstasignado"];
$ftxttel1 = addslashes($_POST["txttel1"]);
$ftxttel2 = addslashes($_POST["txttel2"]);
$flstestado = $_POST["lstestado"];
$flstprioridad = $_POST["lstprioridad"];
$ftxtnota = addslashes($_POST["txtnota"]);


if($fhaccion == "new")
{
	$fechacreado = date("Y-m-d H:i:s");
	
	$sqlaux = $mysqli->query("insert into ".$prefixsql."crm_phonecalls (fecha, idcreado, idasignado, idtercero, idcontacto, nota, telefono, telefono2, idestado, idprioridad) values ('".$fechacreado."', '".$_COOKIE["lnxuserid"]."', '".$flstasignado."', '".$flsttercero."', '".$flstcontacto."', '".$ftxtnota."', '".$ftxttel1."', '".$ftxttel2."', '".$flstestado."', '".$flstprioridad."')"); 
}
if($fhaccion == "update")
{	
	$sqlaux = $mysqli->query("update ".$prefixsql."crm_phonecalls set idasignado = '".$flstasignado."', idtercero = '".$flsttercero."', idcontacto = '".$flstcontacto."', nota = '".$ftxtnota."', telefono = '".$ftxttel1."', telefono2 = '".$ftxttel2."', idestado = '".$flstestado."', idprioridad = '".$flstprioridad."' where id = '".$fhidregistro."'");
}

if($fhaccion == "delete")
{	
	$sqlaux = $mysqli->query("delete from ".$prefixsql."crm_phonecalls where id = '".$fhidregistro."'");
}


if($fhaccion == "new")
{
	//Solo lo tenemos que hacer con los nuevos registros de llamadas
	$sqlaux = $mysqli->query("select * from ".$prefixsql."users_notifica where iduser = '".$flstasignado."' and opcion = 'LLAMADA'"); 
	$rowaux = mysqli_fetch_assoc($sqlaux);
	$dbavisarportlgm = $rowaux["telegram"];

	$sqlaux = $mysqli->query("select * from ".$prefixsql."notifica where opcion = 'TLGM_ACTIV'"); 
	$rowaux = mysqli_fetch_assoc($sqlaux);
	$dbtlgmactivo = $rowaux["valor"];

	$sqlaux = $mysqli->query("select * from ".$prefixsql."users where id = '".$flstasignado."'"); 
	$rowaux = mysqli_fetch_assoc($sqlaux);
	$tlgm_user_chatid = $rowaux["tlgm_groupid"]; //grupo telegram del usuario

	if($dbavisarportlgm == '1' && $dbtlgmactivo == '1')
	{
		//El usuario pide que se envie por telegram y la configuración de telegram esta activa

		//Cargamos las variables para usar con telegram
		$sqlaux = $mysqli->query("select * from ".$prefixsql."notifica where opcion = 'TLGM_BOTID' "); 
		$rowaux = mysqli_fetch_assoc($sqlaux);
		$tlgm_botid = $rowaux["valor"];

		$sqlaux = $mysqli->query("select * from ".$prefixsql."notifica where opcion = 'TLGM_TEXT' "); 
		$rowaux = mysqli_fetch_assoc($sqlaux);
		$tpl_tlgm_textcmd = $rowaux["valor"];
		$tlgm_textcmd = $tpl_tlgm_textcmd;

		$sqlaux = $mysqli->query("select * from ".$prefixsql."notifica where opcion = 'TLGM_FILE' "); 
		$rowaux = mysqli_fetch_assoc($sqlaux);
		$tpl_tlgm_filecmd = $rowaux["valor"];
		$tlgm_filecmd = $tpl_tlgm_filecmd;

		$sqlterceros = $mysqli->query("select * from ".$prefixsql."terceros where id = '".$flsttercero."' "); 
		$rowtercero = mysqli_fetch_assoc($sqlterceros);
		$dbt_razonsocial = $rowtercero["razonsocial"];

		$sqlaux = $mysqli->query("select * from ".$prefixsql."terceroscontactos where id = '".$flstcontacto."' "); 
		$rowaux = mysqli_fetch_assoc($sqlaux);
		$lbl_nombrecontacto = $rowaux["nombre"];
	
		$fechahoymostrar = date("d/m/Y");

		$ficherohtmltemp = $lnxrutaficherostemp."usr/".$flstasignado."/mensaje.html";

		$file = fopen($ficherohtmltemp, "w");

		fwrite($file, '<html>'. PHP_EOL);
		fwrite($file, "<header>". PHP_EOL);
		fwrite($file, "<title>Nueva llamada telefonica</title>". PHP_EOL);
		
		
		fwrite($file, "</header>". PHP_EOL);
		fwrite($file, '<meta charset="utf-8">'. PHP_EOL);
		fwrite($file, '<meta http-equiv="X-UA-Compatible" content="IE=edge">'. PHP_EOL);
		fwrite($file, '<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">'. PHP_EOL);
		fwrite($file, '<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">'. PHP_EOL);
		fwrite($file, "<body>". PHP_EOL);
		fwrite($file, "<h3>".$fechahoymostrar." Nueva llamada</h3>". PHP_EOL);

		fwrite($file, '<div class="row">'. PHP_EOL);
		fwrite($file, '<div class="col-sm-2"><b>Tercero</b></div>'. PHP_EOL);
		fwrite($file, '<div class="col">'.$dbt_razonsocial.'</div>'. PHP_EOL);
		fwrite($file, '</div>'. PHP_EOL);

		fwrite($file, '<div class="row">'. PHP_EOL);
		fwrite($file, '<div class="col-sm-2"><b>Contacto</b></div>'. PHP_EOL);
		fwrite($file, '<div class="col">'.$lbl_nombrecontacto.'</div>'. PHP_EOL);
		fwrite($file, '</div>'. PHP_EOL);

		fwrite($file, '<div class="row">'. PHP_EOL);
		fwrite($file, '<div class="col-sm-2"><b>Mensaje</b></div>'. PHP_EOL);
		fwrite($file, '<div class="col">'.$_POST["txtnota"].'</div>'. PHP_EOL);
		fwrite($file, '</div>'. PHP_EOL);

		fwrite($file, '<div class="row">'. PHP_EOL);
		fwrite($file, '<div class="col-sm-2"><b>Telefono(s)</b></div>'. PHP_EOL);
		fwrite($file, '<div class="col"><a href="tel:'.$ftxttel1.'">'.$ftxttel1.'</a> - <a href="tel:'.$ftxttel2.'">'.$ftxttel2.'</a> </div>'. PHP_EOL);
		fwrite($file, '</div>'. PHP_EOL);


		$cnssql = $mysqli->query("select * from ".$prefixsql."crm_phonecalls where idasignado = '".$flstasignado."' and idestado > '0' order by fecha desc");
		$existenllamadas = $cnssql->num_rows;

		if($existenllamadas > 0)
		{
			$color = 1;

			fwrite($file, '<h3>Llamadas pendientes</h3>'. PHP_EOL);

			fwrite($file, '<div style="display: block; overflow-x: auto;">'. PHP_EOL);

			fwrite($file, '<table width="100%">'. PHP_EOL);
			fwrite($file, '<tr style="background: #D8D8D8; font-weight:bold;"><th width="180">Fecha</th><th>Tercero</th></tr>'. PHP_EOL);
			while($col = mysqli_fetch_array($cnssql))
			{
				$sqlaux = $mysqli->query("select id, razonsocial from ".$prefixsql."terceros where id = '".$col["idtercero"]."' "); 
				$rowaux = mysqli_fetch_assoc($sqlaux);
				$lbl_razonsocial = $rowaux["razonsocial"];

				if($color == '1')
				{
					$rowcolor = 'background-color: #FFFFFF';
					$color = '2';
				}
				else 
				{
					$rowcolor = 'background-color: #E0F2F7';
					$color = '1';
				}


				fwrite($file, '<tr style="'.$rowcolor.'"><td>'.$col["fecha"].'</td><td>'.$lbl_razonsocial.'</td></tr>'. PHP_EOL);
				
			}
			fwrite($file, '</table>'. PHP_EOL);
			fwrite($file, '</div>'. PHP_EOL);
		}


		fwrite($file, "</body>". PHP_EOL);
		fwrite($file, "</html>");


		$textomensaje = 'Tiene una llamada de: '.$dbt_razonsocial;

		$tlgm_textcmd = str_replace("[[BOTID]]", $tlgm_botid, $tlgm_textcmd);
		$tlgm_textcmd = str_replace("[[CHATID]]", $tlgm_user_chatid, $tlgm_textcmd);
		$tlgm_textcmd = str_replace("[[CHATMSG]]", $textomensaje, $tlgm_textcmd);
		shell_exec($tlgm_textcmd);

		$tlgm_filecmd = $tpl_tlgm_filecmd;

		$tlgm_filecmd = str_replace("[[BOTID]]", $tlgm_botid, $tlgm_filecmd);
		$tlgm_filecmd = str_replace("[[CHATID]]", $tlgm_user_chatid, $tlgm_filecmd);
		$tlgm_filecmd = str_replace("[[CHATMSG]]", $textomensaje, $tlgm_filecmd);
		$tlgm_filecmd = str_replace("[[FILEPATH]]", $ficherohtmltemp, $tlgm_filecmd);

		shell_exec($tlgm_filecmd);
		
		
		

	}

}
header("location: index.php?module=crm&section=phonecalls");


?>