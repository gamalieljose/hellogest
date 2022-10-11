<?php
$iddocum = $_GET["id"];

$sqldocum = $mysqli->query("select * from ".$prefixsql."it_docum where id = '".$iddocum."' "); 
$rowdocum = mysqli_fetch_assoc($sqldocum);
$dbtitulo = $rowdocum["titulo"];

?>
<form name="frmdocum" method="POST" action="index.php?module=lnxit&section=docum&action=save">
<input type="hidden" name="haccion" value="delete" />
<input type="hidden" name="hiddocum" value="<?php echo $iddocum; ?>" />

<div align="center">
    <table class="msgaviso" style="width:100%; max-width: 400px;">
    <tr><td class="maintitle">Eliminar registro</td></tr>
    <tr><td align="center">
    <p>¿Esta seguro de querer eliminar este registro y todos sus archivos adjuntos?</p>
    <p><b><?php echo $dbtitulo; ?></b></p>
    <p>
    <button type="submit" class="btnsubmit" >
                    <i class="hidephonview fa fa-trash-alt fa-lg"></i> Eliminar</button> 
    <?php 
    echo '<a href="index.php?module=lnxit&section=docum&action=view&id='.$iddocum.'" class="btncancel"><i class="hidephonview fa fa-window-close fa-lg"></i> Cancelar</a>'; 
    ?>
    </p>
    </td></tr>
    </table>
</div>
</form>