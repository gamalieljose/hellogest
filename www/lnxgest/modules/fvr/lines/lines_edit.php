<script>
function mutiplicar() {
m1 = document.getElementById("txtunidades").value;
m2 = document.getElementById("txtprecio").value;
m3 = document.getElementById("txtdto").value;
r = m1*m2;
rdto = (r*m3)/100;
r = r - rdto;
document.getElementById("txtimporte").value = Number(r).toFixed(2);
}
</script>
<?php
$idlinea = $_GET["idlinea"];
$iddocumento = $_GET["id"];

$cnssql= $mysqli->query("SELECT * from ".$prefixsql.$lnxinvoice."_lineas where id = '".$idlinea."'");
$rowlinea = mysqli_fetch_assoc($cnssql);
$dbcod = $rowlinea["cod"];
$dbconcepto = $rowlinea["concepto"];
$dbunid = $rowlinea["unid"];
$dbprecio = $rowlinea["precio"];
$dbdto = $rowlinea["dto"];
$dbimporte = $rowlinea["importe"];
$dbexclufactu = $rowlinea["exclufactu"];

$cnsaux= $mysqli->query("SELECT * from ".$prefixsql.$lnxinvoice." where id = '".$iddocumento."' ");
$rowaux = mysqli_fetch_assoc($cnsaux);
$dbidseriefv = $rowaux["idserie"];

?>
<p>&nbsp;</p>
<div align="center">
<table border="0" bgcolor="CCCCCC">
<tr class="maintitle">
	
	<td width="100">codventa</td>
	<td width="150">concepto</td>
	<td width="75">unidades</td>
	<td width="75">Precio</td>
	<td width="50">dto</td>
	<td width="75">importe</td>
	<td width="50">accion</td>
	
</tr>
<?php echo '<form name="form1" action="index.php?module='.$lnxinvoice.'&section=lines&action=save" method="POST">'; ?>
<input type="hidden" name="haccionlinea" value="update">

<?php
echo '<input type="hidden" name="hidlinea" value="'.$idlinea.'">';
echo '<input type="hidden" name="hiddocumento" value="'.$iddocumento.'">'; 
?>

<tr>
<?php
echo '<td><input type="text" value="'.$dbcod.'" name="txtcodventa"></td>';
echo '<td><input type="text" name="txtconcepto" value="'.$dbconcepto.'" style="width: 250px;" maxlength="35"></td>';
echo '<td><input type="number" name="txtunidades" id="txtunidades" value="'.$dbunid.'" style="width: 60px;" onChange="mutiplicar()"></td>';
echo '<td><input type="text" name="txtprecio" id="txtprecio" value="'.$dbprecio.'" style="width: 80px;" onChange="mutiplicar()"></td>';
echo '<td><input type="number" name="txtdto" id="txtdto" value="'.$dbdto.'" style="width: 50px;" onChange="mutiplicar()"></td>';
echo '<td><input type="text" name="txtimporte" id="txtimporte" value="'.$dbimporte.'" style="width: 80px;" readonly="readonly"></td>';
echo '<td><input type="submit" class="btnsubmit" value="Actualizar linea"/></td>';
?>
</tr>

</table>
<?php
if($dbexclufactu == '1'){$chkexclu = 'checked=""';}else{$chkexclu = '';}
echo '<p align="center"><input type="checkbox" name="chkexcluir" value="1" '.$chkexclu.'> Excluir</p>';
?>
<table>
<tr class="maintitle">
	<td>impuesto</td>
	<td>Valor</td>
	<td>importe</td>
</tr>
<tr>
<td>
<?php

//muestra los impuestos

$ssql_impuestos = $mysqli->query("SELECT * from ".$prefixsql.$lnxinvoice."_tax where ".$campomasterid." = '".$iddocumento."' ");
while($coltax = mysqli_fetch_array($ssql_impuestos))
{
	$cnsaux= $mysqli->query("SELECT * from ".$prefixsql."impuestos where id = '".$coltax["idimpuesto"]."'");
	$rowaux = mysqli_fetch_assoc($cnsaux);
	$dbimpuestonombre = $rowaux["impuesto"];
	
	$cnsaux= $mysqli->query("SELECT * from ".$prefixsql.$lnxinvoice." where id = '".$iddocumento."' ");
	$rowaux = mysqli_fetch_assoc($cnsaux);
	$dbidserie = $rowaux["idserie"];
	
	$cnsaux= $mysqli->query("SELECT * from ".$prefixsql."impuestosrules where idserie = '".$dbidserie."' and idimpuesto = '".$coltax["idimpuesto"]."'");
	$rowaux = mysqli_fetch_assoc($cnsaux);
	$dbeditabletax = $rowaux["editable"];
	
	//obtenemos valor actual de fv_lineas_tax
	$cnsaux= $mysqli->query("SELECT * from ".$prefixsql.$lnxinvoice."_lineas_tax where ".$campomasterid."linea = '".$idlinea."' and idtax = '".$coltax["idimpuesto"]."'");
	$rowaux = mysqli_fetch_assoc($cnsaux);
	$dblineavalor = $rowaux["valor"];
	$dblineaimporte = $rowaux["importe"];
	
	if ($dbexclufactu == '1' || $dblineavalor == '0')
	{//si se excluye, se ha de colorcar el valor por defecto
		//obtenemos valor actual de fv_tax
		$cnsaux= $mysqli->query("SELECT * from ".$prefixsql.$lnxinvoice."_tax where ".$campomasterid." = '".$iddocumento."' and idimpuesto = '".$coltax["idimpuesto"]."'");
		$rowaux = mysqli_fetch_assoc($cnsaux);
		$dblineavalor = $rowaux["valor"];
	}
	else
	{
		$dblineavalor = $rowaux["valor"]; 
	}
	
	
	echo '<tr>';
	
	if ($dbeditabletax == '1')
	{
		echo '<td>'.$dbimpuestonombre.'</td>';
		echo '<td><input type="number" name="txttax[]" value="'.$dblineavalor.'" style="width: 50px;"></td>';
	}
	else
	{
		
		echo '<td>'.$dbimpuestonombre.'</td>';
		echo '<td>'.$coltax["valor"].'<input type="hidden" name="txttax[]" value="'.$dblineavalor.'" style="width: 50px;"></td>';
	}
	echo '<td align="right">';
	echo $dblineaimporte;
	echo '<input type="hidden" value="'.$coltax["idimpuesto"].'" name="hidimpuesto[]">';
	echo '</td>';
	echo '</tr>';
}

?>
</td>
</tr>



</table>
</form>


<?php
echo '<p><a class="btnenlacecancel" href="index.php?module='.$lnxinvoice.'&section=main&action=view&id='.$iddocumento.'">Volver / Cancelar</a></p>';
?>

<?php echo '<form name="form2" action="index.php?module='.$lnxinvoice.'&section=linessn&action=save" method="POST">'; ?>
<input type="hidden" name="haccionlineasn" value="new">
<?php
echo '<input type="hidden" name="hidlinea" value="'.$idlinea.'">';
echo '<input type="hidden" name="hiddocumento" value="'.$iddocumento.'">'; 
?>

<table border="0" >
<tr class="maintitle">
<td></td>
<td>Num serie</td>
<td>Part number</td>
<td>Otro</td>
<td>&nbsp;</td>
</tr>

<tr bgcolor="CCCCCC">
<td></td>
<td><input type="text" name="txtsn" /></td>
<td><input type="text" name="txtpn" /></td>
<td><input type="text" name="txtotro" /></td>
<td><input type="submit" class="btnsubmit" value="Agregar" /></td>
</tr>
</form>
<?php

$ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql.$lnxinvoice."_sn where idlinea = '".$idlinea."'");
while($columna = mysqli_fetch_array($ConsultaMySql))
{
	echo '<tr>
	<td><a class="btnedit" href="index.php?module='.$lnxinvoice.'&section=linessn&action=edit&idlineasn='.$columna["id"].'">Editar</a></td>
	<td>'.$columna["sn"].'</td>
	<td>'.$columna["pn"].'</td>
	<td>'.$columna["otro"].'</td>
	<td><a class="btnenlacecancel" href="index.php?module='.$lnxinvoice.'&section=linessn&action=delete&idlineasn='.$columna["id"].'">Borrar</a></td>
	</tr>';		
}
?>

</table>
</div>