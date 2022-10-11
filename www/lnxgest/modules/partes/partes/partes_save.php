<?php
$fhaccion = $_POST["haccion"];
$fhidparte = $_POST["hidparte"];
$fchknewticket = $_POST["chknewticket"];

$ftxtticket = $_POST["txtticket"];
	if($ftxtticket == ""){$ftxtticket = "0";}
$flstserie = $_POST["lstserie"];
$flsttecnico = $_POST["lsttecnico"];
$flsttercero = $_POST["lsttercero"];
$ftxtfecha = $_POST["txtfecha"];
	$finhh = $_POST["inhh"];
	$finmin = $_POST["inmin"];
	
	$fouthh = $_POST["outhh"];
	$foutmin = $_POST["outmin"];
$ftxtintervencion = addslashes($_POST["txtintervencion"]);

$xfecha = explode("/", $ftxtfecha);
    $fano = $xfecha[2];
    $fmes = $xfecha[1];
    $fdia = $xfecha[0];

    $xfechain = $fano.'-'.$fmes.'-'.$fdia.' '.$finhh.':'.$finmin.':00';
	$xfechaout = $fano.'-'.$fmes.'-'.$fdia.' '.$fouthh.':'.$foutmin.':00';
$ftxtemailenviar = $_POST["txtemailenviar"];
$flstemail = $_POST["lstemail"];
$ftxtfirmanombre = $_POST["txtfirmanombre"];
if($fhaccion == "firmalocal" || $fhaccion == "firmaremoto")
{
//Obtenemos los datos de la cuenta de correo indicada en el formulario
	$sqlemail = $mysqli->query("select * from ".$prefixsql."users_correo where id = '".$flstemail."'");
	$rowemail = mysqli_fetch_assoc($sqlemail);
	$email_display = $rowemail["display"];
	$email_user = $rowemail["usuario"];
	$email_password = $rowemail["password"];
	$email_smtpserver = $rowemail["smtpserver"];
	$email_correoorigen = $rowemail["email"];

}


if ($fhaccion == "new")
{

	$sqlaux = $mysqli->query("select * from ".$prefixsql."series where id = '".$flstserie."' "); 
	$rowaux = mysqli_fetch_assoc($sqlaux);
	$lblserie = $rowaux["serie"];
	
	$sqlaux = $mysqli->query("select max(id) as contador from ".$prefixsql."partes where idserie = '".$flstserie."' "); 
	$rowaux = mysqli_fetch_assoc($sqlaux);
	$dbcontador = $rowaux["contador"];
	
	
	
	$xcodigo = "(PROV ".$dbcontador.")";
	
	$sqlparte = $mysqli->query("insert into ".$prefixsql."partes (idticket, idserie, codigo, codigoint, iduser, idtercero, fechain, fechaout, descripcion, nomfirma, mailfirma, remoto) VALUES ('".$ftxtticket."', '".$flstserie."', '".$xcodigo."', '0', '".$flsttecnico."', '".$flsttercero."', '".$xfechain."', '".$xfechaout."', '".$ftxtintervencion."', '', '', '')");
	
	$sqlaux = $mysqli->query("select max(id) as contador from ".$prefixsql."partes "); 
	$rowaux = mysqli_fetch_assoc($sqlaux);
	$ultimoid = $rowaux["contador"];
	
	
	if($fchknewticket == "1")
	{
		$tk_resumen =  substr($_POST["txtintervencion"], 0, 45);
		$tk_resumen = addslashes($tk_resumen);
		$tk_problema = $ftxtintervencion;
		$tk_idtercero = $flsttercero;
		$sqlparte = $mysqli->query("insert into ".$prefixsql."it_tickets (resumen, idasignado, problema, fcreacion, fmodificacion, idtercero, idestado) values ('".$tk_resumen."', '".$flsttecnico."', '".$tk_problema."', '".$xfechain."', '".$xfechain."', '".$flsttercero."', '1')");
	
		$sqlaux = $mysqli->query("select max(id) as contador from ".$prefixsql."it_tickets "); 
		$rowaux = mysqli_fetch_assoc($sqlaux);
		$ultimoidticket = $rowaux["contador"];
		
		$sqlparte = $mysqli->query("update ".$prefixsql."partes set idticket = '".$ultimoidticket."' where id = '".$ultimoid."' ");
	}
	
	
	$url_atras = "index.php?module=partes&section=partes&action=editactions&id=".$ultimoid;
}
if ($fhaccion == 'update')
{
		
	$sqlparte= $mysqli->query("update ".$prefixsql."partes set idticket = '".$ftxtticket."', idserie = '".$flstserie."', iduser = '".$flsttecnico."', idtercero = '".$flsttercero."', fechain = '".$xfechain."', fechaout = '".$xfechaout."', descripcion = '".$ftxtintervencion."' where id = '".$fhidparte."'");
	$url_atras = "index.php?module=partes&section=partes&action=editactions&id=".$fhidparte;
}
if ($fhaccion == 'delete')
{
	//$sqltercero= $mysqli->query("delete from ".$prefixsql."bancos where id = '".$idbanco."'");
}

if($fhaccion == "firmalocal")
{
	//Como se ha firmado, validamos el parte de trabajo
	
	$sqlaux = $mysqli->query("select * from ".$prefixsql."partes where id = '".$fhidparte."' "); 
	$rowaux = mysqli_fetch_assoc($sqlaux);
	$dbidserie = $rowaux["idserie"];
	$db_codigoint = $rowaux["codigoint"];
	$db_codigo = $rowaux["codigo"];
	if($db_codigoint == 0)
	{
		$sqlaux = $mysqli->query("select * from ".$prefixsql."series where id = '".$dbidserie."' "); 
		$rowaux = mysqli_fetch_assoc($sqlaux);
		$lblserie = $rowaux["serie"];
		
		$sqlaux = $mysqli->query("select max(codigoint) as contador from ".$prefixsql."partes where idserie = '".$dbidserie."' "); 
		$rowaux = mysqli_fetch_assoc($sqlaux);
		$dbcontador = $rowaux["contador"] + 1;
		
		$lbl_parte = $lblserie."/".$dbcontador;
		$sqlparte= $mysqli->query("update ".$prefixsql."partes set codigoint = '".$dbcontador."', codigo = '".$lbl_parte."' where id = '".$fhidparte."'");
	}
	else
	{
		$lbl_parte = $db_codigo;
	}
	
	$sqlparte= $mysqli->query("update ".$prefixsql."partes set nomfirma = '".$ftxtfirmanombre."', mailfirma = '".$ftxtemailenviar."' where id = '".$fhidparte."'");
	
	
	$sqlparte = $mysqli->query("select * from ".$prefixsql."docprint where id = '".$_POST["lstdocprint"]."'");
	$row = mysqli_fetch_assoc($sqlparte);
	$docprint_idfile = $row["idfileprocesador"];
	
	$sqlparte = $mysqli->query("select * from ".$prefixsql."ficheros where id = '".$docprint_idfile."'");
	$row = mysqli_fetch_assoc($sqlparte);
	$docprint_fichero = $lnxrutaficheros.$row["extension"]."/".$row["fichero"];
	
	echo '<p>Docprint: '.$docprint_fichero.'</p>';

//llamamos al docprint para hacer el parte	
	include($docprint_fichero);
			
	//Una vez generado el archivo de impresión, este lo enviamos por correo mediante sendmail
	
	$sqlparte = $mysqli->query("select * from ".$prefixsql."users where id = '".$_COOKIE["lnxuserid"]."'");
	$row = mysqli_fetch_assoc($sqlparte);
	$nombreusuario = $row["username"];
	
	$ficheropdf = $lnxrutaficherostemp."usr/".$nombreusuario."/parte.pdf";
	
// Envio de correo con PHPMAILER

require("scripts/phpmailer/class.phpmailer.php");

$mail = new PHPMailer;

//Enable SMTP debugging. 
$mail->SMTPDebug = 3;                               
//Set PHPMailer to use SMTP.
$mail->isSMTP();            
//Set SMTP host name                          
$mail->Host = $email_smtpserver;
//Set this to true if SMTP host requires authentication to send email
$mail->SMTPAuth = true;                          
//Provide username and password     
$mail->Username = $email_user;
$mail->Password = $email_password;
//If SMTP requires TLS encryption then set it
$mail->SMTPSecure = "tls";                           
//Set TCP port to connect to 
$mail->Port = 587;                                   

$mail->From = $email_correoorigen;
$mail->FromName = $email_display;

$mail->addAddress($ftxtemailenviar);
$mail->addAttachment($ficheropdf); 

$mail->isHTML(true);

$mail->Subject = "Parte de trabajo ".$lbl_parte;
$mail->Body = "<p>Adjuntamos parte detrabajo <b>".$lbl_parte."</b></p>";
$mail->AltBody = "Adjuntamos parte detrabajo ".$lbl_parte." ";

$mail->send();



//FIN envio de correo con PHPMAILER	
	
	//Ahora subimos el archivo a la base de datos
	
	$sqlparte = $mysqli->query("insert into ".$prefixsql."ficheros (fichero, nombre, extension, descripcion, tipomime, sincroniza) values('', 'parte".$fhidparte.".pdf', 'pdf', '".$lbl_parte."', 'application/pdf', '0')");	

			$sqlaux = $mysqli->query("select max(id) as contador from ".$prefixsql."ficheros"); 
			$rowaux = mysqli_fetch_assoc($sqlaux);
			$ultimoid = $rowaux["contador"];
			
			$nombrefichero = $ultimoid.".pdf";
			
			$sqlparte = $mysqli->query("update ".$prefixsql."ficheros set fichero = '".$nombrefichero."' where id = '".$ultimoid."'");	

			$sqlparte = $mysqli->query("insert into ".$prefixsql."ficheros_loc (idfichero, module, idlinea0, idlinea1, idlinea2, display, publico) values('".$ultimoid."', 'partes', '".$fhidparte."', '0', '0', '".$lbl_parte."', '0')");	

			//movemos el archivo
			
			$dbdestinopdf = $lnxrutaficheros."pdf/".$nombrefichero;
			
			rename($ficheropdf, $dbdestinopdf);


	$url_atras = "index.php?module=partes";
	
}














if($fhaccion == "firmaremoto")
{
//Validamos el parte 

$sqlaux = $mysqli->query("select * from ".$prefixsql."partes where id = '".$fhidparte."' ");
$rowaux = mysqli_fetch_assoc($sqlaux);
$dbidserie = $rowaux["idserie"];
$db_codigoint = $rowaux["codigoint"];
$db_codigo = $rowaux["codigo"];
$db_idtercero = $rowaux["idtercero"];
$db_iduser = $rowaux["iduser"];
$db_fechain = $rowaux["fechain"];
$db_fechaout = $rowaux["fechaout"];
$db_descripcion = $rowaux["descripcion"];

$xfechain = explode(" ", $db_fechain);
	$lbl_fecha = $xfechain[0];
	$xhora = explode(":", $xfechain[1]);
	$lbl_horain = $xhora[0].":".$xhora[1];

$xfechaout = explode(" ", $db_fechaout);
	$xhora = explode(":", $xfechaout[1]);
	$lbl_horaout = $xhora[0].":".$xhora[1];
	
$sqlaux = $mysqli->query("select * from ".$prefixsql."terceros where id = '".$db_idtercero."' ");
$rowaux = mysqli_fetch_assoc($sqlaux);
$lbl_tercero = $rowaux["razonsocial"];

$sqlaux = $mysqli->query("select * from ".$prefixsql."users where id = '".$db_iduser."' ");
$rowaux = mysqli_fetch_assoc($sqlaux);
$lbl_tecnico = $rowaux["display"];


    if($db_codigoint == 0)
	{
		$sqlaux = $mysqli->query("select * from ".$prefixsql."series where id = '".$dbidserie."' ");
		$rowaux = mysqli_fetch_assoc($sqlaux);
		$lblserie = $rowaux["serie"];

		$sqlaux = $mysqli->query("select max(codigoint) as contador from ".$prefixsql."partes where idserie = '".$dbidserie."' ");
		$rowaux = mysqli_fetch_assoc($sqlaux);
		$dbcontador = $rowaux["contador"] + 1;

		$lbl_parte = $lblserie."/".$dbcontador;
		$sqlparte= $mysqli->query("update ".$prefixsql."partes set codigoint = '".$dbcontador."', codigo = '".$lbl_parte."' where id = '".$fhidparte."'");

	}
	else
	{
		$lbl_parte = $db_codigo;
	}


	function generarCodigo($longitud) {
	 $key = '';
	 $pattern = '1234567890abcdefghijklmnopqrstuvwxyz';
	 $max = strlen($pattern)-1;
	 for($i=0;$i < $longitud;$i++) $key .= $pattern{mt_rand(0,$max)};
	 return $key;
	}
	
	$sqlpartexml = $mysqli->query("select * from ".$prefixsql."users where id = '".$_COOKIE["lnxuserid"]."'");
	$row = mysqli_fetch_assoc($sqlpartexml);
	$nombreusuario = $row["username"];
	
	$ficherito = generarCodigo(15); // genera el codigo del XML.
	
	$ficheroxml = $lnxrutaficherostemp."usr/".$nombreusuario."/".$ficherito.".xml";
//-----------GENERACION FICHERO XML -----------
$fiddocprint = $_POST["lstdocprint"]; //el archivo de procesamiento se ha de llamar id.php para que cuadre con el procesador de impresion


	$file = fopen($ficheroxml, "w");

	fwrite($file, '<?xml version="1.0" encoding="UTF-8"?>'. PHP_EOL);
	fwrite($file, "<lnxgest>". PHP_EOL);
	fwrite($file, "<parte>". PHP_EOL);
	fwrite($file, "   <id>".$fhidparte."</id>". PHP_EOL);
	fwrite($file, "   <codigo>".$lbl_parte."</codigo>". PHP_EOL);
	fwrite($file, "   <docprint>".$fiddocprint.".php</docprint>". PHP_EOL);
	fwrite($file, "   <tecnico>".$lbl_tecnico."</tecnico>". PHP_EOL);
	fwrite($file, "   <tercero>".$lbl_tercero."</tercero>". PHP_EOL);
	fwrite($file, "   <fecha>".$lbl_fecha."</fecha>". PHP_EOL);
	fwrite($file, "   <horain>".$lbl_horain."</horain>". PHP_EOL);
	fwrite($file, "   <horaout>".$lbl_horaout."</horaout>". PHP_EOL);
	fwrite($file, "   <intervencion>".$db_descripcion."</intervencion>". PHP_EOL);

fwrite($file, "   <emailtecnico>".$email_correoorigen."</emailtecnico>". PHP_EOL);
fwrite($file, "   <emailtercero>".$ftxtemailenviar."</emailtercero>". PHP_EOL);
	fwrite($file, "</parte>". PHP_EOL);
	fwrite($file, "</lnxgest>". PHP_EOL);
	fclose($file);	
//-----------fin GENERACION FICHERO XML -----------

$sqlparte= $mysqli->query("update ".$prefixsql."partes set remoto = '".$ficherito."' where id = '".$fhidparte."'");

//-----------SUBIR ARCHIVO POR FTP --------------

$sqlftp = $mysqli->query("select * from ".$prefixsql."partes_config where idserie = '".$dbidserie."'");
$rowftp = mysqli_fetch_assoc($sqlftp);
$ftp_server = $rowftp["ftpserver"];
$ftp_user_name = $rowftp["ftpusername"];
$ftp_user_pass = $rowftp["ftppassword"];
$destination_file = $rowftp["ftpsyncin"].$ficherito.".xml";
$ftp_enlace = $rowftp["url"];
$source_file = $ficheroxml;



$enlacepublico = str_replace("[[XMLFILE]]", $ficherito, $ftp_enlace);

$connftp_id = ftp_connect($ftp_server);
$login_result = ftp_login($connftp_id, $ftp_user_name, $ftp_user_pass);
$upload = ftp_put($connftp_id, $destination_file, $source_file, FTP_BINARY);
ftp_close($connftp_id);




//-----------FIN SUBIR ARCHIVO FTP ----------

require("scripts/phpmailer/class.phpmailer.php");

//Obtenemos los datos de la cuenta de correo indicada en el formulario


$mail = new PHPMailer;

//Enable SMTP debugging. 
$mail->SMTPDebug = 3;                               
//Set PHPMailer to use SMTP.
$mail->isSMTP();            
//Set SMTP host name                          
$mail->Host = $email_smtpserver;
//Set this to true if SMTP host requires authentication to send email
$mail->SMTPAuth = true;                          
//Provide username and password     
$mail->Username = $email_user;                 
$mail->Password = $email_password;                           
//If SMTP requires TLS encryption then set it
$mail->SMTPSecure = "tls";                           
//Set TCP port to connect to 
$mail->Port = 587;                                   

$mail->From = $email_correoorigen;
$mail->FromName = $email_display;

$mail->addAddress($ftxtemailenviar);

$mail->isHTML(true);

$mail->Subject = "Firme el parte de trabajo ".$lbl_parte;
$mail->Body = '<p>Para firma el parte de trabajo <b>'.$lbl_parte.'</b> por favor haga clic en el siguiente enlace</p>
<p><a href="'.$enlacepublico.'">FIRMAR PARTE</a></p>
<p>El código de parte es: '.$ficherito.'</p>';


$mail->send();

	$url_atras = "index.php?module=partes";
}


if($fhaccion == "borrarremoto")
{
	$sqlparte = $mysqli->query("select * from ".$prefixsql."partes where id = '".$fhidparte."'");
	$rowparte = mysqli_fetch_assoc($sqlparte);
	$dbidserie = $rowparte["idserie"];
	$dbremoto = $rowparte["remoto"]; //nombre del xml
	
	
	$sqlftp = $mysqli->query("select * from ".$prefixsql."partes_config where idserie = '".$dbidserie."'");
	$rowftp = mysqli_fetch_assoc($sqlftp);
	$ftp_server = $rowftp["ftpserver"];
	$ftp_user_name = $rowftp["ftpusername"];
	$ftp_user_pass = $rowftp["ftppassword"];
	$destination_file = $rowftp["ftpsyncin"].$dbremoto.".xml";
	
	
	$connftp_id = ftp_connect($ftp_server);
	$login_result = ftp_login($connftp_id, $ftp_user_name, $ftp_user_pass);
	ftp_delete($connftp_id, $destination_file);
	ftp_close($connftp_id);
	
	$sqlparte= $mysqli->query("update ".$prefixsql."partes set remoto = '' where id = '".$fhidparte."'");
	
	$url_atras = "index.php?module=partes";
}




header( "Location: ".$url_atras );

?>
