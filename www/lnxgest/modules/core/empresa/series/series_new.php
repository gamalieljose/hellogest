<?php

?>


<div align="center">
<form id="form1" name="form1" method="post" action="index.php?module=core&section=series&action=save">
<input type="hidden" name="haccion" value="new">
<div class="row">
  <div class="col maintitle">
    Nueva Serie
  </div>
</div>
<div class="row">
  <div class="col-sm-2" align="left">
    Empresa
  </div>
  <div class="col" align="left">
  <select name="lstempresa" class="campoencoger" >
<?php
	$ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."empresas order by razonsocial");
while($columna = mysqli_fetch_array($ConsultaMySql))
{
	echo '<option value="'.$columna["id"].'">'.$columna["razonsocial"].'</option>';
}
?>
</select>
  </div>
</div>

<div class="row">
  <div class="col-sm-2" align="left">
    Tipo
  </div>
  <div class="col" align="left">
    <select name="lsttipo" class="campoencoger">
	<?php
	
	$sqldicdocseries= $mysqli->query("SELECT * from ".$prefixsql."dic_docseries");
	while($coldic = mysqli_fetch_array($sqldicdocseries))
	{
		echo '<option value="'.$coldic["valor"].'">'.$coldic["docserie"].'</option>';
	}

	
	?>
	</select>
  </div>
</div>
<div class="row">
  <div class="col-sm-2">
    
  </div>
  <div class="col" align="left">
    <select name="lstcv" class="campoencoger">
	   <option value="2">Venta</option> 
	   <option value="1">Compra</option> 
	</select>
  </div>
</div>
<div class="row">
  <div class="col-sm-2" align="left">
    Serie
  </div>
  <div class="col" align="left">
    <input name="txtserie" value="" type="text" style="width: 100%;">
  </div>
</div>
<div class="row">
  <div class="col-sm-2">
    
  </div>
  <div class="col" align="left">
    <input type="checkbox" name="optdefecto" value="1" checked> Serie por defecto
  </div>
</div>
<div class="row">
  <div class="col-sm-2">
    
  </div>
  <div class="col" align="left">
    <input type="checkbox" name="optactivo" value="1" checked> Serie en activo
  </div>
</div>
<div class="row" align="left">
  <div class="col-sm-2" align="left">
    Nota
  </div>
  <div class="col" align="left">
    <input name="txtnota" value="" type="text" style="width: 100%;">
  </div>
</div>
<div class="row" align="left">
  <div class="col-sm-2" align="left">
    
  </div>
  <div class="col" align="left">
    <label><input name="chkstock" value="1" type="checkbox" > Habilitar control de stock para esta serie</label>
  </div>
</div>

<div class="row" align="left">
  <div class="col-sm-2" align="left">
    Colores meses
  </div>
  <div class="col" align="left">
  <p><i>#codigo_color</i></p>
    <input name="dpcolor1" value="" type="text" maxlength="10" style="width: 80px;"> 01 - Enero </br>
	<input name="dpcolor2" value="" type="text" maxlength="10" style="width: 80px;"> 02 - Febrero </br>
	<input name="dpcolor3" value="" type="text" maxlength="10" style="width: 80px;"> 03 - Marzo </br>
	<input name="dpcolor4" value="" type="text" maxlength="10" style="width: 80px;"> 04 - Abril </br>
	<input name="dpcolor5" value="" type="text" maxlength="10" style="width: 80px;"> 05 - Mayo </br>
	<input name="dpcolor6" value="" type="text" maxlength="10" style="width: 80px;"> 06 - Junio </br>
	<input name="dpcolor7" value="" type="text" maxlength="10" style="width: 80px;"> 07 - Julio </br>
	<input name="dpcolor8" value="" type="text" maxlength="10" style="width: 80px;"> 08 - Agosto </br>
	<input name="dpcolor9" value="" type="text" maxlength="10" style="width: 80px;"> 09 - Septiembre </br>
	<input name="dpcolor10" value="" type="text" maxlength="10" style="width: 80px;"> 10 - Octubre </br>
	<input name="dpcolor11" value="" type="text" maxlength="10" style="width: 80px;"> 11 - Noviembre </br>
	<input name="dpcolor12" value="" type="text" maxlength="10" style="width: 80px;"> 12 - Diciembre </br>
  </div>
</div>

<div align="center" class="rectangulobtnsguardar">

<input type="submit" class="btnsubmit" value="<?php echo LABEL_BTN_SAVE; ?>" />

<a class="btncancel" href="index.php?module=core&section=series"><?php echo LABEL_BTN_CANCEL; ?></a>

</div>


</form>
</div>