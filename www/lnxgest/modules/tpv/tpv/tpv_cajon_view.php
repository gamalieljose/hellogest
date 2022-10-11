<?php
$idmovimiento = $_GET["id"];

$sqlaux = $mysqli->query("select * from ".$prefixsql."tpv_cajon where id = '".$idmovimiento."' "); 
$rowaux = mysqli_fetch_assoc($sqlaux);
$idtpv = $rowaux["idtpv"];
$dbcodigo = $rowaux["codigo"];
$dbfecha = $rowaux["fecha"];
$dbidtercero = $rowaux["idtercero"];
$dbtipomov = $rowaux["tipomov"];
$dbmotivo = $rowaux["motivo"];
$dbimporte = $rowaux["importe"];
$dbidfpago = $rowaux["idfpago"];
$dbiduser = $rowaux["iduser"];

if($dbidtercero > '0')
{
	$sqlaux = $mysqli->query("select * from ".$prefixsql."terceros where id = '".$dbidtercero."' "); 
	$rowaux = mysqli_fetch_assoc($sqlaux);
	$lbl_tercero = $rowaux["razonsocial"];
}
else
{
	$lbl_tercero = '';
}

if($dbtipomov == 'IN'){$lbl_movimiento = '<i class="fas fa-sign-in-alt" alt="Entrada" title="Entrada"></i> Entrada de dinero';}
if($dbtipomov == 'OUT'){$lbl_movimiento = '<i class="fas fa-external-link-alt" alt="Salida" title="Salida"></i> Salida de dinero';}



$sqlaux = $mysqli->query("select * from ".$prefixsql."formaspago where id = '".$dbidfpago."' "); 
$rowaux = mysqli_fetch_assoc($sqlaux);
$lbl_fpago = $rowaux["formapago"];


$sqlaux = $mysqli->query("select * from ".$prefixsql."users where id = '".$dbiduser."' "); 
$rowaux = mysqli_fetch_assoc($sqlaux);
$lbl_display = $rowaux["display"];
?>

    
<div class="row">
    <div class="col maintitle">
        Visualizando movimiento
    </div>
</div>
<div class="row">
    <div class="col-sm-2">
        Num Movimiento
    </div>
    <div class="col">
        <?php echo '<b>'.$dbcodigo.'</b>'; ?>
    </div>
</div>
<div class="row">
    <div class="col-sm-2">
        Fecha
    </div>
    <div class="col">
        <?php echo $dbfecha; ?>
    </div>
</div>
<div class="row">
    <div class="col-sm-2" align="left">
        Tercero
    </div>
    <div class="col" align="left">
<?php echo $lbl_tercero; ?>
    </div>
</div>
<div class="row">
    <div class="col-sm-2">
        Tipo movimiento
    </div>
    <div class="col">
        <?php echo $lbl_movimiento; ?>
    </div>
</div>
<div class="row">
    <div class="col-sm-2">
        Motivo
    </div>
    <div class="col">
        <?php echo $dbmotivo; ?>
    </div>
</div>
<div class="row">
    <div class="col-sm-2">
        Importe
    </div>
    <div class="col">
        <?php echo $dbimporte; ?>
    </div>
</div>
<div class="row">
    <div class="col-sm-2" align="left">
        Forma pago
    </div>
    <div class="col" align="left">
<?php echo $lbl_fpago; ?>
    </div>
</div>  
    
    
<div class="row">
    <div class="col-sm-2">
        Usuario
    </div>
    <div class="col">
<?php echo $lbl_display; ?>
    </div>
</div>

<?php
echo '<form name="frmcajon" method="POST" action="index.php?module=tpv&section=cajon&action=edit&id='.$idmovimiento.'" >';
?>
<input type="hidden" name="hidmovimiento" value="<?php echo $idmovimiento; ?>" />
<div align="center" class="rectangulobtnsguardar">

<input class="btnsubmit" name="btnguardar" value="Editar" type="submit"> 

<?php

echo '<a class="btncancel" href="index.php?module=tpv&section=mov">Cancelar</a>';
?>

</div>

<form>
