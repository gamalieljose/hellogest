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
<?php echo " url     : \"modules/".$lnxinvoice."/ajax/com_ajx_empresa-serie_taxes.php\","; ?>
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
<script>
function GuardarFormulario(){
	
	var wlsttercero = document.getElementById("lsttercero").value;
	
	
	if(wlsttercero == '' || wlsttercero == '0')
	{
		alert("Por favor seleccione un cliente válido");
	}
	else
	{
	  //document.getElementById("form1").submit();
	  document.forms[1].submit();
	}
}
</script>
<script languague="javascript">
        function mostrar() {
            div = document.getElementById("div_buscatercero");
            div.style.display = "";
			document.getElementById("txttercero").focus();
        }

</script>
<?php
if($lnxinvoice == "fv" || $lnxinvoice == "fvr" || $lnxinvoice == "ov" || $lnxinvoice == "pv" || $lnxinvoice == "av")
{
	echo '<script src="core/com/js_terceros_cli.js"></script>';
}
if($lnxinvoice == "fc" || $lnxinvoice == "oc" || $lnxinvoice == "pc" || $lnxinvoice == "ac")
{
	echo '<script src="core/com/js_terceros_pro.js"></script>';
}
?>

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


echo '<form name="form1" id="form1" action="index.php?module='.$lnxinvoice.'&section=main&action=save" method="POST">'; ?>
<input type="hidden" name="hopcion" value="new" />

<div class="row">
    <div class="col maintitle" align="left">
    Nuevo documento
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
<input type="text" value="" name="txttercero" id="txttercero" class="tblbuscar" maxlength="50" placeholder="Escriba el nombre a buscar" style="width: 100%;"/></br> 
</div>
<a href="javascript:mostrar();"><img src="img/buscar.jpg"/></a>
<?php
	//seleciona cliente
	
	echo '<select name="lsttercero" id="lsttercero" style="width: calc(100% - 30px);">';
	
	$cnsterceros = $mysqli->query("SELECT * from ".$prefixsql."terceros where activo = '1' AND ".$lnxtipotercero." > '0' order by razonsocial");
		
		while($colter = mysqli_fetch_array($cnsterceros))
		{
			echo '<option value="'.$colter["id"].'">'.$colter["razonsocial"].'</option>'; 
		}
		echo '</select>';
?>

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


<div align="center" class="rectangulobtnsguardar">

<button type="submit" class="btnsubmit" > <i class="hidephonview fa fa-save fa-lg"></i> Guardar</button>

<?php echo ' <a class="btncancel" href="index.php?module='.$lnxinvoice.'"><i class="hidephonview fa fa-window-close fa-lg"></i> Cancelar</a>'; ?>

</div>
</form>

