<?php
// ------------------------------
$lbl_caracteristica = "Toma de red";
$lbl_valor1 = "Caracteristica";
$lbl_valor2 = "Valor";

//------------------------------


$cnssql= $mysqli->query("SELECT * FROM ".$prefixsql."ita_activos where id = '".$_GET["id"]."'");
$row = mysqli_fetch_assoc($cnssql);

$dbnombre = $row["nombre"];


	echo '<p>Plantilla SW 8 PORTS</p>';
	
	$colorapagado = "#FA5882";
	$coloractivo = "#56F590";
	
?>
<div align="center">
<?php $anchocelda = 50; ?>
<table border="1">
<tr class="maintitle"><td colspan="34"><?php echo $dbnombre; ?> </tr></tr>
<tr>
<?php

$cnssql= $mysqli->query("SELECT * FROM ".$prefixsql."ita_caracteristicas where idactivo = '".$_GET["id"]."' and opcion = 'LAN1'");
$row = mysqli_fetch_assoc($cnssql);

$existe = $cnssql->num_rows;


if ($existe > '0')
{
	$dbopcion = $row["opcion"]; $dbvalor = $row["valor"]; $dbidcaracteristica = $row["id"];
	$url_sw = 'index.php?module=lnxit&section=activos&ss=caracteristicas&id='.$_GET["id"].'&sc='.$dbopcion;
	$colorfondo = $coloractivo;
}
else
{
	$url_sw = 'index.php?module=lnxit&section=activos&ss=caracteristicas&action=new&id='.$_GET["id"].'&scaracteristica=LAN1';
	$colorfondo = $colorapagado;
}


if($_GET[sc] == 'LAN1'){$objetoactivo = 'style="border-style: solid; border-width: 5px;"';}else{$objetoactivo = '';}
echo '<td '.$objetoactivo.' align="center" bgcolor="'.$colorfondo.'" width="'.$anchocelda.'"><a href="'.$url_sw.'">LAN 1</a></td>';
	
	
	
$cnssql= $mysqli->query("SELECT * FROM ".$prefixsql."ita_caracteristicas where idactivo = '".$_GET["id"]."' and opcion = 'LAN2'");
$row = mysqli_fetch_assoc($cnssql);

$existe = $cnssql->num_rows;


if ($existe > '0')
{
	$dbopcion = $row["opcion"]; $dbvalor = $row["valor"]; $dbidcaracteristica = $row["id"];
	$url_sw = 'index.php?module=lnxit&section=activos&ss=caracteristicas&id='.$_GET["id"].'&sc='.$dbopcion;
	$colorfondo = $coloractivo;	
}
else
{
	$url_sw = 'index.php?module=lnxit&section=activos&ss=caracteristicas&action=new&id='.$_GET["id"].'&scaracteristica=LAN2';
	$colorfondo = $colorapagado;
}

if($_GET[sc] == 'LAN2'){$objetoactivo = 'style="border-style: solid; border-width: 5px;"';}else{$objetoactivo = '';}
echo '<td '.$objetoactivo.' align="center" bgcolor="'.$colorfondo.'" width="'.$anchocelda.'"><a href="'.$url_sw.'">LAN 2</a></td>';

//------------------------ 3 ------------------
$cnssql= $mysqli->query("SELECT * FROM ".$prefixsql."ita_caracteristicas where idactivo = '".$_GET["id"]."' and opcion = 'LAN3'");
$row = mysqli_fetch_assoc($cnssql);

$existe = $cnssql->num_rows;


if ($existe > '0')
{
	$dbopcion = $row["opcion"]; $dbvalor = $row["valor"]; $dbidcaracteristica = $row["id"];
	$url_sw = 'index.php?module=lnxit&section=activos&ss=caracteristicas&id='.$_GET["id"].'&sc='.$dbopcion;
	$colorfondo = $coloractivo;
}
else
{
	$url_sw = 'index.php?module=lnxit&section=activos&ss=caracteristicas&action=new&id='.$_GET["id"].'&scaracteristica=LAN3';
	$colorfondo = $colorapagado;
}


if($_GET[sc] == 'LAN3'){$objetoactivo = 'style="border-style: solid; border-width: 5px;"';}else{$objetoactivo = '';}
echo '<td '.$objetoactivo.' align="center" bgcolor="'.$colorfondo.'" width="'.$anchocelda.'"><a href="'.$url_sw.'">LAN 3</a></td>';
//---------------------------------------------

//------------------------ 4 ------------------
$cnssql= $mysqli->query("SELECT * FROM ".$prefixsql."ita_caracteristicas where idactivo = '".$_GET["id"]."' and opcion = 'LAN4'");
$row = mysqli_fetch_assoc($cnssql);

$existe = $cnssql->num_rows;


if ($existe > '0')
{
	$dbopcion = $row["opcion"]; $dbvalor = $row["valor"]; $dbidcaracteristica = $row["id"];
	$url_sw = 'index.php?module=lnxit&section=activos&ss=caracteristicas&id='.$_GET["id"].'&sc='.$dbopcion;
	$colorfondo = $coloractivo;
}
else
{
	$url_sw = 'index.php?module=lnxit&section=activos&ss=caracteristicas&action=new&id='.$_GET["id"].'&scaracteristica=LAN4';
	$colorfondo = $colorapagado;
}


if($_GET[sc] == 'LAN4'){$objetoactivo = 'style="border-style: solid; border-width: 5px;"';}else{$objetoactivo = '';}
echo '<td '.$objetoactivo.' align="center" bgcolor="'.$colorfondo.'" width="'.$anchocelda.'"><a href="'.$url_sw.'">LAN 4</a></td>';
//---------------------------------------------
echo '<td align="center" width="10" class="maintitle">&nbsp;</td>';
//------------------------ 5 ------------------
$cnssql= $mysqli->query("SELECT * FROM ".$prefixsql."ita_caracteristicas where idactivo = '".$_GET["id"]."' and opcion = 'WAN1'");
$row = mysqli_fetch_assoc($cnssql);

$existe = $cnssql->num_rows;


if ($existe > '0')
{
	$dbopcion = $row["opcion"]; $dbvalor = $row["valor"]; $dbidcaracteristica = $row["id"];
	$url_sw = 'index.php?module=lnxit&section=activos&ss=caracteristicas&id='.$_GET["id"].'&sc='.$dbopcion;
	$colorfondo = $coloractivo;
}
else
{
	$url_sw = 'index.php?module=lnxit&section=activos&ss=caracteristicas&action=new&id='.$_GET["id"].'&scaracteristica=WAN1';
	$colorfondo = $colorapagado;
}


if($_GET[sc] == 'WAN1'){$objetoactivo = 'style="border-style: solid; border-width: 5px;"';}else{$objetoactivo = '';}
echo '<td '.$objetoactivo.' align="center" bgcolor="'.$colorfondo.'" width="'.$anchocelda.'"><a href="'.$url_sw.'">WAN</a></td>';
//---------------------------------------------
echo '<td align="center" width="10" class="maintitle">&nbsp;</td>';
//------------------------ 6 ------------------
$cnssql= $mysqli->query("SELECT * FROM ".$prefixsql."ita_caracteristicas where idactivo = '".$_GET["id"]."' and opcion = 'WIFI1'");
$row = mysqli_fetch_assoc($cnssql);

$existe = $cnssql->num_rows;


if ($existe > '0')
{
	$dbopcion = $row["opcion"]; $dbvalor = $row["valor"]; $dbidcaracteristica = $row["id"];
	$url_sw = 'index.php?module=lnxit&section=activos&ss=caracteristicas&id='.$_GET["id"].'&sc='.$dbopcion;
	$colorfondo = $coloractivo;
}
else
{
	$url_sw = 'index.php?module=lnxit&section=activos&ss=caracteristicas&action=new&id='.$_GET["id"].'&scaracteristica=WIFI1';
	$colorfondo = $colorapagado;
}


if($_GET[sc] == 'WIFI1'){$objetoactivo = 'style="border-style: solid; border-width: 5px;"';}else{$objetoactivo = '';}
echo '<td '.$objetoactivo.' align="center" bgcolor="'.$colorfondo.'" width="'.$anchocelda.'"><a href="'.$url_sw.'">WIFI</a></td>';
//---------------------------------------------



?>
	

	<td align="center" width="10" class="maintitle">&nbsp;</td>
	
	
	
</tr>

</table>
<p>&nbsp;</p>
</div>