<link rel="stylesheet" href="scripts/jquery/jquery-ui-lnx.css">
<script src="core/com/js_terceros_all.js"></script>
<script language="javascript">
$(document).ready(function(){
   $("#lstempresas").change(function () {
           $("#lstempresas option:selected").each(function () {
            elegido=$(this).val();
            $.post("modules/tpv/ajax/ajx_empresa-serie.php", { elegido: elegido }, function(data){
            $("#lstseries").html(data);
            });            
        });
   })
});
</script>
<script type="text/javascript">
function muestra_tab_principal() 
{      
	document.getElementById('btn_tab_principal').className = 'btn_tab_sel';
	document.getElementById('btn_tab_otros').className = 'btn_tab';
        document.getElementById('tab_principal').style.display = 'inline';
	document.getElementById('tab_otros').style.display = 'none';
	
}
function muestra_tab_otros() 
{
    	document.getElementById('btn_tab_principal').className = 'btn_tab';
	document.getElementById('btn_tab_otros').className = 'btn_tab_sel';
	document.getElementById('tab_principal').style.display = 'none';
	document.getElementById('tab_otros').style.display = 'inline';
}
</script>
<script type="text/javascript">

  $().ready(function() {

$.datepicker.regional['es'] = 
  {
	closeText: 'Cerrar', 
	prevText: 'Previo', 
	nextText: 'PrÃƒÂ³ximo',
  
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
   $("#lstempresas").change(function () {
           $("#lstempresas option:selected").each(function () {
            elegido=$(this).val();
            
            $.post("modules/tpv/ajax/ajx_mov_empresa-cajas.php", { elegido: elegido }, function(data){
            $("#lsttiendas").html(data);
            });
            
            $.post("modules/tpv/ajax/ajx_mov_empresa-seriestpv.php", { elegido: elegido }, function(data){
            $("#lstseries").html(data);
            
            document.getElementById("lsttiendas").disabled=false;
            document.getElementById("lstseries").disabled=false;
            });            
        });
        
        $("#lsttiendas option:selected").each(function () {
            elegido=$(this).val();
			$.post("modules/tpv/ajax/ajx_mov_tiendas-caja.php", { elegido: elegido }, function(data){
            $("#lstterminal").html(data);
            
            document.getElementById("lstterminal").disabled=false;
            });            
        });
        
   })
});
</script>
<script language="javascript">
$(document).ready(function(){
   $("#lsttiendas").change(function () {
           $("#lsttiendas option:selected").each(function () {
            elegido=$(this).val();
			$.post("modules/tpv/ajax/ajx_mov_tiendas-caja.php", { elegido: elegido }, function(data){
            $("#lstterminal").html(data);
            
            document.getElementById("lstterminal").disabled=false;
            });            
        });
   })
});
</script>
<script type="text/javascript">
function validarform() 
{
	var permiteguardar = 0;
	
    var valoridserie = document.getElementById('lstseries').value;
	var valortienda = document.getElementById('lsttiendas').value;
	var valorterminal = document.getElementById('lstterminal').value;
    
    if(valoridserie == 0)
    {
         alert("Seleccione una serie válida");
		 permiteguardar = permiteguardar + 1;
    }
	
	if(valortienda == 0)
    {
         alert("Seleccione una tienda válida");
		 permiteguardar = permiteguardar + 1;
    }
	
	if(valorterminal == 0)
    {
         alert("Seleccione una Caja / Terminal válidos");
		 permiteguardar = permiteguardar + 1;
    }

	
	if(permiteguardar == 0)
	{
		document.getElementById("frmcajon").submit();
	}
    
    
    
}
</script>
<script>
function calculartotal() {

  var elementos = document.getElementsByName("txttax[]");
  var valorbase = document.getElementById("txtimportebi").value;
				  

  var total = 0;
	var valorimpuesto = 0;
  var errors = 0; 
  for(i=0; i<elementos.length; i++){
    if(elementos[i].name == "txttax[]")
	{
		valorimpuesto = (elementos[i].value / 100) * valorbase;
		total = total + valorimpuesto;
	}
	
    
  }

	var resultado;
  resultado = parseFloat(valorbase) + parseFloat(total);
  resultado = parseFloat(resultado).toFixed(2);

	document.getElementById("txtimporte").value = resultado;
 
}


function calcularbi() {
	
var elementos = document.getElementsByName("txttax[]");
var valortotal = document.getElementById("txtimporte").value;
				  

  var total = 0;
	var valorimpuesto = 0;
  var errors = 0; 
  for(i=0; i<elementos.length; i++){
    if(elementos[i].name == "txttax[]")
	{
		valorimpuesto = (elementos[i].value / 100);
		total = total + valorimpuesto;
	}
	
    
  }

	var resultado;
  
  resultado = parseFloat(valortotal) / ( 1 + parseFloat(total) ) ;
  resultado = parseFloat(resultado).toFixed(2);
	document.getElementById("txtimportebi").value = resultado;
 
}
</script>
<?php
$idmovimiento = $_POST["hidmovimiento"];

$idtpv = $_GET["id"];

    
$sqlaux = $mysqli->query("select * from ".$prefixsql."tpv_cajon where id = '".$idmovimiento."' "); 
$rowaux = mysqli_fetch_assoc($sqlaux);
$dbidserie = $rowaux["idserie"];
$dbtipomov = $rowaux["tipomov"];
$dbmotivo = $rowaux["motivo"];
$dbimporte = $rowaux["importe"];
$dbidfpago = $rowaux["idfpago"];
$dbiduser = $rowaux["iduser"];
$dbidtienda = $rowaux["idtienda"];
$dbidterminal = $rowaux["idterminal"];
$dbfecha = $rowaux["fecha"];

	$dbfecha = explode(" ", $dbfecha);

	$lbl_fecha = $dbfecha[0];

	$lbl_fecha = explode("-", $lbl_fecha);

	$lbl_fecha = $lbl_fecha[2]."/".$lbl_fecha[1]."/".$lbl_fecha[0];

	$lbl_hora = $dbfecha[1];

$sqlaux = $mysqli->query("select * from ".$prefixsql."series where id = '".$dbidserie."' "); 
$rowaux = mysqli_fetch_assoc($sqlaux);
$dbidempresa = $rowaux["idempresa"];
    
?>
<form name="frmcajon" id="frmcajon" method="POST" action="index.php?module=tpv&section=tpv&action=cajonsave">
    <input type="hidden" name="hidmovimiento" value="<?php echo $idmovimiento; ?>" />
    <input type="hidden" name="haccion" value="update" />
    

    
<div class="row">
    <div class="col maintitle">
        Editando movimiento
    </div>
</div>

<div class="row grupotabs">
    <p>
        <a href="javascript:muestra_tab_principal()" id="btn_tab_principal" class="btn_tab_sel" >Principal</a>
        <a href="javascript:muestra_tab_otros()" id="btn_tab_otros" class="btn_tab" >Otros</a>
    </p>
</div>

<div id="tab_principal">

<div class="row">
    <div class="col-sm-2">
        Fecha
    </div>
    <div class="col">
	<input type="text" name="txtfecha" id="txtfecha" maxlength="10" required pattern=".{10,10}" value="<?php echo $lbl_fecha; ?>" />
<?php 
$lblhora = explode(":", $lbl_hora);

$dbhora = $lblhora[0];
$dbminuto = $lblhora[1];


echo ' Hora: <select name="lsthh">';
$hora = 0;
while ($hora < 24) {
	$lbl_hora = str_pad($hora,  2, "0", STR_PAD_LEFT);
	
	if($lbl_hora == $dbhora){$seleccionado = ' selected=""';}else{$seleccionado = '';}
	
    echo '<option value="'.$lbl_hora.'" '.$seleccionado.'>'.$lbl_hora.'</option>';
	$hora = $hora + 1;  
}
echo '</select> ';

echo '<select name="lstmm">';
$minutos = 0;
while ($minutos < 60) {
	
	$lbl_minuto = str_pad($minutos,  2, "0", STR_PAD_LEFT);
	
	if($lbl_minuto == $dbminuto){$seleccionado = ' selected=""';}else{$seleccionado = '';}
	
    echo '<option value="'.$lbl_minuto.'" '.$seleccionado.'>'.$lbl_minuto.'</option>';
	$minutos = $minutos + 1;  
}
echo '</select> ';

?>
    </div>
</div>
<div class="row">
    <div class="col-sm-2" align="left">
        <label><input type="checkbox" value="YES" name="chktercero" /> Tercero </label>
    </div>
    <div class="col" align="left">
<div id="div_buscatercero" style="display:none;">
<input type="text" value="" name="txttercero" id="txttercero" maxlength="50" placeholder="Escriba el nombre a buscar" style="width: 100%;"/></br> 
</div>
<a href="javascript:mostrar();"><img src="img/buscar.jpg"/></a>
<?php
	//seleciona cliente
	
	echo '<select name="lsttercero" id="lsttercero" style="width: Calc(100% - 30px);">';
	
	$cnsterceros = $mysqli->query("SELECT * from ".$prefixsql."terceros where activo = '1' AND codcli > '0' order by razonsocial");
		
		while($colter = mysqli_fetch_array($cnsterceros))
		{
                    if($colter["id"] == $dbidtercero){$seleccionado = ' selected=""';}else{$seleccionado = '';}
			echo '<option value="'.$colter["id"].'" '.$seleccionado.'>'.$colter["razonsocial"].'</option>'; 
		}
		echo '</select>';
?>

    </div>
</div>
<div class="row">
    <div class="col-sm-2">
        Tipo movimiento
    </div>
    <div class="col">
	<?php
	if($dbtipomov == 'IN'){$seleccionado = ' checked=""';}else{$seleccionado = '';}
	echo '<label><input type="radio" name="optmovimiento" value ="IN" '.$seleccionado.'/> Entrada de dinero</label> </br>';
	
	if($dbtipomov == 'OUT'){$seleccionado = ' checked=""';}else{$seleccionado = '';}
	echo '<label><input type="radio" name="optmovimiento" value ="OUT" '.$seleccionado.'/> Salida de dinero</label>';
	?>
        
        
    </div>
</div>
<div class="row">
    <div class="col-sm-2">
        Motivo
    </div>
    <div class="col">
        <input type="text" value="<?php echo $dbmotivo; ?>" name="txtmotivo" required="" maxlength="50" style="width: 100%;"/>
    </div>
</div>
<div class="row">
    <div class="col-sm-2">
        Importe
    </div>
    <div class="col">
        
        <input type="text" value="<?php echo $dbimporte; ?>" name="txtimporte" id="txtimporte" onblur="javascript:calcularbi()" required="" maxlength="10" style="width: 100%;"/>
    </div>
</div>
    
<div class="row">
    <div class="col-sm-2">
        Impuestos
    </div>
    <div class="col">
  <table>
<?php
$ssql = "SELECT * from ".$prefixsql."impuestosrules where idserie = '".$dbidserie."' order by orden";
$ConsultaMySql= $mysqli->query($ssql);

while($coltax = mysqli_fetch_array($ConsultaMySql))
{
    $sqlaux = $mysqli->query("select * from ".$prefixsql."impuestos where id = '".$coltax["idimpuesto"]."' "); 
    $rowaux = mysqli_fetch_assoc($sqlaux);
    $lbl_impuesto = $rowaux["impuesto"];
    
    $sqlaux = $mysqli->query("select * from ".$prefixsql."tpv_cajon_tax where idcajon = '".$idmovimiento."' and idtax = '".$coltax["idimpuesto"]."'"); 
    $rowaux = mysqli_fetch_assoc($sqlaux);
    $lbl_valortax = $rowaux["valor"];
    $lbl_valortaximp = $rowaux["importe"];
    
    $sumataxas = $sumataxas + $lbl_valortaximp;
    
    echo '<tr><td>';
    echo $lbl_impuesto;
    echo '</td><td><input type="number" name="txttax[]" id="txttax[]" value="'.$lbl_valortax.'" onblur="javascript:calculartotal()" style="width: 80px;" />
    <input type="hidden" value="'.$coltax["idimpuesto"].'" name="hidimpuesto[]"/>
    </td></tr>';
}
?>
</table> 
    </div>
</div>    
<div class="row">
    <div class="col-sm-2">
        Base Imponible
    </div>
    <div class="col">
        <?php 
        $sumataxas = round($sumataxas, 2); 
        $bi = $dbimporte - $sumataxas;
        $bi = round($bi, 2);
        ?>
        <input type="text" name="txtimportebi" id="txtimportebi" required="" value="<?php echo $bi; ?>" onblur="javascript:calculartotal()" maxlength="10" style="width: 100%;"/>
    </div>
</div>
    
<div class="row">
    <div class="col-sm-2" align="left">
        Forma pago
    </div>
    <div class="col" align="left">
        <select name="lstformapago" style="width: 100%;" >
<?php
$ConsultaMySql= $mysqli->query("select * from ".$prefixsql."formaspago order by formapago");
while($col = mysqli_fetch_array($ConsultaMySql))
{
	
	if($col["id"] == $dbidfpago){$seleccionado = ' selected=""';}else{$seleccionado = '';}
	echo '<option value="'.$col["id"].'" '.$seleccionado.'>'.$col["formapago"].'</option>';
}
?>
		</select>
    </div>
</div>  
    
    
<div class="row">
    <div class="col-sm-2">
        Usuario
    </div>
    <div class="col">
        <select name="lstusuario" style="width: 100%;">
<?php
$ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."users where activo = '1' order by display");
	while($col = mysqli_fetch_array($ConsultaMySql))
	{
            if($col["id"] == $dbiduser){$seleccionado = ' selected=""';}else{$seleccionado = '';}
            echo '<option value="'.$col["id"].'" '.$seleccionado.'>'.$col["display"].'</option>';
        }

?>
    </select>
    </div>
</div>

</div>

<div id="tab_otros" style="display: none;">
<div class="row">
	<div class="col-sm-2" align="left">
		Empresa
	</div>
	<div class="col" align="left">
		<select name="lstempresas" id="lstempresas" style="width: 100%;">
			<option value="0">Seleccione empresa</option>
<?php


$ConsultaMySql= $mysqli->query("SELECT DISTINCT ".$prefixsql."tiendas.idempresa FROM ".$prefixsql."userstiendas, ".$prefixsql."tiendas WHERE ".$prefixsql."userstiendas.idtienda=".$prefixsql."tiendas.id and ".$prefixsql."userstiendas.iduser = '".$_COOKIE["lnxuserid"]."'");
while($col = mysqli_fetch_array($ConsultaMySql))
{	
    $sqlaux = $mysqli->query("select * from ".$prefixsql."empresas where id = '".$col["idempresa"]."' "); 
    $rowaux = mysqli_fetch_assoc($sqlaux);
    $dbrazonsocial = $rowaux["razonsocial"];
    if($dbidempresa == $col["idempresa"]){$seleccionado = ' selected=""';}else{$seleccionado = '';}
	echo '<option value="'.$col["idempresa"].'" '.$seleccionado.'>'.$dbrazonsocial.'</option>';
}		
?>
		</select>
	</div>
</div>
<div class="row">
	<div class="col-sm-2" align="left">
		Serie TPV
	</div>
	<div class="col" align="left">
<?php


if($dbidserie != '')
{
    echo '<select name="lstseries" id="lstseries" style="width: 100%;" >';
    $ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."series where tipo = 'TPV' and cv = '2' and idempresa = '".$dbidempresa."'");
$existe = $ConsultaMySql->num_rows;
if($existe == "0") 
    {echo '<option value="0">NO existen series</option>';}
    else
{
    if($form_lstseries == '0'){$seleccionado = ' selected=""';}else{$seleccionado = '';}
        echo '<option value="0" '.$seleccionado.'>Todas las series TPV</option>';}

    while($col = mysqli_fetch_array($ConsultaMySql))
    {
        if($dbidserie == $col["id"]){$seleccionado = ' selected=""';}else{$seleccionado = '';}
        echo '<option value="'.$col["id"].'" '.$seleccionado.'>'.$col["serie"].'</option>';
    }
    
    
    
    
}
else
{   
    echo '<select name="lstseries" id="lstseries" style="width: 100%;" disabled="">';
    echo '<option value="">Seleccione empresa</option>';
    
    
}
?>
		
			
		</select>
	</div>
</div>
<div class="row">
	<div class="col-sm-2" align="left">
		Tienda
	</div>
	<div class="col" align="left">
		
<?php

if($dbidempresa != '')
{
    
echo '<select name="lsttiendas" id="lsttiendas" style="width: 100%;" >';

$cnsprov = $mysqli->query("SELECT ".$prefixsql."userstiendas.id, ".$prefixsql."userstiendas.iduser, ".$prefixsql."userstiendas.idtienda, ".$prefixsql."tiendas.idempresa FROM ".$prefixsql."userstiendas, ".$prefixsql."tiendas WHERE ".$prefixsql."userstiendas.idtienda=".$prefixsql."tiendas.id and ".$prefixsql."tiendas.idempresa = '".$dbidempresa."' and ".$prefixsql."userstiendas.iduser ='".$_COOKIE["lnxuserid"]."'");
$existe = $cnsprov->num_rows;
if($existe == "0") 
    {echo '<option value="0">NO existen Tiendas</option>';}
    else
{
if($dbidtienda == '0'){$seleccionado = ' selected=""';}else{$seleccionado = '';}
echo '<option value="0" '.$seleccionado.'>Todas las tiendas</option>';}

while($col = mysqli_fetch_array($cnsprov))
{

    $sqlaux = $mysqli->query("select * from ".$prefixsql."tiendas where id = '".$col["idtienda"]."' "); 
    $rowaux = mysqli_fetch_assoc($sqlaux);
    $lbl_tienda = $rowaux["tienda"];
    if($dbidtienda == $col["idtienda"]){$seleccionado = ' selected=""';}else{$seleccionado = '';}
	echo '<option value="'.$col["idtienda"].'" '.$seleccionado.'>'.$lbl_tienda.'</option>';
	
}

}
else
{    
echo '<select name="lsttiendas" id="lsttiendas" style="width: 100%;" disabled="">';
    echo '<option value="">Seleccione empresa</option>';
}

?>

		</select>
	</div>
</div>
<div class="row">
	<div class="col-sm-2" align="left">
		Caja / Terminal
	</div>
	<div class="col" align="left">
<?php

if($dbidterminal != '')
{
    echo '<select name="lstterminal" id="lstterminal" style="width: 100%;" >';
    $cnsprov = $mysqli->query("select * from ".$prefixsql."pos_terminales where idtienda = '".$dbidtienda."' ");
if($dbidterminal == '0'){$seleccionado = ' selected=""';}else{$seleccionado = '';}
    echo '<option value="0" '.$seleccionado.'>Todos los terminales</option>';

    while($col = mysqli_fetch_array($cnsprov))
    {
       if($dbidterminal == $col["id"]){$seleccionado = ' selected=""';}else{$seleccionado = '';}
       echo '<option value="'.$col["id"].'" '.$seleccionado.'>'.$col["descripcion"].'</option>';
    }
    
}
else
{    
    echo '<select name="lstterminal" id="lstterminal" style="width: 100%;" disabled="">';
    echo '<option value="">Seleccione empresa</option>';
}
?>

		</select>
	</div>
</div>


</div>

<div class="row">
	<div class="col-sm-2" align="left">
		Notas
	</div>
	<div class="col" align="left">
	<b>¡Cuidado!</b> Si cambia algunos de los datos puede afectar a los cálculos de caja.
	</div>
</div>

<div align="center" class="rectangulobtnsguardar">

<input class="btnsubmit" name="btnguardar" onclick="validarform();" value="Guardar" type="button"> 

<?php
echo '<a class="btncancel" href="index.php?module=tpv&section=cajon&action=view&id='.$idmovimiento.'">Cancelar</a>';
?>

</div>
    
</form>