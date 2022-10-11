<script src="core/com/js_terceros_all.js"></script>
<script language="javascript">

function completatexto() {
    var combo = document.getElementById("lsttercero");
    var lblterceroselected = combo.options[combo.selectedIndex].text;
    
    var combo = document.getElementById("lstrelacion");
    var lblrelacion = combo.options[combo.selectedIndex].text;
    

    document.getElementById("rstexto").innerHTML = lblterceroselected + " --> <b>" + lblrelacion + "</b> --> <i>" + document.getElementById("hjsrazonsocial").value + "</i>";
}


</script>

<?php
$idtercero = $_GET["idtercero"];

$buscatercero = $mysqli->query("SELECT * FROM ".$prefixsql."terceros where id = '".$idtercero."'");
$row = mysqli_fetch_assoc($buscatercero);
	
$dbrazonsocial = $row["razonsocial"];

$url_atras = "index.php?module=terceros&section=tercerosvinc&idtercero=".$idtercero;

$idregistro = $_GET["id"];
$xidreg = explode("-", $idregistro);
    $idterceroa = $xidreg[0];
    $idtercerob = $xidreg[1];

    $sqlaux = $mysqli->query("select * from ".$prefixsql."terceros_vinc where idtercero = '".$idterceroa."' and idtercerob = '".$idtercerob."' "); 
    $rowaux = mysqli_fetch_assoc($sqlaux);
    $dbidvinc = $rowaux["idvinc"]."-".$rowaux["vinclabel"];
    
?>

<p>Tercero: <b><?php echo $dbrazonsocial; ?></b></p>

<form name="frmtercerovinc" method="POST" action="index.php?module=terceros&section=tercerosvinc&action=save" />
<input type="hidden" name="hid" value="<?php echo $idregistro; ?>" />
<input type="hidden" name="haccion" value="update" />
<input type="hidden" name="hidtercero" value="<?php echo $idtercero; ?>" />

<input type="hidden" name="hjsrazonsocial" id="hjsrazonsocial" value="<?php echo $dbrazonsocial; ?>" />

<div align="center" class="rectangulobtnsguardar"> 
<button type="submit" class="btnsubmit" > <i class="hidephonview fa fa-save fa-lg"></i> Guardar</button> 
<a href="<?php echo $url_atras; ?>" class="btncancel"><i class="hidephonview fa fa-window-close fa-lg"></i> Cancelar</a> 
</div>

<div class="row">
    <div class="col-sm-2" align="left">
        Tercero
    </div>
    <div class="col" align="left">
<div id="div_buscatercero" style="display:none;">
<input type="text" value="" onkeypress="completatexto();" name="txttercero" id="txttercero" maxlength="50" placeholder="Escriba el nombre a buscar" autocomplete="off" class="campoencoger"/></br> 
</div>
<a href="javascript:mostrar();"><img src="img/buscar.jpg"/></a>

<select name="lsttercero" id="lsttercero" onchange="completatexto();" style="width: calc(100% - 230px);">
<?php
			
	$cnsterceros = $mysqli->query("SELECT * from ".$prefixsql."terceros where id = '".$idtercerob."'");
		
		while($colter = mysqli_fetch_array($cnsterceros))
		{      
            echo '<option value="'.$colter["id"].'" >'.$colter["razonsocial"].'</option>'; 
            $lbl_rz_terceroa = $colter["razonsocial"];
		}
		echo '</select>';
?>

    </div>
</div>
<div class="row">
    <div class="col-sm-2" align="left">
        Relación
    </div>
    <div class="col" align="left">
        <select name="lstrelacion" id="lstrelacion" onchange="completatexto();" class="campoencoger">
<?php
			
        $cnsrelaciones = $mysqli->query("SELECT id, 'A' as lado, labela as label  FROM ".$prefixsql."terceros_vinc_label union all SELECT id, 'B' as lado, labelb as label  FROM ".$prefixsql."terceros_vinc_label order by label asc");
            
        while($colter = mysqli_fetch_array($cnsrelaciones))
        {
            $cbid = $colter["id"].'-'.$colter["lado"];
            if($cbid == $dbidvinc){$seleccionado = ' selected=""'; $lbl_vincula = $colter["label"];}else{$seleccionado = '';}
            echo '<option value="'.$cbid.'" '.$seleccionado.'>'.$colter["label"].' </option>'; 
        }
            
?>
        </select>
    </div>
</div>
<div class="row">
    <div class="col-sm-2" align="left">
        Resultado:
    </div>
    <div class="col" align="left">
        <div id="rstexto"><?php echo $lbl_rz_terceroa." --> <b>".$lbl_vincula."</b> --> <i>".$dbrazonsocial."</i>"; ?></div>
    </div>
</div>

</form>