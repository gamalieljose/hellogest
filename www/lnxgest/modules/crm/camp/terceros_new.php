<link rel="stylesheet" href="scripts/jquery/jquery-ui-lnx.css">
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
	
	$.post("modules/crm/ajax/ajx_terceros_contactos.php", { nombrecontacto: nombrecontacto, idtercero: idtercero }, function(data){

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
            
            $.post("modules/crm/ajax/ajx_terceros_contactos.php", { idtercero: idtercero }, function(data){
            $("#lstcontacto").html(data);
            });
                       
        }); 
   })
});


function cargacontactos() {
	var idtercero = document.getElementById("lsttercero").value;
	
$.post("modules/crm/ajax/ajx_terceros_contactos.php", { idtercero: idtercero }, function(data){
            $("#lstcontacto").html(data);
            });
	
}

</script>
<script type="text/javascript">
function muestra_nuevotercero() 
{
    document.getElementById("div_nuevotercero").style.display = "inline";
}

function oculta_nuevotercero() 
{
    document.getElementById("div_nuevotercero").style.display = "none";
}
</script>
<script language="javascript">

  $().ready(function() {

$.datepicker.regional['es'] = 
  {
	closeText: 'Cerrar', 
	prevText: 'Previo', 
	nextText: 'PrÃ³ximo',
  
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
  
	$("#dpkfecha").datepicker({	
		dateFormat: 'dd/mm/yy',  
		firstDay: 1, 
		onSelect: function(dateText, inst) { 
		$("#dpkfechainicio_value").val(dateText);
		}
	});


});
  </script>
<script language="javascript">
$(document).ready(function(){
   $("#cbpais").change(function () {
           $("#cbpais option:selected").each(function () {
            elegido=$(this).val();
            $.post("modules/terceros/ajax/ajx_pais-prov.php", { elegido: elegido }, function(data){
            $("#cbprovincias").html(data);
            });            
        });
   })
});
</script>
<script type="text/javascript">
function calculacp() {

var wpobla = document.getElementById("txtpobla").value;
	if (wpobla == '') 
	{

	   var wcp = document.getElementById("txtcp").value;
	   var wpais = document.getElementById("cbpais").value;

	   $.ajax({

			 type   : 'POST',
			 url     : "modules/terceros/ajax/ajx_cp.php",
			 data    : {cp : wcp, idpais : wpais},
							 
			 success : function (resultado) {

			 // response = respuesta del servidor.
			response = JSON.parse(resultado);
			 
			var xpobla = response["poblacion"];
			var xidprov = response["idprov"];
						
			 
			 document.getElementById("txtpobla").value = xpobla;
			 if(xidprov > 0)
			 {
			 document.getElementById("cbprovincias").value = xidprov;
			 }
					

			 }

		});
	} 
}
</script>
<script type="text/javascript">
function validarformulario() 
{
    var radios = document.getElementsByName('opttercero');
    var radiovalor = "";
    for (var i = 0, length = radios.length; i < length; i++) {
        if (radios[i].checked) {
            // do whatever you want with the checked radio
            radiovalor = radios[i].value;

            // only one radio can be logically checked, don't check the rest
            break;
        }
    }
    var cuentaerror = 0;
    if (radiovalor == "existente")
    {        
        if(document.getElementById("lsttercero").value == '0' || document.getElementById("lsttercero").value == ''){cuentaerror = cuentaerror +1;}
    }
    
    if (radiovalor == "nuevo")
    {
        if(document.getElementById("txtrazonsocial").value == ''){cuentaerror = cuentaerror +1;}
        
    }
    
    if(cuentaerror > 0)
    {
        alert("Complete los campos necesarios para validar la inserción de datos");
                
    }
    else
    {
        
        document.getElementById('formcrm').submit();
        
    }    
    
}
</script>
<?php


//obtener pais y provincia por defecto del usuario
$buscapais = $mysqli->query("SELECT * FROM ".$prefixsql."userstiendas WHERE iduser = '".$_COOKIE["lnxuserid"]."' and dft = '1'");
$row = mysqli_fetch_assoc($buscapais);
$dbidtiendauser = $row["idtienda"];

$buscapais = $mysqli->query("SELECT * FROM ".$prefixsql."tiendas WHERE id = '".$dbidtiendauser."' ");
$row = mysqli_fetch_assoc($buscapais);
$dbidpais = $row["idpais"];
$dbidprov = $row["idprov"];

if($dbidpais == '' || $dbidpais == '0')
{
  //sino se encuentra, obtendremos el pais del usuario
  $buscapais = $mysqli->query("SELECT * FROM ".$prefixsql."users WHERE id = '".$_COOKIE["lnxuserid"]."' ");
  $row = mysqli_fetch_assoc($buscapais);
  $dbidpais = $row["idpais"];
  $dbidprov = $row["idprov"];
}

$idcamp = $_GET["idcamp"];
?>
<form name="formcrm" id="formcrm" method="POST" action="index.php?module=crm&section=campterceros&action=save">
    <input type="hidden" name="haccion" value="new" />
    <input type="hidden" name="hidcamp" value="<?php echo $idcamp; ?>" />

<div class="row">
    <div class="col-sm-2" align="left">
        <label><input onclick="oculta_nuevotercero();" type="radio" name="opttercero" value="existente" checked=""> Tercero existente</label>
    </div>
    <div class="col" align="left">
<div id="div_buscatercero" style="display:none;">
<input type="text" value="" name="txttercero" id="txttercero" maxlength="50" placeholder="Escriba el nombre a buscar" class="campoencoger"/></br> 
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
	
	$cnsterceros = $mysqli->query("SELECT * from ".$prefixsql."terceroscontactos where idtercero = '".$flsttercero."' order by nombre");
        if($flstcontacto == '0'){$seleccionado = ' selected=""';}else{$seleccionado = '';}
			echo '<option value="0" '.$seleccionado.'>- sin asignar -</option>'; 
		while($colter = mysqli_fetch_array($cnsterceros))
		{      
                    if($flstcontacto == $colter["id"]){$seleccionado = ' selected=""';}else{$seleccionado = '';}
			echo '<option value="'.$colter["id"].'" '.$seleccionado.'>'.$colter["nombre"].'</option>'; 
		}
		echo '</select>';
?>

    </div>
</div>

<div class="row">
    <div class="col-sm-2" align="left">
        
    </div>
    <div class="col" align="left">
        <label><input onclick="muestra_nuevotercero();" type="radio" name="opttercero" value="nuevo" > Crear nuevo Tercero</label>
    </div>
</div>
<?php
$fechahoy = date('d/m/Y');

?>
<div class="row">
  <div class="col-sm-2" align="left">
    Fecha de Visita
  </div>
  <div class="col" align="left">
    <?php echo '<input type="text" maxlength="10" value="'.$fechahoy.'" name="txtfecha" id="dpkfecha" required="" style="width: 100%;" >'; ?>
  </div>
  <div class="col-sm-2" align="left">
	Resultado
  </div>
  <div class="col" align="left">
	<select name="lstestado" style="width: 100%;" >
	<option value="0">Sin respuesta</option>
	<option value="1">Aprobado</option>
	<option value="2">Descartado</option>
	</select>
  </div>
</div>

<div id="div_nuevotercero" style="display: none;">
    <div class="row">
        <div class="col maintitle" align="left">
            Datos del nuevo tercero
        </div>
    </div>
    
    <div class="row">
        <div class="col-sm-2" align="left">
            Razon Social
        </div>
        <div class="col" align="left">
            <input type="text" name="txtrazonsocial" id="txtrazonsocial" maxlength="50" style="width: 100%;" />
        </div>
    </div>
    <div class="row">
        <div class="col-sm-2" align="left">
            Nombre comercial
        </div>
        <div class="col" align="left">
            <input type="text" maxlength="50" name="txtnomcomercial" style="width: 100%;" />
        </div>
    </div>
<div class="row">
  <div class="col-sm-2" align="left">
    Telefono
  </div>
  <div class="col" align="left">
    <input name="txttel" maxlength="20" required="" type="text" style="width: 100%;">
  </div>
</div>

<div class="row">
  <div class="col-sm-2" align="left">
    e-mail
  </div>
  <div class="col" align="left">
    <input name="txtemail" maxlength="100" type="text" style="width: 100%;">
  </div>
</div>

<div class="row">
  <div class="col-sm-2" align="left">
    Pais
  </div>
  <div class="col" align="left">
    <select name="cbpais" id="cbpais" style="width: 100%;">
	<?php
	$cnsaux = $mysqli->query("SELECT * from ".$prefixsql."paises order by pais");
	while($col = mysqli_fetch_array($cnsaux))
	{
		if($dbidpais == $col["id"]){$seleccionado = ' selected=""';}else{$seleccionado = '';}
		echo '<option value="'.$col["id"].'" '.$seleccionado.'>'.$col["pais"].'</option>';
	}
	?>
	</select>
  </div>
</div>

<div class="row">
  <div class="col-sm-2" align="left">
    Provincia
  </div>
  <div class="col" align="left">
    <select name="cbprovincias" id="cbprovincias" style="width: 100%;">
	<?php
	$cnsaux = $mysqli->query("SELECT * from ".$prefixsql."provincias where idpais = '".$dbidpais."' order by provincia");
	while($col = mysqli_fetch_array($cnsaux))
	{
		echo '<option value="'.$col["id"].'">'.$col["provincia"].'</option>';
	}
	?>
	</select>
  </div>
</div>


<div class="row">
  <div class="col-sm-2" align="left">
    Direccion
  </div>
  <div class="col" align="left">
    <input name="txtdir" maxlength="50" type="text" style="width: 100%;">
  </div>
</div>

<div class="row">
  <div class="col-sm-2" align="left">
    CP
  </div>
  <div class="col-sm-2" align="left">
    <input name="txtcp" id="txtcp" maxlength="10" type="text" style="width: 100%;" onblur="calculacp()" />
  </div>
  <div class="col-sm-2" align="left">
    Poblacion
  </div>
  <div class="col" align="left">
    <input name="txtpobla" id="txtpobla" maxlength="50" type="text" style="width: 100%;">
  </div>
  
</div>
    
     <div class="row">
        <div class="col maintitle" align="left">
            Persona de Contacto
        </div>
    </div>
    <div class="row">
  <div class="col-sm-2" align="left">
    Nombre
  </div>
  <div class="col" align="left">
    <input type="text" value="" name="txtnombre" id="txtnombre" required="" class="campoencoger">
  </div>
</div>
<div class="row">
  <div class="col-sm-2" align="left">
    Cargo
  </div>
  <div class="col" align="left">
    <input type="text" value="" name="txtcargo" style="width: 100%;">
  </div>
</div>
<div class="row">
  <div class="col-sm-2" align="left">
    Telefono
  </div>
  <div class="col" align="left">
    <input type="text" value="" name="txttelcontacto" style="width: 100%;">
  </div>
</div>
<div class="row">
  <div class="col-sm-2" align="left">
    e-mail
  </div>
  <div class="col" align="left">
    <input type="text" value="" name="txtemailcontacto" style="width: 100%;">
  </div>
</div>

<div class="row">
  <div class="col-sm-2" align="left">
    Idioma
  </div>
  <div class="col" align="left">
	<select name="lstidioma" style="width: 100%;">
		<option value="0" selected="">-sin especificar-</option>
		<?php
		$sqldic = $mysqli->query("SELECT * from ".$prefixsql."dic_idiomas order by idioma");
		while($col = mysqli_fetch_array($sqldic))
		{
			echo '<option value="'.$col["id"].'">'.$col["idioma"].'</option>';
		}
		?>
		</select>
  </div>
</div>
    
    
    <div class="row">
        <div class="col maintitle" align="left">
            &nbsp;
        </div>
    </div>
</div>

<div class="row">
  <div class="col-sm-2" align="left">
    Notas
  </div>
    <div class="col" align="left">
        <textarea name="txtnotas" style="width: 100%;"></textarea>
    </div>
</div>

<div align="center" class="rectangulobtnsguardar">

    <input type="button" class="btnsubmit" name="btnnuevousuario" value="Guardar" onclick="validarformulario()"/>

<?php echo ' <a href="index.php?module=crm&section=campterceros&id='.$idcamp.'" class="btncancel">Cancelar</a>'; ?>

</div>
    
</form>
