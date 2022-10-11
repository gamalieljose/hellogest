<?php
$iduser = $_GET["id"];
$idregistro = $_GET["idregistro"];


$sqlbuscar= $mysqli->query("SELECT * from ".$prefixsql."usersgroup where id = '".$idregistro."'");
$row = mysqli_fetch_assoc($sqlbuscar);
$dbidgrupo = $row['idgroup'];

$sqlaux1 = $mysqli->query("SELECT * from ".$prefixsql."groups where id = '".$dbidgrupo."'");
$row = mysqli_fetch_assoc($sqlaux1);
$dbgrupo = $row['grupo'];

?>

<form name="form1" action="index.php?&module=core&section=ugroups&action=save" method="POST">

<input type="hidden" name="haccion" value="delete">
<?php 
echo '<input type="hidden" name="hidusuario" value="'.$iduser.'">';
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

<?php echo ' <a class="btnenlacecancel" href="index.php?&module=core&section=ugroups&id='.$iduser.'">Cancelar</a>'; ?>
</td></tr>
</table>
</div>
</form>