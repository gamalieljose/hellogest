<?php
// ------------------------------
$lbl_caracteristica = "Toma de red";
$lbl_valor1 = "Caracteristica";
$lbl_valor2 = "Valor";

//------------------------------


$cnssql= $mysqli->query("SELECT * FROM ".$prefixsql."ita_activos where id = '".$_GET["id"]."'");
$row = mysqli_fetch_assoc($cnssql);

$dbnombre = $row["nombre"];


	echo '<p>Plantilla SW 48 PORTS</p>';
	
	$colorapagado = "#FA5882";
	$coloractivo = "#56F590";
	
?>
<div align="center">
<?php $anchocelda = 50; ?>
<table border="1">
<tr class="maintitle"><td colspan="34"><?php echo $dbnombre; ?> </tr></tr>
<tr>
<?php
//------------------------ 1-1 ------------------
$cnssql= $mysqli->query("SELECT * FROM ".$prefixsql."ita_caracteristicas where idactivo = '".$_GET["id"]."' and opcion = 'SW1'");
$row = mysqli_fetch_assoc($cnssql);

$existe = $cnssql->num_rows;


if ($existe > '0')
{
	$dbopcion = $row["opcion"]; $dbvalor = $row["valor"]; $dbidcaracteristica = $row["id"];
	$url_sw = 'index.php?module=lnxit&section=activos&ss=caracteristicas&id='.$_GET["id"].'&sc='.$dbopcion;
	//$colorfondo = $row["color"];
	$colorfondo = $row["color"];
}
else
{
	$url_sw = 'index.php?module=lnxit&section=activos&ss=caracteristicas&action=new&id='.$_GET["id"].'&scaracteristica=SW1';
	$colorfondo = $colorapagado;
}

if($_GET[sc] == 'SW1'){$objetoactivo = 'style="border-style: solid; border-width: 5px;"';}else{$objetoactivo = '';}
echo '<td '.$objetoactivo.' align="center" bgcolor="'.$colorfondo.'" width="'.$anchocelda.'"><a href="'.$url_sw.'">1</a></td>';
//----------------------------------------------

//------------------------ 1-2 ------------------
	
$cnssql= $mysqli->query("SELECT * FROM ".$prefixsql."ita_caracteristicas where idactivo = '".$_GET["id"]."' and opcion = 'SW3'");
$row = mysqli_fetch_assoc($cnssql);

$existe = $cnssql->num_rows;


if ($existe > '0')
{
	$dbopcion = $row["opcion"]; $dbvalor = $row["valor"]; $dbidcaracteristica = $row["id"];
	$url_sw = 'index.php?module=lnxit&section=activos&ss=caracteristicas&id='.$_GET["id"].'&sc='.$dbopcion;
	$colorfondo = $row["color"];	
}
else
{
	$url_sw = 'index.php?module=lnxit&section=activos&ss=caracteristicas&action=new&id='.$_GET["id"].'&scaracteristica=SW3';
	$colorfondo = $colorapagado;
}

if($_GET[sc] == 'SW3'){$objetoactivo = 'style="border-style: solid; border-width: 5px;"';}else{$objetoactivo = '';}
echo '<td '.$objetoactivo.' align="center" bgcolor="'.$colorfondo.'" width="'.$anchocelda.'"><a href="'.$url_sw.'">3</a></td>';
//---------------------------------------------

//------------------------ 1-3 ------------------
$cnssql= $mysqli->query("SELECT * FROM ".$prefixsql."ita_caracteristicas where idactivo = '".$_GET["id"]."' and opcion = 'SW5'");
$row = mysqli_fetch_assoc($cnssql);

$existe = $cnssql->num_rows;


if ($existe > '0')
{
	$dbopcion = $row["opcion"]; $dbvalor = $row["valor"]; $dbidcaracteristica = $row["id"];
	$url_sw = 'index.php?module=lnxit&section=activos&ss=caracteristicas&id='.$_GET["id"].'&sc='.$dbopcion;
	$colorfondo = $row["color"];
}
else
{
	$url_sw = 'index.php?module=lnxit&section=activos&ss=caracteristicas&action=new&id='.$_GET["id"].'&scaracteristica=SW5';
	$colorfondo = $colorapagado;
}


if($_GET[sc] == 'SW5'){$objetoactivo = 'style="border-style: solid; border-width: 5px;"';}else{$objetoactivo = '';}
echo '<td '.$objetoactivo.' align="center" bgcolor="'.$colorfondo.'" width="'.$anchocelda.'"><a href="'.$url_sw.'">5</a></td>';
//---------------------------------------------

//------------------------ 1-4 ------------------
$cnssql= $mysqli->query("SELECT * FROM ".$prefixsql."ita_caracteristicas where idactivo = '".$_GET["id"]."' and opcion = 'SW7'");
$row = mysqli_fetch_assoc($cnssql);

$existe = $cnssql->num_rows;


if ($existe > '0')
{
	$dbopcion = $row["opcion"]; $dbvalor = $row["valor"]; $dbidcaracteristica = $row["id"];
	$url_sw = 'index.php?module=lnxit&section=activos&ss=caracteristicas&id='.$_GET["id"].'&sc='.$dbopcion;
	$colorfondo = $row["color"];
}
else
{
	$url_sw = 'index.php?module=lnxit&section=activos&ss=caracteristicas&action=new&id='.$_GET["id"].'&scaracteristica=SW7';
	$colorfondo = $colorapagado;
}


if($_GET[sc] == 'SW7'){$objetoactivo = 'style="border-style: solid; border-width: 5px;"';}else{$objetoactivo = '';}
echo '<td '.$objetoactivo.' align="center" bgcolor="'.$colorfondo.'" width="'.$anchocelda.'"><a href="'.$url_sw.'">7</a></td>';
//---------------------------------------------

//------------------------ 1-5 ------------------
$cnssql= $mysqli->query("SELECT * FROM ".$prefixsql."ita_caracteristicas where idactivo = '".$_GET["id"]."' and opcion = 'SW9'");
$row = mysqli_fetch_assoc($cnssql);

$existe = $cnssql->num_rows;


if ($existe > '0')
{
	$dbopcion = $row["opcion"]; $dbvalor = $row["valor"]; $dbidcaracteristica = $row["id"];
	$url_sw = 'index.php?module=lnxit&section=activos&ss=caracteristicas&id='.$_GET["id"].'&sc='.$dbopcion;
	$colorfondo = $row["color"];
}
else
{
	$url_sw = 'index.php?module=lnxit&section=activos&ss=caracteristicas&action=new&id='.$_GET["id"].'&scaracteristica=SW9';
	$colorfondo = $colorapagado;
}


if($_GET[sc] == 'SW9'){$objetoactivo = 'style="border-style: solid; border-width: 5px;"';}else{$objetoactivo = '';}
echo '<td '.$objetoactivo.' align="center" bgcolor="'.$colorfondo.'" width="'.$anchocelda.'"><a href="'.$url_sw.'">9</a></td>';
//---------------------------------------------

//------------------------ 1-6 ------------------
$cnssql= $mysqli->query("SELECT * FROM ".$prefixsql."ita_caracteristicas where idactivo = '".$_GET["id"]."' and opcion = 'SW11'");
$row = mysqli_fetch_assoc($cnssql);

$existe = $cnssql->num_rows;


if ($existe > '0')
{
	$dbopcion = $row["opcion"]; $dbvalor = $row["valor"]; $dbidcaracteristica = $row["id"];
	$url_sw = 'index.php?module=lnxit&section=activos&ss=caracteristicas&id='.$_GET["id"].'&sc='.$dbopcion;
	$colorfondo = $row["color"];
}
else
{
	$url_sw = 'index.php?module=lnxit&section=activos&ss=caracteristicas&action=new&id='.$_GET["id"].'&scaracteristica=SW11';
	$colorfondo = $colorapagado;
}


if($_GET[sc] == 'SW11'){$objetoactivo = 'style="border-style: solid; border-width: 5px;"';}else{$objetoactivo = '';}
echo '<td '.$objetoactivo.' align="center" bgcolor="'.$colorfondo.'" width="'.$anchocelda.'"><a href="'.$url_sw.'">11</a></td>';
//---------------------------------------------

?>
	<td align="center" width="10" class="maintitle">&nbsp;</td>

<?php
//------------------------ 1-7 ------------------
$cnssql= $mysqli->query("SELECT * FROM ".$prefixsql."ita_caracteristicas where idactivo = '".$_GET["id"]."' and opcion = 'SW13'");
$row = mysqli_fetch_assoc($cnssql);

$existe = $cnssql->num_rows;


if ($existe > '0')
{
	$dbopcion = $row["opcion"]; $dbvalor = $row["valor"]; $dbidcaracteristica = $row["id"];
	$url_sw = 'index.php?module=lnxit&section=activos&ss=caracteristicas&id='.$_GET["id"].'&sc='.$dbopcion;
	$colorfondo = $row["color"];
}
else
{
	$url_sw = 'index.php?module=lnxit&section=activos&ss=caracteristicas&action=new&id='.$_GET["id"].'&scaracteristica=SW13';
	$colorfondo = $colorapagado;
}


if($_GET[sc] == 'SW13'){$objetoactivo = 'style="border-style: solid; border-width: 5px;"';}else{$objetoactivo = '';}
echo '<td '.$objetoactivo.' align="center" bgcolor="'.$colorfondo.'" width="'.$anchocelda.'"><a href="'.$url_sw.'">13</a></td>';
//----------------------------------------------

//------------------------ 1-8 ------------------
	
$cnssql= $mysqli->query("SELECT * FROM ".$prefixsql."ita_caracteristicas where idactivo = '".$_GET["id"]."' and opcion = 'SW15'");
$row = mysqli_fetch_assoc($cnssql);

$existe = $cnssql->num_rows;


if ($existe > '0')
{
	$dbopcion = $row["opcion"]; $dbvalor = $row["valor"]; $dbidcaracteristica = $row["id"];
	$url_sw = 'index.php?module=lnxit&section=activos&ss=caracteristicas&id='.$_GET["id"].'&sc='.$dbopcion;
	$colorfondo = $row["color"];	
}
else
{
	$url_sw = 'index.php?module=lnxit&section=activos&ss=caracteristicas&action=new&id='.$_GET["id"].'&scaracteristica=SW15';
	$colorfondo = $colorapagado;
}

if($_GET[sc] == 'SW15'){$objetoactivo = 'style="border-style: solid; border-width: 5px;"';}else{$objetoactivo = '';}
echo '<td '.$objetoactivo.' align="center" bgcolor="'.$colorfondo.'" width="'.$anchocelda.'"><a href="'.$url_sw.'">15</a></td>';
//---------------------------------------------

//------------------------ 1-9 ------------------
$cnssql= $mysqli->query("SELECT * FROM ".$prefixsql."ita_caracteristicas where idactivo = '".$_GET["id"]."' and opcion = 'SW17'");
$row = mysqli_fetch_assoc($cnssql);

$existe = $cnssql->num_rows;


if ($existe > '0')
{
	$dbopcion = $row["opcion"]; $dbvalor = $row["valor"]; $dbidcaracteristica = $row["id"];
	$url_sw = 'index.php?module=lnxit&section=activos&ss=caracteristicas&id='.$_GET["id"].'&sc='.$dbopcion;
	$colorfondo = $row["color"];
}
else
{
	$url_sw = 'index.php?module=lnxit&section=activos&ss=caracteristicas&action=new&id='.$_GET["id"].'&scaracteristica=SW17';
	$colorfondo = $colorapagado;
}


if($_GET[sc] == 'SW17'){$objetoactivo = 'style="border-style: solid; border-width: 5px;"';}else{$objetoactivo = '';}
echo '<td '.$objetoactivo.' align="center" bgcolor="'.$colorfondo.'" width="'.$anchocelda.'"><a href="'.$url_sw.'">17</a></td>';
//---------------------------------------------

//------------------------ 1-10 ------------------
$cnssql= $mysqli->query("SELECT * FROM ".$prefixsql."ita_caracteristicas where idactivo = '".$_GET["id"]."' and opcion = 'SW19'");
$row = mysqli_fetch_assoc($cnssql);

$existe = $cnssql->num_rows;


if ($existe > '0')
{
	$dbopcion = $row["opcion"]; $dbvalor = $row["valor"]; $dbidcaracteristica = $row["id"];
	$url_sw = 'index.php?module=lnxit&section=activos&ss=caracteristicas&id='.$_GET["id"].'&sc='.$dbopcion;
	$colorfondo = $row["color"];
}
else
{
	$url_sw = 'index.php?module=lnxit&section=activos&ss=caracteristicas&action=new&id='.$_GET["id"].'&scaracteristica=SW19';
	$colorfondo = $colorapagado;
}


if($_GET[sc] == 'SW19'){$objetoactivo = 'style="border-style: solid; border-width: 5px;"';}else{$objetoactivo = '';}
echo '<td '.$objetoactivo.' align="center" bgcolor="'.$colorfondo.'" width="'.$anchocelda.'"><a href="'.$url_sw.'">19</a></td>';
//---------------------------------------------

//------------------------ 1-11 ------------------
$cnssql= $mysqli->query("SELECT * FROM ".$prefixsql."ita_caracteristicas where idactivo = '".$_GET["id"]."' and opcion = 'SW21'");
$row = mysqli_fetch_assoc($cnssql);

$existe = $cnssql->num_rows;


if ($existe > '0')
{
	$dbopcion = $row["opcion"]; $dbvalor = $row["valor"]; $dbidcaracteristica = $row["id"];
	$url_sw = 'index.php?module=lnxit&section=activos&ss=caracteristicas&id='.$_GET["id"].'&sc='.$dbopcion;
	$colorfondo = $row["color"];
}
else
{
	$url_sw = 'index.php?module=lnxit&section=activos&ss=caracteristicas&action=new&id='.$_GET["id"].'&scaracteristica=SW21';
	$colorfondo = $colorapagado;
}


if($_GET[sc] == 'SW21'){$objetoactivo = 'style="border-style: solid; border-width: 5px;"';}else{$objetoactivo = '';}
echo '<td '.$objetoactivo.' align="center" bgcolor="'.$colorfondo.'" width="'.$anchocelda.'"><a href="'.$url_sw.'">21</a></td>';
//---------------------------------------------

//------------------------ 1-12 ------------------
$cnssql= $mysqli->query("SELECT * FROM ".$prefixsql."ita_caracteristicas where idactivo = '".$_GET["id"]."' and opcion = 'SW23'");
$row = mysqli_fetch_assoc($cnssql);

$existe = $cnssql->num_rows;


if ($existe > '0')
{
	$dbopcion = $row["opcion"]; $dbvalor = $row["valor"]; $dbidcaracteristica = $row["id"];
	$url_sw = 'index.php?module=lnxit&section=activos&ss=caracteristicas&id='.$_GET["id"].'&sc='.$dbopcion;
	$colorfondo = $row["color"];
}
else
{
	$url_sw = 'index.php?module=lnxit&section=activos&ss=caracteristicas&action=new&id='.$_GET["id"].'&scaracteristica=SW23';
	$colorfondo = $colorapagado;
}


if($_GET[sc] == 'SW23'){$objetoactivo = 'style="border-style: solid; border-width: 5px;"';}else{$objetoactivo = '';}
echo '<td '.$objetoactivo.' align="center" bgcolor="'.$colorfondo.'" width="'.$anchocelda.'"><a href="'.$url_sw.'">23</a></td>';
//---------------------------------------------

?>
	<td align="center" width="10" class="maintitle">&nbsp;</td>
	
<?php
//------------------------ 1-13 ------------------
$cnssql= $mysqli->query("SELECT * FROM ".$prefixsql."ita_caracteristicas where idactivo = '".$_GET["id"]."' and opcion = 'SW25'");
$row = mysqli_fetch_assoc($cnssql);

$existe = $cnssql->num_rows;


if ($existe > '0')
{
	$dbopcion = $row["opcion"]; $dbvalor = $row["valor"]; $dbidcaracteristica = $row["id"];
	$url_sw = 'index.php?module=lnxit&section=activos&ss=caracteristicas&id='.$_GET["id"].'&sc='.$dbopcion;
	$colorfondo = $row["color"];
}
else
{
	$url_sw = 'index.php?module=lnxit&section=activos&ss=caracteristicas&action=new&id='.$_GET["id"].'&scaracteristica=SW25';
	$colorfondo = $colorapagado;
}


if($_GET[sc] == 'SW25'){$objetoactivo = 'style="border-style: solid; border-width: 5px;"';}else{$objetoactivo = '';}
echo '<td '.$objetoactivo.' align="center" bgcolor="'.$colorfondo.'" width="'.$anchocelda.'"><a href="'.$url_sw.'">25</a></td>';
//----------------------------------------------

//------------------------ 1-14 ------------------
	
$cnssql= $mysqli->query("SELECT * FROM ".$prefixsql."ita_caracteristicas where idactivo = '".$_GET["id"]."' and opcion = 'SW27'");
$row = mysqli_fetch_assoc($cnssql);

$existe = $cnssql->num_rows;


if ($existe > '0')
{
	$dbopcion = $row["opcion"]; $dbvalor = $row["valor"]; $dbidcaracteristica = $row["id"];
	$url_sw = 'index.php?module=lnxit&section=activos&ss=caracteristicas&id='.$_GET["id"].'&sc='.$dbopcion;
	$colorfondo = $row["color"];	
}
else
{
	$url_sw = 'index.php?module=lnxit&section=activos&ss=caracteristicas&action=new&id='.$_GET["id"].'&scaracteristica=SW27';
	$colorfondo = $colorapagado;
}

if($_GET[sc] == 'SW27'){$objetoactivo = 'style="border-style: solid; border-width: 5px;"';}else{$objetoactivo = '';}
echo '<td '.$objetoactivo.' align="center" bgcolor="'.$colorfondo.'" width="'.$anchocelda.'"><a href="'.$url_sw.'">27</a></td>';
//---------------------------------------------

//------------------------ 1-15 ------------------
$cnssql= $mysqli->query("SELECT * FROM ".$prefixsql."ita_caracteristicas where idactivo = '".$_GET["id"]."' and opcion = 'SW29'");
$row = mysqli_fetch_assoc($cnssql);

$existe = $cnssql->num_rows;


if ($existe > '0')
{
	$dbopcion = $row["opcion"]; $dbvalor = $row["valor"]; $dbidcaracteristica = $row["id"];
	$url_sw = 'index.php?module=lnxit&section=activos&ss=caracteristicas&id='.$_GET["id"].'&sc='.$dbopcion;
	$colorfondo = $row["color"];
}
else
{
	$url_sw = 'index.php?module=lnxit&section=activos&ss=caracteristicas&action=new&id='.$_GET["id"].'&scaracteristica=SW29';
	$colorfondo = $colorapagado;
}


if($_GET[sc] == 'SW29'){$objetoactivo = 'style="border-style: solid; border-width: 5px;"';}else{$objetoactivo = '';}
echo '<td '.$objetoactivo.' align="center" bgcolor="'.$colorfondo.'" width="'.$anchocelda.'"><a href="'.$url_sw.'">29</a></td>';
//---------------------------------------------

//------------------------ 1-16 ------------------
$cnssql= $mysqli->query("SELECT * FROM ".$prefixsql."ita_caracteristicas where idactivo = '".$_GET["id"]."' and opcion = 'SW31'");
$row = mysqli_fetch_assoc($cnssql);

$existe = $cnssql->num_rows;


if ($existe > '0')
{
	$dbopcion = $row["opcion"]; $dbvalor = $row["valor"]; $dbidcaracteristica = $row["id"];
	$url_sw = 'index.php?module=lnxit&section=activos&ss=caracteristicas&id='.$_GET["id"].'&sc='.$dbopcion;
	$colorfondo = $row["color"];
}
else
{
	$url_sw = 'index.php?module=lnxit&section=activos&ss=caracteristicas&action=new&id='.$_GET["id"].'&scaracteristica=SW31';
	$colorfondo = $colorapagado;
}


if($_GET[sc] == 'SW31'){$objetoactivo = 'style="border-style: solid; border-width: 5px;"';}else{$objetoactivo = '';}
echo '<td '.$objetoactivo.' align="center" bgcolor="'.$colorfondo.'" width="'.$anchocelda.'"><a href="'.$url_sw.'">31</a></td>';
//---------------------------------------------

//------------------------ 1-17 ------------------
$cnssql= $mysqli->query("SELECT * FROM ".$prefixsql."ita_caracteristicas where idactivo = '".$_GET["id"]."' and opcion = 'SW33'");
$row = mysqli_fetch_assoc($cnssql);

$existe = $cnssql->num_rows;


if ($existe > '0')
{
	$dbopcion = $row["opcion"]; $dbvalor = $row["valor"]; $dbidcaracteristica = $row["id"];
	$url_sw = 'index.php?module=lnxit&section=activos&ss=caracteristicas&id='.$_GET["id"].'&sc='.$dbopcion;
	$colorfondo = $row["color"];
}
else
{
	$url_sw = 'index.php?module=lnxit&section=activos&ss=caracteristicas&action=new&id='.$_GET["id"].'&scaracteristica=SW33';
	$colorfondo = $colorapagado;
}


if($_GET[sc] == 'SW33'){$objetoactivo = 'style="border-style: solid; border-width: 5px;"';}else{$objetoactivo = '';}
echo '<td '.$objetoactivo.' align="center" bgcolor="'.$colorfondo.'" width="'.$anchocelda.'"><a href="'.$url_sw.'">33</a></td>';
//---------------------------------------------

//------------------------ 1-18 ------------------
$cnssql= $mysqli->query("SELECT * FROM ".$prefixsql."ita_caracteristicas where idactivo = '".$_GET["id"]."' and opcion = 'SW35'");
$row = mysqli_fetch_assoc($cnssql);

$existe = $cnssql->num_rows;


if ($existe > '0')
{
	$dbopcion = $row["opcion"]; $dbvalor = $row["valor"]; $dbidcaracteristica = $row["id"];
	$url_sw = 'index.php?module=lnxit&section=activos&ss=caracteristicas&id='.$_GET["id"].'&sc='.$dbopcion;
	$colorfondo = $row["color"];
}
else
{
	$url_sw = 'index.php?module=lnxit&section=activos&ss=caracteristicas&action=new&id='.$_GET["id"].'&scaracteristica=SW35';
	$colorfondo = $colorapagado;
}


if($_GET[sc] == 'SW35'){$objetoactivo = 'style="border-style: solid; border-width: 5px;"';}else{$objetoactivo = '';}
echo '<td '.$objetoactivo.' align="center" bgcolor="'.$colorfondo.'" width="'.$anchocelda.'"><a href="'.$url_sw.'">35</a></td>';
//---------------------------------------------

?>
	<td align="center" width="10" class="maintitle">&nbsp;</td>
	
<?php
//------------------------ 1-19 ------------------
$cnssql= $mysqli->query("SELECT * FROM ".$prefixsql."ita_caracteristicas where idactivo = '".$_GET["id"]."' and opcion = 'SW37'");
$row = mysqli_fetch_assoc($cnssql);

$existe = $cnssql->num_rows;


if ($existe > '0')
{
	$dbopcion = $row["opcion"]; $dbvalor = $row["valor"]; $dbidcaracteristica = $row["id"];
	$url_sw = 'index.php?module=lnxit&section=activos&ss=caracteristicas&id='.$_GET["id"].'&sc='.$dbopcion;
	$colorfondo = $row["color"];
}
else
{
	$url_sw = 'index.php?module=lnxit&section=activos&ss=caracteristicas&action=new&id='.$_GET["id"].'&scaracteristica=SW37';
	$colorfondo = $colorapagado;
}


if($_GET[sc] == 'SW37'){$objetoactivo = 'style="border-style: solid; border-width: 5px;"';}else{$objetoactivo = '';}
echo '<td '.$objetoactivo.' align="center" bgcolor="'.$colorfondo.'" width="'.$anchocelda.'"><a href="'.$url_sw.'">37</a></td>';
//----------------------------------------------

//------------------------ 1-20 ------------------
	
$cnssql= $mysqli->query("SELECT * FROM ".$prefixsql."ita_caracteristicas where idactivo = '".$_GET["id"]."' and opcion = 'SW39'");
$row = mysqli_fetch_assoc($cnssql);

$existe = $cnssql->num_rows;


if ($existe > '0')
{
	$dbopcion = $row["opcion"]; $dbvalor = $row["valor"]; $dbidcaracteristica = $row["id"];
	$url_sw = 'index.php?module=lnxit&section=activos&ss=caracteristicas&id='.$_GET["id"].'&sc='.$dbopcion;
	$colorfondo = $row["color"];	
}
else
{
	$url_sw = 'index.php?module=lnxit&section=activos&ss=caracteristicas&action=new&id='.$_GET["id"].'&scaracteristica=SW39';
	$colorfondo = $colorapagado;
}

if($_GET[sc] == 'SW39'){$objetoactivo = 'style="border-style: solid; border-width: 5px;"';}else{$objetoactivo = '';}
echo '<td '.$objetoactivo.' align="center" bgcolor="'.$colorfondo.'" width="'.$anchocelda.'"><a href="'.$url_sw.'">39</a></td>';
//---------------------------------------------

//------------------------ 1-21 ------------------
$cnssql= $mysqli->query("SELECT * FROM ".$prefixsql."ita_caracteristicas where idactivo = '".$_GET["id"]."' and opcion = 'SW41'");
$row = mysqli_fetch_assoc($cnssql);

$existe = $cnssql->num_rows;


if ($existe > '0')
{
	$dbopcion = $row["opcion"]; $dbvalor = $row["valor"]; $dbidcaracteristica = $row["id"];
	$url_sw = 'index.php?module=lnxit&section=activos&ss=caracteristicas&id='.$_GET["id"].'&sc='.$dbopcion;
	$colorfondo = $row["color"];
}
else
{
	$url_sw = 'index.php?module=lnxit&section=activos&ss=caracteristicas&action=new&id='.$_GET["id"].'&scaracteristica=SW41';
	$colorfondo = $colorapagado;
}


if($_GET[sc] == 'SW41'){$objetoactivo = 'style="border-style: solid; border-width: 5px;"';}else{$objetoactivo = '';}
echo '<td '.$objetoactivo.' align="center" bgcolor="'.$colorfondo.'" width="'.$anchocelda.'"><a href="'.$url_sw.'">41</a></td>';
//---------------------------------------------

//------------------------ 1-22 ------------------
$cnssql= $mysqli->query("SELECT * FROM ".$prefixsql."ita_caracteristicas where idactivo = '".$_GET["id"]."' and opcion = 'SW43'");
$row = mysqli_fetch_assoc($cnssql);

$existe = $cnssql->num_rows;


if ($existe > '0')
{
	$dbopcion = $row["opcion"]; $dbvalor = $row["valor"]; $dbidcaracteristica = $row["id"];
	$url_sw = 'index.php?module=lnxit&section=activos&ss=caracteristicas&id='.$_GET["id"].'&sc='.$dbopcion;
	$colorfondo = $row["color"];
}
else
{
	$url_sw = 'index.php?module=lnxit&section=activos&ss=caracteristicas&action=new&id='.$_GET["id"].'&scaracteristica=SW43';
	$colorfondo = $colorapagado;
}


if($_GET[sc] == 'SW43'){$objetoactivo = 'style="border-style: solid; border-width: 5px;"';}else{$objetoactivo = '';}
echo '<td '.$objetoactivo.' align="center" bgcolor="'.$colorfondo.'" width="'.$anchocelda.'"><a href="'.$url_sw.'">43</a></td>';
//---------------------------------------------

//------------------------ 1-23 ------------------
$cnssql= $mysqli->query("SELECT * FROM ".$prefixsql."ita_caracteristicas where idactivo = '".$_GET["id"]."' and opcion = 'SW45'");
$row = mysqli_fetch_assoc($cnssql);

$existe = $cnssql->num_rows;


if ($existe > '0')
{
	$dbopcion = $row["opcion"]; $dbvalor = $row["valor"]; $dbidcaracteristica = $row["id"];
	$url_sw = 'index.php?module=lnxit&section=activos&ss=caracteristicas&id='.$_GET["id"].'&sc='.$dbopcion;
	$colorfondo = $row["color"];
}
else
{
	$url_sw = 'index.php?module=lnxit&section=activos&ss=caracteristicas&action=new&id='.$_GET["id"].'&scaracteristica=SW45';
	$colorfondo = $colorapagado;
}


if($_GET[sc] == 'SW45'){$objetoactivo = 'style="border-style: solid; border-width: 5px;"';}else{$objetoactivo = '';}
echo '<td '.$objetoactivo.' align="center" bgcolor="'.$colorfondo.'" width="'.$anchocelda.'"><a href="'.$url_sw.'">45</a></td>';
//---------------------------------------------

//------------------------ 1-24 ------------------
$cnssql= $mysqli->query("SELECT * FROM ".$prefixsql."ita_caracteristicas where idactivo = '".$_GET["id"]."' and opcion = 'SW47'");
$row = mysqli_fetch_assoc($cnssql);

$existe = $cnssql->num_rows;


if ($existe > '0')
{
	$dbopcion = $row["opcion"]; $dbvalor = $row["valor"]; $dbidcaracteristica = $row["id"];
	$url_sw = 'index.php?module=lnxit&section=activos&ss=caracteristicas&id='.$_GET["id"].'&sc='.$dbopcion;
	$colorfondo = $row["color"];
}
else
{
	$url_sw = 'index.php?module=lnxit&section=activos&ss=caracteristicas&action=new&id='.$_GET["id"].'&scaracteristica=SW47';
	$colorfondo = $colorapagado;
}


if($_GET[sc] == 'SW47'){$objetoactivo = 'style="border-style: solid; border-width: 5px;"';}else{$objetoactivo = '';}
echo '<td '.$objetoactivo.' align="center" bgcolor="'.$colorfondo.'" width="'.$anchocelda.'"><a href="'.$url_sw.'">47</a></td>';
//---------------------------------------------

?>
	<td align="center" width="10" class="maintitle">&nbsp;</td>
	
</tr>


<tr>
<?php
//------------------------ 2-1 ------------------
$cnssql= $mysqli->query("SELECT * FROM ".$prefixsql."ita_caracteristicas where idactivo = '".$_GET["id"]."' and opcion = 'SW2'");
$row = mysqli_fetch_assoc($cnssql);

$existe = $cnssql->num_rows;


if ($existe > '0')
{
	$dbopcion = $row["opcion"]; $dbvalor = $row["valor"]; $dbidcaracteristica = $row["id"];
	$url_sw = 'index.php?module=lnxit&section=activos&ss=caracteristicas&id='.$_GET["id"].'&sc='.$dbopcion;
	$colorfondo = $row["color"];
}
else
{
	$url_sw = 'index.php?module=lnxit&section=activos&ss=caracteristicas&action=new&id='.$_GET["id"].'&scaracteristica=SW2';
	$colorfondo = $colorapagado;
}


if($_GET[sc] == 'SW2'){$objetoactivo = 'style="border-style: solid; border-width: 5px;"';}else{$objetoactivo = '';}
echo '<td '.$objetoactivo.' align="center" bgcolor="'.$colorfondo.'" width="'.$anchocelda.'"><a href="'.$url_sw.'">2</a></td>';
//----------------------------------------------

//------------------------ 2-2 ------------------
	
$cnssql= $mysqli->query("SELECT * FROM ".$prefixsql."ita_caracteristicas where idactivo = '".$_GET["id"]."' and opcion = 'SW4'");
$row = mysqli_fetch_assoc($cnssql);

$existe = $cnssql->num_rows;


if ($existe > '0')
{
	$dbopcion = $row["opcion"]; $dbvalor = $row["valor"]; $dbidcaracteristica = $row["id"];
	$url_sw = 'index.php?module=lnxit&section=activos&ss=caracteristicas&id='.$_GET["id"].'&sc='.$dbopcion;
	$colorfondo = $row["color"];	
}
else
{
	$url_sw = 'index.php?module=lnxit&section=activos&ss=caracteristicas&action=new&id='.$_GET["id"].'&scaracteristica=SW4';
	$colorfondo = $colorapagado;
}

if($_GET[sc] == 'SW4'){$objetoactivo = 'style="border-style: solid; border-width: 5px;"';}else{$objetoactivo = '';}
echo '<td '.$objetoactivo.' align="center" bgcolor="'.$colorfondo.'" width="'.$anchocelda.'"><a href="'.$url_sw.'">4</a></td>';
//---------------------------------------------

//------------------------ 2-3 ------------------
$cnssql= $mysqli->query("SELECT * FROM ".$prefixsql."ita_caracteristicas where idactivo = '".$_GET["id"]."' and opcion = 'SW6'");
$row = mysqli_fetch_assoc($cnssql);

$existe = $cnssql->num_rows;


if ($existe > '0')
{
	$dbopcion = $row["opcion"]; $dbvalor = $row["valor"]; $dbidcaracteristica = $row["id"];
	$url_sw = 'index.php?module=lnxit&section=activos&ss=caracteristicas&id='.$_GET["id"].'&sc='.$dbopcion;
	$colorfondo = $row["color"];
}
else
{
	$url_sw = 'index.php?module=lnxit&section=activos&ss=caracteristicas&action=new&id='.$_GET["id"].'&scaracteristica=SW6';
	$colorfondo = $colorapagado;
}


if($_GET[sc] == 'SW6'){$objetoactivo = 'style="border-style: solid; border-width: 5px;"';}else{$objetoactivo = '';}
echo '<td '.$objetoactivo.' align="center" bgcolor="'.$colorfondo.'" width="'.$anchocelda.'"><a href="'.$url_sw.'">6</a></td>';
//---------------------------------------------

//------------------------ 2-4 ------------------
$cnssql= $mysqli->query("SELECT * FROM ".$prefixsql."ita_caracteristicas where idactivo = '".$_GET["id"]."' and opcion = 'SW8'");
$row = mysqli_fetch_assoc($cnssql);

$existe = $cnssql->num_rows;


if ($existe > '0')
{
	$dbopcion = $row["opcion"]; $dbvalor = $row["valor"]; $dbidcaracteristica = $row["id"];
	$url_sw = 'index.php?module=lnxit&section=activos&ss=caracteristicas&id='.$_GET["id"].'&sc='.$dbopcion;
	$colorfondo = $row["color"];
}
else
{
	$url_sw = 'index.php?module=lnxit&section=activos&ss=caracteristicas&action=new&id='.$_GET["id"].'&scaracteristica=SW8';
	$colorfondo = $colorapagado;
}


if($_GET[sc] == 'SW8'){$objetoactivo = 'style="border-style: solid; border-width: 5px;"';}else{$objetoactivo = '';}
echo '<td '.$objetoactivo.' align="center" bgcolor="'.$colorfondo.'" width="'.$anchocelda.'"><a href="'.$url_sw.'">8</a></td>';
//---------------------------------------------

//------------------------ 2-5 ------------------
$cnssql= $mysqli->query("SELECT * FROM ".$prefixsql."ita_caracteristicas where idactivo = '".$_GET["id"]."' and opcion = 'SW10'");
$row = mysqli_fetch_assoc($cnssql);

$existe = $cnssql->num_rows;


if ($existe > '0')
{
	$dbopcion = $row["opcion"]; $dbvalor = $row["valor"]; $dbidcaracteristica = $row["id"];
	$url_sw = 'index.php?module=lnxit&section=activos&ss=caracteristicas&id='.$_GET["id"].'&sc='.$dbopcion;
	$colorfondo = $row["color"];
}
else
{
	$url_sw = 'index.php?module=lnxit&section=activos&ss=caracteristicas&action=new&id='.$_GET["id"].'&scaracteristica=SW10';
	$colorfondo = $colorapagado;
}


if($_GET[sc] == 'SW10'){$objetoactivo = 'style="border-style: solid; border-width: 5px;"';}else{$objetoactivo = '';}
echo '<td '.$objetoactivo.' align="center" bgcolor="'.$colorfondo.'" width="'.$anchocelda.'"><a href="'.$url_sw.'">10</a></td>';
//---------------------------------------------

//------------------------ 2-6 ------------------
$cnssql= $mysqli->query("SELECT * FROM ".$prefixsql."ita_caracteristicas where idactivo = '".$_GET["id"]."' and opcion = 'SW12'");
$row = mysqli_fetch_assoc($cnssql);

$existe = $cnssql->num_rows;


if ($existe > '0')
{
	$dbopcion = $row["opcion"]; $dbvalor = $row["valor"]; $dbidcaracteristica = $row["id"];
	$url_sw = 'index.php?module=lnxit&section=activos&ss=caracteristicas&id='.$_GET["id"].'&sc='.$dbopcion;
	$colorfondo = $row["color"];
}
else
{
	$url_sw = 'index.php?module=lnxit&section=activos&ss=caracteristicas&action=new&id='.$_GET["id"].'&scaracteristica=SW12';
	$colorfondo = $colorapagado;
}


if($_GET[sc] == 'SW12'){$objetoactivo = 'style="border-style: solid; border-width: 5px;"';}else{$objetoactivo = '';}
echo '<td '.$objetoactivo.' align="center" bgcolor="'.$colorfondo.'" width="'.$anchocelda.'"><a href="'.$url_sw.'">12</a></td>';
//---------------------------------------------

?>
	<td align="center" width="10" class="maintitle">&nbsp;</td>

<?php
//------------------------ 2-7 ------------------
$cnssql= $mysqli->query("SELECT * FROM ".$prefixsql."ita_caracteristicas where idactivo = '".$_GET["id"]."' and opcion = 'SW14'");
$row = mysqli_fetch_assoc($cnssql);

$existe = $cnssql->num_rows;


if ($existe > '0')
{
	$dbopcion = $row["opcion"]; $dbvalor = $row["valor"]; $dbidcaracteristica = $row["id"];
	$url_sw = 'index.php?module=lnxit&section=activos&ss=caracteristicas&id='.$_GET["id"].'&sc='.$dbopcion;
	$colorfondo = $row["color"];
}
else
{
	$url_sw = 'index.php?module=lnxit&section=activos&ss=caracteristicas&action=new&id='.$_GET["id"].'&scaracteristica=SW14';
	$colorfondo = $colorapagado;
}


if($_GET[sc] == 'SW14'){$objetoactivo = 'style="border-style: solid; border-width: 5px;"';}else{$objetoactivo = '';}
echo '<td '.$objetoactivo.' align="center" bgcolor="'.$colorfondo.'" width="'.$anchocelda.'"><a href="'.$url_sw.'">14</a></td>';
//----------------------------------------------

//------------------------ 2-8 ------------------
	
$cnssql= $mysqli->query("SELECT * FROM ".$prefixsql."ita_caracteristicas where idactivo = '".$_GET["id"]."' and opcion = 'SW16'");
$row = mysqli_fetch_assoc($cnssql);

$existe = $cnssql->num_rows;


if ($existe > '0')
{
	$dbopcion = $row["opcion"]; $dbvalor = $row["valor"]; $dbidcaracteristica = $row["id"];
	$url_sw = 'index.php?module=lnxit&section=activos&ss=caracteristicas&id='.$_GET["id"].'&sc='.$dbopcion;
	$colorfondo = $row["color"];	
}
else
{
	$url_sw = 'index.php?module=lnxit&section=activos&ss=caracteristicas&action=new&id='.$_GET["id"].'&scaracteristica=SW16';
	$colorfondo = $colorapagado;
}

if($_GET[sc] == 'SW16'){$objetoactivo = 'style="border-style: solid; border-width: 5px;"';}else{$objetoactivo = '';}
echo '<td '.$objetoactivo.' align="center" bgcolor="'.$colorfondo.'" width="'.$anchocelda.'"><a href="'.$url_sw.'">16</a></td>';
//---------------------------------------------

//------------------------ 2-9 ------------------
$cnssql= $mysqli->query("SELECT * FROM ".$prefixsql."ita_caracteristicas where idactivo = '".$_GET["id"]."' and opcion = 'SW18'");
$row = mysqli_fetch_assoc($cnssql);

$existe = $cnssql->num_rows;


if ($existe > '0')
{
	$dbopcion = $row["opcion"]; $dbvalor = $row["valor"]; $dbidcaracteristica = $row["id"];
	$url_sw = 'index.php?module=lnxit&section=activos&ss=caracteristicas&id='.$_GET["id"].'&sc='.$dbopcion;
	$colorfondo = $row["color"];
}
else
{
	$url_sw = 'index.php?module=lnxit&section=activos&ss=caracteristicas&action=new&id='.$_GET["id"].'&scaracteristica=SW18';
	$colorfondo = $colorapagado;
}


if($_GET[sc] == 'SW18'){$objetoactivo = 'style="border-style: solid; border-width: 5px;"';}else{$objetoactivo = '';}
echo '<td '.$objetoactivo.' align="center" bgcolor="'.$colorfondo.'" width="'.$anchocelda.'"><a href="'.$url_sw.'">18</a></td>';
//---------------------------------------------

//------------------------ 2-10 ------------------
$cnssql= $mysqli->query("SELECT * FROM ".$prefixsql."ita_caracteristicas where idactivo = '".$_GET["id"]."' and opcion = 'SW20'");
$row = mysqli_fetch_assoc($cnssql);

$existe = $cnssql->num_rows;


if ($existe > '0')
{
	$dbopcion = $row["opcion"]; $dbvalor = $row["valor"]; $dbidcaracteristica = $row["id"];
	$url_sw = 'index.php?module=lnxit&section=activos&ss=caracteristicas&id='.$_GET["id"].'&sc='.$dbopcion;
	$colorfondo = $row["color"];
}
else
{
	$url_sw = 'index.php?module=lnxit&section=activos&ss=caracteristicas&action=new&id='.$_GET["id"].'&scaracteristica=SW20';
	$colorfondo = $colorapagado;
}


if($_GET[sc] == 'SW20'){$objetoactivo = 'style="border-style: solid; border-width: 5px;"';}else{$objetoactivo = '';}
echo '<td '.$objetoactivo.' align="center" bgcolor="'.$colorfondo.'" width="'.$anchocelda.'"><a href="'.$url_sw.'">20</a></td>';
//---------------------------------------------

//------------------------ 2-11 ------------------
$cnssql= $mysqli->query("SELECT * FROM ".$prefixsql."ita_caracteristicas where idactivo = '".$_GET["id"]."' and opcion = 'SW22'");
$row = mysqli_fetch_assoc($cnssql);

$existe = $cnssql->num_rows;


if ($existe > '0')
{
	$dbopcion = $row["opcion"]; $dbvalor = $row["valor"]; $dbidcaracteristica = $row["id"];
	$url_sw = 'index.php?module=lnxit&section=activos&ss=caracteristicas&id='.$_GET["id"].'&sc='.$dbopcion;
	$colorfondo = $row["color"];
}
else
{
	$url_sw = 'index.php?module=lnxit&section=activos&ss=caracteristicas&action=new&id='.$_GET["id"].'&scaracteristica=SW22';
	$colorfondo = $colorapagado;
}


if($_GET[sc] == 'SW22'){$objetoactivo = 'style="border-style: solid; border-width: 5px;"';}else{$objetoactivo = '';}
echo '<td '.$objetoactivo.' align="center" bgcolor="'.$colorfondo.'" width="'.$anchocelda.'"><a href="'.$url_sw.'">22</a></td>';
//---------------------------------------------

//------------------------ 2-12 ------------------
$cnssql= $mysqli->query("SELECT * FROM ".$prefixsql."ita_caracteristicas where idactivo = '".$_GET["id"]."' and opcion = 'SW24'");
$row = mysqli_fetch_assoc($cnssql);

$existe = $cnssql->num_rows;


if ($existe > '0')
{
	$dbopcion = $row["opcion"]; $dbvalor = $row["valor"]; $dbidcaracteristica = $row["id"];
	$url_sw = 'index.php?module=lnxit&section=activos&ss=caracteristicas&id='.$_GET["id"].'&sc='.$dbopcion;
	$colorfondo = $row["color"];
}
else
{
	$url_sw = 'index.php?module=lnxit&section=activos&ss=caracteristicas&action=new&id='.$_GET["id"].'&scaracteristica=SW24';
	$colorfondo = $colorapagado;
}


if($_GET[sc] == 'SW24'){$objetoactivo = 'style="border-style: solid; border-width: 5px;"';}else{$objetoactivo = '';}
echo '<td '.$objetoactivo.' align="center" bgcolor="'.$colorfondo.'" width="'.$anchocelda.'"><a href="'.$url_sw.'">24</a></td>';
//---------------------------------------------

?>
	<td align="center" width="10" class="maintitle">&nbsp;</td>
	
<?php
//------------------------ 2-13 ------------------
$cnssql= $mysqli->query("SELECT * FROM ".$prefixsql."ita_caracteristicas where idactivo = '".$_GET["id"]."' and opcion = 'SW26'");
$row = mysqli_fetch_assoc($cnssql);

$existe = $cnssql->num_rows;


if ($existe > '0')
{
	$dbopcion = $row["opcion"]; $dbvalor = $row["valor"]; $dbidcaracteristica = $row["id"];
	$url_sw = 'index.php?module=lnxit&section=activos&ss=caracteristicas&id='.$_GET["id"].'&sc='.$dbopcion;
	$colorfondo = $row["color"];
}
else
{
	$url_sw = 'index.php?module=lnxit&section=activos&ss=caracteristicas&action=new&id='.$_GET["id"].'&scaracteristica=SW26';
	$colorfondo = $colorapagado;
}


if($_GET[sc] == 'SW26'){$objetoactivo = 'style="border-style: solid; border-width: 5px;"';}else{$objetoactivo = '';}
echo '<td '.$objetoactivo.' align="center" bgcolor="'.$colorfondo.'" width="'.$anchocelda.'"><a href="'.$url_sw.'">26</a></td>';
//----------------------------------------------

//------------------------ 2-14 ------------------
	
$cnssql= $mysqli->query("SELECT * FROM ".$prefixsql."ita_caracteristicas where idactivo = '".$_GET["id"]."' and opcion = 'SW28'");
$row = mysqli_fetch_assoc($cnssql);

$existe = $cnssql->num_rows;


if ($existe > '0')
{
	$dbopcion = $row["opcion"]; $dbvalor = $row["valor"]; $dbidcaracteristica = $row["id"];
	$url_sw = 'index.php?module=lnxit&section=activos&ss=caracteristicas&id='.$_GET["id"].'&sc='.$dbopcion;
	$colorfondo = $row["color"];	
}
else
{
	$url_sw = 'index.php?module=lnxit&section=activos&ss=caracteristicas&action=new&id='.$_GET["id"].'&scaracteristica=SW28';
	$colorfondo = $colorapagado;
}

if($_GET[sc] == 'SW28'){$objetoactivo = 'style="border-style: solid; border-width: 5px;"';}else{$objetoactivo = '';}
echo '<td '.$objetoactivo.' align="center" bgcolor="'.$colorfondo.'" width="'.$anchocelda.'"><a href="'.$url_sw.'">28</a></td>';
//---------------------------------------------

//------------------------ 2-15 ------------------
$cnssql= $mysqli->query("SELECT * FROM ".$prefixsql."ita_caracteristicas where idactivo = '".$_GET["id"]."' and opcion = 'SW30'");
$row = mysqli_fetch_assoc($cnssql);

$existe = $cnssql->num_rows;


if ($existe > '0')
{
	$dbopcion = $row["opcion"]; $dbvalor = $row["valor"]; $dbidcaracteristica = $row["id"];
	$url_sw = 'index.php?module=lnxit&section=activos&ss=caracteristicas&id='.$_GET["id"].'&sc='.$dbopcion;
	$colorfondo = $row["color"];
}
else
{
	$url_sw = 'index.php?module=lnxit&section=activos&ss=caracteristicas&action=new&id='.$_GET["id"].'&scaracteristica=SW30';
	$colorfondo = $colorapagado;
}


if($_GET[sc] == 'SW30'){$objetoactivo = 'style="border-style: solid; border-width: 5px;"';}else{$objetoactivo = '';}
echo '<td '.$objetoactivo.' align="center" bgcolor="'.$colorfondo.'" width="'.$anchocelda.'"><a href="'.$url_sw.'">30</a></td>';
//---------------------------------------------

//------------------------ 2-16 ------------------
$cnssql= $mysqli->query("SELECT * FROM ".$prefixsql."ita_caracteristicas where idactivo = '".$_GET["id"]."' and opcion = 'SW32'");
$row = mysqli_fetch_assoc($cnssql);

$existe = $cnssql->num_rows;


if ($existe > '0')
{
	$dbopcion = $row["opcion"]; $dbvalor = $row["valor"]; $dbidcaracteristica = $row["id"];
	$url_sw = 'index.php?module=lnxit&section=activos&ss=caracteristicas&id='.$_GET["id"].'&sc='.$dbopcion;
	$colorfondo = $row["color"];
}
else
{
	$url_sw = 'index.php?module=lnxit&section=activos&ss=caracteristicas&action=new&id='.$_GET["id"].'&scaracteristica=SW32';
	$colorfondo = $colorapagado;
}


if($_GET[sc] == 'SW32'){$objetoactivo = 'style="border-style: solid; border-width: 5px;"';}else{$objetoactivo = '';}
echo '<td '.$objetoactivo.' align="center" bgcolor="'.$colorfondo.'" width="'.$anchocelda.'"><a href="'.$url_sw.'">32</a></td>';
//---------------------------------------------

//------------------------ 2-17 ------------------
$cnssql= $mysqli->query("SELECT * FROM ".$prefixsql."ita_caracteristicas where idactivo = '".$_GET["id"]."' and opcion = 'SW34'");
$row = mysqli_fetch_assoc($cnssql);

$existe = $cnssql->num_rows;


if ($existe > '0')
{
	$dbopcion = $row["opcion"]; $dbvalor = $row["valor"]; $dbidcaracteristica = $row["id"];
	$url_sw = 'index.php?module=lnxit&section=activos&ss=caracteristicas&id='.$_GET["id"].'&sc='.$dbopcion;
	$colorfondo = $row["color"];
}
else
{
	$url_sw = 'index.php?module=lnxit&section=activos&ss=caracteristicas&action=new&id='.$_GET["id"].'&scaracteristica=SW34';
	$colorfondo = $colorapagado;
}


if($_GET[sc] == 'SW34'){$objetoactivo = 'style="border-style: solid; border-width: 5px;"';}else{$objetoactivo = '';}
echo '<td '.$objetoactivo.' align="center" bgcolor="'.$colorfondo.'" width="'.$anchocelda.'"><a href="'.$url_sw.'">34</a></td>';
//---------------------------------------------

//------------------------ 2-18 ------------------
$cnssql= $mysqli->query("SELECT * FROM ".$prefixsql."ita_caracteristicas where idactivo = '".$_GET["id"]."' and opcion = 'SW36'");
$row = mysqli_fetch_assoc($cnssql);

$existe = $cnssql->num_rows;


if ($existe > '0')
{
	$dbopcion = $row["opcion"]; $dbvalor = $row["valor"]; $dbidcaracteristica = $row["id"];
	$url_sw = 'index.php?module=lnxit&section=activos&ss=caracteristicas&id='.$_GET["id"].'&sc='.$dbopcion;
	$colorfondo = $row["color"];
}
else
{
	$url_sw = 'index.php?module=lnxit&section=activos&ss=caracteristicas&action=new&id='.$_GET["id"].'&scaracteristica=SW36';
	$colorfondo = $colorapagado;
}


if($_GET[sc] == 'SW36'){$objetoactivo = 'style="border-style: solid; border-width: 5px;"';}else{$objetoactivo = '';}
echo '<td '.$objetoactivo.' align="center" bgcolor="'.$colorfondo.'" width="'.$anchocelda.'"><a href="'.$url_sw.'">36</a></td>';
//---------------------------------------------

?>
	<td align="center" width="10" class="maintitle">&nbsp;</td>
	
<?php
//------------------------ 2-19 ------------------
$cnssql= $mysqli->query("SELECT * FROM ".$prefixsql."ita_caracteristicas where idactivo = '".$_GET["id"]."' and opcion = 'SW38'");
$row = mysqli_fetch_assoc($cnssql);

$existe = $cnssql->num_rows;


if ($existe > '0')
{
	$dbopcion = $row["opcion"]; $dbvalor = $row["valor"]; $dbidcaracteristica = $row["id"];
	$url_sw = 'index.php?module=lnxit&section=activos&ss=caracteristicas&id='.$_GET["id"].'&sc='.$dbopcion;
	$colorfondo = $row["color"];
}
else
{
	$url_sw = 'index.php?module=lnxit&section=activos&ss=caracteristicas&action=new&id='.$_GET["id"].'&scaracteristica=SW38';
	$colorfondo = $colorapagado;
}


if($_GET[sc] == 'SW38'){$objetoactivo = 'style="border-style: solid; border-width: 5px;"';}else{$objetoactivo = '';}
echo '<td '.$objetoactivo.' align="center" bgcolor="'.$colorfondo.'" width="'.$anchocelda.'"><a href="'.$url_sw.'">38</a></td>';
//----------------------------------------------

//------------------------ 2-20 ------------------
	
$cnssql= $mysqli->query("SELECT * FROM ".$prefixsql."ita_caracteristicas where idactivo = '".$_GET["id"]."' and opcion = 'SW40'");
$row = mysqli_fetch_assoc($cnssql);

$existe = $cnssql->num_rows;


if ($existe > '0')
{
	$dbopcion = $row["opcion"]; $dbvalor = $row["valor"]; $dbidcaracteristica = $row["id"];
	$url_sw = 'index.php?module=lnxit&section=activos&ss=caracteristicas&id='.$_GET["id"].'&sc='.$dbopcion;
	$colorfondo = $row["color"];	
}
else
{
	$url_sw = 'index.php?module=lnxit&section=activos&ss=caracteristicas&action=new&id='.$_GET["id"].'&scaracteristica=SW40';
	$colorfondo = $colorapagado;
}

if($_GET[sc] == 'SW40'){$objetoactivo = 'style="border-style: solid; border-width: 5px;"';}else{$objetoactivo = '';}
echo '<td '.$objetoactivo.' align="center" bgcolor="'.$colorfondo.'" width="'.$anchocelda.'"><a href="'.$url_sw.'">40</a></td>';
//---------------------------------------------

//------------------------ 2-21 ------------------
$cnssql= $mysqli->query("SELECT * FROM ".$prefixsql."ita_caracteristicas where idactivo = '".$_GET["id"]."' and opcion = 'SW42'");
$row = mysqli_fetch_assoc($cnssql);

$existe = $cnssql->num_rows;


if ($existe > '0')
{
	$dbopcion = $row["opcion"]; $dbvalor = $row["valor"]; $dbidcaracteristica = $row["id"];
	$url_sw = 'index.php?module=lnxit&section=activos&ss=caracteristicas&id='.$_GET["id"].'&sc='.$dbopcion;
	$colorfondo = $row["color"];
}
else
{
	$url_sw = 'index.php?module=lnxit&section=activos&ss=caracteristicas&action=new&id='.$_GET["id"].'&scaracteristica=SW42';
	$colorfondo = $colorapagado;
}


if($_GET[sc] == 'SW42'){$objetoactivo = 'style="border-style: solid; border-width: 5px;"';}else{$objetoactivo = '';}
echo '<td '.$objetoactivo.' align="center" bgcolor="'.$colorfondo.'" width="'.$anchocelda.'"><a href="'.$url_sw.'">42</a></td>';
//---------------------------------------------

//------------------------ 2-22 ------------------
$cnssql= $mysqli->query("SELECT * FROM ".$prefixsql."ita_caracteristicas where idactivo = '".$_GET["id"]."' and opcion = 'SW44'");
$row = mysqli_fetch_assoc($cnssql);

$existe = $cnssql->num_rows;


if ($existe > '0')
{
	$dbopcion = $row["opcion"]; $dbvalor = $row["valor"]; $dbidcaracteristica = $row["id"];
	$url_sw = 'index.php?module=lnxit&section=activos&ss=caracteristicas&id='.$_GET["id"].'&sc='.$dbopcion;
	$colorfondo = $row["color"];
}
else
{
	$url_sw = 'index.php?module=lnxit&section=activos&ss=caracteristicas&action=new&id='.$_GET["id"].'&scaracteristica=SW44';
	$colorfondo = $colorapagado;
}


if($_GET[sc] == 'SW44'){$objetoactivo = 'style="border-style: solid; border-width: 5px;"';}else{$objetoactivo = '';}
echo '<td '.$objetoactivo.' align="center" bgcolor="'.$colorfondo.'" width="'.$anchocelda.'"><a href="'.$url_sw.'">44</a></td>';
//---------------------------------------------

//------------------------ 2-23 ------------------
$cnssql= $mysqli->query("SELECT * FROM ".$prefixsql."ita_caracteristicas where idactivo = '".$_GET["id"]."' and opcion = 'SW46'");
$row = mysqli_fetch_assoc($cnssql);

$existe = $cnssql->num_rows;


if ($existe > '0')
{
	$dbopcion = $row["opcion"]; $dbvalor = $row["valor"]; $dbidcaracteristica = $row["id"];
	$url_sw = 'index.php?module=lnxit&section=activos&ss=caracteristicas&id='.$_GET["id"].'&sc='.$dbopcion;
	$colorfondo = $row["color"];
}
else
{
	$url_sw = 'index.php?module=lnxit&section=activos&ss=caracteristicas&action=new&id='.$_GET["id"].'&scaracteristica=SW46';
	$colorfondo = $colorapagado;
}


if($_GET[sc] == 'SW46'){$objetoactivo = 'style="border-style: solid; border-width: 5px;"';}else{$objetoactivo = '';}
echo '<td '.$objetoactivo.' align="center" bgcolor="'.$colorfondo.'" width="'.$anchocelda.'"><a href="'.$url_sw.'">46</a></td>';
//---------------------------------------------

//------------------------ 2-24 ------------------
$cnssql= $mysqli->query("SELECT * FROM ".$prefixsql."ita_caracteristicas where idactivo = '".$_GET["id"]."' and opcion = 'SW48'");
$row = mysqli_fetch_assoc($cnssql);

$existe = $cnssql->num_rows;


if ($existe > '0')
{
	$dbopcion = $row["opcion"]; $dbvalor = $row["valor"]; $dbidcaracteristica = $row["id"];
	$url_sw = 'index.php?module=lnxit&section=activos&ss=caracteristicas&id='.$_GET["id"].'&sc='.$dbopcion;
	$colorfondo = $row["color"];
}
else
{
	$url_sw = 'index.php?module=lnxit&section=activos&ss=caracteristicas&action=new&id='.$_GET["id"].'&scaracteristica=SW48';
	$colorfondo = $colorapagado;
}


if($_GET[sc] == 'SW48'){$objetoactivo = 'style="border-style: solid; border-width: 5px;"';}else{$objetoactivo = '';}
echo '<td '.$objetoactivo.' align="center" bgcolor="'.$colorfondo.'" width="'.$anchocelda.'"><a href="'.$url_sw.'">48</a></td>';
//---------------------------------------------

?>
	<td align="center" width="10" class="maintitle">&nbsp;</td>
	
</tr>

</table>
<p>&nbsp;</p>
</div>