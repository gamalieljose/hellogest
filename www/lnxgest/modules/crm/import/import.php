<?php
?>
<form name="frmregistro" method="POST" enctype="multipart/form-data" action="index.php?module=crm&section=import&action=step1">
<div align="center" class="rectangulobtnsguardar"> 
<button type="submit" class="btnsubmit" > <i class="hidephonview fa fa-save fa-lg"></i> Previsualizar</button> 
</div>
<div class="row">
<div class="col maintitle">
    Importacion de Terceros
</div>
</div>

<div class="row">
<div class="col-sm-2">
    
</div>
<div class="col">
    <label><input type="checkbox" name="chkutf8" value="YES"/> Activar utf8_encode </label>
</div>
</div>

<div class="row">
<div class="col-sm-2">
    Fichero CSV
</div>
<div class="col-sm-2">
    <input type="file" name="fileimporta" required=""/>
</div>
</div>



</div>