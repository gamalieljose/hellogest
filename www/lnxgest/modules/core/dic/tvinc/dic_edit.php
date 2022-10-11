<?php
$iddic = $_GET["id"];

$ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."terceros_vinc_label where id = '".$iddic."'");
$row = mysqli_fetch_assoc($ConsultaMySql);
$dblabela = $row["labela"];
$dblabelb = $row["labelb"];


echo '<p><a class="btnenlacecancel" href="index.php?module=core&section=dic&subs=tvinc&action=del&id='.$iddic.'">Eliminar</a></p>';
?>

<script language="javascript">

function completatexto() {
    var lbl_labela = document.getElementById("txtlabela").value;
    var lbl_labelb = document.getElementById("txtlabelb").value;
       

    document.getElementById("rstexto").innerHTML = "Tercero A --> <b>" + lbl_labela + "</b> --> <i>Tercero B</i> </br> Tercero B --> <b>" + lbl_labelb + "</b> --> <i>Tercero A</i>";
}


</script>

<form name="nuevodic" action="index.php?module=core&section=dic&subs=tvinc&action=save" method="post">
<input type="hidden" name="haccion" value="update">
<?php echo '<input type="hidden" name="hiddic" value="'.$iddic.'">'; ?>

<div class="row">
<div class="col-sm-2">
Tratar A como de B
</div>
<div class="col">
<?php echo '<input name="txtlabela" id="txtlabela" required="" type="text" maxlength="50" onblur="completatexto();" onkeydown="completatexto();" value="'.$dblabela.'" class="campoencoger">'; ?>
</div>
</div>

<div class="row">
<div class="col-sm-2">
Tratar B como de A
</div>
<div class="col">
<?php echo '<input name="txtlabelb" id="txtlabelb" required="" type="text" maxlength="50" onblur="completatexto();" onkeydown="completatexto();" value="'.$dblabelb.'" class="campoencoger">'; ?>
</div>
</div>

<div class="row">
<div class="col-sm-2">
Resultado:
</div>
<div class="col">
    <div id="rstexto">
    Tercero A --> <b><?php echo $dblabela; ?></b> --> <i>Tercero B</i> </br>
    Tercero B --> <b><?php echo $dblabelb; ?></b> --> <i>Tercero A</i> 
    </div>
    <p></p>
    <p><b>Ejemplo: </b></p>
    <p>Manuela <i>(Tercero A)</i> es <b>CLIENTE</b> de Ferreteria Manolo <i>(Tercero B)</i> </br>
    Ferreteria Manolo <i>(Tercero B)</i> es <b>PROVEEDOR</b> de Manuela <i>(Tercero A)</i>
    </p>
</div>
</div>

<div align="center" class="rectangulobtnsguardar"> 
<button type="submit" class="btnsubmit" > <i class="hidephonview fa fa-save fa-lg"></i> Guardar</button> 
<a href="index.php?module=core&section=dic&subs=tvinc" class="btncancel"><i class="hidephonview fa fa-window-close fa-lg"></i> Cancelar</a> 
</div>
</form>