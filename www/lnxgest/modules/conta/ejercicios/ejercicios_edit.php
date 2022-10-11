<?php
$idempresa = $_COOKIE["lnxcontaidempresa"];
$idejercicio = $_GET["idejercicio"];

$sqlaux = $mysqli->query("select * from ".$prefixsql."conta_ejercicios where id = '".$idejercicio."'"); 
$rowaux = mysqli_fetch_assoc($sqlaux);
$lbl_codigo = $rowaux["codigo"];
$dbdescripcion = $rowaux["descripcion"];


$dbfinicio = $rowaux["finicio"];
    $xfecha = explode("-", $dbfinicio);
        $fano = $xfecha[0];
        $fmes = $xfecha[1];
        $fdia = $xfecha[2];
        
        $finicio = $fdia."/".$fmes."/".$fano;
$dbffin = $rowaux["ffin"];
    $xfecha = explode("-", $dbffin);
        $fano = $xfecha[0];
        $fmes = $xfecha[1];
        $fdia = $xfecha[2];
        
        $ffin = $fdia."/".$fmes."/".$fano;      

$dbidestado = $rowaux["idestado"];   

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

<div class="grupotabs">
    <div class="campoencoger">
<?php
if ($_GET["section"] == "ejercicios" && $_GET["action"] == "edit"){$claseboton = "btn_tab_sel";}else{$claseboton = "btn_tab";}
echo '<a class="'.$claseboton.'" href="index.php?module=conta&section=ejercicios&action=edit&idejercicio='.$idejercicio.'">Ejercicio</a> ';

if ($_GET["section"] == "grupos"){$claseboton = "btn_tab_sel";}else{$claseboton = "btn_tab";}
echo '<a class="'.$claseboton.'" href="index.php?module=conta&section=grupos&idejercicio='.$idejercicio.'">Grupos</a> ';

if ($_GET["section"] == "subgrupos"){$claseboton = "btn_tab_sel";}else{$claseboton = "btn_tab";}
echo '<a class="'.$claseboton.'" href="index.php?module=conta&section=subgrupos&idejercicio='.$idejercicio.'">SubGrupos</a> ';
?>
    </div>
</div>
  
<form name="frmejecricio" method="POST" action="index.php?module=conta&section=ejercicios&action=save" >
<input type="hidden" name="haccion" value="update" />
<input type="hidden" name="hidejercicio" value="<?php echo $idejercicio; ?>" />
<div class="row">
    <div class="col maintitle" align="left">
        Editando ejercicio
    </div>
</div>
<div class="row">
    <div class="col-sm-2" align="left">
        Ejercicio
    </div>
    <div class="col" align="left">
        <b><?php echo $lbl_codigo; ?></b>
    </div>
</div>
<div class="row">
    <div class="col-sm-2" align="left">
        Descripción
    </div>
    <div class="col" align="left">
        <input type="text" name="txtdescripcion" value="<?php echo $dbdescripcion; ?>" maxlength="50" class="campoencoger" />
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
<?php
if($dbidestado == "1"){$seleccionado = ' selected=""';}else{$seleccionado = '';}
    echo '<option value="1" '.$seleccionado.'>Abierto</option>';
if($dbidestado == "0"){$seleccionado = ' selected=""';}else{$seleccionado = '';}
    echo '<option value="0" '.$seleccionado.'>Cerrado</option>';
?>
        </select>
    </div>
</div>


<div align="center" class="rectangulobtnsguardar">

<input class="btnsubmit" name="btnguardar" value="Guardar" type="submit"> 

<a class="btncancel" href="index.php?module=conta&section=ejercicios">Cancelar</a>

</div>
      
</form>