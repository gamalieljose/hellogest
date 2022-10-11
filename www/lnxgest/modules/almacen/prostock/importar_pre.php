<?php
$pre_plantilla = $_POST["lstplantilla"];

$sqlaux = $mysqli->query("SELECT * from ".$prefixsql."users where id = '".$_COOKIE["lnxuserid"]."'");
$rowaux = mysqli_fetch_assoc($sqlaux);
$dbusername = $rowaux["username"];
//Este es el archivo subido (nueva ruta)
$rutaficherotemporal = $lnxrutaficherostemp."usr/".$dbusername."/ficherito.txt";

//Movemos el fichero temporal de sitio
move_uploaded_file($_FILES['fileficherito']['tmp_name'], $rutaficherotemporal);

$ficheroplantilla = "modules/almacen/prostock/plantillas/".$pre_plantilla;


if (file_exists($ficheroplantilla) && $pre_plantilla <> '' )
{   
    //Existe plantilla
    include($ficheroplantilla);
    
}
else
{   
    //NO Existe plantilla
    $url_atras = "index.php?module=almacen&section=prostockimp";
	header( "refresh:2;url=".$url_atras );
		echo '<div align="center">
		<table width="300" class="msgaviso">
		<tr><td class="maintitle">mensaje:</td></tr>
		<tr><td align="center">La plantilla seleccionada NO existe</td></tr>';
		echo '<tr><td align="center"><a class="btnedit" href="'.$url_atras.'">Aceptar</a></td></tr>';
		echo '</table></div>';
}
?>

