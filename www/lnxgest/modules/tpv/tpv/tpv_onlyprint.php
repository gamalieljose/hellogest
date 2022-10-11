<?php
$idtpv = $_GET["id"];


$cnsaux = $mysqli->query("SELECT * from ".$prefixsql."tpv where id = '".$idtpv."'");
$rowaux = mysqli_fetch_assoc($cnsaux);
$ididterminal = $rowaux["idterminal"];

$cnsaux = $mysqli->query("SELECT * from ".$prefixsql."tpv_cfg where idterminal = '".$ididterminal."'");
    $rowaux = mysqli_fetch_assoc($cnsaux);
    $iddefectoprinter = $rowaux["idprinter"];
?>
<form name="frmcerrarticket" method="POST" action="index.php?module=tpv&section=tpv&action=cerrarsave" >
<input type="hidden" name="haccion" value="onlyprint" />
<input type="hidden" name="hidtpv" value="<?php echo $idtpv; ?>" />


<div class="row">
    <div class="col maintitle" align="left">
        Campos Personalizados
    </div>
</div>

<div class="row">
    <div class="col-sm-2" align="left">
        Campos
    </div>
    <div class="col" align="left">
<?php
$ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."tpv_cfg_cg");
while($columna = mysqli_fetch_array($ConsultaMySql))
{
    $sqlaux = $mysqli->query("select * from ".$prefixsql."tpv_campos  where idtpv = '".$idtpv."' and campo = '".$columna["campo"]."'");
    $rowaux = mysqli_fetch_assoc($sqlaux);
    $dbvalorcampo = $rowaux['valor'];

    if($columna["tipo"] == "sino")
    {
        if($dbvalorcampo == "YES"){$seleccionado = ' checked=""';}else{$seleccionado = '';}
        echo '<p><label><input type="checkbox" value="YES" name="fdb_'.$columna["campo"].'" '.$seleccionado.'/> '.$columna["display"].'</label></p>';
    }
    
    if($columna["tipo"] == "text")
    {
        echo '<p>'.$columna["display"].'</br>';
        echo '<input type="text" value="'.$dbvalorcampo.'" maxlength="50"  style="width: 100%" name="fdb_'.$columna["campo"].'" /></p>';
    }
    
    if($columna["tipo"] == "float")
    {
        echo '<p>'.$columna["display"].'</br>';
        
        echo '<input type="text" onkeypress="return validanumeros(event)" value="'.$dbvalorcampo.'" maxlength="50"  style="width: 100%" name="fdb_'.$columna["campo"].'" /></p>';
    }
}
?>
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
        <select name="lstdocprint" style="width: 100%;">
            <option value="tck_generico.php">Ticket Generico</option>
        </select>
    </div>
</div>
<div class="row">
    <div class="col maintitle" align="left">
        Otras operaciones
    </div>
</div>
<div class="row">
    <div class="col-sm-2" align="left">
        
    </div>
    <div class="col" align="left">
        <label><input type="checkbox" value="cerrar" checked="" name="chkdejareditar"/> Finalizar edición del ticket</label>
    </div>
</div>

  
	


<div align="center" class="rectangulobtnsguardar">

<input class="btnsubmit" name="btnguardar" value="Guardar" type="submit"> 
<!-- <input class="btnapply" name="btnaplicar" value="Aplicar" type="submit"> -->
<?php
echo '<a class="btncancel" href="index.php?module=tpv&section=tpv&action=view&id='.$idtpv.'">Cancelar</a>';
?>



</div>

</form>