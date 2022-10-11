<?php
$idscreen = $_GET["id"];

$ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."screens where id = '".$idscreen."'");
$row = mysqli_fetch_assoc($ConsultaMySql);
$dbdisplay = $row["display"];
$dburl = $row["url"];

        
?>
<form name="frmmenuelemento" method="POST" action="index.php?module=core&section=screens&action=save">
<form name="form1" action="index.php?module=core&section=screens&action=save" method="POST">
<input type="hidden" name="haccion" value="delete"/>
<?php echo '<input type="hidden" name="hidscreen" value="'.$idscreen.'"/>'; ?>

<div align="center">

    <table class="msgaviso">
        <tr class="maintitle"><td>Confirmar eliminación registro</td></tr>
        <tr><td align="center">
                <p>¿Desea eliminar el screen indicado?</p>
                <p><b><?php echo $dbdisplay; ?></b></p>
                </br>
                <p>
                    <input type="submit" class="btnsubmit" value="Eliminar" /> 
                    <a href="index.php?module=core&section=screens" class="btncancel" >Cancelar</a>
                </p>
        </td>
        </tr>
    </table>

    
</div>

</form>

