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

        $("#txtfecha").datepicker({
                dateFormat: 'dd/mm/yy',
                firstDay: 1,
                onSelect: function(dateText, inst) {
                $("#txtfecha_value").val(dateText);
                }
        });

});
</script>
<script language="javascript">
$(document).ready(function(){
   $("#txtcontacto").keyup(function () {
           
	elegido=$(this).val();
    var elegido = document.getElementById("txtcontacto").value;
    var ajxidtercero = document.getElementById("lsttercero").value;

	$.post("modules/biblio/ajax/ajx_miembros.php", { elegido: elegido, idtercero: ajxidtercero }, function(data){

	$("#lstcontacto").html(data);

	
	});
		
});


$("#txtlibro").keyup(function () {
           
           elegido=$(this).val();
           var elegido = document.getElementById("txtlibro").value;
       
           $.post("modules/biblio/ajax/ajx_libros.php", { elegido: elegido }, function(data){
       
           $("#tbllibros").html(data);
       
           
           });
               
       });



});
</script>

<?php
$lblfechahoy = date("d/m/Y");

$sqlaux = $mysqli->query("select * from ".$prefixsql."biblio_config where opcion = 'BIBLIOIDTERCERO' "); 
$rowaux = mysqli_fetch_assoc($sqlaux);
$idtercero = $rowaux["valor"];

$sqlaux = $mysqli->query("select * from ".$prefixsql."terceros where id = '".$idtercero."' "); 
$rowaux = mysqli_fetch_assoc($sqlaux);
$lbltercerorazonsocial = $rowaux["razonsocial"];
?>

<form name="form1" method="post" action="index.php?module=biblio&section=prestamos&action=save" autocomplete="off">
<input name="haccion" type="hidden" value="new">
<div class="row">
	<div class="col-sm-2">
		Fecha prestamo
	</div>
	<div class="col">
    <input type="text" id="txtfecha" name="txtfecha" value="<?php echo $lblfechahoy; ?>" maxlength="10" required pattern=".{10,10}" title="dd/mm/yyyy" />
	</div>
</div>
<div class="row">
	<div class="col-sm-2">
		Centro
	</div>
	<div class="col">
        <select name="lsttercero" id="lsttercero" class="campoencoger">
        <option value="<?php echo $idtercero; ?>"><?php echo $lbltercerorazonsocial; ?></option>
        </select>
	</div>
</div>

<div class="row">
	<div class="col-sm-2">
		Persona
	</div>
	<div class="col">
    
    <img src="img/buscar.jpg"/>
    <input type="text" name="txtcontacto" id="txtcontacto" value="" maxlength="50" placeholder="Escriba el nombre a buscar" style="width: Calc(100% - 32px);" />
    

        <select name="lstcontacto" id="lstcontacto" style="width: 100%;">
<?php
$cnssql= $mysqli->query("select * from ".$prefixsql."terceroscontactos where idtercero = '".$idtercero."'");	
while($col = mysqli_fetch_array($cnssql))
{
    echo '<option value="'.$col["id"].'">'.$col["nombre"].'</option>';
    
}

?>
        </select>
	</div>
</div>


<div class="row">
	<div class="col-sm-2">
		Libro
	</div>
	<div class="col">
    
    <img src="img/buscar.jpg"/>
    <input type="text" name="txtlibro" id="txtlibro" value="" maxlength="50" placeholder="Escriba el titulo o codigo del libro a buscar" style="width: Calc(100% - 32px);" />
    </br>
    <div style="display: block; overflow-x: auto;">

<div id="tbllibros"></div>
    
    </div>
    
    </div>
</div>



<div align="center" class="rectangulobtnsguardar">

    <button type="submit" class="btnsubmit" >
                <i class="hidephonview fa fa-save fa-lg"></i> Prestar</button>
		
	
    <a href="index.php?module=biblio&section=prestamos" class="btncancel"><i class="hidephonview fa fa-window-close fa-lg"></i> Cancelar</a>
</div>

</form>