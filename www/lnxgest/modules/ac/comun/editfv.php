<?php
$iddocumento = $_GET["id"];

//Consultamos si esta habilitado el control de stock

if($lnxinvoice == "ac"){$campobuscar = "stkupd_ac";}
if($lnxinvoice == "fc"){$campobuscar = "stkupd_fc";}
if($lnxinvoice == "av"){$campobuscar = "stkupd_av";}
if($lnxinvoice == "fv"){$campobuscar = "stkupd_fv";}

//leeremos configuracion
$sqlarticulo = $mysqli->query("select * from ".$prefixsql."empresa where campo = '".$campobuscar."'");
$row = mysqli_fetch_assoc($sqlarticulo);
$dbcontrolstock = $row["valor"]; //stock albaran de compra 


echo '<a class="btnedit" href="index.php?module='.$lnxinvoice.'&section=main&action=view&id='.$iddocumento.'">Volver Factura</a>';


$cnsprincipal= $mysqli->query("SELECT * from ".$prefixsql.$lnxinvoice." where id = '".$iddocumento."'");
$row = mysqli_fetch_assoc($cnsprincipal);
$dbcodigo = $row["codigo"];
$dbcodigoint = $rowprincipal["codigoint"];
$dbeditfv = $rowprincipal["editfv"];


?>
<p>&nbsp;</p>

<?php

if($dbeditfv > "0" && $dbcontrolstock == "yes")
{
	
	include("modules/".$lnxinvoice."/cstock/inicio.php");
	
}
else	
{

	echo '<div align="center">';

	echo '<form name="formestado" action="index.php?module='.$lnxinvoice.'&section=editfv&id='.$iddocumento.'&action=save" method="POST">';


	echo '<input type="hidden" name="hiddoc" value="'.$iddocumento.'" />';
	?>



<table style="max-width: 400px; width: 100%;" class="msgaviso">
	<?php
	if($dbeditfv > 0)
	{
		$texto = "¿Dejar de Modificar el documento?";
	}
	else
	{
		$texto = "¿Modificar un documento validado?";
	}
	

	

	echo '<tr class="maintitle"><td>Modificar documento</td></tr>
	<tr><td>'.$texto.'</td></tr>
	<tr><td align="center"><b>'.$dbcodigo.'</b></td></tr>
	<tr><td colspan="2">&nbsp;</td></tr>
	<tr><td colspan="2" align="center">';
	
	echo '<button type="submit" class="btnsubmit" > <i class="hidephonview fa fa-save fa-lg"></i> Aceptar</button> ';


	echo '<a class="btncancel" href="index.php?module='.$lnxinvoice.'&section=main&action=view&id='.$iddocumento.'"><i class="hidephonview fa fa-window-close fa-lg"> Cancelar</a>';
	
	echo '</td></tr></table>';
	if($dbcodigoint == '0'){echo '</form>'; } 
	echo '</div>';
}
?>