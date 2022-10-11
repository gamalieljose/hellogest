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
<?php
$idtpv = $_GET["id"];

$sqlaux = $mysqli->query("select * from ".$prefixsql."tpv where id = '".$idtpv."' "); 
$rowaux = mysqli_fetch_assoc($sqlaux);
$dbidserie = $rowaux["idserie"];
$dbcodigoint = $rowaux["codigoint"];
$dbedittpv = $rowaux["edittpv"]; //con esto se sabe si se esta editando uno ya existente como el editfv


$sqlaux = $mysqli->query("select max(codigoint) as contador from ".$prefixsql."tpv where idserie = '".$dbidserie."' "); 
$rowaux = mysqli_fetch_assoc($sqlaux);
$dbmaximoidserie = $rowaux["contador"];


?>
<div class="row">
	<div class="col maintitle" align="left">
		Operaciones Habituales
	</div>
</div>

<div class="row">
	<div class="col" align="center">


<?php
if($dbmaximoidserie == $dbcodigoint)
{
echo '<a href="index.php?module=tpv&section=tpvactions&action=draft&id='.$idtpv.'"><div class="contenedorboton" align="center">
	<div style="font-size:20px; color:blue; flota: left;">
	  <i class="fas fa-edit"></i>
	
	Convertir a borrador
	</div>
</div>
</a>';
}

if($dbcodigoint > 0)
{
    
	echo '<a href="index.php?module=tpv&section=tpvactions&action=modtpv&id='.$idtpv.'"><div class="contenedorboton" align="center">
	<div style="font-size:20px; color:blue; flota: left;">
	  <i class="fas fa-edit"></i>';
        if($dbedittpv == '0'){echo 'Modificar';}
        if($dbedittpv == '1'){echo 'Dejar de editar';}
	
	echo '</div>
</div>
</a>';
}


//comprueba que este realmente como borrador para poderlo eliminar
if($dbcodigoint == 0)
{

echo '<a href="index.php?module=tpv&section=tpvactions&action=del&id='.$idtpv.'">
        <div class="contenedorboton" align="center">
	<div style="font-size:20px; color:blue; flota: left;">
	  <i class="fas fa-edit"></i>
	
	Eliminar TPV
	</div>
</div>
</a>';
}


if($dbcodigoint > 0)
{
    
echo '<a href="index.php?module=tpv&section=tpvactions&action=print&id='.$idtpv.'">
        <div class="contenedorboton" align="center">
	<div style="font-size:20px; color:blue; flota: left;">
	  <i class="fas fa-print"></i>
	
	Imprimir Ticket
	</div>
</div>
</a>';
}



?>
	</div>
</div>