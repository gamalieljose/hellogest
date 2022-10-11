<?php
$iddocumento = $_GET["iddoc"];
$idlinea = $_GET["idlinea"];

$cnsprincipal= $mysqli->query("SELECT * from ".$prefixsql."viajes_lineas where id = '".$idlinea."' ");
$row = mysqli_fetch_assoc($cnsprincipal);
$tipoevento = $row["tipo"];
$db_fechasalida = $row["fechasalida"];
$db_origen = $row["origen"];
$db_fechallegada = $row["fechallegada"];
$db_destino = $row["destino"];
$db_descripcion = $row["descripcion"];

$db_reserva = $row["reserva"];
$db_asiento = $row["asiento"];


$dbfecha = $row["fechasalida"];
    $xtemp = explode(" ", $dbfecha);
    $xtemp2 = explode("-", $xtemp[0]);
    $lbl_fecha = $xtemp2[2]."/".$xtemp2[1]."/".$xtemp2[0];

    $xtemp2 = explode(":", $xtemp[1]);
    $lbl_fecha_h = $xtemp2[0];
    $lbl_fecha_m = $xtemp2[1];

$dbfechavuelta = $row["fechallegada"];
    $xtemp = explode(" ", $dbfechavuelta);
    $xtemp2 = explode("-", $xtemp[0]);
    $lbl_fechavuelta = $xtemp2[2]."/".$xtemp2[1]."/".$xtemp2[0];

    $xtemp2 = explode(":", $xtemp[1]);
    $lbl_fechavuelta_h = $xtemp2[0];
    $lbl_fechavuelta_m = $xtemp2[1];


$cnsprincipal= $mysqli->query("SELECT * from ".$prefixsql."viajes where id = '".$iddocumento."' ");
$row = mysqli_fetch_assoc($cnsprincipal);
$dbidserie = $row["idserie"];
$dbcodigo = $row["codigo"];
$dbdescripcion = $row["descripcion"];
$dbiduser = $row["iduser"];


if($tipoevento == "NOTA"){$lbl_evento = "Nota";}
if($tipoevento == "VIAJE"){$lbl_evento = "Viaje";}
if($tipoevento == "HOTEL"){$lbl_evento = "Alojamiento";}
?>





<form name="frmregistro" method="POST" action="index.php?module=gastos&section=viajes&action=linesave" >

<input type="hidden" name="haccion" value="delete"/> 
<input type="hidden" name="hiddoc" value="<?php echo $iddocumento; ?>"/> 
<input type="hidden" name="hidlinea" value="<?php echo $idlinea; ?>"/> 



<div align="center">
<table style="max-width: 400px; width: 100%;" class="msgaviso">
<tr class="maintitle"><th>Eliminar registro</th></tr>
<tr><td align="center">
¿Desea eliminar <b><?php echo $lbl_evento; ?></b> ?</br>
Entrada: <?php echo $lbl_fecha." ".$lbl_fecha_h.":".$lbl_fecha_m; ?></br>
Salida: <?php echo $lbl_fechavuelta." ".$lbl_fechavuelta_h.":".$lbl_fechavuelta_m; ?>
</td></tr>
<tr><td>
<?php
if($tipoevento == "NOTA")
{
    echo '<i class="fas fa-sticky-note" title="Nota" alt="Nota"></i> Nota: </br>';
    echo $db_descripcion;
}

if($tipoevento == "VIAJE")
{
    echo '<i class="fas fa-plane" title="Viaje" alt="Viaje"></i> Viaje: </br>';
    echo 'Reserva: '.$db_reserva.'</br></br>';
    echo $db_descripcion;
}

if($tipoevento == "HOTEL")
{
    echo '<i class="fas fa-plane" title="Viaje" alt="Viaje"></i> Alojamiento: </br>';
    echo 'Reserva: '.$db_reserva.'</br></br>';
    echo $db_descripcion;
}
?>
</td></tr>
<tr><td align="center">
<button type="submit" class="btnsubmit" > <i class="hidephonview fa fa-trash fa-lg"></i> Eliminar</button> 
<a href="index.php?module=gastos&section=viajes&action=view&iddoc=<?php echo $iddocumento; ?>" class="btncancel"><i class="hidephonview fa fa-window-close fa-lg"></i> Cancelar</a> 
</td></tr>
</table>
</div>

</form>