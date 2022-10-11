<?php
$idticket = $_POST["hidticket"];
$haccion = $_POST["haccion"];
$hidseguimiento = $_POST["hidseguimiento"];

$tiempodedicado = $_POST["slthoras"].":".$_POST["sltminutos"].":00";

$ftxtseguimiento = $_POST["txtseguimiento"];
$flstusuario = $_POST["lstusuario"];

$fchkmantenimiento = $_POST["chkmantenimiento"];
if($fchkmantenimiento == ''){$fchkmantenimiento = '0';} //computa para mantenimientos

if ($ftxtseguimiento == '' && $haccion == 'delete'){$ftxtseguimiento = "borrar";}

if ($ftxtseguimiento == '' )
{
	if ($haccion == 'new') {	$urlatras = "index.php?module=lnxit&section=seguimiento&action=new&id=".$idticket;}
	if ($haccion == 'update') {	$urlatras = "index.php?module=lnxit&section=seguimiento&action=edit&id=".$idticket."&idseguimiento=".$hidseguimiento;}
	header( "refresh:2;url=".$urlatras );
		echo '<div align="center">
		<table width="300" class="msgaviso">
		<tr><td class="maintitle">mensaje:</td></tr>
		<tr><td>Ha de completar el campo Seguimiento</td></tr>
		<tr><td align="center"><a class="btnedit" href="'.$urlatras.'">Aceptar</a></td></tr>
		</table></div>';
}
else
{
$fecha_hora_actual = date('Y-m-d H:i:s');
	if ($haccion == 'new')
	{
		$sqlseguimiento= $mysqli->query("insert into ".$prefixsql."it_seguimiento (idticket, iduser, seguimiento, tiempo, computa) VALUES ('".$idticket."', '".$flstusuario."', '".$ftxtseguimiento."', '".$tiempodedicado."', '".$fchkmantenimiento."')");
		$sqlmodificacion= $mysqli->query("update ".$prefixsql."it_tickets set fmodificacion = '".$fecha_hora_actual."' where id = '".$idticket."'");
	}
	if ($haccion == 'update')
	{
		$sqltercero= $mysqli->query("update ".$prefixsql."it_seguimiento set iduser = '".$flstusuario."', seguimiento = '".$ftxtseguimiento."', tiempo = '".$tiempodedicado."', computa = '".$fchkmantenimiento."' where id = '".$hidseguimiento."'");
		$sqlmodificacion= $mysqli->query("update ".$prefixsql."it_tickets set fmodificacion = '".$fecha_hora_actual."' where id = '".$idticket."'");
	}
	if ($haccion == 'delete')
	{
		$sqltercero= $mysqli->query("delete from ".$prefixsql."it_seguimiento where id = '".$hidseguimiento."'");
		$sqlmodificacion= $mysqli->query("update ".$prefixsql."it_tickets set fmodificacion = '".$fecha_hora_actual."' where id = '".$idticket."'");
	}

	
	//Calcula computos de horas para mantenimientos
	
	//1.- Comprueba que idmant esta vinculado el ticket

$cnsaux= $mysqli->query("SELECT * from ".$prefixsql."it_tickets where id = '".$idticket."' ");
$rowaux = mysqli_fetch_assoc($cnsaux);
$dbidmant = $rowaux['idmant'];

if ($dbidmant > '0')
{
	//si esta vinculado a un mantenimiento:
	
	//Calculamos el total de horas invertidas y que se computen a tal efecto
	$ConsultaMySql= $mysqli->query("SELECT sum(HOUR(tiempo)) as hora, sum(MINUTE(tiempo)) as minutos from ".$prefixsql."it_seguimiento where idticket = '".$idticket."' and computa = '1'");
	$row = mysqli_fetch_assoc($ConsultaMySql);

	$horas = $row["hora"];
	$min = $row["minutos"];
	$minutos = $min%60;
	$h=0;
	$h=(int)($min/60);
	$horas+=$h;

	
	$totaltiempodedicado = $horas.":".$minutos.":00";
	
	
	//ahora hay que restar el tiempo contratado con el consumido
	$cnsaux= $mysqli->query("SELECT * from ".$prefixsql."it_mant where id = '".$dbidmant."' ");
	$rowaux = mysqli_fetch_assoc($cnsaux);
	$dbcontratado = $rowaux['hcontratado'];


	$dteStart = new DateTime($totaltiempodedicado);
	$dteEnd   = new DateTime($dbcontratado);

	$dteDiff  = $dteStart->diff($dteEnd); 
	
	$tiemporestante = $dteDiff->format("%H:%I:%S"); 
	
	
	
	$sqlmodificacion= $mysqli->query("update ".$prefixsql."it_mant set hrestantes = '".$tiemporestante."' where id = '".$dbidmant."'");
	
	
}
	

	
	$urlatras = "index.php?module=lnxit&section=seguimiento&action=new&id=".$idticket;
	header( "Location: ".$urlatras );
		
}
?>