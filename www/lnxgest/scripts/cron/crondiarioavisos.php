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

$dirphpmailer = $nuevodirectorio."scripts/phpmailer/class.phpmailer.php";
require($dirphpmailer);





$fechahoy = date("Y-m-d");

echo '<h2>Script aviso activos que van a caducar</h2>';

echo '<h2>Tickets abiertos</h2>';
echo '<p>Dir:'.$dircfpc.'</p>';

$fechahoy = date("Y-m-d");

$cnssql= $mysqli->query("select * from ".$prefixsql."users where aviso_activos = '1' or aviso_tickets = '1'");	
while($col = mysqli_fetch_array($cnssql))
{
	$dbaviso_activos = $col["aviso_activos"];
	$dbaviso_tickets = $col["aviso_tickets"];
	$email_tecnico = $col["email"];
    echo '<p>'.$col["username"].' - '.$email_tecnico.'</p>';


	$cnssql_activos = "SELECT * FROM ".$prefixsql."ita_activos where faviso <= '".$fechahoy."' and avisar = '1' order by fcaducidad asc";
	$ConsultaMySql = $mysqli->query($cnssql_activos);

	$contadoractivos = $ConsultaMySql->num_rows;

	$mensaje = " ";

	if($contadoractivos > 0 && $dbaviso_activos == "1")
	{
		$mensaje .= '<h2>Activos próximos a caducar</h2>';
		$mensaje .= '<table width="100%">';
		$mensaje .= '<tr bgcolor="#b3b3b3"><td>Tercero</td><td>Producto</td><td>Caduca</td></tr>';

		while($colb = mysqli_fetch_array($ConsultaMySql))
		{
			$buscatercero = $mysqli->query("SELECT * FROM ".$prefixsql."terceros where id = '".$colb["idtercero"]."'");
			$row = mysqli_fetch_assoc($buscatercero);
				
			$dbrazonsocial = $row["razonsocial"];
			
			if ($color == '1')
			{
				$color = '0';
				$colorlinea = '#E0F2F7';
			}
			else
			{
				$color = '1';
				$colorlinea = '#ffffff';
			}
			
			$mensaje .= '<tr bgcolor="'.$colorlinea.'"><td>'.$dbrazonsocial.'</td><td>'.$colb["nombre"].'</td><td>'.$colb["fcaducidad"].'</td></tr>';
			
			
		}
		
		$mensaje .= '</table><p>&nbsp;</p>';
	}



	$cnssql_tickets = "SELECT * FROM ".$prefixsql."it_tickets where idestado > '0' ";
	$ConsultaMySql_tickets = $mysqli->query($cnssql_tickets);

	$contadortickets = $ConsultaMySql_tickets->num_rows;

	if($contadortickets > 0 && $dbaviso_tickets == "1")
	{
		$mensaje .= '<h2>Tickets abiertos</h2>';
		$mensaje .= '<table width="100%">';
		$mensaje .= '<tr bgcolor="#b3b3b3"><td>Ticket</td><td>Resumen</td><td>Estado</td><td>Tercero</td><td>Asignado</td><td>Creado</td></tr>';
		
		while($colc = mysqli_fetch_array($ConsultaMySql_tickets))
		{
			$buscatercero = $mysqli->query("SELECT * FROM ".$prefixsql."terceros where id = '".$colc["idtercero"]."'");
			$row = mysqli_fetch_assoc($buscatercero);
				
			$dbrazonsocial = $row["razonsocial"];
			
			$cnsaux = $mysqli->query("SELECT * FROM ".$prefixsql."users where id = '".$colc["idasignado"]."'");
			$rowaux = mysqli_fetch_assoc($cnsaux);
			$lbl_asignado = $rowaux["display"];
			
			
			
	//		1 --> Abierto
	//		2 --> En proceso
	//		3 --> Pendiente de terceros
	//		4 --> Solucionado
	
			if ($colc["idestado"] == "1"){$lbl_estado = 'Abierto';}
			if ($colc["idestado"] == "2"){$lbl_estado = 'En proceso';}
			if ($colc["idestado"] == "3"){$lbl_estado = 'Pendiente de terceros';}
			if ($colc["idestado"] == "4"){$lbl_estado = 'Solucionado';}
			
			
			if ($color == '1')
			{
				$color = '0';
				$colorlinea = '#E0F2F7';
			}
			else
			{
				$color = '1';
				$colorlinea = '#ffffff';
			}
		
			$mensaje .= '<tr bgcolor="'.$colorlinea.'"><td>'.$colc["id"].'</td><td>'.$colc["resumen"].'</td><td>'.$lbl_estado.'</td><td>'.$dbrazonsocial.'</td><td>'.$lbl_asignado.'</td><td>'.$col["fcreacion"].'</td></tr>';
			
			
			
		}

		$mensaje .= '</table><p>&nbsp;</p>';

	}




	if($contadoractivos > 0 || $contadortickets > 0)
	{	
//		$dirphpmailer = $nuevodirectorio."scripts/phpmailer/class.phpmailer.php";

		
		$email_smtpserver = "SERVIDOR_SMTP";
		$email_smtpserver_port = "587";
		$email_user = "EMAIL@REMITENTE.COM";
		$email_password = "PASSWORDEMAIL";
		$email_correoorigen = "EMAIL@REMITENTE.COM";
		$email_display = "LNXGEST ERP";
		$ftxtemailenviar = $email_tecnico;

//		require($dirphpmailer);
		
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
		$mail->Port = $email_smtpserver_port;                                   

		$mail->From = $email_correoorigen;
		$mail->FromName = $email_display;

		$mail->addAddress($ftxtemailenviar);


		$mail->isHTML(true);

		$mail->Subject = "Lista de actividades pendientes";
		$mail->Body = $mensaje;
		$mail->AltBody = "Lista de actividades pendientes";

		$mail->send();
		
		

	}
	
	$mensaje = ""; //con sto borramos el mensaje

}


?>
