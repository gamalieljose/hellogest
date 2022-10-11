<?php
$idautor = $_GET["idautor"];


$sqlautor= $mysqli->query("select * from ".$sqlpfxbiblio."autores where id = '".$idautor."'");
$row = mysqli_fetch_assoc($sqlautor);
$dbautor = $row['autor'];

?>
<form name="form1" method="post" action="index.php?module=biblio&section=autores&action=save">
<div align="center">
<table width="400" border="0" cellspacing="0" cellpadding="0">
  <tr class="maintitle">
    <th colspan="2" scope="col"><div align="left">Eliminar autor </div></th>
  </tr>
  <tr>
    <td>&iquest;Desea eliminar el siguiente autor? </td><tr></tr>
<tr>    <td>
      <?php echo '<b>'.$dbautor.'</b>'; ?>
	  <input name="haccion" type="hidden" value="delete">
	  <?php echo '<input name="hidautor" type="hidden" value="'.$idautor.'">'; ?>
    </td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
    </tr>
  <tr>
    <td colspan="2"><div align="center">
      <input type="submit" class="btnsubmit" name="Submit" value="Eliminar">
      <a class="btncancel" href="index.php?module=biblio&section=autores">Cancelar</a></div></td>
    </tr>
</table>
</div>
</form>
