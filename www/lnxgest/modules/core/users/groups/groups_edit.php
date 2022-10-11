<?php 
$sqlbuscar= $mysqli->query("SELECT * from ".$prefixsql."groups where id = '".$_GET["id"]."'");
$row = mysqli_fetch_assoc($sqlbuscar);
$dbgrupo = $row["grupo"];

include("modules/core/users/groups/botonera.php");


?>


<form name="editgrupo" action="index.php?module=core&section=groups&action=save" method="post">
<div align="center">
<input type="hidden" name="haccion" value="update" />
<?php echo '<input type="hidden" name="hidgrupo" value="'.$_GET["id"].'" />'; ?>
	<table>
	<tr class="maintitle"><td colspan="2">Nuevo grupo</td></tr>
	<tr><td>Nombre del grupo</td><td>
	<?php echo '<input type="text" value="'.$dbgrupo.'" name="txtgrupo"/>'; ?></td></tr>

	<tr><td colspan="2" align="center">&nbsp; </td></tr>
	<tr><td colspan="2" align="center">
	<?php
	echo'<input class="btnsubmit" name="btneditusuario" value="Aceptar" type="submit"> ';

	echo '<a class="btncancel" href="index.php?&module=core&section=groups">Cancelar</a>';
	?>
	</td></tr></table>
	
	<h2 align="center">Tabla de permisos</h2>
	


<?php
$sqlmodulos = $mysqli->query("select * from ".$prefixsql."modulos order by display");
$modulos = $sqlmodulos->num_rows;

$modulosporcol = $modulos / 2;
$modulosporcol = ceil($modulosporcol);


$filas = 0;

echo '<table width="100%">';

while($columna = mysqli_fetch_array($sqlmodulos))
{
	$fila = $fila +1;
	if ($fila == 1)
	{
		echo '<tr><td align="center" width="50%">';
	}
	if ($fila == 2)
	{
		echo '<td align="center" width="50%">';
		
	}
	
	echo '<table width="100%">';
	echo '<tr class="maintitle"><td colspan="2">'.$columna["display"].'</td></tr>';
	
	$sqlpermisos = $mysqli->query("select * from ".$prefixsql."permisos where idmod = '".$columna["idmod"]."' order by display");
	while($colpermisos = mysqli_fetch_array($sqlpermisos))
	{
		$sqlcheckpermiso= $mysqli->query("SELECT * from ".$prefixsql."permisosgrupos where idgrupo = '".$_GET["id"]."' and idpermiso = '".$colpermisos["idpermiso"]."'");
		$existe = $sqlcheckpermiso->num_rows;
		
		if ($existe == '1'){$seleccionado = ' checked=""';}else{$seleccionado = '';}
		
		echo '<tr><td><input type="checkbox" value="'.$colpermisos["idpermiso"].'" name="chkpermiso[]" '.$seleccionado.'/></td>';
		echo '<td>'.$colpermisos["display"].'</td></tr>';
	}
	echo '</table>';
	
	
	
	
	if ($fila == 1)
	{
		echo '</td>';
	}
	if ($fila == 2)
	{		
		echo '</td></tr>';
		$fila = 0;
	}
}


?>

</table>

	<?php
	echo'<input class="btnsubmit" name="btneditusuario" value="Aceptar" type="submit"> ';

	echo '<a class="btncancel" href="index.php?&module=core&section=groups">Cancelar</a>';
	?>

	
</div>
</form>
