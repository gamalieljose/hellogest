<?php

?>
<script src="core/com/js_terceros_all.js"></script>
<form name="frmgasto" method="POST" action="index.php?module=lnxit&section=activos&ss=import&action=aips_save" enctype="multipart/form-data" >
<div align="center" class="rectangulobtnsguardar"> 
<button type="submit" class="btnsubmit" > <i class="hidephonview fa fa-save fa-lg"></i> Importar</button> 
<a href="index.php?module=lnxit&section=activos" class="btncancel"><i class="hidephonview fa fa-window-close fa-lg"></i> Cancelar</a> 
</div>
<div class="row maintitle">
<div class="col">
    Importar XML advanced ip scanner
</div>
</div>

<div class="row">
    <div class="col-sm-2" align="left">
        Tercero
    </div>
    <div class="col" align="left">
    <div class="campoencoger">
<div id="div_buscatercero" style="display:none;">
<input type="text" value="" name="txttercero" id="txttercero" maxlength="50" class="tblbuscar" placeholder="Escriba el nombre a buscar" autocomplete="off" style="width:100%;"/></br> 
</div>
<a href="javascript:mostrar();" ><img src="img/buscar.jpg"/></a>
<?php
	//seleciona cliente
	
	echo '<select name="lsttercero" id="lsttercero" style="width: calc(100% - 30px);">';
	
	$cnsterceros = $mysqli->query("SELECT * from ".$prefixsql."terceros where id = '".$flsttercero."'");
		
		while($colter = mysqli_fetch_array($cnsterceros))
		{ 
      if($_COOKIE["lnxuserset_showcods"] == 1)
      {
          $lbl_userset_showcods = "[".$colter["codcli"]."]";
      }
      else
      {
          $lbl_userset_showcods = "";
      }

			echo '<option value="'.$colter["id"].'" >'.$colter["razonsocial"].' '.$lbl_userset_showcods.'</option>'; 
		}
		echo '</select>';
?>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-2" align="left">
        Fichero XML
    </div>
    <div class="col" align="left">
        <input type="file" name="fileficherito" accept=".xml"/>
    </div>
</div>
</form>