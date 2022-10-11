<?php

function lnx_check_perm($lnx_permiso)
{
	require("core/cfpc.php");
	$cnspermisos = $mysqli->query("SELECT count(*) as contador FROM ".$prefixsql."permisosgrupos where iduser = '".$_COOKIE["lnxuserid"]."' and idpermiso = '".$lnx_permiso."'");
	$row = mysqli_fetch_assoc($cnspermisos);

	$permiso_usuario = $row["contador"];
	
	$permiso_grupo = '0';
	$cnspermisos= $mysqli->query("SELECT * from ".$prefixsql."usersgroup where iduser = '".$_COOKIE["lnxuserid"]."'");

	while($col = mysqli_fetch_array($cnspermisos))
	{
		$cnspermisosaux = $mysqli->query("SELECT count(*) as contador FROM ".$prefixsql."permisosgrupos where idgrupo = '".$col["idgroup"]."' and idpermiso = '".$lnx_permiso."'");
		$rowaux = mysqli_fetch_assoc($cnspermisosaux);

		$permiso_grupo = $permiso_grupo + $rowaux["contador"];
		
	}

	
	$lnx_permiso = $permiso_usuario + $permiso_grupo;
	
	
	
    return $lnx_permiso;
	
}

function lnx_permdenegado()
{

echo '<div align="center">
				<table class="msgaviso">
				<tr><td class="maintitle">Permiso de acceso</td></tr>
				<tr><td>Permiso DENEGADO</td></tr>
				</table>
				</div>';
				
	//eturn $lnx_permisodenegado;
}


function lnx_check_bloqueo($lnxtabla, $lnxregistro, $lnxcklnxuserid)
{
	require("core/cfpc.php");

	$date = new DateTime();
	$date->modify('-10 minute');

	$borrardesdefecha = $date->format("Y-m-d H:i:s");

	//Borramos todos los registros bloqueados con tiempo superior a 10 minutos
	$sqlaux = $mysqli->query("delete from ".$prefixsql."bloqueos where fecha <= '".$borrardesdefecha."' "); 

	//Consultamos si el mismo registro esta bloqueado por algun usuario que no seamos nosotros
	$sqlaux = $mysqli->query("select count(*) as contador from ".$prefixsql."bloqueos where tabla = '".$lnxtabla."' and idregistro = '".$lnxregistro."' and iduser <> '".$lnxcklnxuserid."'");
	$rowaux = mysqli_fetch_assoc($sqlaux);
	$lnx_bloqueados = $rowaux["contador"];


	if($lnx_bloqueados == 0)
	{
		$lnxfechabloqueo = date("Y-m-d H:i:s");
		//Como no hay registros, vamos a crear el bloqueo inmediatamente
		$sqlaux = $mysqli->query("insert into from ".$prefixsql."bloqueos (iduser, tabla, idregistro, fecha) values('".$lnxcklnxuserid."', '".$lnxtabla."', '".$lnxregistro."', '".$lnxfechabloqueo."')");

	}

	return $lnx_bloqueados;
}
	
?>