<?php
$iddocumento = $_GET["id"];

$cnsprincipal= $mysqli->query("SELECT * from ".$prefixsql.$lnxinvoice." where id = '".$iddocumento."'");
$row = mysqli_fetch_assoc($cnsprincipal);
$dbidfpago = $row["idfpago"];
$dbidcuenta = $row["idcuenta"];

$dbidcliente = $row["idtercero"];

$dbpc_cp = $row["pc_cp"];
$dbpc_dp = $row["pc_dp"];


$cnsprincipal= $mysqli->query("SELECT * from ".$prefixsql."terceros where id = '".$dbidcliente."'");
$row = mysqli_fetch_assoc($cnsprincipal);
$dbncuenta = $row["ncuenta"];


echo '<form name="formestado" action="index.php?module='.$lnxinvoice.'&section=fpago&id='.$iddocumento.'&action=save" method="POST">';

echo '<input type="hidden" name="hiddoc" value="'.$iddocumento.'" />';
?>
<div class="row">
	<div class="col maintitle">
		Editando Forma de pago
	</div>
</div>
<div class="row">
	<div class="col-sm-2">
	Formas de pago
	</div>
	<div class="col">
		<select name="lst_cp" class="campoencoger" />
<?php
	
$cnsselector = $mysqli->query("SELECT * from ".$prefixsql."bancos_cpago order by cpago");
while($col = mysqli_fetch_array($cnsselector))
{
	if($col["id"] == $dbpc_cp){$seleccionado = ' selected=""';}else{$seleccionado = '';}
	echo '<option value="'.$col["id"].'" '.$seleccionado.'>'.$col["cpago"].'</option>';
}
		
?>		
		</select>
	</div>
</div>
<div class="row">
	<div class="col-sm-2">
	Documento de pago
	</div>
	<div class="col">
		<select name="lst_dp" class="campoencoger" />
<?php
	
$cnsselector = $mysqli->query("SELECT * from ".$prefixsql."formaspago order by formapago");
while($col = mysqli_fetch_array($cnsselector))
{
	if($col["id"] == $dbpc_dp){$seleccionado = ' selected=""';}else{$seleccionado = '';}
	echo '<option value="'.$col["id"].'" '.$seleccionado.'>'.$col["formapago"].'</option>';
}
		
?>
		</select>
	</div>
</div>



<div align="center" class="rectangulobtnsguardar"> 
<button type="submit" class="btnsubmit" > <i class="hidephonview fa fa-save fa-lg"></i> Guardar</button> 
<?php
echo '<a href="index.php?module='.$lnxinvoice.'&section=main&action=view&id='.$iddocumento.'" class="btncancel"><i class="hidephonview fa fa-window-close fa-lg"></i> Cancelar</a> ';
?>
</div>



</form>
