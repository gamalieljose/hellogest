<script src="core/com/js_terceros_pro.js"></script>
﻿<?php
$idlinea = $_GET["id"];

$ConsultaMySql= $mysqli->query("SELECT * FROM ".$prefixsql."ita_pro where id = '".$idlinea."'");
$row = mysqli_fetch_assoc($ConsultaMySql);
$idactivo = $row["idactivo"];
$dbidtercero = $row["idtercero"];
$dbnotas = $row["notas"];




?>
					   
<form name="form1" action="index.php?module=lnxit&section=activos&ss=proveedores&action=save" method="post">
<?php
echo '<input type="hidden" value="'.$idactivo.'" name="hidactivo"/>';
echo '<input type="hidden" value="'.$idlinea.'" name="hidlinea"/>';

?>
<input type="hidden" name="haccion" value="update">

<div class="row">
  <div class="col maintitle" align="left">
    Editando proveedor
  </div>
</div>
<div class="row">
    <div class="col-sm-2" align="left">
        Tercero
    </div>
    <div class="col" align="left">
<div id="div_buscatercero" style="display:none;">
<input type="text" value="" name="txttercero" id="txttercero" maxlength="50" placeholder="Escriba el nombre a buscar" style="width: 100%;"></br> 
</div>
<a href="javascript:mostrar();"><img src="img/buscar.jpg"/></a>

	<select name="lsttercero" id="lsttercero" style="width: calc(100% - 30px);">
<?php 
$cnsaux = $mysqli->query("SELECT * FROM ".$prefixsql."terceros where id = '".$dbidtercero."'");
$rowaux = mysqli_fetch_assoc($cnsaux);
$dbrazonsocial = $rowaux["razonsocial"];


            echo '<option value="'.$dbidtercero.'">'.$dbrazonsocial.'</option>'; 
?>
        </select>
    </div>
</div>
<div class="row">
  <div class="col-sm-2" align="left">
    Notas
  </div>
  <div class="col" align="left">
    <input type="text" value="<?php echo $dbnotas; ?>" name="txtnotas" maxlength="50" style="width: 100%;" />
  </div>
</div>

<div align="center" class="rectangulobtnsguardar">

<input class="btnsubmit" name="btnguardar" value="Guardar" type="submit"> 

<?php echo '<a class="btncancel" href="index.php?module=lnxit&section=activos&ss=proveedores&id='.$idactivo.'&tab=3">Cancelar</a>'; ?>



</div>

</form>