<?php
if($_POST["hprocesar"] == "YES")
{

header( "refresh:5;url=index.php?module=partes" );
	echo '<div align="center">
	<table width="300" class="msgaviso">
	<tr><td class="maintitle">mensaje:</td></tr>
	<tr><td align="center">Procesando....<img src="img/loading.gif" /></br></br></td></tr>
	<tr><td align="center"><a class="btnedit" href="index.php?module=partes">Aceptar</a></td></tr>
	</table></div>';
	


//Ontenemos la ruta de descarga temporal del usuario

$sqlfiletemp = $mysqli->query("select * from ".$prefixsql."users where id = '".$_COOKIE["lnxuserid"]."'");
$row = mysqli_fetch_assoc($sqlfiletemp);
$nombreusuario = $row["username"];


$dirtemporal = $lnxrutaficherostemp."usr/".$nombreusuario."/";



	$cnssql= $mysqli->query("select * from ".$prefixsql."partes where remoto <> ''");
	while($col = mysqli_fetch_array($cnssql))
	{
		$ficherocheck = 0;

		$idparte = $col["id"];
		$idserie = $col["idserie"];
		$fichero_xml = $col["remoto"].".xml";
		$fichero_pdf = $col["remoto"].".pdf";

		//obtenemos los datos de acceso FTP
		$sqlaux = $mysqli->query("select * from ".$prefixsql."partes_config where idserie = '".$idserie."' ");
		$rowaux = mysqli_fetch_assoc($sqlaux);
		$ftp_server = $rowaux["ftpserver"];
		$ftp_sync_in = $rowaux["ftpsyncin"]; //Ruta de envio de documentos
		$ftp_sync_out = $rowaux["ftpsyncout"]; //ruta de descarga de documentos
		$ftp_user_name = $rowaux["ftpusername"];
		$ftp_user_pass = $rowaux["ftppassword"];


		//Comprobar si el fichero XML y PDF existen en la carpeta de salida 

		$ftp_origen_xml = $ftp_sync_out.$fichero_xml;
		$ftp_origen_pdf = $ftp_sync_out.$fichero_pdf;
		
		$ftp_connection = ftp_connect($ftp_server);
		$login_result = ftp_login($ftp_connection, $ftp_user_name, $ftp_user_pass);
		$ficherocheck = ftp_size($ftp_connection, $ftp_origen_xml);
		ftp_close($ftp_connection);

		


		$local_destino_xml = $dirtemporal.$fichero_xml;
		$local_destino_pdf = $dirtemporal.$fichero_pdf;

echo '<p>'.$fichero_xml.' - '.$ficherocheck,' - '.$dirtemporal.'</p>';

		if($ficherocheck > 0)
		{
						
			
			//El archivo existe
			//Descarga los archivos XML y PDF al temporal del usuario y los borra del FTP
			$connftp_id = ftp_connect($ftp_server);
			$login_result = ftp_login($connftp_id, $ftp_user_name, $ftp_user_pass);
			$ftpdownload = ftp_get($connftp_id, $local_destino_xml, $ftp_origen_xml, FTP_BINARY);
			ftp_delete($connftp_id, $ftp_origen_xml);
			$ftpdownload = ftp_get($connftp_id, $local_destino_pdf, $ftp_origen_pdf, FTP_BINARY);
			ftp_delete($connftp_id, $ftp_origen_pdf);	
			$sqlparte= $mysqli->query("update ".$prefixsql."partes set remoto = '' where id = '".$idparte."'");	
			ftp_close($connftp_id);

//ahora que ya esta descargado el XML y el PDF, vamos a leer el XML para procesar la nueva información

			$partexml = simplexml_load_file($local_destino_xml);

			foreach ($partexml->parte as $nodo)
			{
			  $parte_id = $nodo->id;
			  $parte_codigo = $nodo->codigo;
			  $parte_tecnico = $nodo->tecnico;
			  $parte_tercero = $nodo->tercero;
			  $parte_fecha = $nodo->fecha;
			  $parte_horain = $nodo->horain;
			  $parte_horaout = $nodo->horaout;
			  $parte_intervencion = $nodo->intervencion;
			  $parte_emailtercero = $nodo->emailtercero;
			  $parte_nomfirma = $nodo->nomfirma;
			  
			}
			
			
				
			
			$sqlparte = $mysqli->query("update ".$prefixsql."partes set nomfirma = '".$parte_nomfirma."', mailfirma = '".$parte_emailtercero."' where id = '".$parte_id."' ");	
			
//Subimos el PDF al sistema de ficheros ---------------------------

			$sqlparte = $mysqli->query("insert into ".$prefixsql."ficheros (fichero, nombre, extension, descripcion, tipomime, sincroniza) values('', 'parte".$parte_id.".pdf', 'pdf', '".$parte_codigo."', 'application/pdf', '0')");	

			$sqlaux = $mysqli->query("select max(id) as contador from ".$prefixsql."ficheros"); 
			$rowaux = mysqli_fetch_assoc($sqlaux);
			$ultimoid = $rowaux["contador"];
			
			$nombrefichero = $ultimoid.".pdf";
			
			$sqlparte = $mysqli->query("update ".$prefixsql."ficheros set fichero = '".$nombrefichero."' where id = '".$ultimoid."'");	

			$sqlparte = $mysqli->query("insert into ".$prefixsql."ficheros_loc (idfichero, module, idlinea0, idlinea1, idlinea2, display, publico) values('".$ultimoid."', 'partes', '".$parte_id."', '0', '0', '".$parte_codigo."', '0')");	

			//movemos el archivo
			
			$dbdestinopdf = $lnxrutaficheros."pdf/".$nombrefichero;
			
			rename($local_destino_pdf, $dbdestinopdf);
			unlink($local_destino_xml);



//FIN Subimos el PDF al sistema de ficheros ---------------------------
			
		}

	}

}
else
{
?>


<form name="frmsync" method="POST" action="index.php?module=partes&section=partes&action=sync" >
<input type="hidden" name="hprocesar" value="YES" />



<?php



echo '<div align="center">
        <table style="max-width: 400px; width: 100%;" class="msgaviso">
        <tr><td class="maintitle">mensaje:</td></tr>
        <tr><td><p>¿Este prcoeso puede demorar unos minutos dependiendo del numero de partes se tenga que sincronizar? <b>¿Desea continuar?</b></p>
        </td></tr>
        <tr><td>&nbsp;</td></tr>
        <tr><td align="center">
        <input class="btnsubmit" name="btneliminar" value="Procesar" type="submit">
        <a class="btncancel" href="index.php?module=partes">Cancelar</a></td></tr>
        </table></div>';



echo '</form>';
}

?>



