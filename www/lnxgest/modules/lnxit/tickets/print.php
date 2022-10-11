<?php				   
include("modules/lnxit/tickets/tabs.php");

echo '<p></p>';


//print_proceso.php

if ($_GET["print"] == '')
{

	?>
	<form id="form1" name="form1" method="post" action="index.php?module=lnxit&section=print&action=print">
	<?php echo '<input type="hidden" name="hidticket" value="'.$_GET["id"].'">'; ?>
	
	
	<div align="center">
	<p>&nbsp;</p>
	<table width="300" class="msgaviso">
	<tr class="maintitle"><td>Selecione una impresora</td></tr>
	<tr><td align="center">
	<?php
	$sqlprinter= $mysqli->query("SELECT * from ".$prefixsql."impresoras");
	echo '<select name="lstprinter">';
	echo '<option value="0">PDF - Impresora PDF</option>';
	while($columna = mysqli_fetch_array($sqlprinter))
	{
		echo '<option value="'.$columna["id"].'">'.$columna["nombre"].' - '.$columna["notas"].'</option>';
	}
	echo '</select>';
	?>
	</td></tr>
	
	
	
	
	<tr><td align="center">
	<?php
	include("modules/lnxit/docprint/docprint.php");
	?>
	</td></tr>
	<tr><td align="center"><input type="checkbox" name="chkseguimientos" value="1"/> Imprimir también el seguimiento</td></tr>
	<tr><td>&nbsp;</td></tr>
	<tr><td align="center"><input class="btnsubmit" name="btnprint" value="Imprimir" type="submit"> 

	<?php echo '<a class="btnenlacecancel" href="index.php?module=lnxit&section=tickets&action=edit&id='.$_GET["id"].'">Cancelar</a>'; ?></td></tr>
	</table>
	</div>
	</form>
<?php
}
if ($_GET["print"] == 'list')
{
include("modules/terceros/print_proceso.php");

}







?>
