<link rel="stylesheet" href="scripts/jquery/jquery-ui-lnx.css">
<?php
$fechahoy = date("d/m/Y");

?>
<script language="javascript">
function fechaborrar(campo) {
    document.getElementById(campo).value = '00/00/0000';
}

function fechaactual(campo) {
<?php
echo "document.getElementById(campo).value = '".$fechahoy."' ;";
?>        
}

function mostrar() {
	div = document.getElementById("div_buscatercero");
	div.style.display = "";
	document.getElementById("txttercero").focus();
}

function mostrarcontactos() {
	div = document.getElementById("div_buscacontacto");
	div.style.display = "";
	document.getElementById("txtcontacto").focus();
}

$(document).ready(function(){
   $("#txttercero").keyup(function () {
           
	elegido=$(this).val();
	var elegido = document.getElementById("txttercero").value;

	$.post("core/com/ajx_terceros_all.php", { elegido: elegido }, function(data){

	$("#lsttercero").html(data);

	 cargacontactos();
	
	});
		
});
   
  
$("#txtcontacto").keyup(function () {
           
	elegido=$(this).val();
	var nombrecontacto = document.getElementById("txtcontacto").value;
	var idtercero = document.getElementById("lsttercero").value;
	
	$.post("modules/lnxit/ajax/ajx_terceros_contactos.php", { nombrecontacto: nombrecontacto, idtercero: idtercero }, function(data){

	$("#lstcontacto").html(data);
	});            
      
   })
});


</script>
<script language="javascript">
$(document).ready(function(){
   $("#lsttercero").change(function () {
           $("#lsttercero option:selected").each(function () {
            idtercero=$(this).val();
            
            $.post("modules/lnxit/ajax/ajx_terceros_contactos.php", { idtercero: idtercero }, function(data){
            $("#lstcontacto").html(data);
            });
                       
        }); 
   })
});


function cargacontactos() {
	var idtercero = document.getElementById("lsttercero").value;
	
$.post("modules/lnxit/ajax/ajx_terceros_contactos.php", { idtercero: idtercero }, function(data){
            $("#lstcontacto").html(data);
            });
	
}

</script>
<script language="javascript">

  $().ready(function() {

$.datepicker.regional['es'] = 
  {
	closeText: 'Cerrar', 
	prevText: 'Previo', 
	nextText: 'Próximo',
  
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
  
	$("#dpkvencimiento").datepicker({	
		dateFormat: 'dd/mm/yy',  
		firstDay: 1, 
		onSelect: function(dateText, inst) { 
		$("#dpkfechainicio_value").val(dateText);
		}
	});
	
	$("#dpkfecha").datepicker({	
		dateFormat: 'dd/mm/yy',  
		firstDay: 1, 
		onSelect: function(dateText, inst) { 
		$("#dpkfechainicio_value").val(dateText);
		}
	});
	
	$("#dpkavisos").datepicker({	
		dateFormat: 'dd/mm/yy',  
		firstDay: 1, 
		onSelect: function(dateText, inst) { 
		$("#dpkavisos_value").val(dateText);
		}
	});


});
</script>
<?php
include("modules/lnxit/activos/tabs.php");


$cnssql= $mysqli->query("SELECT * FROM ".$prefixsql."ita_activos where id = '".$_GET["id"]."'");
$row = mysqli_fetch_assoc($cnssql);
$dbidtercero = $row["idtercero"];
$dbidcontacto = $row["idcontacto"];
$dbidtipo = $row["idtipo"];
$dbcodigo = $row["codigo"];
$dbnombre  = $row["nombre"];
$dbestado = $row["estado"];
$dbid = $row["id"];
$dbplantilla = $row["plantilla"];
$dbnotas = $row["notas"];
$dbtratarcomo = $row["tratarcomo"];



$dbfalta = $row["falta"];
$dbfcaducidad = $row["fcaducidad"];
$dbavisar = $row["avisar"];
$dbfaviso = $row["faviso"];

$fano = substr($dbfcaducidad, 0, 4);  
$fmes = substr($dbfcaducidad, 5, 2);  
$fdia = substr($dbfcaducidad, 8, 2);  

$dbfcaducidad = $fdia."/".$fmes."/".$fano;

$fano = substr($dbfaviso, 0, 4);  
$fmes = substr($dbfaviso, 5, 2);  
$fdia = substr($dbfaviso, 8, 2);  

$dbfaviso = $fdia."/".$fmes."/".$fano;

$fano = substr($dbfalta, 0, 4);  
$fmes = substr($dbfalta, 5, 2);  
$fdia = substr($dbfalta, 8, 2);  

$dbfalta = $fdia."/".$fmes."/".$fano;

?>
				   
<form name="form1" action="index.php?module=lnxit&section=activos&ss=activo&action=save" method="post">
<?php

echo '<input type="hidden" name="hidactivo" value="'.$_GET["id"].'">';
?>
<input type="hidden" name="haccion" value="update">

<div class="row">
  <div class="col maintitle">
    Editando Activo
  </div>
</div>

<div class="row">
  <div class="col-sm-2">
    ID
  </div>
  <div class="col" align="left">
 <?php echo '<b>'.$dbid.'</b>'; ?>
  </div>
</div>

<div class="row">
    <div class="col-sm-2" align="left">
        Tercero
    </div>
    <div class="col" align="left">
<div id="div_buscatercero" style="display:none;">
<input type="text" value="" name="txttercero" id="txttercero" maxlength="50" placeholder="Escriba el nombre a buscar" class="campoencoger"/></br> 
</div>
<a href="javascript:mostrar();"><img src="img/buscar.jpg"/></a>
<?php
	//seleciona cliente
	
	echo '<select name="lsttercero" id="lsttercero" style="width: calc(100% - 30px);">';
	
	$cnsterceros = $mysqli->query("SELECT * from ".$prefixsql."terceros where id = '".$dbidtercero."'");
		
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
        Contacto Asignado
    </div>
    <div class="col" align="left">
<div id="div_buscacontacto" style="display:none;">
<input type="text" value="" name="txtcontacto" id="txtcontacto" maxlength="50" placeholder="Escriba el nombre a buscar" style="width: 100%;"/></br> 
</div>
<a href="javascript:mostrarcontactos();"><img src="img/buscar.jpg"/></a>
<?php
	//seleciona cliente
	
	echo '<select name="lstcontacto" id="lstcontacto" style="width: calc(100% - 30px);">';
	
	$cnsterceros = $mysqli->query("SELECT * from ".$prefixsql."terceroscontactos where idtercero = '".$dbidtercero."' order by nombre");
        if($dbidcontacto == '0'){$seleccionado = ' selected=""';}else{$seleccionado = '';}
			echo '<option value="0" '.$seleccionado.'>- sin asignar -</option>'; 
		while($colter = mysqli_fetch_array($cnsterceros))
		{      
                    if($dbidcontacto == $colter["id"]){$seleccionado = ' selected=""';}else{$seleccionado = '';}
			echo '<option value="'.$colter["id"].'" '.$seleccionado.'>'.$colter["nombre"].'</option>'; 
		}
		echo '</select>';
?>

    </div>
</div>






<div class="row">
  <div class="col-sm-2">
    Tipo de activo
  </div>
  <div class="col" align="left">
<select name="lsttipo" style="width: 100%;">
<?php
if ($dbidtipo == '0'){$seleccionado = 'selected=""';}else{$seleccionado = '';}
echo '<option value="0" '.$seleccionado.'>-Sin asignar-</option>';

$cnssql = "SELECT * FROM ".$prefixsql."ita_tipos order by tipo";
$ConsultaMySql= $mysqli->query($cnssql);

while($col = mysqli_fetch_array($ConsultaMySql))
{
	
	if ($dbidtipo == $col["id"]){$seleccionado = 'selected=""';}else{$seleccionado = '';}
	echo '<option value="'.$col["id"].'" '.$seleccionado.'>'.$col["tipo"].'</option>';
}
?>
</select>
  </div>
</div>
<div class="row">
  <div class="col-sm-2">
    Codigo
  </div>
  <div class="col" align="left">
<input type="text" maxlength="20" name="txtcodigo" value="<?php echo $dbcodigo; ?>" style="width: 100%;"/>
  </div>
</div>

<div class="row">
  <div class="col-sm-2">
    Nombre
  </div>
  <div class="col" align="left">
<?php
echo '<input type="text" maxlength="50" name="txtnombre" required="" value="'.$dbnombre.'" style="width: 100%;"/>';
?>
  </div>
</div>

<div class="row">
  <div class="col-sm-2">
    Estado
  </div>
  <div class="col" align="left">
<select name="lstestado" style="width: 100%;">
<?php
if ($dbestado == '0'){$seleccionado = 'selected=""';}else{$seleccionado = '';}
	echo '<option value="0" '.$seleccionado.'>-Sin especificar-</option>';
	
$cnssql = "SELECT * FROM ".$prefixsql."ita_estados order by estado";
$ConsultaMySql= $mysqli->query($cnssql);

while($col = mysqli_fetch_array($ConsultaMySql))
{
	if ($dbestado == $col["id"]){$seleccionado = 'selected=""';}else{$seleccionado = '';}
	echo '<option value="'.$col["id"].'" '.$seleccionado.'>'.$col["estado"].'</option>';
}
?>
	
</select>
  </div>
</div>

<div class="row">
  <div class="col-sm-2">
    Plantilla
  </div>
  <div class="col" align="left">
<select name="lstplantilla" style="width: 100%;">
<?php
if ($dbplantilla == ''){$seleccionado = ' selected=""';}else{$seleccionado = '';}
	echo '<option value="" '.$seleccionado.'>-Sin especificar-</option>';

$ruta = "modules/lnxit/activos/plantillas";

 

$filehandle = opendir($ruta);

 

while ($file = readdir($filehandle)) {

	if ($file != "." && $file != "..") {

 $path = $ruta.'/'.$file; 

	$ficherito = basename($path);

	$ficherito = explode('.',$file);

	$nombrearchivo = $ficherito[0];
	$extension = $ficherito[1]; 

		if ($dbplantilla == $file){$seleccionado = ' selected=""';}else{$seleccionado = '';}
		echo '<option value="'.$file.'" '.$seleccionado.'>'.$nombrearchivo.'</option>';  

		

	}

}

 

closedir($filehandle);

?>
</select>
  </div>
</div>


<div class="row">
  <div class="col-sm-2">
    Tratamiento
  </div>
  <div class="col" align="left">
  <select name="lsttratarcomo" style="width: 100%;">
  <?php

if($dbtratarcomo == '0'){$seleccionado = ' selected=""';}else{$seleccionado = '';}
  echo '<option value="0" '.$seleccionado.'>- Genérico -</option>';
if($dbtratarcomo == '1'){$seleccionado = ' selected=""';}else{$seleccionado = '';}
  echo '<option value="1" '.$seleccionado.'>Tratar como licencia</option>';
if($dbtratarcomo == '2'){$seleccionado = ' selected=""';}else{$seleccionado = '';}
  echo '<option value="2" '.$seleccionado.'>Tratar como ordenador</option>';


?>
</select>

  </div>
</div>

<div class="row">
  <div class="col-sm-2">
    Notas
  </div>
  <div class="col" align="left">
	<textarea name="txtnotas" maxlength="250" style="width: 100%;"><?php echo $dbnotas; ?></textarea>
  </div>
</div>


<div class="row">
  <div class="col maintitle">
    Fechas
  </div>
</div>

<div class="row">
  <div class="col-sm-2">
    Fecha Alta
  </div>
  <div class="col" align="left">
	<?php echo '<input type="text" maxlength="10" required pattern=".{10,10}"  title="dd/mm/yyyy" value="'.$dbfalta.'" name="dpkfecha" id="dpkfecha"  style="width: 100%;">'; ?>
  </div>
</div>
<div class="row">
  <div class="col-sm-2">
    Fecha Caducidad
  </div>
  <div class="col" align="left">
      <a href="javascript:fechaactual('dpkvencimiento')"><i class="fa fa-fw fa-calendar-alt" title="Fecha actual"></i> </a>
      <?php echo '<input type="text" maxlength="10" required pattern=".{10,10}"  title="dd/mm/yyyy" value="'.$dbfcaducidad.'" name="dpkvencimiento" id="dpkvencimiento"  style="width: 100px;">'; ?>
      <a href="javascript:fechaborrar('dpkvencimiento')"><i class="fa fa-fw fa-ban" title="Quitar fecha"></i> </a>
  </div>
</div>

<div class="row">
  <div class="col-sm-2">
    
  </div>
  <div class="col" align="left">
  <?php
  if($dbavisar == '1'){$seleccionado = ' checked=""';}else{$seleccionado = '';}
  echo '<input type="checkbox" name="chkaviso" value="1" '.$seleccionado.'/>';
  ?>
 Avisar a partir de
  </div>
</div>
<div class="row">
  <div class="col-sm-2">
    Fecha aviso
  </div>
  <div class="col" align="left">
      <a href="javascript:fechaactual('dpkavisos')"><i class="fa fa-fw fa-calendar-alt" title="Fecha actual"></i> </a>
<?php echo '<input type="text" maxlength="10" required pattern=".{10,10}"  title="dd/mm/yyyy" value="'.$dbfaviso.'" name="dpkavisos" id="dpkavisos"  style="width: 100px;">'; ?>
  <a href="javascript:fechaborrar('dpkavisos')"><i class="fa fa-fw fa-ban" title="Quitar fecha"></i> </a>
  </div>
</div>

<div align="center" class="rectangulobtnsguardar">

<input class="btnsubmit" name="btnguardar" value="Guardar" type="submit"> 

<a class="btncancel" href="index.php?module=lnxit&section=activos">Cancelar</a>

</div>



</form>




<table width="100%">
<tr class="maintitle">
	<td width="40"> </td>
	<td width="40">Ticket</td>
	<td width="160">Fecha</td>
	<td>Tercero</td>
	<td>Afectado</td>
	<td>Resumen</td>
</tr>

<?php
$ConsultaMySql= $mysqli->query("select * from ".$prefixsql."ita_tickets where idactivo = '".$_GET["id"]."' ");
$color = '1';
while($columna = mysqli_fetch_array($ConsultaMySql))
{
		
	if ($color == '1')
		{
			$color = '2';
			$pintacolor = "listacolor2";
		}
		else
		{
			$color = '1';
			$pintacolor = "listacolor1";
		}
	echo "<tr class=\"".$pintacolor."\" onmouseover=\"this.className = 'listacolorsobre'\" onmouseout=\"this.className = '".$pintacolor."'\">";
	
	
	echo '<td width="100"><a class="btnedit" href="index.php?module=lnxit&section=tickets&action=edit&id='.$columna["idticket"].'">Ver Ticket</a></td>';
	echo '<td>'.$columna["idticket"].'</td>';
	
	
	$cnssqlaux = $mysqli->query("SELECT * FROM ".$prefixsql."it_tickets where id = '".$columna["idticket"]."'");
	$rowaux = mysqli_fetch_assoc($cnssqlaux);
	$dbfcreacion = $rowaux["fcreacion"];
	$dbresumen = $rowaux["resumen"];
	$dbidafectado = $rowaux["idafectado"];
	
	$cnssqlaux = $mysqli->query("SELECT * FROM ".$prefixsql."terceroscontactos where id = '".$dbidafectado."'");
	$rowaux = mysqli_fetch_assoc($cnssqlaux);
	$dbcontacto = $rowaux["nombre"];
	$dbidtercero = $rowaux["idtercero"];
	
	$cnssqlaux = $mysqli->query("SELECT id, razonsocial FROM ".$prefixsql."terceros where id = '".$dbidtercero."'");
	$rowaux = mysqli_fetch_assoc($cnssqlaux);
	$dbrazonsocial = $rowaux["razonsocial"];
	
	
	
	echo '<td>'.$dbfcreacion.'</td>';
	echo '<td>'.$dbrazonsocial.'</td>';
	echo '<td>'.$dbcontacto.'</td>';
	echo '<td>'.$dbresumen.'</td>';
	
	
	echo '</tr>';
}

?>

</table>