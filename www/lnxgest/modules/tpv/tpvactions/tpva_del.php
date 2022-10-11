<?php
$idtpv = $_GET["id"];

$sqlaux = $mysqli->query("select * from ".$prefixsql."tpv where id = '".$idtpv."' "); 
$rowaux = mysqli_fetch_assoc($sqlaux);
$dbedittpv = $rowaux["edittpv"];
$dbcodigo = $rowaux["codigo"];
?>

<form name="frmmodificatpv" method="POST" action="index.php?module=tpv&section=tpvactions&action=delsave">

<div align="center">

    <table style="max-width: 400px; width: 100%;" class="msgaviso">
    <tr class="maintitle">
        <td>Eliminar ticket TPV</td>
    </tr>
    <tr>
        <td align="center">
            
            <p>¿Desea ELIMINAR el Ticket: <b><?php echo $dbcodigo; ?></b>?</p>
            
            <p>También se van a eliminar los pagos asociados a este ticket</p>
            
            <p><b>¡Este cambio NO es reversible!</b></p>
            

<input type="hidden" value="<?php echo $idtpv; ?>" name="hidtpv" />


</br></td>
    </tr>
    <tr>
        <td align="center">
            <input type="submit" class="btnsubmit" value="Eliminar"/>

            <?php echo '<a href="index.php?module=tpv&section=tpvactions&id='.$idtpv.'" class="btncancel">Cancelar</a>'; ?>
        </td>
    </tr>
</table>
</div>

</form>