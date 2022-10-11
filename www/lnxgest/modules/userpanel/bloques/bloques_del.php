<?php
$idregistro = $_GET["id"];

$sqlaux = $mysqli->query("select * from ".$prefixsql."users_mainview where id = '".$idregistro."' "); 
$rowaux = mysqli_fetch_assoc($sqlaux);
$dbdisplay = $rowaux["display"];
$dbenlace = $rowaux["enlace"];
$dbventana = $rowaux["ventana"];
$dborden = $rowaux["orden"];
$dbicono = $rowaux["icono"];
?>
<form name="frmbloques" method="POST" action="index.php?module=userpanel&section=bloques&action=save" >
<input type="hidden" name="haccion" value="delete" />
<input type="hidden" name="hidregistro" value="<?php echo $idregistro; ?>" />
<div align="center">
	<table width="400" class="msgaviso">
	<tr><td class="maintitle">Eliminar Bloque</td></tr>
    <tr><td align="center">
    <p>¿Desea eliminar este bloque?</p>

    <p><?php echo "<b>".$dbdisplay."</b> --> ".$dbenlace; ?></p>

    <p>

    <button type="submit" class="btnsubmit" >
        <i class="hidephonview fa fa-save fa-lg"></i> Eliminar
    </button>
		
    <a href="index.php?module=userpanel&section=bloques" class="btncancel"><i class="hidephonview fa fa-window-close fa-lg"></i> Cancelar</a>
    
    </p>

    </tr></td>
    </table>
</div>
</form>