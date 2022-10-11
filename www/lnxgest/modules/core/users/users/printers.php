<?php

include("modules/core/users/users/botonera.php");

$iduser = $_GET["id"];


?>
<form name="frmanadir" action="index.php?&module=core&section=users_printers&action=save" method="POST">

<div class="row">
  <div class="col-sm-2">
	Agregar impresora
  </div>
  <div class="col" align="left">
  <select name="lstimpresora" style="width: calc(100% - 100px);">
<?php

$sqlimpresorasdisponibles = $mysqli->query("select * From ".$prefixsql."impresoras where Not id In (Select idprinter From ".$prefixsql."usersprinters where iduser = '".$iduser."')");
$existe = $sqlimpresorasdisponibles->num_rows;
while($columna = mysqli_fetch_array($sqlimpresorasdisponibles))
{
	echo '<option value="'.$columna["id"].'">'.$columna["nombre"].' - '.$columna["notas"].'</option>';
}
?>
</select>
<?php
if ($existe > "0")
{
	echo '<input type="submit" value="Agregar" class="btnsubmit"/>';
}
echo '<input type="hidden" value="'.$iduser.'" name="hiduser"/>'; 

?>

<input type="hidden" value="addprinter" name="haccion"/>
  </div>
</div>

</form>
<?php
if($_GET["upd"] == "ate")
{
echo '<div class="animated fadeOut" align="center" style="width:100%;">
Cambios aplicados con éxito
</div>';
}
?>

<form name="frmpredeterminar" action="index.php?&module=core&section=users_printers&action=save" method="POST">
<?php echo '<input type="hidden" value="'.$iduser.'" name="hiduser"/>'; ?>
<input type="hidden" value="predeterminar" name="haccion"/>

<table width="100%">
<tr class="maintitle">
	<td width="60">&nbsp;</td>
	<td width="60">Predeterminada</td>
	<td>Impresora</td>
</tr>

<?php
if ($color == '1')
	{
		$color = '2';
		$pintacolor = "listacolor2";
	}
	else
	{
		$color = '1';
		$pintacolor = "listacolor1";
	}
	$sqlaux = $mysqli->query("SELECT max(dft) as contador from ".$prefixsql."usersprinters where iduser = '".$iduser."'");
	$rowaux = mysqli_fetch_assoc($sqlaux);
	$dbcontador = $rowaux["contador"];
	
	if ($dbcontador == "0" || $dbcontador == "" ){$seleccionado = ' checked="checked"';}else{$seleccionado = '';}
	

	echo "<tr class=\"".$pintacolor."\" onmouseover=\"this.className = 'listacolorsobre'\" onmouseout=\"this.className = '".$pintacolor."'\">";
echo '<td>&nbsp;</td>';
echo '<td align="center"><input type="radio" name="chkdft" value="0" '.$seleccionado.'/></td>';
echo '<td>PDF - Impresora PDF</td>';
echo '</tr>';


$sqlimpresoras = $mysqli->query("select * from ".$prefixsql."usersprinters where iduser = '".$iduser."' ");
while($columna = mysqli_fetch_array($sqlimpresoras))
{
	if ($color == '1')
	{
		$color = '2';
		$pintacolor = "listacolor2";
	}
	else
	{
		$color = '1';
		$pintacolor = "listacolor1";
	}
	$sqlaux = $mysqli->query("SELECT * from ".$prefixsql."impresoras where id = '".$columna["idprinter"]."'");
	$rowaux = mysqli_fetch_assoc($sqlaux);
	$dbimpresora = $rowaux["nombre"]." - ".$rowaux["notas"];;

	echo "<tr class=\"".$pintacolor."\" onmouseover=\"this.className = 'listacolorsobre'\" onmouseout=\"this.className = '".$pintacolor."'\">";
	echo '<td><a href="index.php?&module=core&section=users_printers&action=del&id='.$iduser.'&idprintuser='.$columna["idprinter"].'" class="btnenlacecancel">Quitar</a></td>';
	echo '<td align="center">';
		
	if ($columna["dft"] == "1"){$seleccionado = ' checked=""';}else{$seleccionado = '';}
	
	echo '<input type="radio" name="chkdft" value="'.$columna["id"].'" '.$seleccionado.'/>';
	
	echo '</td>';
	echo '<td>'.$dbimpresora.'</td>';
	echo '</tr>';
}
?>


</table>


<div align="center" class="rectangulobtnsguardar">

<input class="btnsubmit" name="btnguardar" value="Guardar cambios" type="submit"> 

</div>
</form>
