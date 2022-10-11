<?php
$iddocumento = $_GET["id"];

$xtemp = explode("-", $_GET["targetb"]);
$tipob = strtoupper($xtemp[1]);
$idtipob = $xtemp[0];

$sqlaux = $mysqli->query("select * from ".$prefixsql.$lnxinvoice." where id = '".$iddocumento."'"); 
$rowaux = mysqli_fetch_assoc($sqlaux);
$lbl_doctipoa = $rowaux["codigo"];

$sqlregistro = $mysqli->query("select * from ".$prefixsql."opafr where tipoa = '".strtoupper($lnxinvoice)."' and idtipoa = '".$iddocumento."' and tipob = '".$tipob."' and idtipob = '".$idtipob."'"); 
$row = mysqli_fetch_assoc($sqlregistro);


if(strtoupper($lnxinvoice) == "OV"){$lbl_tipoa = "Presupuesto Venta";}
if(strtoupper($lnxinvoice) == "OC"){$lbl_tipoa = "Presupuesto Compra";}
if(strtoupper($lnxinvoice) == "PV"){$lbl_tipoa = "Pedido Venta";}
if(strtoupper($lnxinvoice) == "PC"){$lbl_tipoa = "Pedido Compra";}
if(strtoupper($lnxinvoice) == "AV"){$lbl_tipoa = "Albaran Venta";}
if(strtoupper($lnxinvoice) == "AC"){$lbl_tipoa = "Albaran Compra";}
if(strtoupper($lnxinvoice) == "FV"){$lbl_tipoa = "Factura Venta";}
if(strtoupper($lnxinvoice) == "FC"){$lbl_tipoa = "Factura Compra";}
if(strtoupper($lnxinvoice) == "FVR"){$lbl_tipoa = "Factura V. Rectificativa";}

if($row["tipob"] == "OV"){$lbl_tipob = "Presupuesto Venta";}
if($row["tipob"] == "OC"){$lbl_tipob = "Presupuesto Compra";}
if($row["tipob"] == "PV"){$lbl_tipob = "Pedido Venta";}
if($row["tipob"] == "PC"){$lbl_tipob = "Pedido Compra";}
if($row["tipob"] == "AV"){$lbl_tipob = "Albaran Venta";}
if($row["tipob"] == "AC"){$lbl_tipob = "Albaran Compra";}
if($row["tipob"] == "FV"){$lbl_tipob = "Factura Venta";}
if($row["tipob"] == "FC"){$lbl_tipob = "Factura Compra";}
if($row["tipob"] == "FVR"){$lbl_tipob = "Factura V. Rectificativa";}

$sqlaux = $mysqli->query("select * from ".$prefixsql.strtolower($tipob)." where id = '".$row["idtipob"]."'"); 
$rowaux = mysqli_fetch_assoc($sqlaux);
$lbl_doctipob = $rowaux["codigo"];





echo '<form name="frmlinkdoc" method="POST" action="index.php?module='.$lnxinvoice.'&section=links&action=save" >';
?>
<input type="hidden" name="haccion" value="delete" />
<input type="hidden" name="hidmasterdoc" value="<?php echo $iddocumento; ?>" />
<input type="hidden" name="htipoa" value="<?php echo $lnxinvoice; ?>" />

<input type="hidden" name="htipob" value="<?php echo $row["tipob"]; ?>" />
<input type="hidden" name="hidtipob" value="<?php echo $row["idtipob"]; ?>" />


<div align="center">
<table style="max-width: 400px; width: 100%;" class="msgaviso">
<tr class="maintitle"><th>Eliminar registro</th></tr>
<tr><td align="center">
¿Desea eliminar este vinculo?</br>
<b><?php echo $lbl_tipoa.": ".$lbl_doctipoa; ?></b></br>
<i><?php echo $lbl_tipob.": ".$lbl_doctipob; ?></i>
<p></p>
</td></tr>
<tr><td align="center">
<button type="submit" class="btnsubmit" > <i class="hidephonview fa fa-trash fa-lg"></i> Eliminar</button> 

<?php 
echo '<a href="index.php?module='.$lnxinvoice.'&section=links&id='.$iddocumento.'" class="btncancel"><i class="hidephonview fa fa-window-close fa-lg"></i> Cancelar</a> ';
?>
</td></tr>
</table>
</div>

</form>