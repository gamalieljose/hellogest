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
  monthStatus: 'Ver otro mes', yearStatus: 'Ver otro año',
  dayNames: ['Domingo','Lunes','Martes','Miércoles','Jueves','Viernes','Sábado'],
  dayNamesShort: ['Dom','Lun','Mar','Mie','Jue','Vie','Sab'],
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
  
<script type="text/javascript">
function tab_inex() 
{
	var chk_tipo = document.getElementById('chktipo').checked ;
		
	if(chk_tipo == '1')
	{
		document.getElementById('div_interno').style.display = 'inline';
		document.getElementById('div_externo').style.display = 'none';
	}
	else
	{
		document.getElementById('div_interno').style.display = 'none';
		document.getElementById('div_externo').style.display = 'inline';
	}
}
</script>




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

<script src="modules/ficheros/ajax/one_fichero.js"></script>


<?php
$fechahoy = date("d/m/Y");
?>
<form name="form1" method="POST" action="index.php?module=hr&section=nominas&action=save" autocomplete="off" enctype="multipart/form-data" >
<input type="hidden" name="haccion" value="new" />
<div class="row">
<div class="col-sm-2">
	Tipo registro
</div>
<div class="col">
	<label><input type="radio" checked="" onclick="tab_inex()" name="chktipo" id="chktipo" value="1"> Interno</label> </br>
	<label><input type="radio" onclick="tab_inex()" name="chktipo" id="chktipo" value="2"> Externo</label>
</div>
</div>
<div class="row">
<div class="col-sm-2">
	Fecha
</div>
<div class="col">
	<input type="text" id="txtfecha" name="txtfecha" value="<?php echo $fechahoy; ?>" />
</div>
</div>
<div id="div_interno">
<div class="row">
<div class="col maintitle">
Interno
</div>
</div>

<div class="row">
<div class="col-sm-2">
	Empresa
</div>
<div class="col">
	<select name="lstempresa" style="width: 100%;" >
<?php
$cnssql= $mysqli->query("select * from ".$prefixsql."empresas order by razonsocial");	
while($col = mysqli_fetch_array($cnssql))
{
    echo '<option value="'.$col["id"].'">'.$col["razonsocial"].'</option>';
}
?>
	</select>
</div>
</div>
<div class="row">
<div class="col-sm-2">
	Trabajador
</div>
<div class="col">
	<select name="lstusuario" style="width: 100%;" >
<?php
$cnssql= $mysqli->query("select * from ".$prefixsql."users where activo = '1' order by display");	
while($col = mysqli_fetch_array($cnssql))
{
    echo '<option value="'.$col["id"].'">'.$col["display"].'</option>';
}
?>
	</select>
</div>
</div>

</div>








<div id="div_externo" style="display: none;">

<div class="row">
<div class="col maintitle">
Externo
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

if($flsttercero == 0 || $flsttercero == "") 
{
 $flsttercero = $_COOKIE["lnxit_idtercero"];
}

//seleciona cliente
	
	echo '<select name="lsttercero" id="lsttercero" style="width: calc(100% - 30px);">';
	
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
        Contacto Asignado
    </div>
    <div class="col" align="left">
<div id="div_buscacontacto" style="display:none;">
<input type="text" value="" name="txtcontacto" id="txtcontacto" maxlength="50" placeholder="Escriba el nombre a buscar" style="width: 100%;"/></br> 
</div>
<a href="javascript:mostrarcontactos();"><img src="img/buscar.jpg"/></a>
<?php
	//seleciona cliente
$cnsterceros = $mysqli->query("SELECT * from ".$prefixsql."terceroscontactos where idtercero = '".$flsttercero."'");	
	echo '<select name="lstcontacto" id="lstcontacto" style="width: calc(100% - 30px);">';
if($flsttercero > 0)
{
   while($colter = mysqli_fetch_array($cnsterceros))
   {
	echo '<option value="'.$colter["id"].'" >'.$colter["nombre"].'</option>';
   }

   echo '<option value="0">-Sin seleccionar-</option>';
}
else
{
	echo '<option value="0">Seleccione un tercero</option>';
}
	echo '</select>';
?>

    </div>
</div>

<div class="row">
<div class="col-sm-2">
        Asignar usuario local
</div>

<div class="col">
        <select name="lstasignado" style="width: 100%;" >
<?php
$cnssql= $mysqli->query("select * from ".$prefixsql."users where activo = '1' order by display");
echo '<option value="0">Sin asignar</option>';
while($col = mysqli_fetch_array($cnssql))
{
    echo '<option value="'.$col["id"].'">'.$col["display"].'</option>';
}
?>
        </select>
</div>
</div>





</div>


<div class="row">
<div class="col-sm-2">
	Descripción
</div>
<div class="col">
	<input type="text" name="txtdescripcion" required="" maxlength="50" style="width: 100%;"/>
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
			<input type="file" name="fch_fileficherito" />
		</div>
	</div>
	<div class="row">
		<div class="col-sm-2" align="left">
			Descripción
		</div>
		<div class="col" align="left">
			<input type="text" name="fch_txtfichero" value="" style="width: 100%"/>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-2" align="left">
			Privacidad
		</div>
		<div class="col" align="left">
			<select name="fch_lstpublico" style="width: 100%">
				<option value="0" selected="" >Privado</option>
				<option value="1" >Publico</option>
			</select>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-2" align="left">
			Categoria
		</div>
		<div class="col" align="left">
			<select name="fch_lstcat" style="width: 100%">
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
                <a href="javascript:buscarfichero();" class="btnsubmit"><i class="hidephonview fa fa-search fa-lg"></i> Buscar Archivo</a>
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


<div align="center" class="rectangulobtnsguardar" >

	<button type="submit" class="btnsubmit" >
		<i class="hidephonview fa fa-check-circle fa-lg"></i> Guardar
	</button>

	<a class="btncancel" href="index.php?module=hr&section=nominas"><i class="hidephonview fa fa-times-circle fa-lg" ></i> Cancelar</a>
	 

</div>

</form>
