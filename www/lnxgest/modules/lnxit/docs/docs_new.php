<?php
$idticket = $_GET["id"];
?>
<div align="center">


<?php
echo '<form name="form1" action="index.php?module=lnxit&section=docs&action=save&id='.$idticket.'" method="post" enctype="multipart/form-data">';

echo '<input type="hidden" name="hidticket" value="'.$idticket.'">';

?>
<input type="hidden" name="haccion" value="new">
<table>
<tr class="maintitle"><td>Nuevo documento adjunto</td></tr>
<tr><td>Fichero: <input type="file" name="fileficherito" required=""></td></tr>
<tr><td align="center">
<input class="btnsubmit" name="btnnuevo" value="Aceptar" type="submit"> 
<?php


echo '<a class="btnenlacecancel" href="index.php?module=lnxit&section=docs&id='.$idticket.'">Cancelar</a>'; 
?>

</td></tr>
</table>
</form>
</div>