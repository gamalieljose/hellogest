<title>LNXGEST ERP - Contactos</title>
<?php

echo '<p align="center"><a href="index.php?module=terceros" class="btnsubmit">Volver a buscar</a></p>';


$buscatercero = $mysqli->query("SELECT * FROM ".$prefixsql."terceros where id = '".$_GET["id"]."'");
$row = mysqli_fetch_assoc($buscatercero);
	
$dbrazonsocial = $row["razonsocial"];
$dbnomcomercial = $row["nomcomercial"];
$dbtel = $row["tel"];

$dbdir = $row["dir"];
$dbcp = $row["cp"];
$dbpobla = $row["pobla"];
$dbidprov = $row["idprov"];

$dbemail = $row["email"];

$ConsultaMySql = $mysqli->query("SELECT * from ".$prefixsql."provincias where id = '".$dbidprov."'");
$rowaux = mysqli_fetch_assoc($ConsultaMySql);

$dbprovincia = $rowaux["provincia"];

?>

<table width="100%">
<tr class="maintitle"><td colspan="2"><?php echo $dbrazonsocial; ?> <td></tr>
<tr><td>Razon social</td><td><?php echo $dbrazonsocial; ?></td></tr>
<tr><td>Nombre social</td><td><?php echo $dbnomcomercial; ?></td></tr>
<tr><td>Telefono</td><td><?php echo '<a href="tel:'.$dbtel.'">'.$dbtel.'</a>'; ?></td></tr>
<?php 
if($dbemail <> '')
{
echo '<tr><td>e-mail</td><td><a href="mailto:'.$dbemail.'">'.$dbemail.'</a></td></tr>'; 
}
?>

<tr class="maintitle"><td colspan="2">Direccion<td></tr>
<tr><td colspan="2"><?php echo $dbdir; ?><td></tr>
<tr><td colspan="2"><?php echo $dbcp.' - '.$dbpobla; ?><td></tr>
<tr><td colspan="2"><?php echo $dbprovincia; ?><td></tr>
</table>

<table width="100%">

<tr class="maintitle"><td colspan="2">Contactos<td></tr>
<?php
$ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."terceroscontactos where idtercero = '".$_GET["id"]."'");

while($columna = mysqli_fetch_array($ConsultaMySql))
{
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
	
	if($columna["email"] == '')
	{$correo = "&nbsp;";}
	else
	{$correo = '<a href="mailto:'.$columna["email"].'" class="btnedit">e-mail</a>';}
	
	echo '<td width="80">'.$correo.'</td><td><a href="tel:'.$columna["tel"].'">'.$columna["nombre"].'</a><td>';
	echo '</tr>';
}

?>
<tr class="maintitle"><td colspan="2">Direcciones<td></tr>
<?php
$ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."tercerosdir where idtercero = '".$_GET["id"]."'");

while($columna = mysqli_fetch_array($ConsultaMySql))
{
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
	echo '<td width="80">'.$correo.'</td><td><a href="tel:'.$columna["tel"].'">'.$columna["referencia"].'</a><td>';
	
	
}

?>

</table>

<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>