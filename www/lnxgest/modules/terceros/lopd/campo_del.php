<?php
$idcampo = $_GET["id"];

$sqlaux = $mysqli->query("select * from ".$prefixsql."terceros_lopd_cfg where id = '".$idcampo."' ");
$row = mysqli_fetch_assoc($sqlaux);
$dbcampo = $row["campo"];
$dbdisplay = $row["display"];
$dbtipo = $row["tipo"];

?>
<form name="frmcamposcustomlopd" action="index.php?module=terceros&section=lopdcampos&action=save" method="POST">
    <input type="hidden" name="haccion" value="delete" />
    <input type="hidden" name="hidcampo" value="<?php echo $idcampo; ?>" />
<div align="center">

    <table width="400" class="msgaviso">
        <tr class="maintitle"><td>Eliminar campo</td></tr>
        <tr><td align="center">
                ¿Desea eliminar el campo: <b><?php echo $dbcampo; ?></b>? </br>
                <b>Recuerde que esta operación no puede deshacerse.</b></br>
                
                </br>
                </br>
                <input type="submit" class="btnsubmit" value="Eliminar"/> 
                <a href="index.php?module=terceros&section=lopdcampos" class="btncancel">Cancelar</a>
                
                
                
        </td></tr>
    </table>
    
</div>
    
</form>