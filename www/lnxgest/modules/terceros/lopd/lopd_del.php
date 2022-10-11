<?php
$idplantilla = $_GET["id"];

$sqlaux = $mysqli->query("select * from ".$prefixsql."lopd where id = '".$idplantilla."' ");
$row = mysqli_fetch_assoc($sqlaux);
$dbidempresa = $row["idempresa"];
$dbidcatlopd = $row["idcatlopd"];
$dbnomdoc = $row["nomdoc"];
?>

<form name="frmplantillalopd" action="index.php?module=terceros&section=lopd&action=save" enctype="multipart/form-data" method="POST" >
<input type="hidden" name="haccion" value="delete" />
<?php echo '<input type="hidden" name="hidplantilla" value="'.$idplantilla.'" />'; ?>

<div align="center">
	<table width="300" class="msgaviso">
		<tr class="maintitle"><td>Eliminar plantilla</td></tr>
		<tr><td align="center">
		¿Desea eliminar esta plantilla y los enlaces al fichero? </br>
		<b><?php echo $dbnomdoc; ?></b>
		</br>
		</br>
		
		
		<input class="btnsubmit" name="btnnuevousuario" value="Eliminar" type="submit"> 

<a class="btncancel" href="index.php?module=terceros&section=lopd">Cancelar</a>
		</td></tr>
	
	</table>

</div>

</form>