<?php

$idregla = $_GET["id"];

$sqlregla = $mysqli->query("select * from ".$prefixsql."tpv_cfg_ia where id = '".$idregla."'");
$rowregla = mysqli_fetch_assoc($sqlregla);
$dbregla = $rowregla["regla"];
?>
<form name="borracondicion" method="POST" action="index.php?module=tpv&section=cfgia&action=save" >
<div align="center">

    <table style="max-width: 400px; width: 100%;" class="msgaviso">
    <tr class="maintitle">
        <td>Eliminar regla</td>
    </tr>
    <tr>
        <td align="center">
            ¿Desea eliminar la siguiente regla de impresión? </br>
            </br>
            <b><?php echo $dbregla; ?></b>
     
<input type="hidden" value="delete" name="haccion" />
<input type="hidden" value="<?php echo $idregla; ?>" name="hidregla" />


</br></br></td>
    </tr>
    <tr>
        <td align="center">
            <input type="submit" class="btnsubmit" value="Eliminar"/>

            <a href="index.php?module=tpv&section=cfgia" class="btncancel">Cancelar</a>
        </td>
    </tr>
</table>
</div>
</form>