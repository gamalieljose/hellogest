<?php
$idregistro = $_GET["id"];

$sqlaux = $mysqli->query("select * from ".$prefixsql."crm_seg where id = '".$idregistro."' "); 
$rowaux = mysqli_fetch_assoc($sqlaux);
$dbidtercero = $rowaux["idtercero"];
$dbidcontacto = $rowaux["idcontacto"];
$dbidcamp = $rowaux["idcamp"];
$dbidsacciones = $rowaux["idsacciones"];
$dbseguimiento = $rowaux["seguimiento"];
$dbfecha = $rowaux["fecha"];
    $temp = explode(" ", $dbfecha);
        $tempfecha = $temp[0];
        $temptiempo = $temp[1];
            $temp = explode("-", $tempfecha);
            $lbl_fecha = $temp[2]."/".$temp[1]."/".$temp[0];

            $temp = explode(":", $temptiempo);
            $dbhora = $temp[0];
            $dbmin = $temp[1];

$dbllamada = $rowaux["llamada"];
$dbvisita = $rowaux["visita"];
$dbemail = $rowaux["email"];
$dbotros = $rowaux["otros"];
$dbrsseg = $rowaux["rsseg"];

?>
<link rel="stylesheet" href="scripts/jquery/jquery-ui-lnx.css">
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

$pf_idcamp = $_GET["idcamp"];
if($pf_idcamp > 0)
{
	$url_cancelar = "index.php?module=crm&section=campseg&idcamp=".$pf_idcamp;
}
else 
{
	$url_cancelar = "index.php?module=crm&section=seguimientos";
}

if($dbidcamp > 0)
{
	$btn_vercamp = ' <a href="index.php?module=crm&section=campseg&idcamp='.$dbidcamp.'" class="btnedit">Ver seguimiento de campaña</a> ';
}
else 
{
	$btn_vercamp = '';	
}

?>
<p><a href="index.php?module=crm&section=seguimientos&action=view&idtercero=<?php echo $dbidtercero; ?>" class="btnedit">Ver seguimiento de tercero</a> 
<?php echo $btn_vercamp; ?> 
<a href="index.php?module=crm&section=seguimientos&action=del&id=<?php echo $idregistro; ?>" class="btnenlacecancel">Eliminar seguimiento</a> 

</p>

<form name="frmseguimiento" id="frmseguimiento" method="POST" enctype="multipart/form-data" action="index.php?module=crm&section=seguimientos&action=save" >
<div align="center" class="rectangulobtnsguardar"> 
<a href="javascript:validarformulario();" class="btnsubmit" > <i class="hidephonview fa fa-save fa-lg"></i> Aceptar</a> 
<a href="<?php echo $url_cancelar; ?>" class="btncancel"><i class="hidephonview fa fa-window-close fa-lg"></i> Cancelar</a> 
</div>

<input type="hidden" name="haccion" value="update"/>
<input type="hidden" name="hidregistro" value="<?php echo $idregistro; ?>"/>
<input type="hidden" name="hvolvercamp" value="<?php echo $pf_idcamp; ?>"/>

<div class="row">
    <div class="col-sm-2" align="left">
        Fecha
    </div>
    <div class="col-sm-3" align="left">
        <input type="text" value="<?php echo $lbl_fecha; ?>" name="dpkfecha" id="dpkfecha" maxlength="10" required pattern=".{10,10}" title="dd/mm/yyyy" style="width: 100px;"/> 

        <select name="tiempohh">
<?php
$fechahora = date("H");
$hora = 00;
while ($hora < 24)
{
	
	$horaconcero = str_pad($hora, 2, "0", STR_PAD_LEFT);
	
	if($horaconcero == $dbhora){$seleccionado = ' selected=""';}else{$seleccionado = '';}
	
	echo '<option value="'.$hora.'" '.$seleccionado.'>'.$horaconcero.'</option>';
	$hora = $hora + 1;

}
 
 
 ?>
 </select>h. 
 
 
 <select name="tiempomin">
<?php
$minutos = 00;

while ($minutos < 60)
{
	
	$horaconcero = str_pad($minutos, 2, "0", STR_PAD_LEFT);
	
	if($horaconcero == $dbmin){$seleccionado = ' selected=""';}else{$seleccionado = '';}
	
	echo '<option value="'.$minutos.'" '.$seleccionado.'>'.$horaconcero.'</option>';
	$minutos = $minutos + 5;

}
 
 
 ?>
 </select>m.


    </div>

	<div class="col">
		<div class="campoencoger">
<?php
if($dbrsseg == "0"){$seleccionado = ' checked=""';}else{$seleccionado = '';}
	echo '<label><input type="radio" value="0" name="optrsseg" '.$seleccionado.'/> Sin respuesta </label> ';
if($dbrsseg == "1"){$seleccionado = ' checked=""';}else{$seleccionado = '';}
	echo '<label><input type="radio" value="1" name="optrsseg" '.$seleccionado.'/> <i class="fa fa-thumbs-up fa-lg"></i> Aprobado </label> ';
if($dbrsseg == "-1"){$seleccionado = ' checked=""';}else{$seleccionado = '';}
	echo '<label><input type="radio" value="-1" name="optrsseg" '.$seleccionado.'/> <i class="fa fa-thumbs-down fa-lg"></i> Rechazado </label> ';
?>
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
<?php
$sqlaux = $mysqli->query("select id, razonsocial from ".$prefixsql."terceros where id = '".$dbidtercero."' "); 
$rowaux = mysqli_fetch_assoc($sqlaux);
$lbl_tercero = $rowaux["razonsocial"];

echo '<option value="'.$dbidtercero.'" selected="">'.$lbl_tercero.'</option>';
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
<?php
if($dbidcontacto == '0'){$seleccionado = ' selected=""';}else{$seleccionado = '';}    
echo '<option value="0" '.$seleccionado.'>-sin asignar-</option>';

$cnssql= $mysqli->query("select * from ".$prefixsql."terceroscontactos where idtercero = '".$dbidtercero."' order by nombre");	
while($col = mysqli_fetch_array($cnssql))
{
    if($dbidcontacto == $col["id"]){$seleccionado = ' selected=""';}else{$seleccionado = '';}    
    echo '<option value="'.$col["id"].'" '.$seleccionado.'>'.$col["nombre"].'</option>';
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
<?php
if($dbidcamp == '0'){$seleccionado = ' selected=""';}else{$seleccionado = '';}
        echo '<option value="0" '.$seleccionado.'>-sin campaña asociada-</option>';

$cnssql= $mysqli->query("select * from ".$prefixsql."crm_camp order by camp");	
while($col = mysqli_fetch_array($cnssql))
{
    if($dbidcamp == $col["id"]){$seleccionado = ' selected=""';}else{$seleccionado = '';}
    echo '<option value="'.$col["id"].'" '.$seleccionado.'>'.$col["camp"].'</option>';
    
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
    <?php
	if($dbllamada == '1'){$seleccionado = ' checked=""';}else{$seleccionado = '';} 
		echo '<label><input type="checkbox" name="chkacllamada" value="1" '.$seleccionado.'/> <i class="fa fa-fw fa-phone"></i> Llamada </label> ';
	if($dbvisita == '1'){$seleccionado = ' checked=""';}else{$seleccionado = '';}
		echo '<label><input type="checkbox" name="chkacvisita" value="1" '.$seleccionado.'/> <i class="fa fa-fw fa-user"></i> Visita </label> ';
	if($dbemail == '1'){$seleccionado = ' checked=""';}else{$seleccionado = '';} 
		echo '<label><input type="checkbox" name="chkacemail" value="1" '.$seleccionado.'/> <i class="fa fa-fw fa-envelope"></i> e-mail </label> ';
	if($dbotros == '1'){$seleccionado = ' checked=""';}else{$seleccionado = '';}
		echo '<label><input type="checkbox" name="chkacotros" value="1" '.$seleccionado.'/> <i class="fa fa-fw fa-comment-dots"></i> Otros </label> ';
?>
	</div>
</div>

<div class="row">
    <div class="col-sm-2">
        Anotación
    </div>
    <div class="col">
        <textarea style="width: 100%;" name="txtseguimiento" id="txtseguimiento" maxlength="250"><?php echo $dbseguimiento; ?></textarea>
    </div>
</div>

<?php


$sqlaux = $mysqli->query("select * from ".$prefixsql."ficheros_loc where module = 'crm_seg' and idlinea0 = '".$idregistro."' "); 
$rowaux = mysqli_fetch_assoc($sqlaux);
$dbfchr_idfichero = $rowaux["idfichero"];

if($dbfchr_idfichero > 0)
{


echo '<div class="row">
    <div class="col-sm-2" align="left">
        Fichero adjunto:
    </div>
    <div class="col" align="left">
    <a href="modules/ficheros/download.php?id='.$dbfchr_idfichero.'" class="btnedit">Descargar archivo</a></br>
    <input type="checkbox" name="fchrborra" value="borrafichero" /> Eliminar archivo adjunto
    </div>
</div>';
}
?>




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