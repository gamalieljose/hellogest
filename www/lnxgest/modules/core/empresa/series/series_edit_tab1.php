<div align="center">
<form id="form1" name="form1" method="post" action="index.php?module=core&section=series&action=save">

<input type="hidden" name="haccion" value="update">
<?php 
echo '<input type="hidden" name="hidserie" value="'.$_GET["id"].'">'; 

$ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."series where id = '".$_GET["id"]."'");
$row = mysqli_fetch_assoc($ConsultaMySql);

$dbidempresa = $row['idempresa'];
$dbcv = $row['cv'];
$dbtipo = $row['tipo'];
$dbserie = $row['serie'];
$dbactivo = $row['activo'];
$dbdft = $row['dft'];
$dbnota = $row['nota'];

$dbcolormes1 = $row["colormes1"];
$dbcolormes2 = $row["colormes2"];
$dbcolormes3 = $row["colormes3"];
$dbcolormes4 = $row["colormes4"];
$dbcolormes5 = $row["colormes5"];
$dbcolormes6 = $row["colormes6"];
$dbcolormes7 = $row["colormes7"];
$dbcolormes8 = $row["colormes8"];
$dbcolormes9 = $row["colormes9"];
$dbcolormes10 = $row["colormes10"];
$dbcolormes11 = $row["colormes11"];
$dbcolormes12 = $row["colormes12"];

$dbstock = $row["stock"];

?>


<div class="row">
  <div class="col maintitle">
    Editando Serie
  </div>
</div>
<div class="row">
  <div class="col-sm-2" align="left">
    Empresa
  </div>
  <div class="col" align="left">
  <select name="lstempresa" style="width: 100%;" >
<?php
	$ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."empresas order by razonsocial");
while($columna = mysqli_fetch_array($ConsultaMySql))
{
	if($columna["id"] == $dbidempresa){$seleccionado = ' selected=""';}else{$seleccionado = '';}
	echo '<option value="'.$columna["id"].'" '.$seleccionado.'>'.$columna["razonsocial"].'</option>';
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
    <select name="lsttipo" style="width: 100%;">
	<?php
	
	$sqldicdocseries= $mysqli->query("SELECT * from ".$prefixsql."dic_docseries");
	while($coldic = mysqli_fetch_array($sqldicdocseries))
	{
	
		if ($dbtipo == $coldic["valor"]){$seldocserie = 'selected="selected"';}else{$seldocserie = '';}
		echo '<option value="'.$coldic["valor"].'" '.$seldocserie.'>'.$coldic["docserie"].'</option>';
	}

	
	?>
	</select>
  </div>
</div>
<div class="row">
  <div class="col-sm-2">
    
  </div>
  <div class="col" align="left">
    <select name="lstcv" style="width: 100%;">
<?php
	if ($dbcv == '2') //venta
	{echo '<option value="2" selected="selected">Venta</option>';}else
	{echo '<option value="2">Venta</option>';}
	if ($dbcv == '1') //compra
	{echo '<option value="1" selected="selected">Compra</option>';}else
	{echo '<option value="1">Compra</option>';}
?>
	</select>
  </div>
</div>
<div class="row">
  <div class="col-sm-2" align="left">
    Serie
  </div>
  <div class="col" align="left">
    <input name="txtserie" value="<?php echo $dbserie; ?>" type="text" style="width: 100%;">
  </div>
</div>
<div class="row">
  <div class="col-sm-2">
    
  </div>
  <div class="col" align="left">
    
<?php
	if ($dbdft == '1'){$seleccionado = ' checked=""';}else{$seleccionado = '';}
	echo '<input type="checkbox" name="optdefecto" value="1" '.$seleccionado.'> Serie por defecto';

?>
  </div>
</div>
<div class="row">
  <div class="col-sm-2">
    
  </div>
  <div class="col" align="left">
<?php
	if ($dbactivo == '1'){$seleccionado = ' checked=""';}else{$seleccionado = '';}
	echo '<input type="checkbox" name="optactivo" value="1" '.$seleccionado.'> Serie en activo';

?>
  </div>
</div>
<div class="row" align="left">
  <div class="col-sm-2" align="left">
    Nota
  </div>
  <div class="col" align="left">
    <input name="txtnota" value="<?php echo $dbnota; ?>" type="text" style="width: 100%;">
  </div>
</div>
<div class="row" align="left">
  <div class="col-sm-2" align="left">
    Stock
  </div>
  <div class="col" align="left">
  <?php
  if($dbstock == '1'){$seleccionado = ' checked=""';}else{$seleccionado = '';}
  
	echo '<label><input type="checkbox" value="1" name="chkstock" '.$seleccionado.'/> Habilitar control de stock para esta serie</label>';
?>
  </div>
</div>

<div class="row" align="left">
  <div class="col-sm-2" align="left">
    Colores meses
  </div>
  <div class="col" align="left">
  <p><i>#codigo_color</i></p>
    <input name="dpcolor1" value="<?php echo $dbcolormes1; ?>" type="text" maxlength="10" style="width: 80px;"> 01 - Enero </br>
	<input name="dpcolor2" value="<?php echo $dbcolormes2; ?>" type="text" maxlength="10" style="width: 80px;"> 02 - Febrero </br>
	<input name="dpcolor3" value="<?php echo $dbcolormes3; ?>" type="text" maxlength="10" style="width: 80px;"> 03 - Marzo </br>
	<input name="dpcolor4" value="<?php echo $dbcolormes4; ?>" type="text" maxlength="10" style="width: 80px;"> 04 - Abril </br>
	<input name="dpcolor5" value="<?php echo $dbcolormes5; ?>" type="text" maxlength="10" style="width: 80px;"> 05 - Mayo </br>
	<input name="dpcolor6" value="<?php echo $dbcolormes6; ?>" type="text" maxlength="10" style="width: 80px;"> 06 - Junio </br>
	<input name="dpcolor7" value="<?php echo $dbcolormes7; ?>" type="text" maxlength="10" style="width: 80px;"> 07 - Julio </br>
	<input name="dpcolor8" value="<?php echo $dbcolormes8; ?>" type="text" maxlength="10" style="width: 80px;"> 08 - Agosto </br>
	<input name="dpcolor9" value="<?php echo $dbcolormes9; ?>" type="text" maxlength="10" style="width: 80px;"> 09 - Septiembre </br>
	<input name="dpcolor10" value="<?php echo $dbcolormes10; ?>" type="text" maxlength="10" style="width: 80px;"> 10 - Octubre </br>
	<input name="dpcolor11" value="<?php echo $dbcolormes11; ?>" type="text" maxlength="10" style="width: 80px;"> 11 - Noviembre </br>
	<input name="dpcolor12" value="<?php echo $dbcolormes12; ?>" type="text" maxlength="10" style="width: 80px;"> 12 - Diciembre </br>
  </div>
</div>


<div align="center" class="rectangulobtnsguardar">

<input type="submit" class="btnsubmit" value="<?php echo LABEL_BTN_SAVE; ?>" />

<a class="btncancel" href="index.php?module=core&section=series"><?php echo LABEL_BTN_CANCEL; ?></a>

</div>


</form>
</div>