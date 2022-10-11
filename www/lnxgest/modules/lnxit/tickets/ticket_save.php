<?php
$idticket = $_POST["hidticket"];
$haccion = $_POST["haccion"];

$flsttipoticket = $_POST["lsttipoticket"];
$ftxtresumen = $_POST["txtresumen"];
$flstasignado = $_POST["lstasignado"];
$flstestado = $_POST["lstestado"];
$ftxtproblema = $_POST["txtproblema"];
$ftxtsolucion = $_POST["txtsolucion"];
$fticketremoto = $_POST["ticketremoto"];

$dbidtercero = $_POST["lsttercero"];
setcookie("lnxit_idtercero", $dbidtercero);


$flstcontacto = $_POST["lstcontacto"];

$flstcategoria = $_POST["lstcategoria"];
$flstprioridad = $_POST["lstprioridad"];

$fidmant = $_POST["lstmantenimiento"];
$fecha_hora_actual = date('Y-m-d H:i:s');

$flstcola = $_POST["lstcola"];

if ($flstestado == '0')
{$fecha_cierre = $fecha_hora_actual;}
else
{$fecha_cierre = '0000-00-00 00:00:00';}

if ($haccion == 'new')
{
	if($flstcontacto == ''){$flstcontacto = '0';}

	$sqlticket = $mysqli->query("insert into ".$prefixsql."it_tickets (idtipo, resumen, idasignado, idestado, problema, solucion, idafectado, idcategoria, idprioridad, fcreacion, fmodificacion, fcierre, idmant, idfv, idtercero, tremoto, idcola) VALUES ('".$flsttipoticket."', '".$ftxtresumen."', '".$flstasignado."', '".$flstestado."', '".$ftxtproblema."', '".$ftxtsolucion."', '".$flstcontacto."', '".$flstcategoria."', '".$flstprioridad."', '".$fecha_hora_actual."', '".$fecha_hora_actual."', '".$fecha_cierre."', '".$fidmant."', '0', '".$dbidtercero."', '".$fticketremoto."', '".$flstcola."' )");
	
	$sqlticket = $mysqli->query("select max(id) as maxid from ".$prefixsql."it_tickets");
	$row = mysqli_fetch_assoc($sqlticket);
	$idticket = $row['maxid'];

	$urlatras = "index.php?module=lnxit&section=tickets&action=edit&id=".$idticket;
		
	
}
if ($haccion == 'update')
{
	$ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."it_tickets where id = '".$idticket."'");
	$row = mysqli_fetch_assoc($ConsultaMySql);

	$dbidasignado = $row['idasignado'];
	
	
	$ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."users where id = '".$flstasignado."'");
	$row = mysqli_fetch_assoc($ConsultaMySql);
	$dbuserdisplay = $row['display'];
	
	if ($dbidasignado <> $flstasignado)
	{
		$sseguimiento = "Se asigna el ticket a: ".$dbuserdisplay;
		$sqlseguimiento = $mysqli->query("insert into ".$prefixsql."it_seguimiento (idticket, iduser, seguimiento, tiempo, computa) VALUES ('".$idticket."', '".$_COOKIE["lnxuserid"]."', '".$sseguimiento."', '00:00:00', '0')");
	}

	$sqltercero= $mysqli->query("update ".$prefixsql."it_tickets set idtipo = '".$flsttipoticket."', resumen = '".$ftxtresumen."', idasignado = '".$flstasignado."', idestado = '".$flstestado."', problema = '".$ftxtproblema."', solucion = '".$ftxtsolucion."', idafectado = '".$flstcontacto."', idcategoria = '".$flstcategoria."', idprioridad = '".$flstprioridad."', fcierre = '".$fecha_cierre."', idmant = '".$fidmant."', idtercero = '".$dbidtercero."', tremoto = '".$fticketremoto."', idcola = '".$flstcola."' where id = '".$idticket."'");
	$sqlmodificacion= $mysqli->query("update ".$prefixsql."it_tickets set fmodificacion = '".$fecha_hora_actual."' where id = '".$idticket."'");
	
	if($_POST["hboton"] == 'aplicar')
	{
		$urlatras = "index.php?module=lnxit&section=tickets&action=edit&id=".$idticket."&upd=ate";
	}
	else 
	{
		$urlatras = "index.php?module=lnxit&section=tickets&subsection=list";	
	}
	
	
}
if ($haccion == 'delete')
{
	$sqltercero= $mysqli->query("delete from ".$prefixsql."it_tickets where id = '".$idticket."'");
	$sqltercero= $mysqli->query("delete from ".$prefixsql."it_seguimiento where idticket = '".$idticket."'");

	$urlatras = "index.php?module=lnxit&section=tickets&subsection=list";
}


header( "Location: ".$urlatras );

?>
