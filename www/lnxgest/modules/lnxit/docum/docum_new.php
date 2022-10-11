<link rel="stylesheet" href="scripts/jquery/jquery-ui-lnx.css">
<script src="core/com/js_terceros_all.js"></script>

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
  
	$("#dpkfcreado").datepicker({	
		dateFormat: 'dd/mm/yy',  
		firstDay: 1, 
		onSelect: function(dateText, inst) { 
		$("#dpkfcreado_value").val(dateText);
		}
	});
	

});
</script>


<script src="scripts/tinymce/tinymce.min.js" ></script>
<script>
tinymce.init({
    selector: 'textarea#txtdocumentacion',
    language: 'es', 
    height : "400",
    plugins: "lists paste image table advtable link fullscreen code codesample ",
    toolbar: 'undo redo | styleselect | bold italic | forecolor backcolor | alignleft aligncenter alignright alignjustify | numlist bullist | outdent indent | link image table | codesample | fullscreen',
    paste_data_images : true
});
</script>

<?php
$fechahoy = date("d/m/Y");
?>
<form name="frmdocum" method="POST" action="index.php?module=lnxit&section=docum&action=save" enctype="multipart/form-data">

<input type="hidden" name="haccion" value="new" />

<div class="row">
    <div class="col-sm-2" align="left">
        Fecha Creado
    </div>
    <div class="col" align="left">
        <input type="text" maxlength="10" required pattern=".{10,10}"  title="dd/mm/yyyy" value="<?php echo $fechahoy; ?>" name="dpkfcreado" id="dpkfcreado" />
    </div>
</div>
<div class="row">
    <div class="col-sm-2" align="left">
        <label><input type="checkbox" checked="" value="1" name="chktercero" /> Tercero</label>
    </div>
    <div class="col" align="left">
<div id="div_buscatercero" style="display:none;">
<input type="text" value="" name="txttercero" id="txttercero" maxlength="50" placeholder="Escriba el nombre a buscar" autocomplete="off" class="campoencoger"/></br> 
</div>
<a href="javascript:mostrar();"><img src="img/buscar.jpg"/></a>
<?php
	//seleciona cliente
	
	echo '<select name="lsttercero" id="lsttercero" style="width: calc(100% - 230px);">';
	
	$cnsterceros = $mysqli->query("SELECT * from ".$prefixsql."terceros where id = '".$flsttercero."'");
		
		while($colter = mysqli_fetch_array($cnsterceros))
		{      
			echo '<option value="'.$colter["id"].'" >'.$colter["razonsocial"].'</option>'; 
		}
		echo '</select>';
?>

    </div>
</div>
<div class="row">
    <div class="col-sm-2" align="left">
        Categoría
    </div>
    <div class="col" align="left">
<?php
	//seleciona categoria de it categorias
	
	echo '<select name="lstcategoria" id="lstcategoria" class="campoencoger">';
	echo '<option value="0" selected="">-sin especificar-</option>'; 
	$cnsterceros = $mysqli->query("SELECT * from ".$prefixsql."it_categorias order by categoria");
		
		while($colter = mysqli_fetch_array($cnsterceros))
		{      
			echo '<option value="'.$colter["id"].'" >'.$colter["categoria"].'</option>'; 
		}
		echo '</select>';
?>
    </div>
</div>
<div class="row">
    <div class="col-sm-2" align="left">
        <b>Titulo</b>
    </div>
    <div class="col" align="left">
        <input type="text" maxlength="50" required="" placeholder="Escriba el título de esta documentación" value="" name="txttitulo" style="width: 100%;"/>
    </div>
</div>
<div class="row">
    <div class="col-sm-2" align="left">
        Descripción
    </div>
    <div class="col" align="left">
    <div style="width: 100%; max-width: 950px; background-color: #ffffff;" >
        <textarea id="txtdocumentacion" name="txtdocumentacion" ></textarea>
    </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-2" align="left">
        Adjuntar archivo
    </div>
    <div class="col" align="left">
        <input type="file" name="fileficherito" />
    </div>
</div>
<div align="center" class="rectangulobtnsguardar">

    <button type="submit" class="btnsubmit" >
                <i class="hidephonview fa fa-save fa-lg"></i> Guardar</button>
		
	
    <a href="index.php?module=lnxit&section=docum" class="btncancel"><i class="hidephonview fa fa-window-close fa-lg"></i> Cancelar</a>
</div>

</form>