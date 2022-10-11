<?php
$idtpv = $_GET["id"];

$sqlaux = $mysqli->query("select * from ".$prefixsql."tpv where id = '".$idtpv."' "); 
$rowaux = mysqli_fetch_assoc($sqlaux);
$dbedittpv = $rowaux["edittpv"];
$dbcodigo = $rowaux["codigo"];
?>

<form name="frmmodificatpv" method="POST" action="index.php?module=tpv&section=tpvactions&action=draftsave">

<div align="center">

    <table style="max-width: 400px; width: 100%;" class="msgaviso">
    <tr class="maintitle">
        <td>Modificación TPV</td>
    </tr>
    <tr>
        <td align="center">
            
<?php
$mensaje = "¿Desea convertir el Ticket: <b>".$dbcodigo."</b> a borrador?";

echo $mensaje;
?>       
<input type="hidden" value="<?php echo $idtpv; ?>" name="hidtpv" />
<input type="hidden" value="borrador" name="hpaseborraador" />

</br></br></td>
    </tr>
    <tr>
        <td align="center">
            <input type="submit" class="btnsubmit" value="Modificar"/>

            <?php echo '<a href="index.php?module=tpv&section=tpvactions&id='.$idtpv.'" class="btncancel">Cancelar</a>'; ?>
        </td>
    </tr>
</table>
</div>

</form>