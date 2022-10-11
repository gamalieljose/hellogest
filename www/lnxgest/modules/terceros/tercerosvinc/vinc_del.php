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
    $dbidvinc = $rowaux["idvinc"];
    $dbidvinclabel = $rowaux["vinclabel"];

        $sqlaux = $mysqli->query("select id, razonsocial from ".$prefixsql."terceros where id = '".$idtercerob."' "); 
        $rowaux = mysqli_fetch_assoc($sqlaux);
        $lbl_rz_tercerob = $rowaux["razonsocial"];
        

    $sqlaux = $mysqli->query("select * from ".$prefixsql."terceros_vinc_label where id = '".$dbidvinc."' "); 
    $rowaux = mysqli_fetch_assoc($sqlaux);
    $vinc_labela = $rowaux["labela"];
    $vinc_labelb = $rowaux["labelb"];
    
    if($dbidvinclabel == 'A'){$lbl_vincula = $vinc_labela;}
    if($dbidvinclabel == 'B'){$lbl_vincula = $vinc_labelb;}
?>

<p>Tercero: <b><?php echo $dbrazonsocial; ?></b></p>

<form name="frmtercerovinc" method="POST" action="index.php?module=terceros&section=tercerosvinc&action=save" />
<input type="hidden" name="haccion" value="delete" />
<input type="hidden" name="hidtercero" value="<?php echo $idtercero; ?>" />
<input type="hidden" name="hidtercerob" value="<?php echo $idtercerob; ?>" />


<div align="center">
<table style="max-width: 400px; width: 100%;" class="msgaviso">
<tr class="maintitle"><th>Eliminar registro</th></tr>
<tr><td align="center">
¿Desea eliminar este vinculo?</br></br>
<?php
echo '<p align="center">'.$lbl_rz_tercerob.' --> <b>'.$lbl_vincula.'</b> --> <i>'.$dbrazonsocial.'</i></p>';
?>
</td></tr>
<tr><td align="center">
<button type="submit" class="btnsubmit" > <i class="hidephonview fa fa-trash fa-lg"></i> Eliminar</button> 
<a href="<?php echo $url_atras; ?>" class="btncancel"><i class="hidephonview fa fa-window-close fa-lg"></i> Cancelar</a> 
</td></tr>
</table>
</div>


</form>