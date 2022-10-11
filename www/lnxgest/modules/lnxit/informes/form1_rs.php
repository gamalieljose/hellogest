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


?>

<h2>Informe completo tercero</h2>
<?php
if ($_POST["chktickets"] == "1")
{
?>
<table width="100%">
<tr class="maintitle"><td colspan="6">Listdo tickets</td></tr>
<tr class="maintitle">
	<td>Ticket</td>
	<td> </td>
	<td>Resumen</td>
	<td>F Apertura</td>
	<td>F Cierre</td>
	<td>Estado</td>
</tr>
<?php
$cnssql = "SELECT * FROM ".$prefixsql."it_tickets where idtercero = '".$idtercero."' and ( ".$campofecha." >= '".$finicio."' and ".$campofecha." <= '".$ffin."') order by ".$campofecha;
$ConsultaMySql= $mysqli->query($cnssql);

while($col = mysqli_fetch_array($ConsultaMySql))
{
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

echo '<td>'.$col["id"].'</td>
	<td>'.$dbtipoticket.'</td>
	<td>'.$col["resumen"].'</td>
	<td>'.$col["fcreacion"].'</td>
	<td>'.$col["fcierre"].'</td>
	<td>'.$lblestado.'</td>
</tr>';
}

?>
</table>
<?php
}

if ($_POST["chkpartes"] == "1")
{
?>
<table width="100%">
<tr class="maintitle"><td colspan="4">Partes de trabajo</td></tr>
<tr class="maintitle">
	<td>Parte</td>
	<td>Tecnico</td>
	<td>Fecha</td>
	<td>descripcion</td>
</tr>
<?php
$cnssql = "SELECT * FROM ".$prefixsql."partes where idtercero = '".$idtercero."' and codigoint > '0'";
$ConsultaMySql= $mysqli->query($cnssql);

while($col = mysqli_fetch_array($ConsultaMySql))
{
	$lblresumen = utf8_encode(substr($col["descripcion"],0,30));
	$lblresumen = $lblresumen."...";
	
	$cnssql= $mysqli->query("SELECT * FROM ".$prefixsql."users where id = '".$col["idtecnico"]."'");
	$row = mysqli_fetch_assoc($cnssql);
	$lblusuario = $row["display"];
	
	if ($color == '1')
		{
			$color = '2';
			$pintacolor = "listacolor2";
		}
		else
		{
			$color = '1';
			$pintacolor = "listacolor1";
		}

		
	echo "<tr class=\"".$pintacolor."\" onmouseover=\"this.className = 'listacolorsobre'\" onmouseout=\"this.className = '".$pintacolor."'\">";

	
echo '<td>'.$col["codigo"].'</td>
	<td>'.$lblusuario.'</td>
	<td>'.$col["fecha"].'</td>
	<td>'.$lblresumen.'</td>
</tr>';
}
?>

</table>
<?php
}

if ($_POST["chkactivos"] == "1")
{
?>
<table width="100%">
<tr class="maintitle"><td colspan="7">Activos</td></tr>
<tr class="maintitle">
	<td>ID</td>
	<td>Codigo</td>
	<td>Tipo</td>
	<td>Nombre</td>
	<td>Estado</td>
	<td>F. Alta</td>
	<td>Vencimiento</td>
</tr>
<?php
$cnssql = "SELECT * FROM ".$prefixsql."ita_activos where idtercero = '".$idtercero."' ";
$ConsultaMySql= $mysqli->query($cnssql);

while($col = mysqli_fetch_array($ConsultaMySql))
{

$cnssql= $mysqli->query("SELECT * FROM ".$prefixsql."ita_tipos where id = '".$col["idtipo"]."'");
$row = mysqli_fetch_assoc($cnssql);
$dbtipoactivo = $row["tipo"];

$dbestado = "";
$cnssql= $mysqli->query("SELECT * FROM ".$prefixsql."ita_estados where id = '".$col["estado"]."'");
$row = mysqli_fetch_assoc($cnssql);
$dbestado = $row["estado"];

if($col["falta"] == "0000-00-00" ){$dbfalta = "";}else{$dbfalta = $col["falta"];}
if($col["fcaducidad"] == "0000-00-00" ){$dbfcaducidad = "";}else{$dbfcaducidad = $col["fcaducidad"];}

	if ($color == '1')
		{
			$color = '2';
			$pintacolor = "listacolor2";
		}
		else
		{
			$color = '1';
			$pintacolor = "listacolor1";
		}

		
	echo "<tr class=\"".$pintacolor."\" onmouseover=\"this.className = 'listacolorsobre'\" onmouseout=\"this.className = '".$pintacolor."'\">";

	echo '<td>'.$col["id"].'</td>
	<td>'.$col["codigo"].'</td>
	<td>'.$dbtipoactivo.'</td>
	<td>'.$col["nombre"].'</td>
	<td>'.$dbestado.'</td>
	<td>'.$dbfalta.'</td>
	<td>'.$dbfcaducidad.'</td>
</tr>';

	if($_POST["chkactivosdetail"] == "1")
	{
		$cnssqlaux= $mysqli->query("select * from ".$prefixsql."ita_caracteristicas where idactivo = '".$col["id"]."' ");
		while($colaux = mysqli_fetch_array($cnssqlaux))
		{
		echo "<tr class=\"".$pintacolor."\" onmouseover=\"this.className = 'listacolorsobre'\" onmouseout=\"this.className = '".$pintacolor."'\">";

		echo '<td> </td>
	<td align="right">-</td>
	<td>'.$colaux["opcion"].'</td>
	<td>'.$colaux["valor"].'</td>
	<td>'.$colaux["valor2"].'</td>
	<td> </td>
	<td> </td>
		</tr>';
		}
	}
}
?>



</table>
<?php
}

if ($_POST["chkpasswords"] == "1")
{
?>

<table width="100%">
<tr class="maintitle"><td colspan="2">Contraseñas</td></tr>
<tr class="maintitle">
<td>ID</td>
<td>Donde</td>

<?php
if ($_POST["chkpasswordsshow"] == "1")
{
echo '<td>usuario</td>';
echo '<td>Password</td>';
echo '<td>e-mail asociado</td>';
echo '<td>Notas</td>';
}
?>


</tr>
<?php

$cnssql = "SELECT * FROM ".$prefixsql."it_infopass where idtercero = '".$idtercero."' ";
$ConsultaMySql= $mysqli->query($cnssql);

while($col = mysqli_fetch_array($ConsultaMySql))
{
echo '<tr>';
echo '<td>'.$col["id"].'</td>';
echo '<td>'.$col["donde"].'</td>';

if ($_POST["chkpasswordsshow"] == "1")
{
	$dbpassword = base64_decode($col["password"]); 
	
echo '<td>'.$col["usuario"].'</td>';
echo '<td>'.$dbpassword.'</td>';
echo '<td>'.$col["email"].'</td>';
echo '<td>'.$col["notas"].'</td>';
}


echo '</tr>';
}

?>
</table>
<?php

}
?>
