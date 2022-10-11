<?php
$cnssql = "SELECT * FROM ".$prefixsql."it_licensing where id = '".$_GET["idlicencia"]."'";
$ConsultaMySql= $mysqli->query($cnssql);
$row = mysqli_fetch_assoc($ConsultaMySql);
$dbproducto = $row["producto"];
$dblicencia = $row["licencia"];
$dbfecha = $row["fecha"];


$fano = substr($dbfecha, 0, 4);  
$fmes = substr($dbfecha, 5, 2);  
$fdia = substr($dbfecha, 8, 2);  

$cfecha = $fdia."/".$fmes."/".$fano;
?>



					   
<form name="form1" action="index.php?module=lnxit&section=activos&ss=licensing&action=save" method="post">
<?php
echo '<input type="hidden" value="'.$_GET["id"].'" name="hidactivo"/>';
echo '<input type="hidden" value="'.$_GET["idlicencia"].'" name="hidlicencia"/>';


?>
<input type="hidden" value="delete" name="haccion"/>';
<div align="center">




<table width="400" class="msgaviso">
<tr class="maintitle"><td colspan="4" align="center">Confirmacion eliminar licencia</td></tr>

<tr><td>Producto</td> <td><?php echo $dbproducto; ?></td></tr>
<tr><td>Licencia</td> <td><?php echo $dblicencia; ?></td></tr>
<tr><td>Fecha</td> <td><?php echo $cfecha; ?> </td></tr>
<tr><td colspan="2" align="center"> 
<?php

$sqlaux = $mysqli->query("select count(*) as contador from ".$prefixsql."it_licensing where idlic = '".$_GET["idlicencia"]."' "); 
$rowaux = mysqli_fetch_assoc($sqlaux);
$dbcontador = $rowaux["contador"];

if($dbcontador > 0)
{
    echo '<label><input type="checkbox" value="1" name="chkborrarlics" /> Eliminar de los activos la licencia vinculada </label>';
}

?>
</td></tr>

<tr><td colspan="2" align="center">&nbsp; </td></tr>
<tr><td colspan="2" align="center">
<input class="btnsubmit" name="btnnuevo" value="Eliminar" type="submit"> 

<?php echo '<a class="btncancel" href="index.php?module=lnxit&section=activos&ss=licensing&id='.$_GET["id"].'">Cancelar</a>'; ?>
</td></tr>
</table>
</div>
</form>