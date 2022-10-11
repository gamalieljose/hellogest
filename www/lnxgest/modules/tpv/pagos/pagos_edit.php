<script>
function validanumeros(e){
    tecla = (document.all) ? e.keyCode : e.which;

    //Tecla de retroceso (key ascii = 8) o tabulador (keyascii = 9) para borrar, siempre la permite
    if (tecla==8 || tecla==0){
        return true;
    }
    
        
    // Patron de entrada, en este caso solo acepta numeros
    patron =/[0-9,"."]/;
    tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);
}

function calculapagos()
{
    var importetpv = document.getElementById('hjs_importetpv').value;
    var fpagado = document.getElementById('hjs_pagado').value;
    var fimporte = document.getElementById('hjs_importe').value;
    var pagadoreal = fpagado - fimporte;
        pagadoreal = parseFloat(pagadoreal);
    var nuevoimporte = document.getElementById('txtimporte').value;
        nuevoimporte = parseFloat(nuevoimporte);
    
    var pendientepagar = importetpv - (pagadoreal + nuevoimporte);
        pendientepagar = parseFloat(pendientepagar);
        
        pagadoreal = pagadoreal + nuevoimporte;
        pagadoreal = pagadoreal.toFixed(2);
        pendientepagar = pendientepagar.toFixed(2);
        
    document.getElementById("div_pagado").innerHTML = "<p>Pagado hasta la fecha: </br>" + pagadoreal + " Euros</p>";
    document.getElementById("div_pendiente").innerHTML = "<p>Pendiente: </br>" + pendientepagar + " Euros</p>";
    
}
</script>

<?php
$idtpv = $_GET["idtpv"];
$idpago = $_GET["idpago"];

$fechahoy = date("d/m/Y");

$cnsaux = $mysqli->query("SELECT sum(importe) as sumalineas from ".$prefixsql."tpv_lineas where idtpv = '".$idtpv."' ");              
$rowaux = mysqli_fetch_assoc($cnsaux);
$dbsumalineas = $rowaux["sumalineas"];
$dbsumalineas = round($dbsumalineas, 2);

$cnsaux = $mysqli->query("SELECT sum(importe) as sumalineastax from ".$prefixsql."tpv_lineas_tax where idtpv = '".$idtpv."' ");              
$rowaux = mysqli_fetch_assoc($cnsaux);
$dbsumalineastax = $rowaux["sumalineastax"];
$dbsumalineastax = round($dbsumalineastax, 2);

$importetpv = $dbsumalineas + $dbsumalineastax;
$importetpv = round($importetpv, 2);


$cnsaux = $mysqli->query("SELECT sum(importe) as sumapagos from ".$prefixsql."tpv_pagos where idtpv = '".$idtpv."' and (tipo = 'TCKT' or tipo = 'TPAGO')");              
$rowaux = mysqli_fetch_assoc($cnsaux);
$dbpagado = $rowaux["sumapagos"];

$faltapagar = $importetpv - $dbpagado;
$faltapagar = round($faltapagar, 2);

$dbpagado = round($dbpagado, 2);

$cnsaux = $mysqli->query("SELECT * from ".$prefixsql."tpv_pagos where id = '".$idpago."' ");              
$rowaux = mysqli_fetch_assoc($cnsaux);
$dbimporte = $rowaux["importe"];
$dbfecha = $rowaux["fecha"];

	$dbfecha = explode(" ", $dbfecha);

	$lbl_fecha = $dbfecha[0];

	$lbl_fecha = explode("-", $lbl_fecha);

	$lbl_fecha = $lbl_fecha[2]."/".$lbl_fecha[1]."/".$lbl_fecha[0];

	$lbl_hora = $dbfecha[1];

?>
<form name="frmpagos" method="POST" action="index.php?module=tpv&section=pagos&action=save">
    
<input type="hidden" name="haccion"  value="update" />
<input type="hidden" name="hidtpv"  value="<?php echo $idtpv; ?>" />
<input type="hidden" name="hidpago"  value="<?php echo $idpago; ?>" />

<?php
//campos para javascript

echo '<input type="hidden" name="hjs_pagado" id="hjs_pagado" value="'.$dbpagado.'" />';
echo '<input type="hidden" name="hjs_importe" id="hjs_importe"  value="'.$dbimporte.'" />';
echo '<input type="hidden" name="hjs_importetpv" id="hjs_importetpv"  value="'.$importetpv.'" />';


?>


<div class="row">
    <div class="col maintitle" align="left">
        Editando pago
    </div>
</div>
<div class="row">
    <div class="col-sm-2">
        Fecha
    </div>
    <div class="col">
	<input type="text" name="txtfecha" id="txtfecha" maxlength="10" required pattern=".{10,10}" value="<?php echo $lbl_fecha; ?>" />
<?php 
$lblhora = explode(":", $lbl_hora);

$dbhora = $lblhora[0];
$dbminuto = $lblhora[1];


echo ' Hora: <select name="lsthh">';
$hora = 0;
while ($hora < 24) {
	$lbl_hora = str_pad($hora,  2, "0", STR_PAD_LEFT);
	
	if($lbl_hora == $dbhora){$seleccionado = ' selected=""';}else{$seleccionado = '';}
	
    echo '<option value="'.$lbl_hora.'" '.$seleccionado.'>'.$lbl_hora.'</option>';
	$hora = $hora + 1;  
}
echo '</select> ';

echo '<select name="lstmm">';
$minutos = 0;
while ($minutos < 60) {
	
	$lbl_minuto = str_pad($minutos,  2, "0", STR_PAD_LEFT);
	
	if($lbl_minuto == $dbminuto){$seleccionado = ' selected=""';}else{$seleccionado = '';}
	
    echo '<option value="'.$lbl_minuto.'" '.$seleccionado.'>'.$lbl_minuto.'</option>';
	$minutos = $minutos + 1;  
}
echo '</select> ';

?>
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
        <input type="text" name="txtimporte" id="txtimporte" onblur="calculapagos();" onkeypress="return validanumeros(event)" value="<?php echo $dbimporte; ?>">
    </div>
</div>
<div class="row">
    <div class="col-sm-2" align="left">
        
    </div>
    <div class="col" align="left">
        <div id="div_pagado"><p>Pagado hasta la fecha: </br>
        <?php echo $dbpagado; ?> Euros</p></div>
        <div id="div_pendiente"><p>Pendiente: </br>
            <?php echo $faltapagar; ?> Euros</p></div>
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