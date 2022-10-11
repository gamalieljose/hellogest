<?php
$iddocumento = $_GET["id"];


$tbl_bloquear = $prefixsql.$lnxinvoice;
if(lnx_check_bloqueo($tbl_bloquear, $iddocumento, $_COOKIE["lnxuserid"]) > 0)
{
  //Bloqueado
  $cssboxbloqueo = "display: inline;";
  $cssbotonbloqueo = "display: none;";
  $LNXERP_bloqueado = "YES";
}
else 
{
  //sin bloquear
  $cssboxbloqueo = "display: none;";
  $cssbotonbloqueo = "display: inline;";
  $LNXERP_bloqueado = "NO";
}
?>
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
if($lnxinvoice == "fv" || $lnxinvoice == "fvr" || $lnxinvoice == "ov" || $lnxinvoice == "pv")
{
	echo '<script src="core/com/js_terceros_cli.js"></script>';
}
if($lnxinvoice == "fc")
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
<script type="text/javascript">
$(document).ready(function() {

    lnxbloquea(); //Ejecutamos script nada más abrir el registro

    function lnxbloquea() {

      var bloquea_tabla = "<?php echo $tbl_bloquear; ?>";
      var bloquea_idregistro = "<?php echo $iddocumento; ?>";

      $.post("core/lock.php", { lnxtabla: bloquea_tabla, lnxregistro: bloquea_idregistro}, function(data){

        response = JSON.parse(data);
        document.getElementById('msgbloqueo').innerHTML = response["rssimple"];

        if(response["rseditable"] == "NO")
        {         
          document.getElementById('boxbloqueo').style.display = "inline";
        }
        if(response["rseditable"] == "YES")
        {         
          document.getElementById('boxbloqueo').style.display = "none"; 
        }
      
      });
       
    }
    setInterval(lnxbloquea, 5000);
});
</script>
<div class="row" id="boxbloqueo" style="<?php echo $cssboxbloqueo; ?>">
  <div class="col" style="background-color: #ff8d33;">
  <div id="msgbloqueo">Registro Bloqueado</div>		
  </div>
</div>
<?php

include("modules/".$lnxinvoice."/fv/botones.php");



$cnsprincipal= $mysqli->query("SELECT * from ".$prefixsql.$lnxinvoice." where id = '".$iddocumento."'");
$rowprincipal = mysqli_fetch_assoc($cnsprincipal);
$dbidserie = $rowprincipal["idserie"];
$dbidcliente = $rowprincipal["idtercero"];
$dbidusuario = $rowprincipal["idusuario"];

$cnsprincipal= $mysqli->query("SELECT * from ".$prefixsql."series where id = '".$dbidserie."'");
$rowprincipal = mysqli_fetch_assoc($cnsprincipal);
$dbidempresa = $rowprincipal["idempresa"];


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


if($LNXERP_bloqueado == "NO")
{
echo '<form name="form1" id="form1" action="index.php?module='.$lnxinvoice.'&section=main&action=save" method="POST">'; 
$campo_bloqueado = '';
}
else
{
	$campo_bloqueado = ' disabled=""';
}
?>
<input type="hidden" name="hopcion" value="update" />
<?php echo '<input type="hidden" name="hiddocumento" value="'.$iddocumento.'" />'; ?>


<div class="row">
    <div class="col maintitle" align="left">
    Editando documento
    </div>
</div>

<div class="row">
    <div class="col-sm-2" align="left">
        Empresa
    </div>
    <div class="col" align="left">
        <select id="lstempresas" name="lstempresas" class="campoencoger" <?php echo $campo_bloqueado; ?> >
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
        <select id="lstseries" name="lstseries" class="campoencoger" <?php echo $campo_bloqueado; ?> >
    <?php
    $cnsseries = $mysqli->query("SELECT * from ".$prefixsql."series where idempresa = '".$dbidempresa."' and tipo = '".$tipolnxinvoice."' and cv = '".$cvlnxinvoice."' order by serie ");
    while($columna = mysqli_fetch_array($cnsseries))
    {
		if($columna["id"] == $dbidserie){$seleccionado = ' selected=""'; $seriedft = $columna["id"]; }else{$seleccionado = '';}
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
<input type="text" value="" name="txttercero" id="txttercero" maxlength="50" placeholder="Escriba el nombre a buscar" style="width: 100%;"/></br> 
</div>
<?php
if($LNXERP_bloqueado == "NO")
{
echo '<a href="javascript:mostrar();"><img src="img/buscar.jpg"/></a>';	
}


	//seleciona cliente
	
	echo '<select name="lsttercero" id="lsttercero" style="width: calc(100% - 30px);" '.$campo_bloqueado.' >';
	
	$cnsterceros = $mysqli->query("SELECT * from ".$prefixsql."terceros where id = '".$dbidcliente."'");
		
		while($colter = mysqli_fetch_array($cnsterceros))
		{
			if($colter["id"] == $dbidcliente){$seleccionado = ' selected=""';}else{$seleccionado = '';}
			echo '<option value="'.$colter["id"].'" '.$seleccionado.'>'.$colter["razonsocial"].'</option>'; 
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
    <select name="lstusuario" style="width: 100%;" <?php echo $campo_bloqueado; ?> >
<?php

$ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."users where activo = '1' or id = '".$$dbidusuario."' order by display");
while($columna = mysqli_fetch_array($ConsultaMySql))
{
        if($columna["id"] == $dbidusuario){$pordefecto = ' SELECTED';	}else{$pordefecto = '';}
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
	
	
	$cnsaux = $mysqli->query("SELECT * FROM ".$prefixsql.$lnxinvoice."_tax WHERE ".$campomasterid." = '".$iddocumento."' AND idimpuesto = '".$columna["idimpuesto"]."'");
	$rowaux = mysqli_fetch_assoc($cnsaux);
	
	$existe = $cnsaux->num_rows;
	
	if ($existe == '1')
	{
		$valortax = $rowaux["valor"];
	}
	else
	{
		$valortax = $columna["valor"];
	}
	
	
	
	if($columna["editable"] == '1')	
	{echo '<input type="number" value="'.$valortax.'" name="txtimpuesto[]" '.$campo_bloqueado.' />';} 
	else 
	{echo '<input type="hidden" value="'.$valortax.'" name="txtimpuesto[]" />'.$valortax;} 
	echo '<input type="hidden" value="'.$columna["idimpuesto"].'" name="hidimpuesto[]">';
	
	echo '</br>'; 
}

?>
		</div>
    </div>
</div>


<div align="center" class="rectangulobtnsguardar">
<?php
if($LNXERP_bloqueado == "NO")
{
	echo '<input class="btnsubmit" name="btnguardar" value="Guardar" type="submit"> ';
}

echo ' <a class="btncancel" href="index.php?module='.$lnxinvoice.'">Cancelar</a>'; 
?>

</div>
</form>

