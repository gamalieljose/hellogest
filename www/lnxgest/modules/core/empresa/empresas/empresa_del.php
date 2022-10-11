<?php
$idempresa = $_GET["id"];

$sqlaux = $mysqli->query("select * from ".$prefixsql."empresas where id = '".$idempresa."'");
$rowaux = mysqli_fetch_assoc($sqlaux);
$dbrazonsocial = $rowaux["razonsocial"];

?>


<form name="form1" method="POST" action ="index.php?module=core&section=empresas&action=save">
<input type="hidden" name="haccion" value="delete"/>
<?php echo '<input type="hidden" name="hidempresa" value="'.$idempresa.'."/>'; ?>

<div align="center">
	<table width="300" class="msgaviso">
	<tr><td class="maintitle"><?php echo LABEL_TITLEMISSAGE; ?></td></tr>
	<tr><td><?php echo LABEL_QDELEMPRESA; ?></td></tr>
	<tr><td align="center"><b><?php echo $dbrazonsocial; ?></b></td></tr>
	<tr><td>&nbsp;</td></tr>
	<tr><td align="center">
	<input class="btnsubmit" name="btneliminar" value="<?php echo LABEL_BTN_DEL; ?>" type="submit">
	
	<a class="btnenlacecancel" href="index.php?module=core&section=empresas"><?php echo LABEL_BTN_CANCEL; ?></a></td></tr>
	</table></div>

</form>


