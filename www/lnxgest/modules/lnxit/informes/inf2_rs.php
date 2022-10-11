<p><a href="index.php?module=lnxit&section=informes" class="btnedit">Volver a los informes</a></p>

<?php
$idtercero = $_POST["lsttercero"];

$ftxtfechainicio = $_POST["txtfechainicio"];
$ftxtfechafin = $_POST["txtfechafin"];
$foptfechabuscar = $_POST["optfechabuscar"];
if($foptfechabuscar == "open"){$campofecha = "fcreacion";}else{$campofecha = "fcierre";}

$xfecha = explode("/", $ftxtfechainicio);
$finicio = $xfecha[2]."-".$xfecha[1]."-".$xfecha[0]." 00:00:00";
$xfecha = explode("/", $ftxtfechafin);
$ffin = $xfecha[2]."-".$xfecha[1]."-".$xfecha[0]." 23:59:59";

$fchkterceros = $_POST["chkterceros"];

$fchktickettipo = $_POST["chktickettipo"];
$fchkticketremoto = $_POST["chkticketremoto"];
$fchkticketestado = $_POST["chkticketestado"];
$fchktickettercero = $_POST["chktickettercero"];
$fchkticketafectado = $_POST["chkticketafectado"];
?>

<h2>Informe tickets</h2>

<table width="100%">
<tr class="maintitle">
	<td>Ticket</td>
<?php
if($fchktickettipo == '1'){echo '<td> </td>';}
if($fchkticketremoto == '1'){echo '<td>Remoto</td>';}
if($fchktickettercero == '1'){echo '<td>Tercero</td>';}
if($fchkticketafectado == '1'){echo '<td>Afectado</td>';}

?>

	<td>Resumen</td>
	<td>F Apertura</td>
	<td>F Cierre</td>
<?php
if($fchkticketestado == '1'){echo '<td>Estado</td>';}

?>

</tr>
<?php
if($fchkterceros == "todos")
{
	$sql_tercero = "";
}
else
{
	$sql_tercero = "idtercero = '".$idtercero."' and ";
}

$cnssql = "SELECT * FROM ".$prefixsql."it_tickets where ".$sql_tercero." ( ".$campofecha." >= '".$finicio."' and ".$campofecha." <= '".$ffin."') order by ".$campofecha;
$ConsultaMySql= $mysqli->query($cnssql);

while($col = mysqli_fetch_array($ConsultaMySql))
{

	$cnssqlaux = $mysqli->query("SELECT * FROM ".$prefixsql."terceros where id = '".$col["idtercero"]."'");
	$rowaux = mysqli_fetch_assoc($cnssqlaux);
	$lbl_tercero = $rowaux["razonsocial"];

	$cnssqlaux = $mysqli->query("SELECT * FROM ".$prefixsql."terceroscontactos where id = '".$col["idafectado"]."'");
	$rowaux = mysqli_fetch_assoc($cnssqlaux);
	$lbl_afectado = $rowaux["nombre"];

	$cnssql= $mysqli->query("SELECT * FROM ".$prefixsql."it_tipos where id = '".$col["idtipo"]."'");
	$row = mysqli_fetch_assoc($cnssql);
	$dbtipoticket = $row["tipo"];
	
	if($col["idestado"] == "0"){$lblestado = "Cerrado";}
	if($col["idestado"] == "1"){$lblestado = "Abierto";}
	if($col["idestado"] == "2"){$lblestado = "En proceso";}
	if($col["idestado"] == "3"){$lblestado = "Pendiente de terceros";}
	if($col["idestado"] == "4"){$lblestado = "Solucionado";}


	if($color == '1'){$color = '2'; $pintacolor = "listacolor2";}else{$color = '1'; $pintacolor = "listacolor1";}

echo "<tr class=\"".$pintacolor."\" onmouseover=\"this.className = 'listacolorsobre'\" onmouseout=\"this.className = '".$pintacolor."'\">";

echo '<td>'.$col["id"].'</td>';

if($fchktickettipo == '1') {echo '<td>'.$dbtipoticket.'</td>';}
if($fchkticketremoto == '1') {echo '<td>'.$col["tremoto"].'</td>';}
if($fchktickettercero == '1') {echo '<td>'.$lbl_tercero.'</td>';}
if($fchkticketafectado == '1'){echo '<td>'.$lbl_afectado.'</td>';}


echo '<td>'.$col["resumen"].'</td>
	<td>'.$col["fcreacion"].'</td>
	<td>'.$col["fcierre"].'</td>';
if($fchkticketestado == '1'){echo '<td>'.$lblestado.'</td>';}

echo '</tr>';
}

?>
</table>
