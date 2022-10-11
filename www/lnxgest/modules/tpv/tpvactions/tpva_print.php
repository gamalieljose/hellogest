<?php
$idtpv = $_GET["id"];

$sqlaux = $mysqli->query("select * from ".$prefixsql."tpv where id = '".$idtpv."' "); 
$rowaux = mysqli_fetch_assoc($sqlaux);
$dbcodigo = $rowaux["codigo"];
$ididterminal = $rowaux["idterminal"];

    $cnsaux = $mysqli->query("SELECT * from ".$prefixsql."tpv_cfg where idterminal = '".$ididterminal."'");
    $rowaux = mysqli_fetch_assoc($cnsaux);
    $iddefectoprinter = $rowaux["idprinter"];
?>
<form name="frmprint" method="POST" action="index.php?module=tpv&section=tpvactions&action=printrs">
    <input type="hidden" name="hidtpv" value="<?php echo $idtpv; ?>" />
    
<div class="row maintitle">
    <div class="col" align="left">
        Imprimir Ticket: <?php echo $dbcodigo; ?>
    </div>
</div>
<div class="row">
    <div class="col-sm-2" align="left">
        Impresora
    </div>
    <div class="col" align="left">
        <select name="lstprinters" class="campoencoger">
<?php

$sqlaux = $mysqli->query("select * from ".$prefixsql."impresoras  where id = '".$iddefectoprinter."' ");
    $rowaux = mysqli_fetch_assoc($sqlaux);
    $lbl_impresora = $rowaux["nombre"]." - ".$rowaux["notas"];

    echo '<option value="'.$iddefectoprinter.'" selected="">'.$lbl_impresora.'</option>'; 
    
$cnsimpresoras = $mysqli->query("select * from ".$prefixsql."usersprinters where iduser = '".$_COOKIE["lnxuserid"]."'");
		
	while($colter = mysqli_fetch_array($cnsimpresoras))
	{
		$sqlaux = $mysqli->query("select * from ".$prefixsql."impresoras where id = '".$colter["idprinter"]."'");
		$rowaux = mysqli_fetch_assoc($sqlaux);
		$dbnombreprinter = $rowaux["nombre"]." - ".$rowaux["notas"];
		
		if ($rowaux["tipo"] == 3){$habilitaimpresora = '';}else{$habilitaimpresora = 'disabled=""';}
		
		
		echo '<option value="'.$colter["idprinter"].'" '.$habilitaimpresora.' >'.$dbnombreprinter.'</option>'; 
	
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
        <select name="lstdocprint" class="campoencoger">
			<option value="tck_gen_sm.php" selected="">Ticket San Martin</option>
            <option value="tck_generico.php">Ticket Generico</option>
        </select>
    </div>
</div>
    <div class="row">
    <div class="col-sm-2" align="left">
        
    </div>
    <div class="col" align="left">
        <label><input type="checkbox" checked="" name="chkadicionales" value="1" /> Imprimir impresiones adicionales</label>
    </div>
</div>


  
	


<div align="center" class="rectangulobtnsguardar">

<input class="btnsubmit" name="btnguardar" value="Guardar" type="submit"> 
<!-- <input class="btnapply" name="btnaplicar" value="Aplicar" type="submit"> -->
<?php

echo '<a class="btncancel" href="index.php?module=tpv&section=tpvactions&id='.$idtpv.'">Cancelar</a>';
?>



</div>
</form>




