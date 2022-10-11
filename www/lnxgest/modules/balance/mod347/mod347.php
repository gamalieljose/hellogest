<link rel="stylesheet" href="scripts/jquery/jquery-ui.css">
<script src="scripts/jquery/jquery-2.1.1.js"></script>
<script src="scripts/jquery/jquery-ui.js"></script>

<script language="javascript">

  $().ready(function() {

$.datepicker.regional['es'] = 
  {
	closeText: 'Cerrar', 
	prevText: 'Previo', 
	nextText: 'PrÃƒÂ³ximo',
  
  monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
  monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun','Jul','Ago','Sep','Oct','Nov','Dic'],
  monthStatus: 'Ver otro mes', yearStatus: 'Ver otro aÃƒÂ±o',
  dayNames: ['Domingo','Lunes','Martes','MiÃƒÂ©rcoles','Jueves','Viernes','SÃƒÂ¡bado'],
  dayNamesShort: ['Dom','Lun','Mar','Mie','Jue','Vie','SÃƒÂ¡b'],
  dayNamesMin: ['Do', 'Lu','Ma','Mi','Ju','Vi','Sa'],
  dateFormat: 'dd/mm/yy', firstDay: 0, 
  initStatus: 'Selecciona la fecha', isRTL: false
  };
  
  $.datepicker.setDefaults($.datepicker.regional['es']);
  
	$("#dpkfechainicio").datepicker({	
		dateFormat: 'dd/mm/yy',  
		firstDay: 1, 
		onSelect: function(dateText, inst) { 
		$("#dpkfechainicio_value").val(dateText);
		}
	});


	$("#dpkfechafin").datepicker({

		dateFormat: "dd/mm/yy",
		firstDay: 1,
		onSelect: function(dateText, inst) { 
		$("#dpkfechafin_value").val(dateText);
		}
	}
	);
});
</script>

<script language="javascript">
$(document).ready(function(){
   $("#lstempresas").change(function () {
           $("#lstempresas option:selected").each(function () {
            empresa=$(this).val();
            
            $.post("modules/balance/ajax/ajx_empresa-series_fv_h.php", { idempresa: empresa }, function(data){
            $("#lstfv").html(data);
            });            
            
            $.post("modules/balance/ajax/ajx_empresa-series_fvr_h.php", { idempresa: empresa }, function(data){
            $("#lstfvr").html(data);
            });
            
            $.post("modules/balance/ajax/ajx_empresa-series_fc_h.php", { idempresa: empresa }, function(data){
            $("#lstfc").html(data);
            });
        });
   })
});
</script>


<?php

$anoactual = date('Y');
$fechaactual = date('d/m/Y');

$ftxtfecha = $_POST["txtfecha"];
if ($ftxtfecha == ""){$ftxtfecha = '01/01/'.$anoactual;}
$ftxtfechafin = $_POST["txtfechafin"];
if ($ftxtfechafin == ""){$ftxtfechafin = $fechaactual;}


$xfecha = explode("/", $ftxtfecha);
$dbfechadesde = $xfecha[2]."-".$xfecha[1]."-".$xfecha[0];
$xfecha = explode("/", $ftxtfechafin);
$dbfechahasta = $xfecha[2]."-".$xfecha[1]."-".$xfecha[0];


$flstempresas = $_POST["lstempresas"];

$fchkfv = $_POST["chkfv"];
$fchkfvr = $_POST["chkfvr"];
$fchkfc = $_POST["chkfc"];



?>

<form name="form1" method="post" action="index.php?module=balance&section=mod347&action=resultado">

<div class="row">
  <div class="col maintitle" align="left">
    Modelo 347
  </div>
</div>
  
<div class="row">
  <div class="col-sm-2" align="left">
      Fecha inicio
  </div>
  <div class="col-sm-2" align="left">
    <?php 
	
		echo '<input type="text" name="txtfecha" id="dpkfechainicio" size="15" value ="'.$ftxtfecha.'" maxlength="10" required pattern=".{10,10}"  title="dd/mm/yyyy">';
	?>
  </div>
  <div class="col-sm-2" align="left">
      Fecha Fin
  </div>
  <div class="col-sm-2" align="left">
      <?php
	$fechaactual = date('d/m/Y');

	echo '<input type="text" name="txtfechafin" id="dpkfechafin" size="15" value="'.$ftxtfechafin.'" maxlength="10" required pattern=".{10,10}"  title="dd/mm/yyyy">';
	?>
  </div>
</div>

<div class="row">
  <div class="col-sm-2" align="left">
      
  </div>
  <div class="col" align="left">
  Marcar en amarillo cuendo exceda de este importe <input type="number" name="txtmaximporte"  value="3000">
  </div>
</div>

<div class="row">
  <div class="col-sm-2">
    Empresa
  </div>
  <div class="col" align="left">
    <select name="lstempresas" id="lstempresas" style="width: 100%;">
<?php
if ($flstempresas == "" || $flstempresas == 0){$seleccionado = 'selected=""';}else{$seleccionado = '';}
echo '<option value="0" '.$seleccionado.'>Seleccione una empresa</option>';

    $ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."empresas order by razonsocial");

    while($columna = mysqli_fetch_array($ConsultaMySql))
    {
		if ($flstempresas == $columna["id"]){$seleccionado = 'selected=""';}else{$seleccionado = '';}
        echo '<option value="'.$columna["id"].'" '.$seleccionado.'>'.$columna["razonsocial"].'</option>';
    }

?>      
    </select>
  </div>
</div>
  

<div class="row">
  <div class="col maintitle">
    Series
  </div>
</div>
    
<div class="row">
  <div class="col-sm-2 maintitle" align="left">
    F. Venta
  </div>
  <div class="col" align="left">
    <div id="lstfv">
<?php
if($flstempresas > 0)
{
	
$cnsprov = $mysqli->query("SELECT * from ".$prefixsql."series where tipo = 'F' and cv = '2' and idempresa = '".$flstempresas."' order by serie");
while($columna = mysqli_fetch_array($cnsprov))
{

$existe_idserie = array_search($columna["id"], $fchkfv);

$rs_idserie = $fchkfv[$existe_idserie];


if($rs_idserie == $columna["id"]){$seleccionado = 'checked=""';}else{$seleccionado = '';}
	
    if ($columna["dft"] == '1')
	{
		echo '<label><b><input name="chkfv[]" type="checkbox" value="'.$columna["id"].'" '.$seleccionado.'> '.$columna["serie"].'</b></label> ';
	}
else
	{
		echo '<label><input name="chkfv[]" type="checkbox" value="'.$columna["id"].'" '.$seleccionado.'> '.$columna["serie"].'</label> ';
	}
	
}
$existe = $cnsprov->num_rows;
if($existe == "0") {echo '<b>NO existen series</b>';}


}
?>
	</div>
  </div>
</div>
<div class="row">  
  <div class="col-sm-2 maintitle" align="left">
    F. V. Rectificativas
  </div>
  <div class="col" align="left">
    <div id="lstfvr">
<?php
if($flstempresas > 0)
{
	
$cnsprov = $mysqli->query("SELECT * from ".$prefixsql."series where tipo = 'FR' and cv = '2' and idempresa = '".$flstempresas."' order by serie");
while($columna = mysqli_fetch_array($cnsprov))
{

$existe_idserie = array_search($columna["id"], $fchkfvr);

$rs_idserie = $fchkfvr[$existe_idserie];


if($rs_idserie == $columna["id"]){$seleccionado = 'checked=""';}else{$seleccionado = '';}
	
    if ($columna["dft"] == '1')
	{
		echo '<label><b><input name="chkfvr[]" type="checkbox" value="'.$columna["id"].'" '.$seleccionado.'> '.$columna["serie"].'</b></label> ';
	}
else
	{
		echo '<label><input name="chkfvr[]" type="checkbox" value="'.$columna["id"].'" '.$seleccionado.'> '.$columna["serie"].'</label> ';
	}
	
}
$existe = $cnsprov->num_rows;
if($existe == "0") {echo '<b>NO existen series</b>';}


}
?>
	</div>
  </div>
</div>
<div class="row">
  <div class="col-sm-2 maintitle" align="left">
    F. Compra
  </div>
  <div class="col" align="left">
    <div id="lstfc">
<?php
if($flstempresas > 0)
{
	
$cnsprov = $mysqli->query("SELECT * from ".$prefixsql."series where tipo = 'F' and cv = '1' and idempresa = '".$flstempresas."' order by serie");
while($columna = mysqli_fetch_array($cnsprov))
{

$existe_idserie = array_search($columna["id"], $fchkfc);

$rs_idserie = $fchkfc[$existe_idserie];


if($rs_idserie == $columna["id"]){$seleccionado = 'checked=""';}else{$seleccionado = '';}
	
    if ($columna["dft"] == '1')
	{
		echo '<label><b><input name="chkfc[]" type="checkbox" value="'.$columna["id"].'" '.$seleccionado.'> '.$columna["serie"].'</b></label> ';
	}
else
	{
		echo '<label><input name="chkfc[]" type="checkbox" value="'.$columna["id"].'" '.$seleccionado.'> '.$columna["serie"].'</label> ';
	}
	
}
$existe = $cnsprov->num_rows;
if($existe == "0") {echo '<b>NO existen series</b>';}


}
?>
	</div>
  </div>
</div>

<p></P>


<div align="center" class="rectangulobtnsguardar">

<input class="btnsubmit" name="btnguardar" value="Buscar" type="submit"> 

</div>

</form>