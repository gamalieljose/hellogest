
<p>&nbsp;</p>
<form name="editgrupo" action="index.php?module=core&section=groups&action=save" method="post">
<div align="center">
	<input type="hidden" name="haccion" value="new" />
	<table>
	<tr class="maintitle"><td colspan="2">Nuevo grupo</td></tr>
	<tr><td>Nombre del grupo</td><td><input type="text" value="" name="txtgrupo"/></td></tr>

	<tr><td colspan="2" align="center">&nbsp; </td></tr>
	<tr><td colspan="2" align="center">
	<?php
	echo'<input class="btnsubmit" name="btneditusuario" value="Aceptar" type="submit"> ';

	echo '<a class="btncancel" href="index.php?&module=core&section=groups">Cancelar</a>';
	?>
	</td></tr></table>
	
	<h2 align="center">Tabla de permisos</h2>
	
<table>

<?php
$sqlmodulos = $mysqli->query("select * from ".$prefixsql."modulos order by display");
while($columna = mysqli_fetch_array($sqlmodulos))
{
	echo '<tr class="maintitle"><td colspan="2">'.$columna["display"].'</td></tr>';
	
	$sqlpermisos = $mysqli->query("select * from ".$prefixsql."permisos where idmod = '".$columna["idmod"]."' order by display");
	while($colpermisos = mysqli_fetch_array($sqlpermisos))
	{
		echo '<tr><td><input type="checkbox" value="'.$colpermisos["idpermiso"].'" name="chkpermiso[]"</td>';
		echo '<td>'.$colpermisos["display"].'</td></tr>';
	}
}
?>

</table>	
	
	
	
	
</div>
</form>
