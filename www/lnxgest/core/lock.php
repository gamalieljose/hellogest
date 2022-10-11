<?php
if($_COOKIE["lnxuserid"] > 0)
{
$lnxtabla = $_POST["lnxtabla"];
$lnxregistro = $_POST["lnxregistro"];
$idusuario = $_COOKIE["lnxuserid"];

require("cfpc.php");

$fechahoy = date("Y-m-d H:i:s");

//Borramos si es del mismo usuario
$sqlaux = $mysqli->query("delete from ".$prefixsql."bloqueos where tabla = '".$lnxtabla."' and idregistro = '".$lnxregistro."' and iduser = '".$idusuario."' "); 


$date = new DateTime();
$date->modify('-2 minute');

$borrardesdefecha = $date->format("Y-m-d H:i:s");

//Borramos todos los registros bloqueados con tiempo superior a 10 minutos
$sqlaux = $mysqli->query("delete from ".$prefixsql."bloqueos where fecha <= '".$borrardesdefecha."' "); 



//Consultamos si el mismo registro esta bloqueado
$sqlaux = $mysqli->query("select count(*) as contador from ".$prefixsql."bloqueos where tabla = '".$lnxtabla."' and idregistro = '".$lnxregistro."' ");
$rowaux = mysqli_fetch_assoc($sqlaux);
$bloqueosactivos = $rowaux["contador"];

if($bloqueosactivos > 0)
{
	$lblusuarios = '';
	$cnssql= $mysqli->query("select DISTINCT(iduser) from ".$prefixsql."bloqueos where tabla = '".$lnxtabla."' and idregistro = '".$lnxregistro."'");	
	while($col = mysqli_fetch_array($cnssql))
	{
		
		$sqlaux = $mysqli->query("select * from ".$prefixsql."users where id = '".$col["iduser"]."' ");
		$rowaux = mysqli_fetch_assoc($sqlaux);
		$usuario = $rowaux["display"];

		$lblusuarios = $lblusuarios.$usuario.', ';
		
	}
	


	$prtlinea = "Registro bloqueado por: ".$lblusuarios;
	$prteditable = "NO";
}
else 
{
	$prtlinea = "Bloqueado ".$fechahoy;	
	$prteditable = "YES";
	//Bloqueamos el registro
	$sqlaux = $mysqli->query("insert into ".$prefixsql."bloqueos (iduser, tabla, idregistro, fecha) values ('".$idusuario."', '".$lnxtabla."', '".$lnxregistro."', '".$fechahoy."') "); 

}



$data = array();



$data = array("rssimple" => $prtlinea, "rseditable" => $prteditable );

echo json_encode($data);
}
?>