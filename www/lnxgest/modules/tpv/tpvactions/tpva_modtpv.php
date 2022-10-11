<?php
$idtpv = $_GET["id"];

$sqlaux = $mysqli->query("select * from ".$prefixsql."tpv where id = '".$idtpv."' "); 
$rowaux = mysqli_fetch_assoc($sqlaux);
$dbedittpv = $rowaux["edittpv"];
$dbcodigo = $rowaux["codigo"];
?>

<form name="frmmodificatpv" method="POST" action="index.php?module=tpv&section=tpvactions&action=modtpvsave">

<div align="center">

    <table style="max-width: 400px; width: 100%;" class="msgaviso">
    <tr class="maintitle">
        <td>Modificación TPV</td>
    </tr>
    <tr>
        <td align="center">
            
<?php
if($dbedittpv == '0')          
{    
    $mensaje = "¿Desea modificar el Ticket: <b>".$dbcodigo."</b>?";
    $editarsino = "1";
}
if($dbedittpv == '1')          
{    
    $mensaje = "Se va a proceder a validar el ticket <b>".$dbcodigo."</b>";
    $editarsino = "0";
}

echo $mensaje;
?>       
<input type="hidden" value="<?php echo $idtpv; ?>" name="hidtpv" />
<input type="hidden" value="<?php echo $editarsino; ?>" name="hedittpv" />

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