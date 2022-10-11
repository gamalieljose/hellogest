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

$cnssql= $mysqli->query("SELECT * FROM ".$prefixsql."ita_caracteristicas where idactivo = '".$_GET["id"]."' and opcion = 'SW1'");
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
	$url_sw = 'index.php?module=lnxit&section=activos&ss=caracteristicas&action=new&id='.$_GET["id"].'&scaracteristica=SW2';
	$colorfondo = $colorapagado;
}


if($_GET[sc] == 'SW1'){$objetoactivo = 'style="border-style: solid; border-width: 5px;"';}else{$objetoactivo = '';}
echo '<td '.$objetoactivo.' align="center" bgcolor="'.$colorfondo.'" width="'.$anchocelda.'"><a href="'.$url_sw.'">1</a></td>';
	
	
	
$cnssql= $mysqli->query("SELECT * FROM ".$prefixsql."ita_caracteristicas where idactivo = '".$_GET["id"]."' and opcion = 'SW2'");
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
	$url_sw = 'index.php?module=lnxit&section=activos&ss=caracteristicas&action=new&id='.$_GET["id"].'&scaracteristica=SW2';
	$colorfondo = $colorapagado;
}

if($_GET[sc] == 'SW2'){$objetoactivo = 'style="border-style: solid; border-width: 5px;"';}else{$objetoactivo = '';}
echo '<td '.$objetoactivo.' align="center" bgcolor="'.$colorfondo.'" width="'.$anchocelda.'"><a href="'.$url_sw.'">2</a></td>';

//------------------------ 3 ------------------
$cnssql= $mysqli->query("SELECT * FROM ".$prefixsql."ita_caracteristicas where idactivo = '".$_GET["id"]."' and opcion = 'SW3'");
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
	$url_sw = 'index.php?module=lnxit&section=activos&ss=caracteristicas&action=new&id='.$_GET["id"].'&scaracteristica=SW3';
	$colorfondo = $colorapagado;
}


if($_GET[sc] == 'SW3'){$objetoactivo = 'style="border-style: solid; border-width: 5px;"';}else{$objetoactivo = '';}
echo '<td '.$objetoactivo.' align="center" bgcolor="'.$colorfondo.'" width="'.$anchocelda.'"><a href="'.$url_sw.'">3</a></td>';
//---------------------------------------------

//------------------------ 4 ------------------
$cnssql= $mysqli->query("SELECT * FROM ".$prefixsql."ita_caracteristicas where idactivo = '".$_GET["id"]."' and opcion = 'SW4'");
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
	$url_sw = 'index.php?module=lnxit&section=activos&ss=caracteristicas&action=new&id='.$_GET["id"].'&scaracteristica=SW4';
	$colorfondo = $colorapagado;
}


if($_GET[sc] == 'SW4'){$objetoactivo = 'style="border-style: solid; border-width: 5px;"';}else{$objetoactivo = '';}
echo '<td '.$objetoactivo.' align="center" bgcolor="'.$colorfondo.'" width="'.$anchocelda.'"><a href="'.$url_sw.'">4</a></td>';
//---------------------------------------------

//------------------------ 5 ------------------
$cnssql= $mysqli->query("SELECT * FROM ".$prefixsql."ita_caracteristicas where idactivo = '".$_GET["id"]."' and opcion = 'SW5'");
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
	$url_sw = 'index.php?module=lnxit&section=activos&ss=caracteristicas&action=new&id='.$_GET["id"].'&scaracteristica=SW5';
	$colorfondo = $colorapagado;
}


if($_GET[sc] == 'SW5'){$objetoactivo = 'style="border-style: solid; border-width: 5px;"';}else{$objetoactivo = '';}
echo '<td '.$objetoactivo.' align="center" bgcolor="'.$colorfondo.'" width="'.$anchocelda.'"><a href="'.$url_sw.'">5</a></td>';
//---------------------------------------------

//------------------------ 6 ------------------
$cnssql= $mysqli->query("SELECT * FROM ".$prefixsql."ita_caracteristicas where idactivo = '".$_GET["id"]."' and opcion = 'SW6'");
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
	$url_sw = 'index.php?module=lnxit&section=activos&ss=caracteristicas&action=new&id='.$_GET["id"].'&scaracteristica=SW6';
	$colorfondo = $colorapagado;
}


if($_GET[sc] == 'SW6'){$objetoactivo = 'style="border-style: solid; border-width: 5px;"';}else{$objetoactivo = '';}
echo '<td '.$objetoactivo.' align="center" bgcolor="'.$colorfondo.'" width="'.$anchocelda.'"><a href="'.$url_sw.'">6</a></td>';
//---------------------------------------------

//------------------------ 7 ------------------
$cnssql= $mysqli->query("SELECT * FROM ".$prefixsql."ita_caracteristicas where idactivo = '".$_GET["id"]."' and opcion = 'SW7'");
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
	$url_sw = 'index.php?module=lnxit&section=activos&ss=caracteristicas&action=new&id='.$_GET["id"].'&scaracteristica=SW7';
	$colorfondo = $colorapagado;
}


if($_GET[sc] == 'SW7'){$objetoactivo = 'style="border-style: solid; border-width: 5px;"';}else{$objetoactivo = '';}
echo '<td '.$objetoactivo.' align="center" bgcolor="'.$colorfondo.'" width="'.$anchocelda.'"><a href="'.$url_sw.'">7</a></td>';
//---------------------------------------------

//------------------------ 8 ------------------
$cnssql= $mysqli->query("SELECT * FROM ".$prefixsql."ita_caracteristicas where idactivo = '".$_GET["id"]."' and opcion = 'SW8'");
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
	$url_sw = 'index.php?module=lnxit&section=activos&ss=caracteristicas&action=new&id='.$_GET["id"].'&scaracteristica=SW8';
	$colorfondo = $colorapagado;
}


if($_GET[sc] == 'SW8'){$objetoactivo = 'style="border-style: solid; border-width: 5px;"';}else{$objetoactivo = '';}
echo '<td '.$objetoactivo.' align="center" bgcolor="'.$colorfondo.'" width="'.$anchocelda.'"><a href="'.$url_sw.'">8</a></td>';
//---------------------------------------------
?>


	

	<td align="center" width="10" class="maintitle">&nbsp;</td>
	
	
	
</tr>

</table>
<p>&nbsp;</p>
</div>