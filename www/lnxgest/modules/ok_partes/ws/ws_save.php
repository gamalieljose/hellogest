<link rel="StyleSheet" href="../modules/partes/ws/movil.css" media="all" type="text/css">


<?php
//Chequeamos si los campos estan completados
$fhidtercero = $_POST["hidtercero"];
$flstserie = $_POST["lstserie"];
$flstcliente = $_POST["lstcliente"];
$ftxtemail = $_POST["txtemail"]; 		//obligatorio
$flsttecnico = $_POST["lsttecnico"];
$ftxtfecha = $_POST["txtfecha"];
$flstdocprint = $_POST["lstdocprint"]; //plantilla docprint

$fano = substr($ftxtfecha, 6, 4);  
$fmes = substr($ftxtfecha, 3, 2);  
$fdia = substr($ftxtfecha, 0, 2);  

$ctxtfecha = $fano.'-'.$fmes.'-'.$fdia;



$finhh = $_POST["inhh"];
$finmin = $_POST["inmin"];
$chorain = $finhh.":".$finmin;

$fouthh = $_POST["outhh"];
$foutmin = $_POST["outmin"];
$choraout = $fouthh.":".$foutmin;

$ftxttrabajo = $_POST["txttrabajo"];	//obligatorio
$ftxtmaterial = $_POST["txtmaterial"];
$ftxtfirma = $_POST["txtfirma"];		//obligatorio
$ftxtfirmanif = $_POST["txtfirmanif"];

$ftxtimporte = $_POST["txtimporte"];
$flstpagado = $_POST["lstpagado"];
$flstfinalizado = $_POST["lstfinalizado"];


$campoobligatorio = '0';
if($ftxtemail == ''){$campoobligatorio = $campoobligatorio +1;}
if($ftxttrabajo == ''){$campoobligatorio = $campoobligatorio +1;}
if($ftxtfirma == ''){$campoobligatorio = $campoobligatorio +1;}

if(strlen(trim($ftxtfecha)) <> 10){$campoobligatorio = $campoobligatorio +1;}

if($campoobligatorio > '0')
{
	$urlatras = "index.php?module=partes&section=new&idtercero=".$flstcliente."&obliga=on";
	header( "refresh:30;url=".$urlatras );
		echo '<div align="center">
		<table width="300" class="msgaviso">
		<tr><td class="maintitle">mensaje:</td></tr>
		<tr><td>Falta rellenar los campos obligatorios</td></tr>
		<tr><td align="center"><a class="btnedit" href="'.$urlatras.'">Aceptar</a></td></tr>
		</table></div>';
}
else
{
	
	//Como ha pasado los controles vamos a agregar el parte
	$ConsultaMySql= $mysqli->query("select * from ".$prefixsql."series where id = '".$flstserie."'");
	$row = mysqli_fetch_assoc($ConsultaMySql);
	$textoserie = $row["serie"];
	
	$ConsultaMySql= $mysqli->query("select max(codigoint) as contador from ".$prefixsql."partes where idserie = '".$flstserie."' ");
	$row = mysqli_fetch_assoc($ConsultaMySql);
	$valorid = $row["contador"];
	
	$numeroparte = $valorid +1; //con esto obtenermos el numero del parte que toca
	
	
	//insertamos el registro en la base de datos
	$ssql = "insert into ".$prefixsql."partes (idserie, codigoint, codigo, idtercero, idtecnico, fecha, horain, horaout, descripcion, material, importe, pagado, email, firmanombre, firmanif, finalizado, plantilla) values ('".$flstserie."', '".$numeroparte."', '".$textoserie."-".$numeroparte."', '".$fhidtercero."', '".$flsttecnico."', '".$ctxtfecha."', '".$chorain."', '".$choraout."', '".$ftxttrabajo."', '".$ftxtmaterial."', '".$ftxtimporte."', '".$flstpagado."', '".$ftxtemail."', '".$ftxtfirma."', '".$ftxtfirmanif."', '".$flstfinalizado."', '".$flstdocprint."')";
	$ConsultaMySql = $mysqli->query($ssql);

	$ConsultaMySql= $mysqli->query("select max(id) as contador from ".$prefixsql."partes");
	$row = mysqli_fetch_assoc($ConsultaMySql);
	$valoridparte = $row["contador"];
	
		
	$sqlusuario = $mysqli->query("select * from ".$prefixsql."users where id = '".$_COOKIE["lnxuserid"]."'");
	$row = mysqli_fetch_assoc($sqlusuario);
	$dbusername = $row["username"];

	//insertamos el registro de los datos en la base de datos, posteriomente incrustaremos el nombre del archivo
	


	$idbanco = $_GET["idbanco"];
	$ftxtbanco = $_POST["txtbanco"];
	$haccion = $_POST["haccion"];

	$urlatras = "index.php?module=partes";
	header( "refresh:200;url=".$urlatras );
		echo '<div align="center">
		<table width="300" class="msgaviso">
		<tr><td class="maintitle">mensaje:</td></tr>
		<tr><td>Cambios efectuados con éxito</td></tr>
		<tr><td align="center"><a class="btnedit" href="'.$urlatras.'">Aceptar</a></td></tr>
		</table></div>';

		
		
		
	//if ($haccion == 'new')

		$rutatemp = "../files/usr/".$dbusername."/";
		
		//$rutatemp = "/var/www/app/lnxgest/files/usr/pedro/";
		
		
		$im = $_POST['imagen'];

		$porciones = explode(",", $_POST['imagen']);
		$data = $porciones[1];
		$data = base64_decode($data);
		 
		$im = imagecreatefromstring($data);  //convertir a imagen		
			$ficherofirma = $rutatemp."firma.jpg";	//la imagen se genera en formato PNG pero le ponemos jpg para que funcione el FPDF	 
			imagejpeg($im, $ficherofirma); //guardar a disco
			imagedestroy($im); //liberar memoria
		
		//Hasta aqui hemos generado la firma
		//ahora hay que generar el parte en PDF y enviarlo por e-mail
		
		$rutadocprint = "../modules/partes/docprint/".$_POST["lstdocprint"];
		include($rutadocprint);
		
		

	$enviacorreo = "si";	
	

	if ($enviacorreo == "si")
	{	
		//--------------------INICIO ENVIO CORREO -----------------
		// /var/www/app/lnxgest/scripts/phpmailer
		require("../scripts/phpmailer/class.phpmailer.php");
		
		$mail = new PHPMailer();

		$mail->From     = ("erp@lnxgest.es"); //Dirección desde la que se enviarán los mensajes. Debe ser la misma de los datos de el servidor SMTP.
		$mail->FromName = "LNXGEST ERP"; 
		$mail->AddAddress($ftxtemail); // Dirección a la que llegaran los mensajes.
		$mail->AddBCC("lnxgest@gmail.com", "LNXGEST");
		
	// Aquí van los datos que apareceran en el correo que reciba
		$Nombre ="Nombre del tercero";
		$Correo = "lnxgest@gmail.com";
		$mensaje = "Esto es un mensaje automático. Por favor NO responder a este correo, su respuesta no será procesada";
		
		$mail->WordWrap = 50; 
		$mail->IsHTML(true);     
		$mail->Subject  =  $asuntoemail;
		$mail->Body     =  "Buenos dias \n<br />".
		"le adjuntamos parte de trabajo \n<br /> \n<br /> \n<br />".
		$Mensaje." \n<br />";
		$mail->AddAttachment($rutaficheropdf);
	// Datos del servidor SMTP

		$mail->IsSMTP(); 
		$mail->Host = "mail.lnxgest.es:587";  // Servidor de Salida.
		$mail->SMTPAuth = true; 
		$mail->Username = "erp@lnxgest.es";  // Correo Electrónico
		$mail->Password = "ocnmZhkr8425"; // Contraseña

		$mail->Send();
		
		
		
		//--------------------FIN ENVIO CORREO -----------------
	}	
		
		
	
		
	//Ahora movemos el archivo temporal y lo metemos en la ruta de ficheros
	
	$ficheroorigen = $rutaficheropdf;
	$rutadestino = $lnxrutaficheros."pdf/";
	
	//Ahora insertamos el archivo en la base de datos
	$ficheros_descripcion = $partetrabajo;
	
	$ssql = "insert into ".$prefixsql."ficheros (fichero, nombre, extension, descripcion, tipomime, sincroniza) values ('xxx', '".$partetrabajo.".pdf"."', 'pdf', '".$ficheros_descripcion."', 'application/pdf', '0')";
	$ConsultaMySql = $mysqli->query($ssql);
	
	$ConsultaMySql = $mysqli->query("select max(id) as contador from ".$prefixsql."ficheros");
	$rowaux = mysqli_fetch_assoc($ConsultaMySql);
	$ultimoid = $rowaux['contador'];
	
	$ficherito = $ultimoid.".pdf";
	
	$sqlfichero = $mysqli->query("update ".$prefixsql."ficheros set fichero = '".$ficherito."' where id = '".$ultimoid."'");
	
	$ConsultaMySql = $mysqli->query("insert into ".$prefixsql."ficheros_loc (idfichero, module, idlinea0, idlinea1, idlinea2, display, publico) values('".$ultimoid."', 'partes', '".$valoridparte."', '0', '0', '".$partetrabajo."', '0')");
	
	$ficherodestino = $rutadestino.$ficherito;
	
	rename($ficheroorigen, $ficherodestino);
	
	
}



?>