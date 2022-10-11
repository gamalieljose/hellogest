<?php				   
include("modules/lnxit/tickets/tabs.php");
?>
<p></p>
<div align="center">
<form name="form1" action="index.php?module=lnxit&section=tickets&action=save" method="post">
	<table width="300" class="msgaviso">
	<tr><td class="maintitle">mensaje:
	<input type="hidden" name="haccion" value="delete">
	<?php
	echo '<input type="hidden" name="hidticket" value="'.$_GET["id"].'">';
	?>
	</td></tr>
	<tr><td>
	<?php
	echo 'Se borrará el ticket y los seguimientos </br> ¿Esta usted seguro de borrar el ticket <b>'.$_GET["id"].'</b> en curso?';
	?>
	</td></tr>
	<tr><td align="center">
	<input class="btnsubmit" name="btnnuevo" value="Eliminar" type="submit"> 
	<a class="btnenlacecancel" href="index.php?module=lnxit&section=tickets&subsection=list">Cancelar</a>
	
	
	
	</td></tr>
	</table>
</form>
</div>
	
