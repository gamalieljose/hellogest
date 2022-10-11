<?php
$idterminal = $_GET["id"];

$sqlaux = $mysqli->query("select * from ".$prefixsql."pos_terminales where id = '".$idterminal."'");
$rowaux = mysqli_fetch_assoc($sqlaux);
$dbidtienda = $rowaux["idtienda"];
$dbdescripcion = $rowaux["descripcion"];

?>



<form name="form1" method="POST" action ="index.php?module=core&section=etiendas&action=saveterm">
<input type="hidden" name="haccion" value="delete"/>
<?php echo '<input type="hidden" name="hidterminal" value="'.$idterminal.'">'; ?>
<?php echo '<input type="hidden" name="hidtienda" value="'.$dbidtienda.'">'; ?>

<div align="center">
	<table style="max-width: 400px; width: 100%;"  class="msgaviso">
	<tr><td class="maintitle"><?php echo LABEL_TITLEMISSAGE; ?></td></tr>
	<tr><td><?php echo LABEL_QDELTERMINAL; ?></td></tr>
	<tr><td align="center"><b><?php echo $dbdescripcion; ?></b></td></tr>
	<tr><td>&nbsp;</td></tr>
	<tr><td align="center">
	<input class="btnsubmit" name="btneliminar" value="<?php echo LABEL_BTN_DEL; ?>" type="submit">
	
	<?php echo '<a class="btncancel" href="index.php?&module=core&section=etiendas&action=edit&id='.$dbidtienda.'">'.LABEL_BTN_CANCEL.'</a>'; ; ?></td></tr>
	</table></div>

</form>

