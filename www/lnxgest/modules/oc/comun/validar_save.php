<?php

$fhidfv = $_POST["hidfv"];
$haccion = $_POST["haccion"];
$ftxtfecha = $_POST["txtfecha"];
$ftxtvencimiento = $_POST["txtvencimiento"];

$fano = substr($ftxtfecha, 6, 4);  
$fmes = substr($ftxtfecha, 3, 2);  
$fdia = substr($ftxtfecha, 0, 2);  

$ftxtfecha = $fano.'-'.$fmes.'-'.$fdia;

$fano = substr($ftxtvencimiento, 6, 4);  
$fmes = substr($ftxtvencimiento, 3, 2);  
$fdia = substr($ftxtvencimiento, 0, 2);  

$ftxtvencimiento = $fano.'-'.$fmes.'-'.$fdia;

if ($haccion == 'delete')
{
	//obtenemos la idserie del pedido a validar
	$sqlpedido = $mysqli->query("select * from ".$prefixsql.$lnxinvoice." where id = '".$fhidfv."'");
	$row = mysqli_fetch_assoc($sqlpedido);
	$dbidserie = $row["idserie"];
	
	$dbcodigoint = $row["codigoint"];
	$dbeditfv = $row["editfv"];
	$dbfecha = $row["fecha"];
	$dbvencimiento = $row["vencimiento"];
	
	if($dbcodigoint == '0' && $dbeditfv == '0')
	{
		//Es borrador y comprobamos la fecha de emisión
		$fechahoy = date("Y-m-d");
		if($fechahoy > $dbfecha)
		{
			$dbfecha = $fechahoy;
		}
		else
		{
			$dbfecha = $dbfecha;
		}
		
	}
	
	
	$sqlpedido = $mysqli->query("select * from ".$prefixsql."series where id = '".$dbidserie."'");
	$row = mysqli_fetch_assoc($sqlpedido);
	$dbserie = $row["serie"];
	
	//ahora buscamos el ultimo pedido validado de la serie
	$sqlpedido = $mysqli->query("select max(codigoint) as contador from ".$prefixsql.$lnxinvoice." where idserie = '".$dbidserie."'");
	$row = mysqli_fetch_assoc($sqlpedido);
	$dbidcoddoc = $row["contador"] +1;
	
	$codigopedido = $dbserie."/".$dbidcoddoc;
	
	
	$sqltercero= $mysqli->query("update ".$prefixsql.$lnxinvoice." set codigoint = '".$dbidcoddoc."', codigo = '".$codigopedido."', fecha = '".$ftxtfecha."', vencimiento = '".$ftxtvencimiento."' where id = '".$fhidfv."'");

}
header( "refresh:2;url=index.php?module=".$lnxinvoice."&section=main&action=view&id=".$fhidfv );
	echo '<div align="center">
	<table width="300" class="msgfviso">
	<tr><td class="maintitle">mensaje:</td></tr>
	<tr><td>Pedido validado con éxito</td></tr>
	<tr><td align="center"><a class="btnedit" href="index.php?module='.$lnxinvoice.'&section=main&action=view&id='.$fhidfv.'">Aceptar</a></td></tr>
	</table></div>';

?>