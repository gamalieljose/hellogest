<?php
$idcontacto = $_GET["idcontacto"];

$sqlaux = $mysqli->query("select * from ".$prefixsql."terceroscontactos where id = '".$idcontacto."' "); 
$rowaux = mysqli_fetch_assoc($sqlaux);
$dbidtercero = $rowaux["idtercero"];
$dbnombre = $rowaux["nombre"];
$dbtel = $rowaux["tel"];
$dbtel2 = $rowaux["tel2"];
$dbtel3 = $rowaux["tel3"];
$dblbltel2 = $rowaux["lbltel2"];
$dblbltel3 = $rowaux["lbltel3"];



$sqlaux = $mysqli->query("select * from ".$prefixsql."terceros where id = '".$dbidtercero."' "); 
$rowaux = mysqli_fetch_assoc($sqlaux);
$dbrazonsocial = $rowaux["razonsocial"];
?>

<div class="row maintitle">
	<div class="col">
		Datos del contacto
	</div>
</div>
<div class="row">
	<div class="col-sm-2" align="left">
		<b>Razon Social</b>
	</div>
	<div class="col" align="left">
		<?php echo '<a href="index.php?module=terceros&section=buscar&action=verficha&idtercero='.$dbidtercero.'" >'.$dbrazonsocial.'</a>'; ?>
	</div>
</div>
<div class="row">
	<div class="col-sm-2" align="left">
		<b>Contacto</b>
	</div>
	<div class="col" align="left">
		<?php echo $dbnombre; ?>
	</div>
</div>

<div class="row maintitle">
	<div class="col">
		Ficha
	</div>
</div>
<?php



if($dbtel <> "")
{
if ($color == '1'){$color = '2'; $pintacolor = "listacolor2";} else {$color = '1'; $pintacolor = "listacolor1";}
echo '<div class="row '.$pintacolor.'">
	<div class="col" align="left">
		Telefono: '.$dbtel.'
	</div>
	<div class="col" align="right">
	<a href="tel:'.$dbtel.'" ><i style="font-size: 40px;" class="fa fa-fw fa-phone"></i></a>
	</div>
</div>';
}

if($dbtel2 <> "")
{
if ($color == '1'){$color = '2'; $pintacolor = "listacolor2";} else {$color = '1'; $pintacolor = "listacolor1";}
echo '<div class="row '.$pintacolor.'">
	<div class="col" align="left">
		'.$dblbltel2.': '.$dbtel2.'
	</div>
	<div class="col" align="right">
	<a href="tel:'.$dbtel2.'" alt="'.$dblbltel2.'" title="'.$dblbltel2.'"><i style="font-size: 40px;" class="fa fa-fw fa-phone"></i></a>
	</div>
</div>';
}

if($dbtel3 <> "")
{
if ($color == '1'){$color = '2'; $pintacolor = "listacolor2";} else {$color = '1'; $pintacolor = "listacolor1";}
echo '<div class="row '.$pintacolor.'">
	<div class="col" align="left">
		'.$dblbltel3.': '.$dbtel3.'
	</div>
	<div class="col" align="right">
	<a href="tel:'.$dbtel3.'" alt="'.$dblbltel3.'" title="'.$dblbltel3.'" ><i style="font-size: 40px;" class="fa fa-fw fa-phone"></i></a>
	</div>
</div>';
}