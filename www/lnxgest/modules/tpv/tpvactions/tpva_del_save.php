<?php
$idtpv = $_POST["hidtpv"];
$fhpaseborraador = $_POST["hpaseborraador"];

$mensaje = "Ticket TPV Eliminado con éxito";

$sqltpv = $mysqli->query("delete from ".$prefixsql."tpv where id = '".$idtpv."'");

$sqltpv = $mysqli->query("delete from ".$prefixsql."tpv_pagos where idtpv = '".$idtpv."'");

$sqltpv = $mysqli->query("delete from ".$prefixsql."tpv_pagos where idtpv = '".$idtpv."'");


$url_atras = "index.php?module=tpv&section=tpv";
header( "refresh:2;url=".$url_atras );
?>

<div align="center">

    <table style="max-width: 400px; width: 100%;" class="msgaviso">
    <tr class="maintitle">
        <td>Mensaje</td>
    </tr>
    <tr>
        <td align="center">
            
            <p><?php echo $mensaje; ?></p>

</br></td>
    </tr>
    <tr>
        <td align="center">         
            <?php echo '<a href="'.$url_atras.'" class="btnedit">Aceptar</a>'; ?>
        </td>
    </tr>
</table>
</div>

