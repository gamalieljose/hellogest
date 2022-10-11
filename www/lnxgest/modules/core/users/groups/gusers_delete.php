<?php
$idgrupo = $_GET["id"];
$idregistro = $_GET["idregistro"];


$sqlbuscar= $mysqli->query("SELECT * from ".$prefixsql."usersgroup where id = '".$idregistro."'");
$row = mysqli_fetch_assoc($sqlbuscar);
$dbiduser = $row['iduser'];

$sqlaux1 = $mysqli->query("SELECT * from ".$prefixsql."users where id = '".$dbiduser."'");
$row = mysqli_fetch_assoc($sqlaux1);
$dbgrupo = $row['display'];

?>

<form name="form1" action="index.php?&module=core&section=gusers&action=save" method="POST">

<input type="hidden" name="haccion" value="delete">
<?php 
echo '<input type="hidden" name="hidgrupo" value="'.$idgrupo.'">';
echo '<input type="hidden" name="hidregistro" value="'.$idregistro.'">';
?>
<div align="center">
<p>&nbsp;</p>
<table class="msgaviso">
<tr class="maintitle"><td>Confirmación de borrado</td></tr>
<tr><td>Quitar del grupo: <?php echo $dbgrupo; ?>
<tr><td colspan="2" align="center">&nbsp; </td></tr>
<tr><td colspan="2" align="center">
<input class="btnsubmit" name="btneditusuario" value="Quitar" type="submit"> 

<?php echo ' <a class="btnenlacecancel" href="index.php?&module=core&section=gusers&id='.$idgrupo.'">Cancelar</a>'; ?>
</td></tr>
</table>
</div>
</form>