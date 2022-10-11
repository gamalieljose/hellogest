<?php
include("modules/core/users/groups/botonera.php");

$idgrupo = $_GET["id"];
?>
<form name="form1" action="index.php?&module=core&section=gusers&action=save" method="POST">
						   
<p>Asignar usuario al grupo: 
<select name="lstusuarios">
<?php



$sqlgrupos = $mysqli->query("select ".$prefixsql."users.id, ".$prefixsql."users.display from ".$prefixsql."users where ".$prefixsql."users.id not in ( select iduser from ".$prefixsql."usersgroup iduser where idgroup = '".$idgrupo."') order by ".$prefixsql."users.display");
//$sqlgrupos = $mysqli->query("select * from ".$prefixsql."groups order by grupo");

while($columna = mysqli_fetch_array($sqlgrupos))
{
	echo '<option value="'.$columna["id"].'">'.$columna["display"].'</option>';
}
?>
</select>
<?php echo '<input type="hidden" value="'.$idgrupo.'" name="hidgrupo"/>'; ?>
<input type="hidden" value="new" name="haccion"/>

<input type="submit" class="btnsubmit" value="Agregar grupo"/>
</p>
</form>

<table>
<tr class="maintitle"><td colspan="2">Usuarios que pertenecen al grupo</td></tr>

<?php


$sqlgrupos = $mysqli->query("select * from ".$prefixsql."usersgroup where idgroup = '".$idgrupo."'");

while($columna = mysqli_fetch_array($sqlgrupos))
{
	
	$sqlaux = $mysqli->query("SELECT * from ".$prefixsql."users where id = '".$columna["iduser"]."'");
	$row = mysqli_fetch_assoc($sqlaux);
	$dbgrupo = $row["display"];
	
	echo '<tr><td width="60"><a href="index.php?&module=core&section=gusers&action=delete&id='.$idgrupo.'&idregistro='.$columna["id"].'" class="btncancel">Quitar</a></td><td>'.$dbgrupo.'</td></tr>';
}
?>



</table>