<?php
$idlibro = $_GET["idlibro"];


$sqllibro= $mysqli->query("select * from ".$sqlpfxbiblio."libros where id = '".$idlibro."'");
$row = mysqli_fetch_assoc($sqllibro);
$dblibro = $row['libro'];

?>
<form name="form1" method="post" action="index.php?module=biblio&section=libros&action=save">
<div align="center">
<table width="400" border="0" cellspacing="0" cellpadding="0">
  <tr class="maintitle">
    <th colspan="2" scope="col"><div align="left">Eliminar libro </div></th>
  </tr>
  <tr>
    <td>&iquest;Desea eliminar el siguiente libro? </td><tr></tr>
<tr>    <td>
      <?php echo '<b>'.$dblibro.'</b>'; ?>
	  <input name="haccion" type="hidden" value="delete">
	  <?php echo '<input name="hidlibro" type="hidden" value="'.$idlibro.'">'; ?>
    </td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
    </tr>
  <tr>
    <td colspan="2"><div align="center">
      <input type="submit" class="btnsubmit" name="Submit" value="Eliminar">
      <a class="btncancel" href="index.php?module=biblio&section=libros">Cancelar</a></div></td>
    </tr>
</table>
</div>
</form>
