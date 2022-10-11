<?php
$idfv = $_GET["id"];
?>
<div align="center">


<?php
//index.php?module=fv&section=docs&id=24
echo '<form name="form1" action="index.php?module='.$lnxinvoice.'&section=docs&id='.$idfv.'&frmaction=save" method="post" enctype="multipart/form-data">';

?>
<input type="hidden" name="haccion" value="new">
<table>
<tr class="maintitle"><td>Nuevo documento adjunto</td></tr>
<tr><td>Fichero: <input type="file" name="fileficherito" required=""></td></tr>
<tr><td align="center">
<input class="btnsubmit" name="btnnuevo" value="Aceptar" type="submit"> 
<?php
echo '<a class="btnenlacecancel" href="index.php?module='.$lnxinvoice.'&section=docs&id='.$idfv.'">Cancelar</a>'; 
?>

</td></tr>
</table>
</form>
</div>