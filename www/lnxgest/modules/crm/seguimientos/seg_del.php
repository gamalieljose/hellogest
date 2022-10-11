<?php
$idregistro = $_GET["id"];

$sqlaux = $mysqli->query("select * from ".$prefixsql."crm_seg where id = '".$idregistro."' "); 
$rowaux = mysqli_fetch_assoc($sqlaux);
$dbidtercero = $rowaux["idtercero"];

$dbidcamp = $rowaux["idcamp"];

$dbseguimiento = $rowaux["seguimiento"];
$dbfecha = $rowaux["fecha"];
    $temp = explode(" ", $dbfecha);
        $tempfecha = $temp[0];
        $temptiempo = $temp[1];
            $temp = explode("-", $tempfecha);
            $lbl_fecha = $temp[2]."/".$temp[1]."/".$temp[0];

            $temp = explode(":", $temptiempo);
            $dbhora = $temp[0];
            $dbmin = $temp[1];

$sqlaux = $mysqli->query("select * from ".$prefixsql."terceros where id = '".$dbidtercero."' "); 
$rowaux = mysqli_fetch_assoc($sqlaux);
$lbl_tercero = $rowaux["razonsocial"];

$sqlaux = $mysqli->query("select * from ".$prefixsql."crm_camp where id = '".$dbidcamp."' "); 
$rowaux = mysqli_fetch_assoc($sqlaux);
$lbl_camp = $rowaux["camp"];
?>


<form name="frmseguimiento" method="POST" action="index.php?module=crm&section=seguimientos&action=save" >
<div align="center" class="rectangulobtnsguardar"> 
<button type="submit" class="btnsubmit" > <i class="hidephonview fa fa-save fa-lg"></i> Aceptar</button> 
<a href="index.php?module=crm&section=seguimientos" class="btncancel"><i class="hidephonview fa fa-window-close fa-lg"></i> Cancelar</a> 
</div>

<input type="hidden" name="haccion" value="delete"/>
<input type="hidden" name="hidregistro" value="<?php echo $idregistro; ?>"/>

<div align="center">
	<table style="max-width: 400px; width: 100%;" class="msgaviso">
<tr class="maintitle"><th>Eliminar registro</th></tr>
<tr><td>
<p>¿Desea eliminar el siguiente registro?</p>

<p><?php echo $lbl_tercero; ?></br>
Campaña: <?php echo $lbl_camp; ?></br>
Seguimiento: </br>
<?php echo $dbseguimiento; ?>

</p>

</td></tr>
	</table>
</div>
</form>