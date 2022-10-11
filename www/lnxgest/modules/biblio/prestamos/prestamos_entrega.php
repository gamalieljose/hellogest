<link rel="stylesheet" href="scripts/jquery/jquery-ui-lnx.css">
<script src="scripts/jquery/jquery-2.1.1.js"></script>
<script src="scripts/jquery/jquery-ui.js"></script>
<script type="text/javascript">
  $().ready(function() {

$.datepicker.regional['es'] =
  {
        closeText: 'Cerrar',
        prevText: 'Previo',
        nextText: 'Próximo',

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

        $("#txtfechaentrega").datepicker({
                dateFormat: 'dd/mm/yy',
                firstDay: 1,
                onSelect: function(dateText, inst) {
                $("#txtfechaentrega_value").val(dateText);
                }
        });

});
</script>

<?php
$idregistro = $_GET["id"];

$lblfechahoy = date("d/m/Y");

$sqlaux = $mysqli->query("select * from ".$prefixsql."biblio_prestamos where id = '".$idregistro."' "); 
$rowaux = mysqli_fetch_assoc($sqlaux);
$dbidlibro = $rowaux["idlibro"];
$dbidusuario = $rowaux["idusuario"];
$dbfechaout = $rowaux["fechaout"];


$xfecha = explode("-", $dbfechaout);
$lbllfechaout = $xfecha[2]."/".$xfecha[1]."/".$xfecha[0];

$sqlaux = $mysqli->query("select * from ".$prefixsql."biblio_config where opcion = 'BIBLIOIDTERCERO' "); 
$rowaux = mysqli_fetch_assoc($sqlaux);
$idtercero = $rowaux["valor"];

$sqlaux = $mysqli->query("select * from ".$prefixsql."terceros where id = '".$idtercero."' "); 
$rowaux = mysqli_fetch_assoc($sqlaux);
$lbltercerorazonsocial = $rowaux["razonsocial"];

$sqlaux = $mysqli->query("select * from ".$prefixsql."terceroscontactos where id = '".$dbidusuario."' "); 
$rowaux = mysqli_fetch_assoc($sqlaux);
$lblpersona = $rowaux["nombre"];

$sqlaux = $mysqli->query("select * from ".$prefixsql."biblio_libros where id = '".$dbidlibro."' "); 
$rowaux = mysqli_fetch_assoc($sqlaux);
$libro_libro = $rowaux["libro"];
$libro_codigo = $rowaux["codigo"];

?>

<form name="form1" method="post" action="index.php?module=biblio&section=prestamos&action=save" autocomplete="off">
<input name="haccion" type="hidden" value="entrega">
<input name="hidregistro" type="hidden" value="<?php echo $idregistro; ?>">

<div class="row">
	<div class="col-sm-2">
		Fecha prestamo
	</div>
	<div class="col">
    <?php echo $lbllfechaout; ?>
	</div>
</div>
<div class="row">
	<div class="col-sm-2">
		Fecha entrega
	</div>
	<div class="col">
    <input type="text" id="txtfechaentrega" name="txtfechaentrega" value="<?php echo $lblfechahoy; ?>" maxlength="10" required pattern=".{10,10}" title="dd/mm/yyyy" />
	</div>
</div>
<div class="row">
	<div class="col-sm-2">
		Centro
	</div>
	<div class="col">
        <?php echo $lbltercerorazonsocial; ?>
	</div>
</div>

<div class="row">
	<div class="col-sm-2">
		Persona
	</div>
	<div class="col">
    <?php echo $lblpersona; ?>
	</div>
</div>


<div class="row">
	<div class="col-sm-2">
		Libro
	</div>
	<div class="col">
    <?php echo $libro_codigo." - ".$libro_libro; ?>
    </div>
    
    </div>
</div>



<div align="center" class="rectangulobtnsguardar">

    <button type="submit" class="btnsubmit" >
                <i class="hidephonview fa fa-save fa-lg"></i> Prestar</button>
		
	
    <a href="index.php?module=biblio&section=prestamos" class="btncancel"><i class="hidephonview fa fa-window-close fa-lg"></i> Cancelar</a>
</div>

</form>