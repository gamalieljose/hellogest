<?php
$cnssql = "SELECT * FROM ".$prefixsql."viajes where id = '".$_GET["id"]."'";
$ConsultaMySql= $mysqli->query($cnssql);
$row = mysqli_fetch_assoc($ConsultaMySql);
$dbidflota = $row["idflota"];
$dbfecha = $row["fecha"];
$dborigen = $row["origen"];
$dbdestino = $row["destino"];
$dbiduser = $row["iduser"];
$dbkms = $row["kms"];

$fano = substr($dbfecha, 0, 4);  
$fmes = substr($dbfecha, 5, 2);  
$fdia = substr($dbfecha, 8, 2);  

$dbfecha = $fdia."/".$fmes."/".$fano;

$ConsultaMySql= $mysqli->query("select * from ".$prefixsql."flota where id = '".$dbidflota."'");
$row = mysqli_fetch_assoc($ConsultaMySql);
$dbvehiculo = $row["vehiculo"];

$ConsultaMySql= $mysqli->query("select id, display from ".$prefixsql."users where id = '".$dbiduser."'");
$row = mysqli_fetch_assoc($ConsultaMySql);
$dbusuario = $row["display"];

?>

 
<form name="form1" action="index.php?module=userpanel&section=dz&action=save" method="post">

<div align="center">
<input type="hidden" name="haccion" value="delete">
<?php

echo '<input type="hidden" name="hidviaje" value="'.$_GET["id"].'">';

?>
<table>
<tr class="maintitle"><td colspan="4" align="center">Eliminar viaje</td></tr>
<tr><td colspan="2"><b> ¿Desea eliminar este viaje ? </b></td></tr>
<tr><td>Vehiculo</td><td><?php echo $dbvehiculo; ?></td></tr>
<tr><td>Fecha</td><td><?php echo $dbfecha; ?></td></tr>
<tr><td>Usuario</td><td><?php echo $dbusuario; ?></td></tr>
<tr><td>Origen</td><td><?php echo $dborigen; ?></td></tr>
<tr><td>Destino</td><td><?php echo $dbdestino; ?></td></tr>
<tr><td>Kms</td><td><?php echo $dbkms; ?></td></tr>

</table>
</div>


<div align="center" class="rectangulobtnsguardar">

<input class="btnsubmit" name="btnguardar" value="Guardar" type="submit">

<a class="btncancel" href="index.php?module=userpanel&section=dz">Cancelar</a>

</div>




</form>
