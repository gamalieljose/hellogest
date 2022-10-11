<?php
$idtercero = $_GET["idtercero"];

$sqlaux = $mysqli->query("select * from ".$prefixsql."terceros where id = '".$idtercero."' "); 
$rowaux = mysqli_fetch_assoc($sqlaux);
$lbl_razonsocial = $rowaux["razonsocial"];
$lbl_nomcomercial = $rowaux["nomcomercial"];
$lbl_tel = $rowaux["tel"];
$lbl_email = $rowaux["email"];


$lbl_dir = $rowaux["dir"];
$lbl_cp = $rowaux["cp"];
$lbl_pobla = $rowaux["pobla"];

$dbidprov = $rowaux["idprov"];
$dbidpais = $rowaux["idpais"];

	$sqlaux = $mysqli->query("select * from ".$prefixsql."provincias where id = '".$dbidprov."' "); 
	$rowaux = mysqli_fetch_assoc($sqlaux);
	$lbl_prov = $rowaux["provincia"];
	
	$sqlaux = $mysqli->query("select * from ".$prefixsql."paises where id = '".$dbidpais."' "); 
	$rowaux = mysqli_fetch_assoc($sqlaux);
	$lbl_pais = $rowaux["pais"];




?>

<div class="row maintitle">
	<div class="col">
		Datos del tercero
	</div>
</div>
<div class="row">
	<div class="col-sm-2" align="left">
		<b>Razon Social</b>
	</div>
	<div class="col" align="left">
	<?php 
	echo '<a href="index.php?module=terceros&section=terceros&action=edit&idtercero='.$idtercero.'">'.$lbl_razonsocial.'</a>'; 
	?>
	</div>
</div>
<div class="row">
	<div class="col-sm-2" align="left">
		<b>Nombre comercial</b>
	</div>
	<div class="col" align="left">
		<?php echo $lbl_nomcomercial; ?>
	</div>
</div>
<div class="row">
	<div class="col-sm-2" align="left">
		<b>Telefono</b>
	</div>
	<div class="col" align="left">
		<?php echo $lbl_tel; ?>
	</div>
	<div class="col" align="right">
<?php
	echo '<a href="tel:'.$lbl_tel.'" ><i style="font-size: 40px;" class="fa fa-fw fa-phone"></i></a>';
?>
	</div>
</div>

<?php

if ($lbl_email <> "")
{
?>
<div class="row">
	<div class="col-sm-2" align="left">
		<b>e-mail</b>
	</div>
	<div class="col" align="left">
		<?php echo $lbl_email; ?>
	</div>
	<div class="col" align="right">
            <?php echo '<a href="mailto:'.$lbl_email.'"><i style="font-size: 40px;" class="fa fa-fw fa-envelope"></i></a>'; ?>
	</div>
</div>
<?php
}

echo '<div class="row">
	<div class="col-sm-2" align="left">
		<b>Dirección</b>
	</div>
	<div class="col" align="left">
		'.$lbl_dir.'</br>
		'.$lbl_cp.' '.$lbl_pobla.' </br>
		'.$lbl_prov.' </br>
		'.$lbl_pais.'
	</div>
</div>';

?>


<div class="row maintitle">
	<div class="col">
		Contactos
	</div>
</div>
<?php

$cnssql= $mysqli->query("select * from ".$prefixsql."terceroscontactos where idtercero = '".$idtercero."' order by nombre");	
while($col = mysqli_fetch_array($cnssql))
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
	echo '<div class="row '.$pintacolor.'" >
	<div class="col" align="left">
		<a href="index.php?module=terceros&section=buscar&action=vercontacto&idcontacto='.$col["id"].'" ><b>'.$col["nombre"].'</b></a>
	</div>
	<div class="col" align="right">';
	
	if($col["tel"] !== "" || $col["tel2"] !== "" || $col["tel3"] !== "" )
	{
		echo '<a href="tel:'.$col["tel"].'" ><i style="font-size: 40px;" class="fa fa-fw fa-phone"></i></a> ';
	}
	if($col["email"] !== "" )
	{
		echo '<a href="mailto:'.$col["email"].'" ><i style="font-size: 40px;" class="fa fa-fw fa-envelope"></i></a>';
	}
	echo '</div>
</div>';
    
}


?>


<div align="center" class="rectangulobtnsguardar">

<a class="btncancel" href="index.php?module=terceros&section=buscar">Volver</a>

</div>

<p>&nbsp;</p>
<p>&nbsp;</p>