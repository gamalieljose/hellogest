<?php
$fhaccion = $_POST["haccion"];
$fhidlinea = $_POST["hidlinea"];
$fhidcamp = $_POST["hidcamp"];
$fhidnota = $_POST["hidnota"];

$fchkacllamada = $_POST["chkacllamada"];
	if($fchkacllamada == ''){$fchkacllamada = "0";}
$fchkacvisita = $_POST["chkacvisita"];
	if($fchkacvisita == ''){$fchkacvisita = "0";}
$fchkacemail = $_POST["chkacemail"];
	if($fchkacemail == ''){$fchkacemail = "0";}
$fchkacotros = $_POST["chkacotros"];
	if($fchkacotros == ''){$fchkacotros = "0";}

$fhidtercero = $_POST["hidtercero"];

$ftxtnotas = addslashes($_POST["txtnotas"]);

$ftxtfecha = $_POST["txtfecha"];
    $xfecha = explode("/", $ftxtfecha);
    $fdia = $xfecha[0];
    $fmes = $xfecha[1];
    $fano = $xfecha[2];

    $fechita = $fano."-".$fmes."-".$fdia;

$foptcontacto = $_POST["optcontacto"];

if ($foptcontacto == "existente")
{
	
	$idcontacto = $_POST["lstcontacto"];
}

if ($foptcontacto == "nuevo")
{
	$ftxtcontacto = addslashes($_POST["txtcontacto"]);
	$ftxtcontactotel = addslashes($_POST["txtcontactotel"]);
	$ftxtcontactocargo = addslashes($_POST["txtcontactocargo"]);
	$fftxtcontactoemail = addslashes($_POST["ftxtcontactoemail"]);
	$flstidioma = $_POST["lstidioma"];
	
	$sqltercero = $mysqli->query("insert into ".$prefixsql."terceroscontactos (idtercero, nombre, tel, email, ididioma, cargo, iddir) values ('".$fhidtercero."', '".$ftxtcontacto."', '".$ftxtcontactotel."', '".$ftxtcontactoemail."', '".$flstidioma."', '".$ftxtcontactocargo."', '0')");
            
	$buscapais = $mysqli->query("SELECT max(id) as contador FROM ".$prefixsql."terceroscontactos");
	$row = mysqli_fetch_assoc($buscapais);
	$idcontacto = $row["contador"];
	
}

//Actualiza fecha modificacion
$fechaupdate = date("Y-m-d H:i:s");
$sqlseguimiento = $mysqli->query("update ".$prefixsql."crm_camp_terceros set fupdate = '".$fechaupdate."' where idcamp = '".$fhidcamp."' and idtercero = '".$fhidtercero."'");


if ($fhaccion == "new")
{	
	$sqlseguimiento = $mysqli->query("insert into ".$prefixsql."crm_camp_notas (idcamp, idtercero, idcontacto, fecha, nota, llamada, visita, email, otros) values ('".$fhidcamp."', '".$fhidtercero."', '".$idcontacto."', '".$fechita."', '".$ftxtnotas."', '".$fchkacllamada."', '".$fchkacvisita."', '".$fchkacemail."', '".$fchkacotros."')");
}

if ($fhaccion == "update")
{	
	$sqlseguimiento = $mysqli->query("update ".$prefixsql."crm_camp_notas set idcamp = '".$fhidcamp."', idtercero = '".$fhidtercero."', idcontacto = '".$idcontacto."', fecha = '".$fechita."', nota = '".$ftxtnotas."', llamada = '".$fchkacllamada."', visita = '".$fchkacvisita."', email = '".$fchkacemail."', otros = '".$fchkacotros."' where id = '".$fhidnota."'");
}

if ($fhaccion == "delete")
{	
	$sqlseguimiento = $mysqli->query("delete from ".$prefixsql."crm_camp_notas where id = '".$fhidnota."'");
}

$url_atras = "index.php?module=crm&section=campterceros&id=".$fhidcamp;
header( "refresh:2;url=".$url_atras );
	echo '<div align="center">
	<table width="300" class="msgaviso">
	<tr><td class="maintitle">mensaje:</td></tr>
	<tr><td>Cambios efectuados con éxito</td></tr>
	<tr><td align="center"><a class="btnedit" href="'.$url_atras.'">Aceptar</a></td></tr>
	</table></div>';

	
	
?>