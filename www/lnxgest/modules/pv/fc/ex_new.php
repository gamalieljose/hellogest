<script src="scripts/jquery/jquery-2.1.1.js"></script>
<script src="scripts/jquery/jquery-ui.js"></script> 
<script language="javascript">
$(document).ready(function(){
$("#lstempresas").change(function () {
           $("#lstempresas option:selected").each(function () {
            elegido=$(this).val();
<?php echo "$.post(\"modules/".$lnxinvoice."/ajax/".$lnxinvoice."_ajx_empresa-serie_doc.php\", { elegido: elegido}, function(data){"; ?>
            $("#lstseries").html(data);
			
	setTimeout (" ", 1000);
	
			var widserie = document.getElementById("lstseries").value;
	
	
	$.ajax({

			 type   : 'POST',
<?php echo " url     : \"modules/".$lnxinvoice."/ajax/".$lnxinvoice."_ajx_empresa-serie_taxes.php\","; ?>
			 data    : {idserie : widserie},
							 
			 success : function (resultado) {

			 // response = respuesta del servidor.
			response = JSON.parse(resultado);
			 
			var imprimeimpuesto	= "";		
			
			document.getElementById('muestra_taxes').innerHTML = "";
			 for (nlinea in response) {
				
				imprimeimpuesto = imprimeimpuesto + response[nlinea];


				}
			
			
				document.getElementById('muestra_taxes').innerHTML = imprimeimpuesto;	

			 }

		});
			
			
			
			
            });            
        });
   })
});
</script>

<script languague="javascript">
        function mostrar() {
            div = document.getElementById("div_buscatercero");
            div.style.display = "";
			document.getElementById("txttercero").focus();
        }

</script>
<script src="core/com/js_terceros_pro.js"></script>

<script language="javascript">
$(document).ready(function(){
   $("#lstseries").change(function () {
           

	
	var widserie = document.getElementById("lstseries").value;
	
	
	$.ajax({

			 type   : 'POST',
<?php echo " url     : \"modules/".$lnxinvoice."/ajax/".$lnxinvoice."_ajx_empresa-serie_taxes.php\","; ?>
			 data    : {idserie : widserie},
							 
			 success : function (resultado) {

			 // response = respuesta del servidor.
			response = JSON.parse(resultado);
			 
			var imprimeimpuesto	= "";		
			
			document.getElementById('muestra_taxes').innerHTML = "";
			 for (nlinea in response) {
				
				imprimeimpuesto = imprimeimpuesto + response[nlinea];


				}
			
			
				document.getElementById('muestra_taxes').innerHTML = imprimeimpuesto;	

			 }

		});
	

	});	

});
</script>

<script type="text/javascript">
function calculartotal() {

  var elementos = document.getElementsByName("txtimpuesto[]");
  var valorbase = document.getElementById("txtprecio").value;
				  

  var total = 0;
	var valorimpuesto = 0;
  var errors = 0; 
  for(i=0; i<elementos.length; i++){
    if(elementos[i].name == "txtimpuesto[]")
	{
		valorimpuesto = (elementos[i].value / 100) * valorbase;
		total = total + valorimpuesto;
	}
	
    
  }

	var resultado;
  resultado = parseFloat(valorbase) + parseFloat(total);
  resultado = parseFloat(resultado).toFixed(2);

	document.getElementById("txtpreciototal").value = resultado;
 
}


function calcularbi() {
	
var elementos = document.getElementsByName("txtimpuesto[]");
var valortotal = document.getElementById("txtpreciototal").value;
				  

  var total = 0;
	var valorimpuesto = 0;
  var errors = 0; 
  for(i=0; i<elementos.length; i++){
    if(elementos[i].name == "txtimpuesto[]")
	{
		valorimpuesto = (elementos[i].value / 100);
		total = total + valorimpuesto;
	}
	
    
  }

	var resultado;
  
  resultado = parseFloat(valortotal) / ( 1 + parseFloat(total) ) ;
  resultado = parseFloat(resultado).toFixed(2);
	document.getElementById("txtprecio").value = resultado;
 
}
</script>

<link rel="stylesheet" href="scripts/jquery/jquery-ui-lnx.css">
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
	
	$("#txtfechavencimiento").datepicker({	
		dateFormat: 'dd/mm/yy',  
		firstDay: 1, 
		onSelect: function(dateText, inst) { 
		$("#txtfechavencimiento_value").val(dateText);
		}
	});


    $("#lsttercero").change(function(){
        calcdatosproveedor();	);
	});

});
</script>
<script type="text/javascript">
function calcdatosproveedor() {
    var fidtercero = document.getElementById("lsttercero").value;
    var ffechafactura = document.getElementById("txtfecha").value;
    //alert(fidtercero);
    if(fidtercero > 0)
    {
        $.ajax({

            type   : 'POST',
    <?php echo 'url     : "modules/'.$lnxinvoice.'/fc/ajax/ajx_calcproveedor.php", '; ?>
            data    : {idtercero : fidtercero, fechafactura : ffechafactura},

            success : function (resultado) {

            // response = respuesta del servidor.
        response = JSON.parse(resultado);

                document.getElementById('lst_dp').value = response["prodp"];
                document.getElementById('lst_cp').value = response["profp"];
                document.getElementById('txtfechavencimiento').value = response["fvencimiento"];
                
            
            }

        });
    }
    else
    {
        document.getElementById('lst_cp').value = 0;
        document.getElementById('lst_dp').value = 0;
        document.getElementById('txtfechavencimiento').value = ffechafactura;
    }

}




function validarformulario() {
	var idtercero = document.getElementById("lsttercero").value;
	var errores = 0;

    var flstseries = document.getElementById("lstseries").value;
    var ftxtdocumentocompra = document.getElementById("txtdocumentocompra").value;
    var ftxtdescripcion = document.getElementById("txtdescripcion").value;  

	if (idtercero == 0)	{errores = errores +1;}
    if (!flstseries > 0)	{errores = errores +1;}
    if (ftxtdocumentocompra.trim() == "")	{errores = errores +1;}
    if (ftxtdescripcion.trim() == "")	{errores = errores +1;}
    
    

    if (errores == "0")
    {
        document.getElementById("form_fc_express").submit(); 
    }
    else
    {
        alert('Seleccione proveedor y complete los campos como fecha factura, vencimiento, num factura y descripción');
    }

}
</script>
<?php
if ($lnxinvoice == "ov"){$tipolnxinvoice = "O"; $cvlnxinvoice = "2"; $lnxtipotercero = "codcli";}
if ($lnxinvoice == "pv"){$tipolnxinvoice = "P"; $cvlnxinvoice = "2"; $lnxtipotercero = "codcli";}
if ($lnxinvoice == "av"){$tipolnxinvoice = "A"; $cvlnxinvoice = "2"; $lnxtipotercero = "codcli";}
if ($lnxinvoice == "fv"){$tipolnxinvoice = "F"; $cvlnxinvoice = "2"; $lnxtipotercero = "codcli";}
if ($lnxinvoice == "fvr"){$tipolnxinvoice = "FR"; $cvlnxinvoice = "2"; $lnxtipotercero = "codcli";}

if ($lnxinvoice == "oc"){$tipolnxinvoice = "O"; $cvlnxinvoice = "1"; $lnxtipotercero = "codpro";}
if ($lnxinvoice == "pc"){$tipolnxinvoice = "P"; $cvlnxinvoice = "1"; $lnxtipotercero = "codpro";}
if ($lnxinvoice == "ac"){$tipolnxinvoice = "A"; $cvlnxinvoice = "1"; $lnxtipotercero = "codpro";}
if ($lnxinvoice == "fc"){$tipolnxinvoice = "F"; $cvlnxinvoice = "1"; $lnxtipotercero = "codpro";}
if ($lnxinvoice == "fcr"){$tipolnxinvoice = "FR"; $cvlnxinvoice = "1"; $lnxtipotercero = "codpro";}

//Obtenemos la empresa por defecto del usuario según la tienda asignada por defecto
                
$cnsprincipal= $mysqli->query("SELECT * from ".$prefixsql."userstiendas where iduser = '".$_COOKIE["lnxuserid"]."' and dft = '1' ");
$rowprincipal = mysqli_fetch_assoc($cnsprincipal);
$dbidtienda = $rowprincipal["idtienda"];     

$cnsprincipal= $mysqli->query("SELECT * from ".$prefixsql."tiendas where id = '".$dbidtienda."' ");
$rowprincipal = mysqli_fetch_assoc($cnsprincipal);
$dbidempresa = $rowprincipal["idempresa"];


echo '<form name="form_fc_express" id="form_fc_express" action="index.php?module='.$lnxinvoice.'&section=express&action=save" enctype="multipart/form-data" method="POST">'; ?>
<input type="hidden" name="haccion" value="newexpress" />

<div class="row">
    <div class="col maintitle" align="left">
    Nuevo documento express
    </div>
</div>

<div class="row">
    <div class="col-sm-2" align="left">
        Empresa
    </div>
    <div class="col" align="left">
        <select id="lstempresas" name="lstempresas" class="campoencoger">
    <?php
    $ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."empresas order by razonsocial");
    while($columna = mysqli_fetch_array($ConsultaMySql))
    {
		if($columna["id"] == $dbidempresa){$seleccionado = ' selected=""';}else{$seleccionado = '';}
        echo '<option value="'.$columna["id"].'" '.$seleccionado.'>'.$columna["razonsocial"].'</option>';
    }
    ?>
        </select>
    </div>
</div>

<div class="row">
    <div class="col-sm-2" align="left">
        Serie
    </div>
    <div class="col" align="left">
        <select id="lstseries" name="lstseries" class="campoencoger">
    <?php
    $cnsseries = $mysqli->query("SELECT * from ".$prefixsql."series where idempresa = '".$dbidempresa."' and tipo = '".$tipolnxinvoice."' and cv = '".$cvlnxinvoice."' order by serie ");
    while($columna = mysqli_fetch_array($cnsseries))
    {
		if($columna["dft"] == '1'){$seleccionado = ' selected=""'; $seriedft = $columna["id"]; }else{$seleccionado = '';}
        echo '<option value="'.$columna["id"].'" '.$seleccionado.'>'.$columna["serie"].'</option>';
    }
    ?>
        </select>
    </div>
</div>
<div class="row">
    <div class="col-sm-2" align="left">
        Tercero
    </div>
    <div class="col" align="left">
<div id="div_buscatercero" style="display:none;">
<input type="text" value="" name="txttercero" id="txttercero" onchange="calcdatosproveedor()" class="tblbuscar" maxlength="50" placeholder="Escriba el nombre a buscar" style="width: 100%;"/></br> 
</div>
<a href="javascript:mostrar();"><img src="img/buscar.jpg"/></a>
	
<select name="lsttercero" id="lsttercero" onchange="calcdatosproveedor()" style="width: calc(100% - 30px);" >
<option value="0">-Sin especificar-</option>
</select>


    </div>
</div>
     
<div class="row">
    <div class="col-sm-2" align="left">
        Usuario
    </div>
    <div class="col" align="left">
    <select name="lstusuario" style="width: 100%;">
<?php

$ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."users where activo = '1' order by display");
while($columna = mysqli_fetch_array($ConsultaMySql))
{
        if($columna["id"] == $_COOKIE["lnxuserid"]){$pordefecto = ' SELECTED';	}else{$pordefecto = '';}
        echo '<option value="'.$columna["id"].'" '.$pordefecto.'>'.$columna["display"].'</option>'; 
}
               
?>
    </select>
    </div>
</div>

<div class="row">
    <div class="col maintitle">
Impuestos por defecto para este documento
    </div>
</div>
<div class="row">
    <div class="col-sm-2" align="left">
        Impuestos
    </div>
    <div class="col" align="left">
		<div id="muestra_taxes">
<?php
$ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."impuestosrules where idserie = '".$seriedft."' order by orden");

$idtemp = '0';
while($columna = mysqli_fetch_array($ConsultaMySql))
{
	$cnsaux= $mysqli->query("SELECT * from ".$prefixsql."impuestos where id = '".$columna["idimpuesto"]."'");
	$rowaux = mysqli_fetch_assoc($cnsaux);
	$dbimpuesto = $rowaux["impuesto"];
	$idtemp = $idtemp +1;
	echo $dbimpuesto.' ';
	
	if($columna["editable"] == '1')	
	{echo '<input type="number" value="'.$columna["valor"].'" name="txtimpuesto[]" />';} 
	else 
	{echo '<input type="hidden" value="'.$columna["valor"].'" name="txtimpuesto[]" />'.$columna["valor"];} 
	echo '<input type="hidden" value="'.$columna["idimpuesto"].'" name="hidimpuesto[]">';
	
	echo '</br>'; 
}

?>
		</div>
    </div>
</div>
<div class="row">
    <div class="col maintitle">
        Datos factura express
    </div>
</div>
<?php
$fechahoy = date("d/m/Y");
?>
<div class="row">
    <div class="col-sm-2">
        Fecha Factura
    </div>
    <div class="col-sm-2">
        <input type="text" maxlength="10" name="txtfecha" id="txtfecha" value="<?php echo $fechahoy; ?>" style="width: 100%;" required=""/>
    </div>
    <div class="col-sm-2">
        Fecha Vencimiento
    </div>
    <div class="col-sm-2">
        <input type="text" maxlength="10" name="txtfechavencimiento" id="txtfechavencimiento" value="<?php echo $fechahoy; ?>" style="width: 100%;" required=""/>
    </div>
</div>
<div class="row">
    <div class="col-sm-2">
        Factura compra
    </div>
    <div class="col">
        <input type="text" name="txtdocumentocompra" id="txtdocumentocompra" maxlength="20" style="width: 100%;" required=""/>
    </div>
</div>
<div class="row">
    <div class="col-sm-2">
        Descripción
    </div>
    <div class="col">
        <input type="text" name="txtdescripcion" id="txtdescripcion" maxlength="50" style="width: 100%;" required=""/>
    </div>
</div>
<div class="row">
    <div class="col-sm-2">
        Base imponible
    </div>
    <div class="col">
        <input type="text" value="0.00" maxlength="10" name="txtprecio" id="txtprecio" onblur="javascript:calculartotal()" required=""/>
    </div>
</div>
<div class="row">
    <div class="col-sm-2">
        <b>Total factura</b>
    </div>
    <div class="col">
        <input type="text" value="0.00" maxlength="10" name="txtpreciototal" id="txtpreciototal" onblur="javascript:calcularbi()" required=""/>
    </div>
</div>
<div class="row">
    <div class="col-sm-2">
        Pagado
    </div>
    <div class="col">
		<select name="lststatus" style="width: 100%">>
			<option value="0" >- Sin respuesta -</option>
            <option value="1" >Pagado</option>
			<option value="2" >NO Pagado</option>
		</select>        
    </div>
</div>
<div class="row">
    <div class="col maintitle">
        Fichero adjunto
    </div>
</div>
<div class="row">
    <div class="col-sm-2">
        Privacidad
    </div>
    <div class="col">
        <select name="lstpublico" style="width: 100%">
                <option value="0" >Privado</option>
                <option value="1" >Publico</option>
        </select>
    </div>
</div>
<div class="row">
    <div class="col-sm-2">
        Categoria fichero
    </div>
    <div class="col">
        
        <select name="lstcategoriafichero" style="width: 100%;" >
<option value="0" selected="">Sin especificar</option>
<?php
$ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."ficheros_cat order by categoria ");
while($col = mysqli_fetch_array($ConsultaMySql))
{
    echo '<option value="'.$col["id"].'">'.$col["categoria"].'</option>';
}
?>
        </select>
    </div>
</div>
<div class="row">
    <div class="col-sm-2">
        Fichero
    </div>
    <div class="col">
        <input type="file" name="fileficherito" />
    </div>
</div>


<div class="row">
    <div class="col maintitle">
Forma de pago
    </div>
</div>
<div class="row">
	<div class="col-sm-2">
    Formas de pago
	</div>
	<div class="col">
		<select name="lst_cp" id="lst_cp" style="width: 100%;" />
        <option value="0">-Sin especificar-</option>
<?php
	
$cnsselector = $mysqli->query("SELECT * from ".$prefixsql."bancos_cpago order by cpago");
while($col = mysqli_fetch_array($cnsselector))
{
	
	echo '<option value="'.$col["id"].'" >'.$col["cpago"].'</option>';
}
		
?>		
		</select>
	</div>
</div>
<div class="row">
	<div class="col-sm-2">
    Documento de pago
	</div>
	<div class="col">
		<select name="lst_dp" id="lst_dp" style="width: 100%;" />
        <option value="0">-Sin especificar-</option>
<?php
	
$cnsselector = $mysqli->query("SELECT * from ".$prefixsql."formaspago order by formapago");
while($col = mysqli_fetch_array($cnsselector))
{
	
	echo '<option value="'.$col["id"].'" >'.$col["formapago"].'</option>';
}
		
?>
		</select>
	</div>
</div>





<div align="center" class="rectangulobtnsguardar">

<a href="javascript:validarformulario();" class="btnsubmit"><i class="hidephonview fa fa-save fa-lg"></i> Guardar</a> 
<?php echo ' <a class="btncancel" href="index.php?module='.$lnxinvoice.'"><i class="hidephonview fa fa-window-close fa-lg"></i> Cancelar</a>'; ?>

</div>
</form>

