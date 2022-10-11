<link rel="stylesheet" href="scripts/jquery/jquery-ui-lnx.css">
<script src="scripts/jquery/jquery-2.1.1.js"></script>
<script src="scripts/jquery/jquery-ui.js"></script>

<script>

  $().ready(function() {

$.datepicker.regional['es'] = 
  {
	closeText: 'Cerrar', 
	prevText: 'Previo', 
	nextText: 'Próximo',
  
  monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
  monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun','Jul','Ago','Sep','Oct','Nov','Dic'],
  monthStatus: 'Ver otro mes', yearStatus: 'Ver otro año',
  dayNames: ['Domingo','Lunes','Martes','Miércoles','Jueves','Viernes','Sábado'],
  dayNamesShort: ['Dom','Lun','Mar','Mie','Jue','Vie','Sab'],
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
            
            $.post("modules/balance/ajax/ajx_empresa-series_fv.php", { idempresa: empresa }, function(data){
            $("#lstfv").html(data);
            });            
            
            $.post("modules/balance/ajax/ajx_empresa-series_fvr.php", { idempresa: empresa }, function(data){
            $("#lstfvr").html(data);
            });
            
            $.post("modules/balance/ajax/ajx_empresa-series_fc.php", { idempresa: empresa }, function(data){
            $("#lstfc").html(data);
            });
        });
   })
});
</script>
<script type="text/javascript">
function fechastrimestre(trimestre, ano) {
    var xfechainicio = "";
    var xfechafin = "";
    
    if(trimestre == "1")
    {
        xfechainicio = "01/01/" + ano;
        xfechafin = "31/03/" + ano;
        document.getElementById("dpkfechainicio").value = xfechainicio;
        document.getElementById("dpkfechafin").value = xfechafin;
    }
    if(trimestre == "2")
    {
        xfechainicio = "01/04/" + ano;
        xfechafin = "30/06/" + ano;
        document.getElementById("dpkfechainicio").value = xfechainicio;
        document.getElementById("dpkfechafin").value = xfechafin;
    }
    if(trimestre == "3")
    {
        xfechainicio = "01/07/" + ano;
        xfechafin = "30/09/" + ano;
        document.getElementById("dpkfechainicio").value = xfechainicio;
        document.getElementById("dpkfechafin").value = xfechafin;
    }
    if(trimestre == "4")
    {
        xfechainicio = "01/10/" + ano;
        xfechafin = "31/12/" + ano;
        document.getElementById("dpkfechainicio").value = xfechainicio;
        document.getElementById("dpkfechafin").value = xfechafin;
    }
    
  
    
}
</script>

<form name="form1" method="post" action="index.php?module=balance&section=trimestre&action=resultado">
    
    
<div class="row">
  <div class="col maintitle">
    Filtro para realizar el Balance
  </div>
</div>
    
<div class="row">
  <div class="col-sm-2" align="left">
	Agrupar por: </br>
	<label><input type="radio" name="optagrupar" value="grpserie" checked=""> Serie</label></br>
	<label><input type="radio" name="optagrupar" value="grpfecha" > Fecha</label></br>
  </div>
  <div class="col-sm-2" align="left">
      Fecha inicio </br>
    <?php 
	$anoactual = date('Y');
		echo '<input type="text" name="txtfecha" id="dpkfechainicio" size="15" value ="01/01/'.$anoactual.'" required="">';
	?>
  </div>
  <div class="col-sm-2" align="left">
      Fecha Fin </br>
      <?php
	$fechaactual = date('d/m/Y');

	echo '<input type="text" name="txtfechafin" id="dpkfechafin" size="15" value="'.$fechaactual.'"required="">';
	?>
  </div>
  <div class="col-sm-3" align="left">
  
<?php
$anoactual = date('Y');
echo '<a href="javascript:fechastrimestre(1, '.$anoactual.')" class="btnedit">1º Trimestre</a> ';
echo '<a href="javascript:fechastrimestre(2, '.$anoactual.')" class="btnedit">2º Trimestre</a> ';
echo '<a href="javascript:fechastrimestre(3, '.$anoactual.')" class="btnedit">3º Trimestre</a> ';
echo '<a href="javascript:fechastrimestre(4, '.$anoactual.')" class="btnedit">4º Trimestre</a>';
?>

  </div>
  
</div>
  
<div class="row">
  <div class="col-sm-2">
    Empresa
  </div>
  <div class="col" align="left">
    <select name="lstempresas" id="lstempresas" style="width: 100%;">
        <option value="0" selected="">Seleccione una empresa</option>
<?php
    $ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."empresas order by razonsocial");

    while($columna = mysqli_fetch_array($ConsultaMySql))
    {
        echo '<option value="'.$columna["id"].'" '.$defecto.'>'.$columna["razonsocial"].'</option>';
    }

?>      
    </select>
  </div>
</div>
<div class="row">
  <div class="col-sm-2">
    Informe
  </div>
  <div class="col">
    <select name="lstdocprint" id="lstdocprint" style="width: 100%;">
    <option value="0">-Sin informe-</option>
    <?php
$idmodulo = "100";
$cnssql= $mysqli->query("select * from ".$prefixsql."docprint where codinforme = 'TRI' and idmod = '".$idmodulo."' ");	
while($col = mysqli_fetch_array($cnssql))
{
    
    echo '<option value="'.$col["id"].'">'.$col["descripcion"].'</option>';

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
    
<div class="row maintitle">
  <div class="col-sm-2" align="left">
    F. Venta
  </div>
  <div class="col-sm-2" align="left">
    F. V. Rectificativas
  </div>
  <div class="col-sm-2" align="left">
    F. Compra
  </div>
</div>
<div class="row">
  <div class="col-sm-2" align="left">
    <div id="lstfv"></div>
  </div>
  <div class="col-sm-2" align="left">
    <div id="lstfvr"></div>
  </div>
  <div class="col-sm-2" align="left">
    <div id="lstfc"></div>
  </div>
</div>

<p></P>


 <div class="row">
  <div class="col-sm-2">
    Unir PDF
  </div>
  <div class="col" align="left">
    <p>Ventas </br>
    <select name="lstgenpdffv" style="width: 100%;">
        <option value="0" selected="">Sin generación de archivo PDF</option>
<?php
$cnsprov = $mysqli->query("SELECT * from ".$prefixsql."ficheros_cat order by categoria");
while($columna = mysqli_fetch_array($cnsprov))
{
    echo '<option value="'.$columna["id"].'" >'.$columna["categoria"].'</option>';
}
?>
    </select>
    </p>
    <p>Ventas Rectificativas</br>
    <select name="lstgenpdffvr" style="width: 100%;">
        <option value="0" selected="">Sin generación de archivo PDF</option>
<?php
$cnsprov = $mysqli->query("SELECT * from ".$prefixsql."ficheros_cat order by categoria");
while($columna = mysqli_fetch_array($cnsprov))
{
    echo '<option value="'.$columna["id"].'" >'.$columna["categoria"].'</option>';
}
?>
    </select>
    </p>
    <p>Compras </br>
    <select name="lstgenpdffc" style="width: 100%;">
        <option value="0" selected="">Sin generación de archivo PDF</option>
<?php
$cnsprov = $mysqli->query("SELECT * from ".$prefixsql."ficheros_cat order by categoria");
while($columna = mysqli_fetch_array($cnsprov))
{
    echo '<option value="'.$columna["id"].'" >'.$columna["categoria"].'</option>';
}
?>
    </select>
    </p>
  </div>
</div>
    
    
<div align="center" class="rectangulobtnsguardar">

<input class="btnsubmit" name="btnguardar" value="Procesar" type="submit"> 

</div>


  
  

</form>




<?php
/*
$numero = "27557.0131";
$numerosalida = number_format($numero,2,".",",");
echo $numerosalida;
*/
?>

<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>