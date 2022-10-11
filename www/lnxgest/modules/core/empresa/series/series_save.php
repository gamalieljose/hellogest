<?php
$lsttipo = $_POST["lsttipo"];
$flstcv = $_POST["lstcv"]; // 1 - compra 2 - venta
$ftxtserie = $_POST["txtserie"];
$foptdefecto = $_POST["optdefecto"]; //1 - defecto
	if($foptdefecto == ''){$foptdefecto = '0';}
$foptactivo = $_POST["optactivo"]; //1 - activo
	if($foptactivo == ''){$foptactivo = '0';}
$ftxtnota = $_POST["txtnota"];
$flstempresa = $_POST["lstempresa"];

$fhaccion = $_POST["haccion"];
$fhidserie = $_POST["hidserie"];

$fdpcolor1 = $_POST["dpcolor1"];
$fdpcolor2 = $_POST["dpcolor2"];
$fdpcolor3 = $_POST["dpcolor3"];
$fdpcolor4 = $_POST["dpcolor4"];
$fdpcolor5 = $_POST["dpcolor5"];
$fdpcolor6 = $_POST["dpcolor6"];
$fdpcolor7 = $_POST["dpcolor7"];
$fdpcolor8 = $_POST["dpcolor8"];
$fdpcolor9 = $_POST["dpcolor9"];
$fdpcolor10 = $_POST["dpcolor10"];
$fdpcolor11 = $_POST["dpcolor11"];
$fdpcolor12 = $_POST["dpcolor12"];

$fchkstock = $_POST["chkstock"];
if($fchkstock == ''){$fchkstock = '0';}

if ($fhaccion == 'new')
{
	
	$ConsultaMySql= $mysqli->query("insert into ".$prefixsql."series (cv, tipo, serie, activo, dft, nota, idempresa, stock, colormes1, colormes2, colormes3, colormes4, colormes5, colormes6, colormes7, colormes8, colormes9, colormes10, colormes11, colormes12) values ('".$flstcv."', '".$lsttipo."', '".$ftxtserie."', '".$foptactivo."', '".$foptdefecto."', '".$ftxtnota."', '".$flstempresa."', '0', '', '', '', '', '', '', '', '', '', '', '', '')");

        $ConsultaMySql= $mysqli->query("SELECT max(id) as contador from ".$prefixsql."series ");
        $row = mysqli_fetch_assoc($ConsultaMySql);

        $fhidserie = $row["contador"];
        
    $urlatras = "index.php?&module=core&section=series";
	

}

if ($fhaccion == 'update')
{
		
	$ConsultaMySql= $mysqli->query("update ".$prefixsql."series set cv = '".$flstcv."', tipo = '".$lsttipo."', serie = '".$ftxtserie."', activo = '".$foptactivo."', dft = '".$foptdefecto."', nota = '".$ftxtnota."', idempresa = '".$flstempresa."', colormes1 = '".$fdpcolor1."', colormes2 = '".$fdpcolor2."', colormes3 = '".$fdpcolor3."', colormes4 = '".$fdpcolor4."', colormes5 = '".$fdpcolor5."', colormes6 = '".$fdpcolor6."', colormes7 = '".$fdpcolor7."', colormes8 = '".$fdpcolor8."', colormes9 = '".$fdpcolor9."', colormes10 = '".$fdpcolor10."', colormes11 = '".$fdpcolor11."', colormes12 = '".$fdpcolor12."', stock = '".$fchkstock."' where id = '".$fhidserie."'");
	
	$urlatras = "index.php?&module=core&section=series";
	
}

if ($fhaccion == 'new' || $fhaccion == 'update')
{   
    $ConsultaMySql= $mysqli->query("update ".$prefixsql."series set dft = '0' where tipo = '".$lsttipo."' and cv = '".$flstcv."' and idempresa = '".$flstempresa."' ");
    $ConsultaMySql= $mysqli->query("update ".$prefixsql."series set dft = '1' where id = '".$fhidserie."' ");
}

if ($fhaccion == 'delete')
{
	$ConsultaMySql= $mysqli->query("delete from ".$prefixsql."series where id = '".$fhidserie."'");

	$urlatras = "index.php?&module=core&section=series";

}

if ($_GET["tab"] == '2')
{
	$fsltimpuestos = $_POST["sltimpuestos"];
	$fchkrequerido = $_POST["chkrequerido"];
	$ftxtvalordefecto = $_POST["txtvalordefecto"];
	if ($fchkrequerido  == ''){$fchkrequerido  = "0";}
	$fhidserie = $_POST["hidserie"];
	

	$ConsultaMySql= $mysqli->query("SELECT MAX(orden) AS orden FROM ".$prefixsql."impuestosrules where idserie = '".$fhidserie."'");
	$row = mysqli_fetch_assoc($ConsultaMySql);
	$valormax = $row['orden'];
	
	$valormax = $valormax +1;
	
	$ConsultaMySql= $mysqli->query("insert into ".$prefixsql."impuestosrules (idserie, idimpuesto, orden, editable, valor, requerido) values ('".$fhidserie."', '".$fsltimpuestos."', '".$valormax."', '".$fchkrequerido."', '".$ftxtvalordefecto."', '0')");

	$urlatras = "index.php?&module=core&section=series&action=edit&tab=2&id=".$fhidserie;
		
}

header( "location: ".$urlatras );



?>