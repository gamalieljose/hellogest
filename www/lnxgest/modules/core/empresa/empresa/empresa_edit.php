<?php
$sqlempresa= $mysqli->query("SELECT * from lnx_empresa order by orden");

echo '<form id="form1" name="form1" method="post" action="index.php?module=empresa&section=empresa&action=save">';

echo '<table>';
echo '<tr class="maintitle"><td></td><td></td><td>Descripcion</td></tr>';
while($row = mysqli_fetch_array($sqlempresa))
{
	$dbdisplay = $row["display"];
	$dbrequerido = $row["requerido"];
		if ($dbrequerido == '1'){$requerido = 'required=""';}else{$requerido = "";}
	$dbdescripcion = $row["descripcion"];
	$dbtipo = $row["tipo"];
	$dbcampo = $row["campo"];
	$dbvalor = $row["valor"];
		$tabla = $row["tabla"];
		$nombrecampo = $row["campotabla"];

	echo '<tr>';
	echo '<td>';
	echo $dbdisplay;
	echo '</td>';
	echo '<td>';
	if ($dbtipo == "0") //campo de texto
	{	
		echo '<input name="'.$dbcampo.'" value="'.$dbvalor.'" '.$requerido.' type="text" size="40">';
	}
	if ($dbtipo == "1") 
	{
		echo '<select name="'.$dbcampo.'">';
		
		if ($dbvalor == "yes") //campo si o no
		{
			echo '<option value="yes" selected>SI</option>';
			echo '<option value="no">NO</option>';
		}
		else
		{
			echo '<option value="yes">SI</option>';
			echo '<option value="no" selected>NO</option>';
		}
		echo '</select>';
	}
	if ($dbtipo == "2") //obtiene un listado
	{	
		
		$sqltablaux= $mysqli->query("SELECT id, ".$nombrecampo." as micampo from ".$prefixsql.$tabla);
		
		echo '<select name="'.$dbcampo.'">';
		
		while($colselect = mysqli_fetch_array($sqltablaux))
		{
			if ($dbvalor == $colselect["id"])
			{
				echo '<option value="'.$colselect["id"].'" selected>'.$colselect["micampo"].'</option>';
			}
			else
			{
				echo '<option value="'.$colselect["id"].'">'.$colselect["micampo"].'</option>';
			}
		}
		
		echo '</select>';
		
	}
	
	echo '</td>';
	echo '<td>'.$dbdescripcion.'</td>';
	echo '</tr>';
}
echo '</form>';
echo '<tr><td colspan="3" align="center">
	<input class="btnsubmit" name="btnsave" value="Aceptar" type="submit"> 

	<a class="btnenlacecancel" href="index.php?module=empresa&section=empresa">Cancelar</a>

	</td></tr>';


echo '</table>';



?>
