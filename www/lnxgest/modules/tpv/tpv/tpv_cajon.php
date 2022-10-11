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
    $idtpv = $_GET["id"];
    $fechahoy = date("d/m/Y");
    
$sqlaux = $mysqli->query("select * from ".$prefixsql."tpv where id = '".$idtpv."' "); 
$rowaux = mysqli_fetch_assoc($sqlaux);
$dbidterminal = $rowaux["idterminal"];

$dbidtienda = $rowaux["idtienda"];
$dbidterminal = $rowaux["idterminal"];
$dbidserie = $rowaux["idserie"];

   
    
?>
<form name="frmcajon" method="POST" action="index.php?module=tpv&section=tpv&action=cajonsave">
    <input type="hidden" name="hidtpv" value="<?php echo $idtpv; ?>" />
    <input type="hidden" name="haccion" value="new" />
    
    <input type="hidden" name="hidterminal" value="<?php echo $dbidterminal; ?>" />
    <input type="hidden" name="hidtienda" value="<?php echo $dbidtienda; ?>" />
    <input type="hidden" name="hidserie" value="<?php echo $dbidserie; ?>" />


<div class="row">
    <div class="col maintitle">
        Nuevo movimiento
    </div>
</div>
<div class="row grupotabs">
    <p>
        <a href="javascript:muestra_tab_principal()" id="btn_tab_principal" class="btn_tab_sel" >Movimiento</a>
        <a href="javascript:muestra_tab_otros()" id="btn_tab_otros" class="btn_tab" >Info</a>
    </p>
</div>
    
<div id="tab_principal">
<div class="row">
    <div class="col-sm-2">
        Fecha
    </div>
    <div class="col">
        <?php echo $fechahoy; ?>
    </div>
</div>
<div class="row">
    <div class="col-sm-2" align="left">
        <label><input type="checkbox" value="YES" name="chktercero" /> Tercero </label>
    </div>
    <div class="col" align="left">
<div id="div_buscatercero" style="display:none;">
<input type="text" value="" name="txttercero" id="txttercero" maxlength="50" placeholder="Escriba el nombre a buscar" class="campoencoger"/></br> 
</div>
<a href="javascript:mostrar();"><img src="img/buscar.jpg"/></a>
<?php
	//seleciona cliente
	
	echo '<select name="lsttercero" id="lsttercero" style="width: calc(100% - 230px);">';
	
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
        <label><input type="radio" name="optmovimiento" value ="IN" /> Entrada de dinero</label> </br>
        <label><input type="radio" name="optmovimiento" value ="OUT" checked=""/> Salida de dinero</label>
    </div>
</div>
<div class="row">
    <div class="col-sm-2">
        Motivo
    </div>
    <div class="col">
        <input type="text" value="" name="txtmotivo" required="" maxlength="50" style="width: 100%;"/>
    </div>
</div>
<div class="row">
    <div class="col-sm-2">
        Importe
    </div>
    <div class="col">
        <input type="text" value="0" name="txtimporte" id="txtimporte" required="" onblur="javascript:calcularbi()" maxlength="10" style="width: 100%;"/>
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
    
    
    echo '<tr><td>';
    echo $lbl_impuesto;
    echo '</td><td><input type="number" name="txttax[]" id="txttax[]" value="'.$coltax["valor"].'" onblur="javascript:calculartotal()" style="width: 80px;" />
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
        <input type="text" value="0" name="txtimportebi" id="txtimportebi" required="" value="0" onblur="javascript:calculartotal()" maxlength="10" style="width: 100%;"/>
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
	echo '<option value="'.$col["id"].'">'.$col["formapago"].'</option>';
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
            if($col["id"] == $_COOKIE["lnxuserid"]){$seleccionado = ' selected=""';}else{$seleccionado = '';}
            echo '<option value="'.$col["id"].'" '.$seleccionado.'>'.$col["display"].'</option>';
        }

?>
    </select>
    </div>
</div>

</div>


    
<div id="tab_otros" style="display: none;">
<?php
$sqlaux = $mysqli->query("select * from ".$prefixsql."series where id = '".$dbidserie."' "); 
$rowaux = mysqli_fetch_assoc($sqlaux);
$dbidempresa = $rowaux["idempresa"];  
$lbl_serie = $rowaux["serie"]; 

$sqlaux = $mysqli->query("select * from ".$prefixsql."empresas where id = '".$dbidempresa."' "); 
$rowaux = mysqli_fetch_assoc($sqlaux);
$lbl_empresa = $rowaux["razonsocial"]; 

$sqlaux = $mysqli->query("select * from ".$prefixsql."tiendas where id = '".$dbidtienda."' "); 
$rowaux = mysqli_fetch_assoc($sqlaux);
$lbl_tienda = $rowaux["tienda"]; 

$sqlaux = $mysqli->query("select * from ".$prefixsql."pos_terminales where id = '".$dbidterminal."' "); 
$rowaux = mysqli_fetch_assoc($sqlaux);
$lbl_terminal = $rowaux["descripcion"]; 


?>
<div class="row">
    <div class="col-sm-2" align="left">
        Empresa
    </div>
    <div class="col" align="left">
        <?php echo $lbl_empresa; ?>
    </div>
</div>
<div class="row">
    <div class="col-sm-2" align="left">
        Serie TPV
    </div>
    <div class="col" align="left">
        <?php echo $lbl_serie; ?>
    </div>
</div>
<div class="row">
    <div class="col-sm-2" align="left">
        Tienda
    </div>
    <div class="col" align="left">
        <?php echo $lbl_tienda; ?>
    </div>
</div>
<div class="row">
    <div class="col-sm-2" align="left">
        Caja / Terminal
    </div>
    <div class="col" align="left">
        <?php echo $lbl_terminal; ?>
    </div>
</div>
</div>
    
    
<div align="center" class="rectangulobtnsguardar">

<input class="btnsubmit" name="btnguardar" value="Guardar" type="submit"> 

<?php
echo '<a class="btncancel" href="index.php?module=tpv&section=tpv&action=view&id='.$idtpv.'">Cancelar</a>';
?>

</div>
    
</form>