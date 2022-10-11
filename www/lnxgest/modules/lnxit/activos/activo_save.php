<?php
$idactivo = $_POST["hidactivo"];
$haccion = $_POST["haccion"];

$flsttercero = $_POST["lsttercero"];
$flstcontacto = $_POST["lstcontacto"];


$flsttipo = $_POST["lsttipo"];
$ftxtcodigo = addslashes($_POST["txtcodigo"]);
$ftxtnombre = addslashes($_POST["txtnombre"]);
$flstestado = $_POST["lstestado"];
$flstplantilla = $_POST["lstplantilla"];
$ftxtnotas = addslashes($_POST["txtnotas"]);


$fchkaviso = $_POST["chkaviso"];
if($fchkaviso == ''){$fchkaviso = '0';}

$fdpkvencimiento = $_POST["dpkvencimiento"];

	$fano = substr($fdpkvencimiento, 6, 4);  
	$fmes = substr($fdpkvencimiento, 3, 2);  
	$fdia = substr($fdpkvencimiento, 0, 2);  

	$fdpkvencimiento = $fano.'-'.$fmes.'-'.$fdia;

$fdpkavisos = $_POST["dpkavisos"];
	$fano = substr($fdpkavisos, 6, 4);  
	$fmes = substr($fdpkavisos, 3, 2);  
	$fdia = substr($fdpkavisos, 0, 2);  

	$fdpkavisos = $fano.'-'.$fmes.'-'.$fdia;
	
$fdpkfecha = $_POST["dpkfecha"];
	$fano = substr($fdpkfecha, 6, 4);  
	$fmes = substr($fdpkfecha, 3, 2);  
	$fdia = substr($fdpkfecha, 0, 2);  

	$fdpkfecha = $fano.'-'.$fmes.'-'.$fdia;

$lsttratarcomo = $_POST["lsttratarcomo"];



$urlatras = "index.php?module=lnxit&section=activos";

if ($haccion == 'new')
{

	$sqltercero = $mysqli->query("insert into ".$prefixsql."ita_activos (idtercero, idcontacto, idtipo, codigo, nombre, estado, plantilla, falta, fcaducidad, avisar, faviso, notas, tratarcomo) VALUES ('".$flsttercero."', '".$flstcontacto."', '".$flsttipo."', '".$ftxtcodigo."', '".$ftxtnombre."', '".$flstestado."', '".$flstplantilla."', '".$fdpkfecha."', '".$fdpkvencimiento."', '".$fchkaviso."', '".$fdpkavisos."', '".$ftxtnotas."', '".$lsttratarcomo."' )");
	
	$cnssql= $mysqli->query("SELECT max(id) as contador FROM ".$prefixsql."ita_activos");
	$row = mysqli_fetch_assoc($cnssql);
	$dbidmaximo = $row["contador"];
	
	$urlatras = "index.php?module=lnxit&section=activos&ss=activo&action=edit&id=".$dbidmaximo;
	
	
}
if ($haccion == 'update')
{

	$sqltercero= $mysqli->query("update ".$prefixsql."ita_activos set idtercero = '".$flsttercero."', idcontacto = '".$flstcontacto."', codigo = '".$ftxtcodigo."', idtipo = '".$flsttipo."', nombre = '".$ftxtnombre."', estado = '".$flstestado."', plantilla = '".$flstplantilla."', falta = '".$fdpkfecha."', fcaducidad = '".$fdpkvencimiento."', avisar = '".$fchkaviso."', faviso = '".$fdpkavisos."', notas = '".$ftxtnotas."', tratarcomo = '".$lsttratarcomo."' where id = '".$idactivo."'");
	
}
if ($haccion == 'delete')
{
	$sqlactivo = $mysqli->query("delete from ".$prefixsql."ita_activos where id = '".$idactivo."'");
        $sqlactivo = $mysqli->query("delete from ".$prefixsql."ita_caracteristicas where idactivo = '".$idactivo."'");
        $sqlactivo = $mysqli->query("delete from ".$prefixsql."ita_pro where idactivo = '".$idactivo."'");
}


setcookie("lnxit_idtercero", $flsttercero);


header( "Location: ".$urlatras );


	
	
?>