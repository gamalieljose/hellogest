<?php
$sqlusuario = $mysqli->query("select * from ".$prefixsql."users where id = '".$_COOKIE["lnxuserid"]."'");
$row = mysqli_fetch_assoc($sqlusuario);
$dbusername = $row["username"];
$rutatemp = "files/usr/".$dbusername."/parte.pdf";

unlink($rutatemp);

//obtenemos el archivo con el parte
$sqlfichero = $mysqli->query("select * from ".$prefixsql."ficheros_loc where module = 'partes' and idlinea0 = '".$_GET["id"]."'");
$row = mysqli_fetch_assoc($sqlfichero);
$dbidfichero = $row["idfichero"];

$sqlfichero = $mysqli->query("select * from ".$prefixsql."ficheros where id = '".$dbidfichero."'");
$row = mysqli_fetch_assoc($sqlfichero);
$fdbfichero = $row["fichero"];
$fdbcarpeta = $row["extension"];

$archivodbf = $lnxrutaficheros.$fdbcarpeta."/".$fdbfichero;

$rutaservidor = getcwd(); //obtenemos la ruta del servidor PHP7
$copiararchivo = $rutaservidor.'/'.$rutatemp;


//echo '<p>Origen: '.$archivodbf.'</p>';
//echo '<p>Destino: '.$copiararchivo.'</p>';

copy($archivodbf, $copiararchivo);


//obtenemos los datos de la base de datos
$sqlparte = $mysqli->query("select * from ".$prefixsql."partes where id = '".$_GET["id"]."'");
$row = mysqli_fetch_assoc($sqlparte);
$dbcodigo = $row["codigo"];
$dbidtercero = $row["idtercero"];
$dbidtecnico = $row["idtecnico"];
$dbfecha = $row["fecha"];
$dbhorain = $row["horain"];
$dbhoraout = $row["horaout"];
$dbdescripcion = $row["descripcion"];
$dbmaterial = $row["material"];
$dbimporte = $row["importe"];
$dbpagado = $row["pagado"];
$dbfinalizado = $row["finalizado"];
$dbemail = $row["email"];
$dbfirmanombre = $row["firmanombre"];
$dbfirmanif = $row["firmanif"];

$sqlaux = $mysqli->query("select * from ".$prefixsql."terceros where id = '".$dbidtercero."'");
$rowaux = mysqli_fetch_assoc($sqlaux);
$dbrazonsocial = $rowaux["razonsocial"];
?>
<p><a class="btncancel" href="index.php?module=partes">Volver al listado</a></p>
<table width="100%">
<tr><td>
	<table>
	<tr class="maintitle"><td colspan="2">Datos del parte <?php echo $dbcodigo; ?></td></tr>
	<tr><td>Cliente</td><td>
	<?php 
	echo $dbrazonsocial; 
	echo ' <a class="btnedit" href="index.php?module=terceros&section=terceros&action=edit&idtercero='.$dbidtercero.'">Ver</a>';
	
	?></td></tr>
	<tr><td>Fecha</td><td><?php echo $dbfecha; ?></td></tr>
	<?php
	$shorain = explode(":", $dbhorain);
	$shoraout = explode(":", $dbhoraout);
	
	?>
	
	
	<tr><td>Entrada</td><td><?php echo $shorain[0].':'.$shorain[1]; ?></td></tr>
	<tr><td>Salida</td><td><?php echo $shoraout[0].':'.$shoraout[1]; ?></td></tr>
	<tr><td>e-mail</td><td><?php echo $dbemail; ?></td></tr>
	</table>
</td>
<td>
	<table>
	<tr class="maintitle"><td colspan="2">Datos facturación</td></tr>
		<tr><td>Facturable</td>
		<td>
			<select name="sfacturable">
				<option value="1">Facturable</option>
				<option value="0">NO Facturable</option>
			</select>
		</td>
	</tr>
	<tr><td>Factura</td><td>XXXX</td></tr>
	
	</table>
</td>
</tr>
</table>

<?php 




echo ' <iframe width="100%" height="400" src="'.$rutatemp.'"></iframe> '; ?>
