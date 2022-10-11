<script language="javascript">

function completatexto() {
    var lbl_labela = document.getElementById("txtlabela").value;
    var lbl_labelb = document.getElementById("txtlabelb").value;
       

    document.getElementById("rstexto").innerHTML = "Tercero A --> <b>" + lbl_labela + "</b> --> <i>Tercero B</i> </br> Tercero B --> <b>" + lbl_labelb + "</b> --> <i>Tercero A</i>";
}


</script>

<form name="nuevodic" action="index.php?module=core&section=dic&subs=tvinc&action=save" method="post">
<input type="hidden" name="haccion" value="new">


<div class="row">
<div class="col-sm-2">
Tratar A como de B
</div>
<div class="col">
    <input name="txtlabela" id="txtlabela" required="" type="text" maxlength="50" onblur="completatexto();" onkeydown="completatexto();" value="" class="campoencoger">
</div>
</div>

<div class="row">
<div class="col-sm-2">
Tratar B como de A
</div>
<div class="col">
    <input name="txtlabelb" id="txtlabelb" required="" type="text" maxlength="50" onblur="completatexto();" onkeydown="completatexto();" value="" class="campoencoger">
</div>
</div>

<div class="row">
<div class="col-sm-2">
Resultado:
</div>
<div class="col">
    <div id="rstexto">
    Tercero A --> <b>__________</b> --> <i>Tercero B</i> </br>
    Tercero B --> <b>__________</b> --> <i>Tercero A</i>
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