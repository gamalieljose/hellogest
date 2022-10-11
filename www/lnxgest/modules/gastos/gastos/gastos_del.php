<?php
$idregistro = $_GET["id"];

$sqlregistro = $mysqli->query("select * from ".$prefixsql."gastos where id = '".$idregistro."'"); 
$row = mysqli_fetch_assoc($sqlregistro);
$dbidserie = $row["idserie"];
$dbcodigo = $row["codigo"];
$dbfecha = $row["fecha"];
	$xtemp = explode("-", $dbfecha);
	$lbl_fecha = $xtemp[2]."/".$xtemp[1]."/".$xtemp[0];

$dbidtipogasto = $row["idtipogasto"];
$dbdescripcion = $row["descripcion"];
$dbimporte = $row["importe"];
$dbiduser = $row["iduser"];

$sqlfichero = $mysqli->query("select * from ".$prefixsql."ficheros_loc where module = 'gastos' and idlinea0 = '".$idregistro."'"); 
$row = mysqli_fetch_assoc($sqlfichero);
$dbidfichero = $row["idfichero"];



?>
<form name="frmgasto" method="POST" action="index.php?module=gastos&section=gastos&action=save" >
<input type="hidden" name="haccion" value="delete" />
<input type="hidden" name="hidregistro" value="<?php echo $idregistro; ?>"/>

<div align="center">
<table style="max-width: 400px; width: 100%;" class="msgaviso">
<tr class="maintitle"><th>Eliminar registro</th></tr>
<tr><td align="center">
¿Desea eliminar este gasto?</br>
<b><?php echo $dbcodigo; ?></b></br>
<i><?php echo $lbl_fecha; ?></i></br>
</br>

<?php echo $dbdescripcion; ?> 
</td></tr>
<?php
if($dbidfichero > 0)
{
    echo '<tr><td align="center">';
    echo '<input type="radio" name="delfichero" value="delloc" checked=""> Eliminar solo vinculacion con el fichero </br>
<input type="radio" name="delfichero" value="delfichero" > Eliminar fichero y todas sus vinculaciones';
    echo '</td></tr>';
}
?>
<tr><td>&nbsp;</td></tr>
<tr><td align="center">

<button type="submit" class="btnsubmit" > <i class="hidephonview fa fa-trash fa-lg"></i> Eliminar</button> 

<a href="index.php?module=gastos&section=gastos" class="btncancel"><i class="hidephonview fa fa-window-close fa-lg"></i> Cancelar</a> 
</td></tr>
</table>
</div>
</form>