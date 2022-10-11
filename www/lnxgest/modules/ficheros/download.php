<?php

require("../../core/cfpc.php");

if ($_COOKIE["lnxuserid"] > '0')
{

$idfichero = $_GET["id"];

$sqlfichero= $mysqli->query("select * from ".$prefixsql."ficheros  where id = '".$idfichero ."'");
$row = mysqli_fetch_assoc($sqlfichero);

$dbidfichero = $row['fichero'];
$dbextension = $row['extension'];
$dbnombrefichero = $row['nombre'];
$dbtipomime = $row['tipomime'];
$dbdirfichero = $row['dirfichero'];
$dbpropietario = $row['iduser'];

$descargapermitida = "0";

if($dbpropietario == $_COOKIE["lnxuserid"] || $dbpropietario == "0")
{
    //si no hay propietario o es el mismo que el propio usuario
    //Permite la descarga
    $descargapermitida = "1";
}
else 
{
    //El propietario no es 0 o no es el mismo que el usuario actual de la cookie
    //Comenzamos a buscar

    $sqlfichero = $mysqli->query("select count(*) as contador from ".$prefixsql."ficheros_perm  where idfichero = '".$idfichero ."' and iduser = '".$_COOKIE["lnxuserid"]."'");
    $row = mysqli_fetch_assoc($sqlfichero);
    $dbpermficherouser = $row["contador"];

    $descargapermitida = $descargapermitida + $dbpermficherouser;

    //Buscamos dentro de los grupos a los que pertenece el usuario
    $permiso_grupo = '0';
	$cnspermisos= $mysqli->query("SELECT * from ".$prefixsql."usersgroup where iduser = '".$_COOKIE["lnxuserid"]."'");

	while($col = mysqli_fetch_array($cnspermisos))
	{
		$cnspermisosaux = $mysqli->query("SELECT count(*) as contador FROM ".$prefixsql."ficheros_perm where idgroup = '".$col["idgroup"]."' and idfichero = '".$idfichero ."'");
		$rowaux = mysqli_fetch_assoc($cnspermisosaux);

		$permiso_grupo = $permiso_grupo + $rowaux["contador"];
		
	}
    
    $descargapermitida = $descargapermitida + $permiso_grupo;
    
}


if($descargapermitida > 0)
{
    header('Content-disposition: attachment; filename="'.$dbnombrefichero.'"');
    header("Content-type: ".$dbtipomime);

    $lnxficheromuestra = $lnxrutaficheros.$dbdirfichero."/".$dbidfichero;

    readfile($lnxficheromuestra );
}
else 
{
    echo "<script> alert('No tiene de permisos para descargar el fichero'); </script>";
    echo "<h2>No tiene de permisos para descargar el fichero</h2>";
}

}

?>