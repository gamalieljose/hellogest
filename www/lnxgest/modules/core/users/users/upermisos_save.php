<?php
$fhaccion = $_POST["haccion"];
$fhidusuario = $_POST["hidusuario"];



if($fhaccion == "update")
{
$mensaje = 'Permisos especificos actualizados';	


//borramos los permisos asociados a dicho grupo
	$sqlpermisosdegrupo = $mysqli->query("delete from ".$prefixsql."permisosgrupos where iduser = '".$fhidusuario."' ");

//Registramos los permisos del nuevo grupo en la base de datos
	
	foreach ($_POST['chkpermiso'] as $idpermiso)
	{
	   // echo '<p>Permiso id: '.$idpermiso.'</p>';
	   $sqlpermisosdegrupo = $mysqli->query("insert into ".$prefixsql."permisosgrupos (iduser, idgrupo, idpermiso) VALUES ('".$fhidusuario."', '0', '".$idpermiso."')");
	}



}

$urlatras = 'index.php?&module=core&section=permisosespecificos&id='.$fhidusuario;


header( "Location: ".$urlatras );
	
	
	
	?>