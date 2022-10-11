<?php
$fhidterminal = $_POST["hidterminal"];
$ftxtterminal = $_POST["txtterminal"];
$fhidtienda = $_POST["hidtienda"];
$fhaccion = $_POST["haccion"];
$flstalmacen = $_POST["lstalmacen"];


if ($fhaccion == 'new')
{
	
	$ConsultaMySql = $mysqli->query("insert into ".$prefixsql."pos_terminales (idtienda, idalmacen, descripcion) values ('".$fhidtienda."', '".$flstalmacen."', '".$ftxtterminal."')");
	header("Location: index.php?&module=core&section=etiendas&action=edit&id=".$fhidtienda);
}

if ($fhaccion == 'update')
{
	$ConsultaMySql = $mysqli->query("update ".$prefixsql."pos_terminales set descripcion = '".$ftxtterminal."', idalmacen = '".$flstalmacen."' where id = '".$fhidterminal."' ");
	header("Location: index.php?&module=core&section=etiendas&action=edit&id=".$fhidtienda);
}

if ($fhaccion == 'delete')
{
	$ConsultaMySql = $mysqli->query("delete from ".$prefixsql."pos_terminales where id = '".$fhidterminal."' ");
	header("Location: index.php?&module=core&section=etiendas&action=edit&id=".$fhidtienda);
	
}

?>