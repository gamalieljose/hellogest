<link rel="stylesheet" href="scripts/jquery/jquery-ui-lnx.css">
<script src="scripts/jquery/jquery-2.1.1.js"></script>
<script src="scripts/jquery/jquery-ui.js"></script>

<script language="javascript">
$(document).ready(function(){
   $("#lstterceros").change(function () {
           $("#lstterceros option:selected").each(function () {
            elegido=$(this).val();
            $.post("modules/lnxit/tickets/ajx_contactos.php", { elegido: elegido }, function(data){
            $("#lstcontacto").html(data);
            });            
        });
   }) 
});
</script>

<script language="javascript">
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
  
	
	$("#dpkfecha").datepicker({	
		dateFormat: 'dd/mm/yy',  
		firstDay: 1, 
		onSelect: function(dateText, inst) { 
		$("#dpkfecha_value").val(dateText);
		}
	});
	



});
</script>
<script language="javascript">
function validarformulario() {
	var idtercero = document.getElementById("lsttercero").value;
	var stxtseguimiento = document.getElementById("txtseguimiento").value;

	if (idtercero > 0 && stxtseguimiento != '')
	{
		document.getElementById("frmseguimiento").submit(); 
	}
	else
	{
		alert("Seleccione un tercero y/o añada un texto al seguimiento");
	}


}
</script>
<script src="modules/ficheros/ajax/one_fichero.js"></script>

<?php

function round_time( $time, $round_to_minutes = 5, $type = 'auto' ) {

$round = array( 'auto' => 'round', 'up' => 'ceil', 'down' => 'floor' );
$round = @$round[ $type ] ? $round[ $type ] : 'round';
$seconds = $round_to_minutes * 60;
if(substr_count($time,":")==2)
    return date( 'H:i:s', $round( strtotime( $time ) / $seconds ) * $seconds );
else
    return date( 'H:i', $round( strtotime( $time ) / $seconds ) * $seconds );
}


$fechahoy = date("d/m/Y");

$pf_idcamp = $_GET["idcamp"];
$pf_idtercero = $_GET["idtercero"];

?>
<form name="frmseguimiento" id="frmseguimiento" method="POST" enctype="multipart/form-data" action="index.php?module=crm&section=seguimientos&action=save" >
<div align="center" class="rectangulobtnsguardar"> 
<a href="javascript:validarformulario();" class="btnsubmit" > <i class="hidephonview fa fa-save fa-lg"></i> Aceptar</a> 
<?php
if($pf_idcamp > 0)
{
	$url_cancelar = "index.php?module=crm&section=campterceros&idcamp=".$pf_idcamp;

}
else 
{
	$url_cancelar = "index.php?module=crm&section=seguimientos";
}
?>

<a href="<?php echo $url_cancelar; ?>" class="btncancel"><i class="hidephonview fa fa-window-close fa-lg"></i> Cancelar</a> 
</div>

<input type="hidden" name="haccion" value="new"/>
<input type="hidden" name="hvolvercamp" value="<?php echo $pf_idcamp; ?>"/>


<div class="row">
    <div class="col-sm-2" align="left">
        Fecha
    </div>
    <div class="col-sm-3" align="left">
        <input type="text" value="<?php echo $fechahoy; ?>" name="dpkfecha" id="dpkfecha" maxlength="10" required pattern=".{10,10}" title="dd/mm/yyyy" style="width: 100px;"/> 

        <select name="tiempohh">
<?php
$fechahora = date("H");
$hora = 00;
while ($hora < 24)
{
	
	$horaconcero = str_pad($hora, 2, "0", STR_PAD_LEFT);
	
	if($horaconcero == $fechahora){$seleccionado = ' selected=""';}else{$seleccionado = '';}
	
	echo '<option value="'.$hora.'" '.$seleccionado.'>'.$horaconcero.'</option>';
	$hora = $hora + 1;

}
 
 
 ?>
 </select>h. 
 
 
 <select name="tiempomin">
<?php
$minutos = 00;
$fechahoramin = date('H:i');
	
	$fecharedondeado = round_time($fechahoramin, 5);
	$minutorendondo = explode(":", $fecharedondeado);
	$minutorendondo = $minutorendondo[1];

while ($minutos < 60)
{
	
	$horaconcero = str_pad($minutos, 2, "0", STR_PAD_LEFT);
	
	if($horaconcero == $minutorendondo){$seleccionado = ' selected=""';}else{$seleccionado = '';}
	
	echo '<option value="'.$minutos.'" '.$seleccionado.'>'.$horaconcero.'</option>';
	$minutos = $minutos + 5;

}
 
 
 ?>
 </select>m.


    </div>

	<div class="col">
		<div class="campoencoger">
			<label><input type="radio" value="0" name="optrsseg" checked=""/> Sin respuesta </label> 
			<label><input type="radio" value="1" name="optrsseg" /> <i class="fa fa-thumbs-up fa-lg"></i> Aprobado </label> 
			<label><input type="radio" value="-1" name="optrsseg" /> <i class="fa fa-thumbs-down fa-lg"></i> Rechazado </label> 
		</div>
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
<div class="campoencoger">
<a href="javascript:mostrar();"><img src="img/buscar.jpg"/></a>
	
<select name="lsttercero" id="lsttercero" style="width: calc(100% - 30px);">
	<option value="0">-Selecciona tercero-</option>
	<?php
$cnssql= $mysqli->query("select * from ".$prefixsql."terceros where id = '".$pf_idtercero."'");	
while($col = mysqli_fetch_array($cnssql))
{
    echo '<option value="'.$col["id"].'" selected="">'.$col["razonsocial"].'</option>';
    
}


?>
</select>

</div>
    </div>
</div>
<div class="row">
    <div class="col-sm-2" align="left">
        Contacto Asignado
    </div>
    <div class="col" align="left">
<div id="div_buscacontacto" style="display:none;">
<input type="text" value="" name="txtcontacto" id="txtcontacto" maxlength="50" placeholder="Escriba el nombre a buscar" class="campoencoger"/></br> 
</div>
<div class="campoencoger">
<a href="javascript:mostrarcontactos();"><img src="img/buscar.jpg"/></a>
		
<select name="lstcontacto" id="lstcontacto" style="width: calc(100% - 30px);">
	<option value="0">-Selecciona tercero-</option>
	<?php
$cnssql= $mysqli->query("select * from ".$prefixsql."terceroscontactos where idtercero = '".$pf_idtercero."' order by nombre");	
while($col = mysqli_fetch_array($cnssql))
{
    echo '<option value="'.$col["id"].'" >'.$col["nombre"].'</option>';
    
}


?>
</select>

</div>
    </div>
</div>
<div class="row">
    <div class="col-sm-2">
        Campaña asociada
    </div>
    <div class="col">
        <select name="lstcampana" class="campoencoger">
        <option value="0">-sin campaña asociada-</option>
<?php
$cnssql= $mysqli->query("select * from ".$prefixsql."crm_camp where id = '".$pf_idcamp."'");	
while($col = mysqli_fetch_array($cnssql))
{
    echo '<option value="'.$col["id"].'" selected="">'.$col["camp"].'</option>';
    
}


?>
        </select>
    </div>
</div>

<div class="row">
	<div class="col-sm-2" align="left">
		Acciones comerciales
	</div>
	<div class="col" align="left">
		<label><input type="checkbox" name="chkacllamada" value="1" /> <i class="fa fa-fw fa-phone"></i> Llamada </label> 
		<label><input type="checkbox" name="chkacvisita" value="1"/> <i class="fa fa-fw fa-user"></i> Visita </label> 
		<label><input type="checkbox" name="chkacemail" value="1"/> <i class="fa fa-fw fa-envelope"></i> e-mail </label> 
		<label><input type="checkbox" name="chkacotros" value="1"/> <i class="fa fa-fw fa-comment-dots"></i> Otros </label> 
	</div>
</div>

<div class="row">
    <div class="col-sm-2">
        Anotación
    </div>
    <div class="col">
        <textarea style="width: 100%;" name="txtseguimiento" id="txtseguimiento" maxlength="250"></textarea>
    </div>
</div>

<div class="row">
    <div class="col maintitle" align="left">
        Fichero adjunto
    </div>
</div>




<p></p>
<div class="grupotabs">


	<a id="btn_tab_subirarchivo" class="btn_tab_sel" href="javascript:muestra_tab_subirarchivo();"  ><i class="hidephonview fa fa-file-upload fa-lg"></i> Subir archivo</a> 
	<a id="btn_tab_buscararchivo" class="btn_tab" href="javascript:muestra_tab_buscararchivo();" ><i class="hidephonview fa fa-search fa-lg"></i> Buscar archivo</a> 

	
</div>
<input type="hidden" name="hficheroone" id="hficheroone" value="uploadfile" />
<div id="tab-subirarchivo">
	<div class="row">
		<div class="col-sm-2" align="left">
			Fichero
		</div>
		<div class="col" align="left">
			<input type="file" name="fileficherito" />
		</div>
	</div>
	<div class="row">
		<div class="col-sm-2" align="left">
			Descripción
		</div>
		<div class="col" align="left">
			<input type="text" name="txtfichero" style="width: 100%"/>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-2" align="left">
			Privacidad
		</div>
		<div class="col" align="left">
			<select name="lstpublico" style="width: 100%">
				<option value="0" >Privado</option>
				<option value="1" selected="">Publico</option>
			</select>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-2" align="left">
			Categoria
		</div>
		<div class="col" align="left">
			<select name="lstcat" style="width: 100%">
				<option value="0" selected="" >Sin categoria</option>
		<?php
		$ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."ficheros_cat order by categoria");
			while($colcat = mysqli_fetch_array($ConsultaMySql))
			{
				echo '<option value="'.$colcat["id"].'" >'.$colcat["categoria"].'</option>';
			}

		?>		
			</select>
		</div>
	</div>

</div>



<div id="tab-buscararchivo" style="display: none;">
	<div class="tblbuscar">
		<div class="row">
			<div class="col-sm-3" align="left">
				<select name="lstbuscarporfichero" id="lstbuscarporfichero" style="width: 100%;">
<?php
if($flstbuscarpor == 'A'){$seleccionado = ' selected=""';}else{$seleccionado = '';}
					echo '<option value="A" '.$seleccionado.'>Buscar por nombre</option>';
if($flstbuscarpor == 'B'){$seleccionado = ' selected=""';}else{$seleccionado = '';}
					echo '<option value="B" '.$seleccionado.'>Buscar por contenido</option>';
?>
				</select>
			</div>
			<div class="col" align="left">
				<?php echo '<input type="text" value="'.$_POST["txtbuscar"].'" name="txtbuscarfichero" id="txtbuscarfichero" style="width:100%;"/> '; ?>
			</div>
            <div class="col-sm-3" align="left">
                <a href="javascript:buscarfichero();" class="btnsubmit">
                    <i class="hidephonview fa fa-check-circle fa-lg"></i>Buscar Archivo
                </a>
            </div>
		</div>	
		<div class="row">
			<div class="col-sm-3" align="left">
				Ordenar
			</div>
			<div class="col" align="left">
				<select name="lstcampoordenarfchr" id="lstcampoordenarfchr" style="width: 100%;">
					<option value="nombre">Fichero</option>
					<option value="extension">extension</option>
					<option value="descripcion">Descripcion</option>
					<option value="fsubido">Fecha</option>
				</select>
			</div>
			<div class="col" align="left">
				<select name="lstordenfchr" id="lstordenfchr" style="width: 100%;">
				<option value="asc">Ascendente</option>
				<option value="desc">Descendente</option>
				</select>
			</div>
		</div>	
	</div>





<div id="divrsficheros"></div>



</div>

</form>

