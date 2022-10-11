<?php
include("modules/core/users/users/botonera.php");

$iduser = $_GET["id"];
?>
<form name="form1" action="index.php?&module=core&section=ugroups&action=save" method="POST">
<p>Asignar grupo: 
<select name="lstgrupo">
<?php



$sqlgrupos = $mysqli->query("select ".$prefixsql."groups.id, ".$prefixsql."groups.grupo from ".$prefixsql."groups where ".$prefixsql."groups.id not in ( select idgroup from ".$prefixsql."usersgroup idgroup where iduser = '".$iduser."') order by ".$prefixsql."groups.grupo");
//$sqlgrupos = $mysqli->query("select * from ".$prefixsql."groups order by grupo");

while($columna = mysqli_fetch_array($sqlgrupos))
{
	echo '<option value="'.$columna["id"].'">'.$columna["grupo"].'</option>';
}
?>
</select>
<?php echo '<input type="hidden" value="'.$iduser.'" name="hidusuario"/>'; ?>
<input type="hidden" value="new" name="haccion"/>

<input type="submit" class="btnsubmit" value="Agregar grupo"/>
</p>
</form>

<table>
<tr class="maintitle"><td colspan="2">Grupos asigandos</td></tr>

<?php


$sqlgrupos = $mysqli->query("select * from ".$prefixsql."usersgroup where iduser= '".$iduser."'");

while($columna = mysqli_fetch_array($sqlgrupos))
{
	
	$sqlaux = $mysqli->query("SELECT * from ".$prefixsql."groups where id = '".$columna["idgroup"]."'");
	$row = mysqli_fetch_assoc($sqlaux);
	$dbgrupo = $row["grupo"];
	
	echo '<tr><td width="60"><a href="index.php?&module=core&section=ugroups&action=delete&id='.$iduser.'&idregistro='.$columna["id"].'" class="btncancel">Quitar</a></td><td>'.$dbgrupo.'</td></tr>';
}
?>



</table>