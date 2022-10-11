<?php
//obtenemos el idtercero

$idtercero = $_GET["idtercero"];

$tbl_bloquear = $prefixsql."terceros";

?>
<script src="scripts/jquery/jquery-2.1.1.js"></script>

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
  dayNamesShort: ['Dom','Lun','Mar','Mie','Jue','Vie','Sáb'],
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
		
<script type="text/javascript">
$(document).ready(function() {
    function lnxbloquea() {

      var bloquea_tabla = "<?php echo $tbl_bloquear; ?>";
      var bloquea_idregistro = "<?php echo $idtercero; ?>";

      $.post("core/lock.php", { lnxtabla: bloquea_tabla, lnxregistro: bloquea_idregistro}, function(data){

        response = JSON.parse(data);
        document.getElementById('msgbloqueo').innerHTML = response["rssimple"];

        if(response["rseditable"] == "NO")
        {
          document.getElementById('btnguardar').style.display = "none"; 
          document.getElementById('btnaplicar').style.display = "none";
          document.getElementById('boxbloqueo').style.display = "inline";
        }
        if(response["rseditable"] == "YES")
        {
          document.getElementById('btnguardar').style.display = "inline"; 
          document.getElementById('btnaplicar').style.display = "inline";
          document.getElementById('boxbloqueo').style.display = "none";
          
        }
      
      });
       
    }
    setInterval(lnxbloquea, 5000);
});
</script>


<?php
include("modules/terceros/botones.php");

$tbl_bloquear = $prefixsql."terceros";
if(lnx_check_bloqueo($tbl_bloquear, $idtercero, $_COOKIE["lnxuserid"]) > 0)
{
  //Bloqueado
  $cssboxbloqueo = "display: inline;";
  $cssbotonbloqueo = "display: none;";
}
else 
{
  //sin bloquear
  $cssboxbloqueo = "display: none;";
  $cssbotonbloqueo = "display: inline;";
}

?>



<div class="row" id="boxbloqueo" style="<?php echo $cssboxbloqueo; ?>">
  <div class="col" style="background-color: #ff8d33;">
  <div id="msgbloqueo">Registro Bloqueado</div>		
  </div>
</div>

<?php


//Recuperamos los valores de la BBDD

$buscatercero = $mysqli->query("SELECT * FROM ".$prefixsql."terceros where id = '".$idtercero."'");
$row = mysqli_fetch_assoc($buscatercero);
	
	$dbrazonsocial = $row["razonsocial"];
	$dbnomcomercial = $row["nomcomercial"];
	$dbnif = $row["nif"];
	$dbtel = $row["tel"];
	$dbactivo = $row["activo"];
	$dbcodcli = $row["codcli"];
	$dbcodpro = $row["codpro"];
	$dbdir = $row["dir"];
	$dbcp = $row["cp"];
	$dbpobla = $row["pobla"];
	$dbidprov = $row["idprov"];
	$dbidpais = $row["idpais"];
	$dbidtarifa = $row["idtarifa"];
	$dbcodclipro = $row["codclipro"];
	
	$dborigen = $row["origen"];
	
	$dbfechaalta = $row["fechaalta"];
		$fano = substr($dbfechaalta, 0, 4);  
		$fmes = substr($dbfechaalta, 5, 2);  
		$fdia = substr($dbfechaalta, 8, 2);  

		$ftxtfecha = $fdia.'/'.$fmes.'/'.$fano;
	$dbncuenta = $row["ncuenta"];
	$dbnotas = $row["notas"];
	$dbemail = $row["email"];
	$dbnotaimp = $row["notaimp"];
	$dbidcomercial = $row["idcomercial"];
	$dbidtipotercero = $row["idtipotercero"];
	
  $dbidactividad = $row["idactividad"];
  
  $dbclifp = $row["clifp"];
  $dbclidp = $row["clidp"];
  $dbprofp = $row["profp"];
  $dbprodp = $row["prodp"];
  
  $dbidzona = $row["idzona"];
	
?>

<form id="form1" name="form1" method="post" action="index.php?module=terceros&section=terceros&action=save">
<?php 
echo '<input type="hidden" name="hidtercero" value="'.$idtercero.'">';
?>
<input type="hidden" name="haccion" value="update">


<div class="row">
  <div class="col-sm-2">
   ID: <?php echo $idtercero; ?> 
  </div>
  <div class="col" align="left">
  <?php
if($dbactivo == "1"){$seleccionado = 'checked=""';}else{$seleccionado = '';}
echo '<input type="checkbox" '.$seleccionado.' name="chkactivo" value="1" />  Tercero Activo';
?>
  </div>
</div>

<div class="row">
  <div class="col-sm-2" align="left">
    Fecha de alta
  </div>
  <div class="col" align="left">
    <?php echo '<input type="text" maxlength="10" value="'.$ftxtfecha.'" name="txtfecha" id="dpkfecha" required="" class="campoencoger">'; ?>
  </div>
</div>

<div class="row">
  <div class="col-sm-2" align="left">
    Origen
  </div>
  <div class="col" align="left">
    <style>
  .select-editable { position:relative; background-color:white; border:solid grey 1px;  width:120px; height:18px; }
  .select-editable select { position:absolute; top:0px; left:0px; font-size:14px; border:none; width:120px; margin:0; }
  .select-editable input { position:absolute; top:0px; left:0px; width:100px; padding:1px; font-size:12px; border:none; }
  .select-editable select:focus, .select-editable input:focus { outline:none; }
</style>

<div class="select-editable" style="width: 100%;">
  <select name="lstorigen" onchange="this.nextElementSibling.value=this.value" style="width: Calc(100% - 10px);">
    <option value=""></option>
	<?php
	$ConsultaMySql= $mysqli->query("SELECT DISTINCT(origen) as miorigen from ".$prefixsql."terceros order by origen");

		
	while($columna = mysqli_fetch_array($ConsultaMySql))
	{
		
		echo '<option value="'.$columna["miorigen"].'" '.$pordefecto.'>'.$columna["miorigen"].'</option>';
		
	}

	
?>

  </select>
  
  <?php echo '<input name="txtorigen" maxlength="20" type="text" value="'.$dborigen.'" style="width: Calc(100% - 30px);">';  ?>
</div>
  </div>
</div>


<div class="row">
  <div class="col-sm-2" align="left">
    Razon social
  </div>
  <div class="col" align="left">
	<?php echo '<input name="txtrazonsocial" maxlength="50" required="" type="text" value="'.$dbrazonsocial.'" style="width: 100%;">'; ?>
  </div>
</div>

<div class="row">
  <div class="col-sm-2" align="left">
    Nombre comercial
  </div>
  <div class="col" align="left">
    <?php echo '<input name="txtnomcomercial"  maxlength="50" type="text" value="'.$dbnomcomercial.'" style="width: 100%;">'; ?>
  </div>
</div>

<div class="row">
  <div class="col-sm-2" align="left">
    NIF
  </div>
  <div class="col" align="left">
	<?php echo '<input name="txtnif" maxlength="15" required="" type="text" value="'.$dbnif.'" style="width: 100%;">'; ?>
  </div>
</div>

<div class="row">
  <div class="col-sm-2" align="left">
    Telefono
  </div>
  <div class="col" align="left">
	<?php echo '<input name="txttel" maxlength="20" type="text" value="'.$dbtel.'" style="width: 100%;">'; ?>
  </div>
</div>

<div class="row">
  <div class="col-sm-2" align="left">
    e-mail
  </div>
  <div class="col" align="left">
	<?php echo '<input name="txtemail" maxlength="100" type="text" value="'.$dbemail.'" style="width: 100%;">'; ?>
  </div>
</div>

<div class="row">
  <div class="col-sm-2" align="left">
    Pais
  </div>
  <div class="col" align="left">
    <select name="cbpais" id="cbpais" style="width: 100%;">
	<?php
	$ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."paises order by pais");
		
	while($columna = mysqli_fetch_array($ConsultaMySql))
	{
		
		if ($columna["id"] == $dbidpais)
		{
			echo '<option value="'.$columna["id"].'" selected>'.$columna["pais"].'</option>';
		}
		else
		{
			echo '<option value="'.$columna["id"].'">'.$columna["pais"].'</option>';
		}
		
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
	$ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."provincias where idpais = '".$dbidpais."' order by provincia");
		
	while($columna = mysqli_fetch_array($ConsultaMySql))
	{
		
		if ($columna["id"] == $dbidprov)
		{
			echo '<option value="'.$columna["id"].'" selected>'.$columna["provincia"].'</option>';
		}
		else
		{
			echo '<option value="'.$columna["id"].'">'.$columna["provincia"].'</option>';
		}
		
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
	<?php echo '<input name="txtdir" maxlength="50" type="text" value="'.$dbdir.'" style="width: 100%;">'; ?>
  </div>
</div>

<div class="row">
  <div class="col-sm-2" align="left">
    CP
  </div>
  <div class="col-sm-2" align="left">
	<?php echo '<input name="txtcp" id="txtcp" maxlength="10" type="text" value="'.$dbcp.'" style="width: 100%;" onblur="calculacp()" />'; ?>
  </div>
  <div class="col-sm-2" align="left">
    Poblacion
  </div>
  <div class="col" align="left">
	<?php echo '<input name="txtpobla" id="txtpobla" maxlength="50" type="text" value="'.$dbpobla.'" style="width: 100%;">'; ?>
  </div>
  
</div>

<div class="row">
  <div class="col maintitle" align="left">
    Financiera
  </div>
</div>

<div class="row">
  <div class="col-sm-2" align="left">
    Cuenta bancaria
  </div>
  <div class="col" align="left">
	<?php echo '<input name="txtncuenta" maxlength="50" type="text" value="'.$dbncuenta.'" style="width: 100%;">'; ?>
  </div>
</div>

<div class="row">
  <div class="col maintitle" align="left">
    Datos Cliente
  </div>
</div>


<div class="row">
  <div class="col-sm-2" align="left">
    Codigo Cliente
  </div>
  <div class="col" align="left">
    <?php
	
if ($dbcodcli == "0")
{
	if(lnx_check_perm(2012) > '0') // Alta como cliente
	{
	echo '<a class="btnedit" href="index.php?module=terceros&section=alta&action=cli&idtercero='.$idtercero.'"> Alta como cliente</a>';
	}
}
else
{
	echo $dbcodcli;
}
?>
	
  </div>
</div>





<div class="row">
  <div class="col-sm-2" align="left">
    Tarifa aplicable
  </div>
  <div class="col" align="left">
    <select name="cbtarifa" style="width: 100%">
	
	<?php
	$ConsultaMySql= $mysqli->query("SELECT * from lnx_tarifas order by tarifa");

	echo '<option value="0" selected="">por defecto</option>';
	while($columna = mysqli_fetch_array($ConsultaMySql))
	{
		//if ($columna["id"] == $dbidpais)
		//{echo '<option value="'.$columna["id"].'" selected>'.$columna["pais"].'</option>';}
		if($dbidtarifa == $columna["id"])
		{
			echo '<option value="'.$columna["id"].'" selected="">'.$columna["tarifa"].'</option>';
		}
		else
		{
			echo '<option value="'.$columna["id"].'">'.$columna["tarifa"].'</option>';
		}
		
	}

	echo '</select>';
?>


  </div>
</div>


<div class="row">
  <div class="col-sm-2" align="left">
    Formas de cobro
  </div>
  <div class="col" align="left">
    <select name="lstclifp"  style="width: 100%;">
<?php
if($dbclifp == "0"){$seleccionado = ' selected=""';}else{$seleccionado = '';}
echo '<option value="0" '.$seleccionado.'>-Sin especificar-</option>';

    $ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."bancos_cpago order by cpago");
    while($colcpago = mysqli_fetch_array($ConsultaMySql))
    {
      if($colcpago["id"] == $dbclifp){$seleccionado = ' selected=""';}else{$seleccionado = '';}
        echo '<option value="'.$colcpago["id"].'" '.$seleccionado.'>'.$colcpago["cpago"].'</option>';
    }
?>
    </select>
  </div>
</div>
<div class="row">
  <div class="col-sm-2" align="left">
    Documento de cobro
  </div>
  <div class="col" align="left">
    <select name="lstclidp" style="width: 100%;">
<?php
if($dbclidp == "0"){$seleccionado = ' selected=""';}else{$seleccionado = '';}
echo '<option value="0" '.$seleccionado.'>-Sin especificar-</option>';

    $ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."formaspago order by formapago");
    while($colcpago = mysqli_fetch_array($ConsultaMySql))
    {
      if($colcpago["id"] == $dbclidp){$seleccionado = ' selected=""';}else{$seleccionado = '';}
        echo '<option value="'.$colcpago["id"].'" '.$seleccionado.'>'.$colcpago["formapago"].'</option>';
    }
?>
    </select>
  </div>
</div>


<div class="row">
  <div class="col maintitle" align="left">
    Datos proveedor
  </div>
</div>

<div class="row">
  <div class="col-sm-2" align="left">
    Codigo Proveedor
  </div>
  <div class="col" align="left">
    <?php

if ($dbcodpro == "0")
{
	if(lnx_check_perm(2012) > '0') // Alta como proveedor
	{
	echo '<a class="btnedit" href="index.php?module=terceros&section=alta&action=pro&idtercero='.$idtercero.'"> Alta como proveedor</a>';
	}
}
else
{
	echo $dbcodpro;
}

?>
	
  </div>
</div>


<div class="row">
  <div class="col-sm-2" align="left">
    Codigo cliente en proveedor
  </div>
  <div class="col" align="left">
	<?php echo '<input name="txtcodclipro" maxlength="20" type="text" value="'.$dbcodclipro.'" style="width: 100%;">'; ?>
  </div>
</div>


<div class="row">
  <div class="col-sm-2" align="left">
    Formas de pago
  </div>
  <div class="col" align="left">
    <select name="lstprofp" style="width: 100%;">
<?php
if($dbprofp == "0"){$seleccionado = ' selected=""';}else{$seleccionado = '';}
echo '<option value="0" '.$seleccionado.'>-Sin especificar-</option>';

    $ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."bancos_cpago order by cpago");
    while($colcpago = mysqli_fetch_array($ConsultaMySql))
    {
      if($colcpago["id"] == $dbprofp){$seleccionado = ' selected=""';}else{$seleccionado = '';}
        echo '<option value="'.$colcpago["id"].'" '.$seleccionado.'>'.$colcpago["cpago"].'</option>';
    }
?>
    </select>
  </div>
</div>
<div class="row">
  <div class="col-sm-2" align="left">
    Documento de pago
  </div>
  <div class="col" align="left">
    <select name="lstprodp" style="width: 100%;">
<?php
if($dbprodp == "0"){$seleccionado = ' selected=""';}else{$seleccionado = '';}
echo '<option value="0" '.$seleccionado.'>-Sin especificar-</option>';

    $ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."formaspago order by formapago");
    while($colcpago = mysqli_fetch_array($ConsultaMySql))
    {
      if($colcpago["id"] == $dbprodp){$seleccionado = ' selected=""';}else{$seleccionado = '';}
        echo '<option value="'.$colcpago["id"].'" '.$seleccionado.'>'.$colcpago["formapago"].'</option>';
    }
?>
    </select>
  </div>
</div>


<div class="row">
  <div class="col maintitle" align="left">
    Comercial
  </div>
</div>

<div class="row">
  <div class="col-sm-2" align="left">
    Agente
  </div>
  <div class="col" align="left">
    <select name="lstcomercial" style="width: 100%;">
<?php
$ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."users order by display");
	
	if ($dbidcomercial == '0'){$seleccionado = ' selected=""';}else{$seleccionado = '';}
	echo '<option value="0" '.$seleccionado.'>-sin asignar-</option>';
	
	while($columna = mysqli_fetch_array($ConsultaMySql))
	{
		if ($columna["id"] == $dbidcomercial){$seleccionado = ' selected=""';}else{$seleccionado = '';}
		echo '<option value="'.$columna["id"].'" '.$seleccionado.'>'.$columna["display"].'</option>';
		
	}
?>
</select>
  </div>
</div>


<div class="row">
  <div class="col-sm-2" align="left">
    Zona
  </div>
  <div class="col" align="left">
    <select name="lstzona" style="width: 100%;">
      
      <?php
if ($dbidzona == 0){$seleccionado = ' selected=""';}else{$seleccionado = '';}
echo '<option value="0" '.$seleccionado.'>-sin asignar-</option>';
  $ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."dic_zonas order by zona");
	while($columna = mysqli_fetch_array($ConsultaMySql))
	{
		if ($columna["id"] == $dbidzona){$seleccionado = ' selected=""';}else{$seleccionado = '';}
		echo '<option value="'.$columna["id"].'" '.$seleccionado.'>'.$columna["zona"].'</option>';
		
	}
?>
    </select>
  </div>
</div>


<div class="row">
  <div class="col-sm-2" align="left">
    Tipo tercero
  </div>
  <div class="col" align="left">
	<select name="lsttipotercero" style="width: 100%;">
	<?php
	if ($dbidtipotercero == '0'){$seleccionado = ' selected=""';}else{$seleccionado = '';}
	echo '<option value="0" '.$seleccionado.'>-sin especificar-</option>';


	
$cnsaux = $mysqli->query("SELECT * FROM ".$prefixsql."terceros_tipos order by tipotercero");
	
	while($colaux = mysqli_fetch_array($cnsaux))
	{
	
		if ($colaux["id"] == $dbidtipotercero){$seleccionado = ' selected=""';}else{$seleccionado = '';}
		echo '<option value="'.$colaux["id"].'" '.$seleccionado.'>'.$colaux["tipotercero"].'</option>';
		
	}
?>
	</select>
  </div>
</div>

<div class="row">
  <div class="col-sm-2" align="left">
    Sector Actividad
  </div>
  <div class="col" align="left">
    
	<select name="lstactividad" style="width: 100%;">
	<?php
	if ($dbidactividad == '0'){$seleccionado = ' selected=""';}else{$seleccionado = '';}
	echo '<option value="0" '.$seleccionado.'>-sin especificar-</option>';
	
$cnsaux = $mysqli->query("SELECT * FROM ".$prefixsql."dic_actividades order by actividad");
	
	while($colaux = mysqli_fetch_array($cnsaux))
	{
	
		if ($colaux["id"] == $dbidactividad){$seleccionado = ' selected=""';}else{$seleccionado = '';}
		echo '<option value="'.$colaux["id"].'" '.$seleccionado.'>'.$colaux["actividad"].'</option>';
		
	}
?>
	</select>
  </div>
</div>

<div class="row">
  <div class="col maintitle" align="left">
    Anotaciones
  </div>
</div>


<div class="row">
  <div class="col-sm-2" align="left">
    Notas
  </div>
  <div class="col" align="left">
    <textarea name="txtnotas" maxlength="250" style="width: 100%; height: 100px"><?php echo $dbnotas; ?></textarea>
  </div>
</div>


<div class="row">
  <div class="col-sm-2" align="left">
    Notas importantes
  </div>
  <div class="col" align="left">
    <textarea name="txtnotaimp" maxlength="250" placeholder="Esta nota se mostrara en documentos importantes" style="width: 100%; height: 100px"><?php echo $dbnotaimp; ?></textarea>
  </div>
</div>




<div align="center" class="rectangulobtnsguardar">
<input class="btnsubmit" name="btnguardar" id="btnguardar" style="<?php echo $cssbotonbloqueo; ?>" value="Guardar" type="submit"> 
<input class="btnapply" name="btnaplicar" id="btnaplicar" style="<?php echo $cssbotonbloqueo; ?>" value="Aplicar" type="submit"> 

<a class="btncancel" href="index.php?module=terceros&section=terceros">Cancelar</a>

</div>

</form>

<p>&nbsp;</p>


