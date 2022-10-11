<?php				   
include("modules/lnxit/activos/tabs.php");

echo '<p></p>';


//print_proceso.php

if ($_GET["print"] == '')
{

	
	echo '<form id="form1" name="form1" method="post" action="index.php?module=lnxit&section=activos&ss=docprint&id='.$_GET["id"].'&action=print">';
	echo '<input type="hidden" name="hidactivo" value="'.$_GET["id"].'">'; ?>
	
	
	<div align="center">
	<p>&nbsp;</p>
	<table width="300" class="msgfviso">
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
	<tr class="maintitle"><td>Selecione una impresora para ticket</td></tr>
	<tr><td align="center">
	<?php
	$sqlprinter= $mysqli->query("SELECT * from ".$prefixsql."impresoras where tipo = '3'");
	echo '<input type="checkbox" value="ticket" name="chkticket"/>';
	echo '<select name="lstprintertpv">';
	
	while($columna = mysqli_fetch_array($sqlprinter))
	{
		echo '<option value="'.$columna["id"].'">'.$columna["nombre"].' - '.$columna["notas"].'</option>';
	}
	echo '</select>';
	?>
	</td></tr>
	
	
	<tr><td align="center">
	<?php
	include("modules/lnxit/activos/docprint/docprint.php");
	?>
	</td></tr>
	
	<tr><td>&nbsp;</td></tr>
	<tr><td align="center"><input class="btnsubmit" name="btnprint" value="Imprimir" type="submit"> 

	<?php echo '<a class="btnenlacecancel" href="index.php?module=lnxit&section=activos&ss=activo&action=edit&id='.$_GET["id"].'">Cancelar</a>'; ?></td></tr>
	</table>
	</div>
	</form>
<?php
}
if ($_GET["print"] == 'list')
{
include("modules/lnxit/activos/docprint/print_proceso.php");

}







?>
