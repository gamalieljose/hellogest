<?php
$sqlbuscar= $mysqli->query("SELECT * from ".$prefixsql."users where id = '".$_GET["id"]."'");
$row = mysqli_fetch_assoc($sqlbuscar);
$dbusername = $row['username'];
$dbdisplay = $row['display'];
$dbncuenta = $row["ncuenta"];
$dbtel = $row["tel"];
$dbemail = $row["email"];
$dbdir = $row["dir"];
$dbcp = $row["cp"];
$dbpobla = $row["pobla"];
$dbidprov = $row["idprov"];
$dbidpais = $row["idpais"];
$dbactivo = $row["activo"];
$dbididioma = $row["ididioma"];
$dbnif = $row["nif"];


include("modules/core/users/users/botonera.php");

?>


<form name="editausuario" action="index.php?module=core&section=users&action=save&tab=0" method="post">

<input type="hidden" name="haccion" value="delete">
<?php echo '<input type="hidden" name="hiduser" value="'.$_GET["id"].'">'; ?>

<div align="center">

<table width="300" class="msgaviso">
<tr class="maintitle"><td>Eliminación de usuario</td></tr>
<tr><td align="center">
¿Desea eliminar el siguiente usuario? </br>
<?php echo '<b>'.$dbdisplay.'</b>'; ?></br></br>
Recuerde que esta acción NO es reversible, puede afectar a todos los registros que este este usuario.
<p>&nbsp;</p>
</td></tr>
<tr><td align="center">
<input class="btnsubmit" name="btnguardar" value="Eliminar" type="submit"> 


<a class="btncancel" href="index.php?module=core&section=users">Cancelar</a>
</td></tr>
</table>

</div>










</form>