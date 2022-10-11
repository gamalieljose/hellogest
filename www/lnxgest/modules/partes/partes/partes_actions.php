<?php
$idparte = $_GET["id"];

$sqlaux = $mysqli->query("select * from ".$prefixsql."partes where id = '".$idparte."' "); 
$rowaux = mysqli_fetch_assoc($sqlaux);
$dbcodigo = $rowaux["codigo"];
$dbcodigoint = $rowaux["codigoint"];
$dbidtercero = $rowaux["idtercero"];
$dbdescripcion = $rowaux["descripcion"];
$dbremoto = $rowaux["remoto"];

$sqlaux = $mysqli->query("select * from ".$prefixsql."terceros where id = '".$dbidtercero."' "); 
$rowaux = mysqli_fetch_assoc($sqlaux);
$lblrazonsocial = $rowaux["razonsocial"];

$sqlaux = $mysqli->query("select * from ".$prefixsql."ficheros_loc where module = 'partes' and idlinea0 = '".$idparte."' "); 
$rowaux = mysqli_fetch_assoc($sqlaux);
$idficheropdf = $rowaux["idfichero"];
?>
<style>
.contenedorboton
{
	width: 250px;
	height: 80px;
	border-style: solid;
	border-width: 2px;
	float: left;
	padding: 2px;
	margin-right: 5px;
}
@media screen and (max-width: 991px)
{
	.contenedorboton
	{
		width: 100%;
		height: auto;
		border-style: solid;
		border-width: 2px;
		float: none;
		padding: 2px;
		margin-top: 5px;
		
	}
}

</style>

<div class="row">
<div class="col-sm-2">
    Parte:
  </div>
  <div class="col" align="left">
	<?php echo $dbcodigo; ?>
  </div>
</div>
<div class="row">
<div class="col-sm-2">
    Tercero
  </div>
  <div class="col" align="left">
	<?php echo $lblrazonsocial; ?>
  </div>
</div>
<div class="row">
<div class="col-sm-2">
    Descripcion
  </div>
  <div class="col" align="left">
	<?php echo nl2br($dbdescripcion); ?>
  </div>
</div>
<p> </p>

<?php



if($idficheropdf > 0)
{
	echo '<a href="modules/ficheros/download.php?id='.$idficheropdf.'"><div class="contenedorboton" align="center">
		<div style="font-size:20px; color:blue; flota: left;">
		  <i class="fas fa-trash"></i>
		
		Descargar Parte
		</div>
	</div>
	</a>';
}
else
{
	if($dbremoto == "")
	{
	?>

	<a href="index.php?module=partes&section=partes&action=firmar&id=<?php echo $idparte; ?>"><div class="contenedorboton" align="center">
		<div style="font-size:20px; color:blue; flota: left;">
		  <i class="fas fa-trash"></i>
		
		Firmar aqui
		</div>
	</div>
	</a>
	<?php 
	}


	if($dbcodigoint == 0)
	{
	?>
	<a href="index.php?module=partes&section=partes&action=edit&id=<?php echo $idparte; ?>"><div class="contenedorboton" align="center">
		<div style="font-size:20px; color:blue; flota: left;">
		  <i class="fas fa-trash"></i>
		
		EDITAR PARTE
		</div>
	</div>
	</a>
	<?php
	}


	if($dbremoto !== "")
	{
	?>
	<a href="index.php?module=partes&section=partes&action=borrarremoto&id=<?php echo $idparte; ?>"><div class="contenedorboton" align="center">
	<div style="font-size:20px; color:blue; flota: left;">
	<i class="fas fa-trash"></i>

	Cancelar firma en remoto

	</div>
	</a>
	<?php

	}
	else
	{
	?>
	<a href="index.php?module=partes&section=partes&action=firmarremoto&id=<?php echo $idparte; ?>"><div class="contenedorboton" align="center">
		<div style="font-size:20px; color:blue; flota: left;">
		  <i class="fas fa-trash"></i>
		
		Firmar en remoto
		</div>
	</div>
	</a>

	<?php
	}
}

?>
