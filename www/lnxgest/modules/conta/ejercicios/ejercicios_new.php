<?php
$idempresa = $_COOKIE["lnxcontaidempresa"];
$anohoy = date(Y);
$finicio = "01/01/".$anohoy;
$ffin = "31/12/".$anohoy;


$sqlaux = $mysqli->query("select * from ".$prefixsql."conta_cfpc where idempresa = '".$idempresa."' and opcion = 'numdigitos'"); 
$rowaux = mysqli_fetch_assoc($sqlaux);
$dbnumdigitos = $rowaux["valor"];


?>
<link rel="stylesheet" href="scripts/jquery/jquery-ui-lnx.css">
<script type="text/javascript">

  $().ready(function() {

$.datepicker.regional['es'] = 
  {
	closeText: 'Cerrar', 
	prevText: 'Previo', 
	nextText: 'PrÃ³ximo',
  
  monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
  monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun','Jul','Ago','Sep','Oct','Nov','Dic'],
  monthStatus: 'Ver otro mes', yearStatus: 'Ver otro aÃ±o',
  dayNames: ['Domingo','Lunes','Martes','MiÃ©rcoles','Jueves','Viernes','SÃ¡bado'],
  dayNamesShort: ['Dom','Lun','Mar','Mie','Jue','Vie','SÃ¡b'],
  dayNamesMin: ['Do', 'Lu','Ma','Mi','Ju','Vi','Sa'],
  dateFormat: 'dd/mm/yy', firstDay: 0, 
  initStatus: 'Selecciona la fecha', isRTL: false
  };
  
  $.datepicker.setDefaults($.datepicker.regional['es']);
  
	$("#txtfinicio").datepicker({	
		dateFormat: 'dd/mm/yy',  
		firstDay: 1, 
		onSelect: function(dateText, inst) { 
		$("#txtfinicio_value").val(dateText);
		}
	});
        
        $("#txtffin").datepicker({	
		dateFormat: 'dd/mm/yy',  
		firstDay: 1, 
		onSelect: function(dateText, inst) { 
		$("#txtffin_value").val(dateText);
		}
	});


});
  </script>

<form name="frmejecricio" method="POST" action="index.php?module=conta&section=ejercicios&action=save" >
<input type="hidden" name="haccion" value="new" />
<div class="row">
    <div class="col maintitle" align="left">
        Nuevo ejercicio
    </div>
</div>
<div class="row">
    <div class="col-sm-2" align="left">
        Plantilla PGC
    </div>
    <div class="col" align="left">
        <select  disabled name="lstplantilla" class="campoencoger">
            <option value="pgc2018.xml">Plan General Contable 2018</option>
        </select>
    </div>
</div>
<div class="row">
    <div class="col-sm-2" align="left">
        Serie
    </div>
    <div class="col" align="left">
        <select name="lstserie" class="campoencoger">
<?PHP
$cnssql= $mysqli->query("select * from ".$prefixsql."series where idempresa = '".$idempresa."' and tipo = 'CONTAEXE' order by serie");	
while($col = mysqli_fetch_array($cnssql))
{
    if($col["dft"] == "1"){$seleccionado = ' selected=""';}else{$seleccionado = '';}
   echo '<option value="'.$col["id"].'" '.$seleccionado.'>'.$col["serie"].'</option>';
}

?>
        </select>
    </div>
</div>
<div class="row">
    <div class="col-sm-2" align="left">
        Descripción
    </div>
    <div class="col" align="left">
        <input type="text" name="txtdescripcion" value="" maxlength="50" class="campoencoger" />
    </div>
</div>
<div class="row">
    <div class="col-sm-2" align="left">
        Fechas
    </div>
    <div class="col" align="left">
        Fecha inicio </br>
        <input type="text" name="txtfinicio" id="txtfinicio" value="<?php echo $finicio; ?>" maxlength="10"/>
    </div>
    <div class="col" align="left">
        Fecha Fin </br>
        <input type="text" name="txtffin" id="txtffin" value="<?php echo $ffin; ?>" maxlength="10"/>
    </div>
</div>
<div class="row">
    <div class="col-sm-2" align="left">
        Estado
    </div>
    <div class="col" align="left">
        <select name="lstestado" style="width: 100%;">
            <option value="1" selected="">Abierto</option>
            <option value="0">Cerrado</option>
        </select>
    </div>
</div>


<div align="center" class="rectangulobtnsguardar">

<input class="btnsubmit" name="btnguardar" value="Guardar" type="submit"> 

<a class="btncancel" href="index.php?module=conta&section=ejercicios">Cancelar</a>

</div>
      
</form>