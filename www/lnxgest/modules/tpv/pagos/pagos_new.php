<script>
function validanumeros(e){
    tecla = (document.all) ? e.keyCode : e.which;

    //Tecla de retroceso para borrar, siempre la permite
    if (tecla==8){
        return true;
    }
        
    // Patron de entrada, en este caso solo acepta numeros
    patron =/[0-9,"."]/;
    tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);
}
</script>

<?php
$idtpv = $_GET["idtpv"];

$fechahoy = date("d/m/Y");

$cnsaux = $mysqli->query("SELECT sum(importe) as sumapagos from ".$prefixsql."tpv_pagos where idtpv = '".$idtpv."' and (tipo = 'TCKT' or tipo = 'TPAGO') ");              
$rowaux = mysqli_fetch_assoc($cnsaux);
$dbpagado = $rowaux["sumapagos"];
$dbpagado = round($dbpagado, 2);

$sqlaux = $mysqli->query("select sum(importe) as contador from ".$prefixsql."tpv_lineas where idtpv = '".$idtpv."' "); 
$rowaux = mysqli_fetch_assoc($sqlaux);
$tpv_bi = $rowaux["contador"];

$cnsaux = $mysqli->query("SELECT sum(importe) as sumatax from ".$prefixsql."tpv_lineas_tax where idtpv = '".$idtpv."'");
$rowaux = mysqli_fetch_assoc($cnsaux);
$tpv_taxes = $rowaux["sumatax"];

$tpv_total = $tpv_bi + $tpv_taxes;

$tpv_total = round($tpv_total, 2);

$faltapagar = $tpv_total - $dbpagado;

?>
<form name="frmpagos" method="POST" action="index.php?module=tpv&section=pagos&action=save">
    
<input type="hidden" name="haccion"  value="new" />
<input type="hidden" name="hidtpv"  value="<?php echo $idtpv; ?>" />
<div class="row">
    <div class="col maintitle" align="left">
        Nuevo pago
    </div>
</div>
<div class="row">
    <div class="col-sm-2" align="left">
        Fecha
    </div>
    <div class="col" align="left">
        <?php echo $fechahoy; ?>
    </div>
</div>
<div class="row">
    <div class="col-sm-2" align="left">
        Forma Pago
    </div>
    <div class="col" align="left">
        <select name="lstfpago" class="campoencoger" />
<?php
$cnslineas = $mysqli->query("SELECT * FROM ".$prefixsql."formaspago order by formapago asc");
while($col = mysqli_fetch_array($cnslineas))
{
    echo '<option value="'.$col["id"].'">'.$col["formapago"].'</option>';
}
?>
        </select>
    </div>
</div>    
<div class="row">
    <div class="col-sm-2" align="left">
        Importe
    </div>
    <div class="col" align="left">
        <input type="text" name="txtimporte" onkeypress="return validanumeros(event)" value="<?php echo $faltapagar; ?>">
    </div>
</div>
<div class="row">
    <div class="col-sm-2" align="left">
        
    </div>
    <div class="col" align="left">
        <p>Pagado hasta la fecha: </br>
            <?php echo $dbpagado; ?> Euros</p>
        <p>Pendiente: </br>
            <?php echo $faltapagar; ?> Euros</p>
    </div>
</div>

<div class="row">
    <div class="col-sm-2" align="left">
        Usuario
    </div>
    <div class="col" align="left">
        
<?php
        $cnsempresas = $mysqli->query("SELECT * from ".$prefixsql."users order by display");
	echo '<select id="lstusuarios" name="lstusuarios" style="width: 100%;">';
	while($col = mysqli_fetch_array($cnsempresas))
	{
            if($col["id"] == $_COOKIE["lnxuserid"]){$seleccionado = ' selected=""';}else{$seleccionado = '';}
            echo '<option value="'.$col["id"].'" '.$seleccionado.'>'.$col["display"].'</option>';
        }
        echo '</select>';
                
?>
        </select>
    </div>
</div>

<div class="row">
    <div class="col maintitle" align="left">
        Imprimir
    </div>
</div>
<div class="row">
    <div class="col-sm-2" align="left">
        Impresora
    </div>
    <div class="col" align="left">
        <label><input type="checkbox" value="1" name="chkprint" checked=""/> Imprimir ticket </label></br>
        <select name="lstprinters" style="width: 100%;">
<?php
$cnsimpresoras = $mysqli->query("select * from ".$prefixsql."usersprinters where iduser = '".$_COOKIE["lnxuserid"]."'");
		
	while($colter = mysqli_fetch_array($cnsimpresoras))
	{
		$sqlaux = $mysqli->query("select * from ".$prefixsql."impresoras where id = '".$colter["idprinter"]."'");
		$rowaux = mysqli_fetch_assoc($sqlaux);
		$dbnombreprinter = $rowaux["nombre"]." - ".$rowaux["notas"];
		
		if ($rowaux["tipo"] == 3){$habilitaimpresora = '';}else{$habilitaimpresora = 'disabled=""';}
		
		if($colter["dft"] == "1"){$seleccionado = ' selected=""';}else{$seleccionado = '';}
		echo '<option value="'.$colter["idprinter"].'" '.$habilitaimpresora.' '.$seleccionado.'>'.$dbnombreprinter.'</option>'; 
	
	}
?>
	</select>
    </div>
</div>
<div class="row">
    <div class="col-sm-2" align="left">
        Plantilla
    </div>
    <div class="col" align="left">
        <select name="lstdocprint" style="width: 100%;">
            <option value="generico.php">Ticket Generico</option>
        </select>
    </div>
</div>

<div align="center" class="rectangulobtnsguardar">

<input class="btnsubmit" name="btnguardar" value="Guardar" type="submit"> 

<?php echo ' <a class="btncancel" href="index.php?module=tpv&section=tpv&action=view&id='.$idtpv.'">Cancelar</a>'; ?>

</div>

</form>