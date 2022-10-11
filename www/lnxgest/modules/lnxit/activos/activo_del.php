<?php
include("modules/lnxit/activos/tabs.php");

$idactivo = $_GET["id"];

$sqlaux = $mysqli->query("select * from ".$prefixsql."ita_activos where id = '".$idactivo."' "); 
$rowaux = mysqli_fetch_assoc($sqlaux);

$dbcodigo = $rowaux["codigo"];
$dbnombre = $rowaux["nombre"];
?>
<form name="form1" action="index.php?module=lnxit&section=activos&ss=activo&action=save" method="post">
<?php

echo '<input type="hidden" name="hidactivo" value="'.$_GET["id"].'">';
?>
<input type="hidden" name="haccion" value="delete">

<div align="center">
    
    <table style="max-width: 400px; width: 100%;" class="msgaviso">
    <tr class="maintitle">
        <td>Eliminar Activo</td>
    </tr>
    <tr>
        <td align="center">
            
            <p>¿Desea ELIMINAR el siguiente activo?</p>
            
            <p>ID: <?php echo $idactivo; ?> <b><?php echo $dbcodigo.' - '.$dbnombre; ?></b></p>
            
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