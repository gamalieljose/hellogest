<?php
$idcategoria = $_GET["idcategoria"];


$sqlcategoria= $mysqli->query("select * from ".$sqlpfxbiblio."categorias where id = '".$idcategoria."'");
$row = mysqli_fetch_assoc($sqlcategoria);
$dbcategoria = $row['categoria'];

?>
<form name="form1" method="post" action="index.php?module=biblio&section=categorias&action=save">
<div align="center">
<table width="400" border="0" cellspacing="0" cellpadding="0">
  <tr class="maintitle">
    <th colspan="2" scope="col"><div align="left">Eliminar categoria </div></th>
  </tr>
  <tr>
    <td>&iquest;Desea eliminar el siguiente categoria? </td><tr></tr>
<tr>    <td>
      <?php echo '<b>'.$dbcategoria.'</b>'; ?>
	  <input name="haccion" type="hidden" value="delete">
	  <?php echo '<input name="hidcategoria" type="hidden" value="'.$idcategoria.'">'; ?>
    </td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
    </tr>
  <tr>
    <td colspan="2"><div align="center">
      <input type="submit" class="btnsubmit" name="Submit" value="Eliminar">
      <a class="btncancel" href="index.php?module=biblio&section=categorias">Cancelar</a></div></td>
    </tr>
</table>
</div>
</form>
