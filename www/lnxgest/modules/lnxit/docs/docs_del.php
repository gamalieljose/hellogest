<?php
$idticket = $_GET["id"];
$archivo = $_GET["file"];

echo '<form name="form1" action="index.php?module=lnxit&section=docs&action=save&id='.$idticket.'" method="post">';
echo '<input type="hidden" name="haccion" value="delete">';
echo '<input type="hidden" name="hidticket" value="'.$idticket.'">';
echo '<input type="hidden" name="hfichero" value="'.$archivo.'">';
echo '<div align="center">
	<table width="300" class="msgaviso">
	<tr><td class="maintitle">mensaje:</td></tr>
	<tr><td>¿Desea eliminar el siguiente archivo?</td></tr>
	<tr><td><b>'.$archivo.'</b></td></tr>
	<tr><td>&nbsp;</td></tr>
	<tr><td align="center">
	<input class="btnsubmit" name="btnnuevo" value="Aceptar" type="submit"> 
	
	<a class="btnenlacecancel" href="#">Aceptar</a></td></tr>
	</table></div>';

?>