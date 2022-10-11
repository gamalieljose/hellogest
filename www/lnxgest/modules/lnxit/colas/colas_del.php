<?php
$idcola = $_GET["id"];

$sqlaux = $mysqli->query("select * from ".$prefixsql."it_colas where id ='".$idcola."' "); 
$rowaux = mysqli_fetch_assoc($sqlaux);
$dbcola = $rowaux["cola"];

?>

					   
<form name="form1" action="index.php?module=lnxit&section=colas&action=save" method="post">





<input type="hidden" name="haccion" value="delete">
<input type="hidden" name="hidcola" value="<?php echo $idcola; ?>">
<div align="center">

    <table class="msgaviso">
        <tr class="maintitle"><td>Confirmar eliminación registro</td></tr>
        <tr><td align="center">
                <p>¿Desea eliminar la cola de trabajo?</p>
                <p><b><?php echo $dbcola; ?></b></p>
                </br>
                <p>
                
                <button type="submit" class="btnsubmit" > <i class="hidephonview fa fa-trash-alt fa-lg"></i> Eliminar</button> 
<a href="index.php?module=lnxit&section=colas" class="btncancel"><i class="hidephonview fa fa-window-close fa-lg"></i> Cancelar</a> 
                    
                </p>
        </td>
        </tr>
    </table>

    
</div>





</form>
