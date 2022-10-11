<?php
$idmenu = $_GET["id"];

$sqlaux = $mysqli->query("select * from ".$prefixsql."menus where id = '".$idmenu."' "); 
$rowaux = mysqli_fetch_assoc($sqlaux);
$dbdisplay = $rowaux["display"];

        
?>
<form name="frmmenuelemento" method="POST" action="index.php?module=core&section=menus&action=save">
<input type="hidden" name="haccion" value="delete"/>
<input type="hidden" name="hidmenu" value="<?php echo $idmenu; ?>"/>

<div align="center">

    <table class="msgaviso">
        <tr class="maintitle"><td>Confirmar eliminación registro</td></tr>
        <tr><td align="center">
                <p>¿Desea eliminar el menú indicado?</p>
                <p><b><?php echo $dbdisplay; ?></b></p>
                </br>
                <p>
                    <input type="submit" class="btnsubmit" value="Eliminar" /> 
                    <a href="index.php?module=core&section=menus" class="btncancel" >Cancelar</a>
                </p>
        </td>
        </tr>
    </table>

    
</div>

</form>

