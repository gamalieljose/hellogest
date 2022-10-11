<link rel="stylesheet" href="scripts/jquery/jquery-ui-lnx.css">
<script type="text/javascript">
function validarform() 
{
    var valoridserie = document.getElementById('lstseries').value;
    
    if(valoridserie > '0')
    {
        document.getElementById("frmbuscar").submit(); 
    }
    else
    {
        alert("Seleccione una serie válida");
    }
    
    
    
}
</script>
<script type="text/javascript">
function muestra_tab_vr() 
{      
	document.getElementById('btn_tab_vr').className = 'btn_tab_sel';
	document.getElementById('btn_tab_vf').className = 'btn_tab';
        document.getElementById('tab_vr').style.display = 'inline';
	document.getElementById('tab_vf').style.display = 'none';
	
}
function muestra_tab_vf() 
{
    	document.getElementById('btn_tab_vr').className = 'btn_tab';
	document.getElementById('btn_tab_vf').className = 'btn_tab_sel';
	document.getElementById('tab_vr').style.display = 'none';
	document.getElementById('tab_vf').style.display = 'inline';
}
</script>
<script>

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
  
	$("#dpkfechadesde").datepicker({	
		dateFormat: 'dd/mm/yy',  
		firstDay: 1, 
		onSelect: function(dateText, inst) { 
		$("#dpkfechadesde_value").val(dateText);
		}
	});
	
	$("#dpkfechahasta").datepicker({	
		dateFormat: 'dd/mm/yy',  
		firstDay: 1, 
		onSelect: function(dateText, inst) { 
		$("#dpkfechahasta_value").val(dateText);
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
<?php
$fechahoy = date("d/m/Y");


$fechahasta = $fechahoy;

$f_fdesde = $_POST["dpkfechadesde"];
if($f_fdesde == ''){$fechadesde = $fechahoy;}else{$fechadesde = $f_fdesde;}

if($_POST["lstempresas"] > '0'){$form_idempresa = $_POST["lstempresas"];}else{$form_idempresa = '';}

$fano = substr($f_fdesde, 6, 4);  
$fmes = substr($f_fdesde, 3, 2);  
$fdia = substr($f_fdesde, 0, 2);  

$f_fdesde = $fano.'-'.$fmes.'-'.$fdia." 00:00:00";

$f_fhasta = $_POST["dpkfechahasta"];
if($f_fhasta == ''){$fechahasta = $fechahoy;}else{$fechahasta = $f_fhasta;}

$fano = substr($f_fhasta, 6, 4);  
$fmes = substr($f_fhasta, 3, 2);  
$fdia = substr($f_fhasta, 0, 2);  

$f_fhasta = $fano.'-'.$fmes.'-'.$fdia." 23:59:59";

$fidserie = $_POST["lstseries"];

if ($fidserie == '' || $fidserie == '0')
{ $sql_seriestpv = " idserie > '0' ";}
else
{ $sql_seriestpv = " idserie = '".$fidserie."'";}

$fidtienda = $_POST["lsttiendas"];
    if ($fidtienda == '' || $fidtienda == '0')
    { $sql_tienda = "";}
    else
    { $sql_tienda = " and idtienda = '".$fidtienda."'";}
    
$fidterminal = $_POST["lstterminal"];
    if ($fidterminal == '' || $fidterminal == '0')
    { $sql_terminal = "";}
    else
    { $sql_terminal = " and idterminal = '".$fidterminal."'";}    

?>
<form name="frmbuscar" id="frmbuscar" method="POST" action="index.php?module=tpv&section=mov">
<div class="tblbuscar">
<div class="row">
	<div class="col-sm-2" align="left">
		Fecha
	</div>
		<div class="col-sm-4" align="left">
			Fecha Desde </br>
			<input type="text" value="<?php echo $fechadesde; ?>" name="dpkfechadesde" id="dpkfechadesde" style="width: 100%;" maxlength="10" required pattern=".{10,10}" title="dd/mm/yyyy"/>
		</div>
		<div class="col-sm-4" align="left">
			Fecha Hasta </br>
			<input type="text" value="<?php echo $fechahasta; ?>" name="dpkfechahasta" id="dpkfechahasta" style="width: 100%;" maxlength="10" required pattern=".{10,10}" title="dd/mm/yyyy"/>
		</div>
</div>
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
    if($form_idempresa == $col["idempresa"]){$seleccionado = ' selected=""';}else{$seleccionado = '';}
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

$form_lstseries = $_POST["lstseries"];
if($form_lstseries != '')
{
    echo '<select name="lstseries" id="lstseries" style="width: 100%;" >';
    $ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."series where tipo = 'TPV' and cv = '2' and idempresa = '".$form_idempresa."'");
$existe = $ConsultaMySql->num_rows;
if($existe == "0") 
    {echo '<option value="0">NO existen series</option>';}
    else
{
    if($form_lstseries == '0'){$seleccionado = ' selected=""';}else{$seleccionado = '';}
        echo '<option value="0" '.$seleccionado.'>Todas las series TPV</option>';}

    while($col = mysqli_fetch_array($ConsultaMySql))
    {
        if($form_lstseries == $col["id"]){$seleccionado = ' selected=""';}else{$seleccionado = '';}
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
$form_tiendas = $_POST["lsttiendas"];
if($form_idempresa != '')
{
    
$data_fpago = array(); //array para los metodos de pago
    $data_ventas = array();
    $data_compras = array();
//$ConsultaMySql= $mysqli->query("SELECT DISTINCT ".$prefixsql."tiendas.idempresa FROM ".$prefixsql."userstiendas, ".$prefixsql."tiendas WHERE ".$prefixsql."userstiendas.idtienda=".$prefixsql."tiendas.id and ".$prefixsql."userstiendas.iduser = '".$_COOKIE["lnxuserid"]."'");
$cnsfpago = $mysqli->query("SELECT * from ".$prefixsql."formaspago order by formapago");
while($colfpago = mysqli_fetch_array($cnsfpago))
{
    $idfpago = $colfpago["id"];
    $data_fpago[$idfpago] = "0";
    $data_ventas[$idfpago] = "0";
    $data_compras[$idfpago] = "0";
}


$data_campocustom = array(); //array para los metodos de pago

    $cnsaux = $mysqli->query("select * from ".$prefixsql."tpv_cfg_cg where mostrarlist = '1' and tipo = 'float'");
    while($colcc = mysqli_fetch_array($cnsaux))
    {
        $campocustom = $colcc["campo"];
        $data_campocustom[$campocustom] = "0";
    }



                





    
echo '<select name="lsttiendas" id="lsttiendas" style="width: 100%;" >';

$cnsprov = $mysqli->query("SELECT ".$prefixsql."userstiendas.id, ".$prefixsql."userstiendas.iduser, ".$prefixsql."userstiendas.idtienda, ".$prefixsql."tiendas.idempresa FROM ".$prefixsql."userstiendas, ".$prefixsql."tiendas WHERE ".$prefixsql."userstiendas.idtienda=".$prefixsql."tiendas.id and ".$prefixsql."tiendas.idempresa = '".$form_idempresa."' and ".$prefixsql."userstiendas.iduser ='".$_COOKIE["lnxuserid"]."'");
$existe = $cnsprov->num_rows;
if($existe == "0") 
    {echo '<option value="0">NO existen Tiendas</option>';}
    else
{
if($form_tiendas == '0'){$seleccionado = ' selected=""';}else{$seleccionado = '';}
echo '<option value="0" '.$seleccionado.'>Todas las tiendas</option>';}

while($col = mysqli_fetch_array($cnsprov))
{

    $sqlaux = $mysqli->query("select * from ".$prefixsql."tiendas where id = '".$col["idtienda"]."' "); 
    $rowaux = mysqli_fetch_assoc($sqlaux);
    $lbl_tienda = $rowaux["tienda"];
    if($form_tiendas == $col["idtienda"]){$seleccionado = ' selected=""';}else{$seleccionado = '';}
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
		Caja
	</div>
	<div class="col" align="left">
<?php
$form_terminal = $_POST["lstterminal"];
if($form_terminal != '')
{
    echo '<select name="lstterminal" id="lstterminal" style="width: 100%;" >';
    $cnsprov = $mysqli->query("select * from ".$prefixsql."pos_terminales where idtienda = '".$form_tiendas."' ");
if($form_terminal == '0'){$seleccionado = ' selected=""';}else{$seleccionado = '';}
    echo '<option value="0" '.$seleccionado.'>Todos los terminales</option>';

    while($col = mysqli_fetch_array($cnsprov))
    {
       if($form_terminal == $col["id"]){$seleccionado = ' selected=""';}else{$seleccionado = '';}
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



<div align="center" class="rectangulobtnsguardar">

    <input class="btnsubmit" name="btnguardar" onclick="validarform();" value="Buscar" type="button"> 
    <input type="hidden" name="hbtnguardar" value="buscar" />
</div>

</form>











<div class="row grupotabs">
    <div class="col" align="left">
    <p>
        <a href="javascript:muestra_tab_vr()" id="btn_tab_vr" class="btn_tab_sel" >Vista por registros</a>
        <a href="javascript:muestra_tab_vf()" id="btn_tab_vf" class="btn_tab" >Vista por facturación</a>
    </p>
    </div>
    <div class="col" align="right">
<?php
if($_POST["hbtnguardar"] != '' )
{
    echo '<form name="formprint" method="POST" action="index.php?module=tpv&section=movprint">' ;
    echo '<input type="submit" class="btnapply" value="Imprimir"/>';
    
    echo '<input type="hidden" value="'.$_POST["dpkfechadesde"].'" name="dpkfechadesde" />';
    echo '<input type="hidden" value="'.$_POST["dpkfechahasta"].'" name="dpkfechahasta" />';
    echo '<input type="hidden" value="'.$_POST["lstseries"].'" name="lstseries" />';
    echo '<input type="hidden" value="'.$_POST["lsttiendas"].'" name="lsttiendas" />';
    echo '<input type="hidden" value="'.$_POST["lstterminal"].'" name="lstterminal" />';
    
    
    
    
    
    echo '</form>';
}
 ?>
    </div>
</div>

<div id="tab_vr">
<table width="100%">
<tr class="maintitle">
	<td width="70"></td>
	<td width="80">Tipo</td>
	<td width="30"> </td>
	<td>Codigo</td>
	<td>Fecha</td>
	<td>Tercero / Motivo</td>
        <td>F. Pago</td>
	<td>Ventas</td>
        <td>Compras</td> 
</tr>
<?php

if($_POST["hbtnguardar"] != '' )
{

$totalventas = "0";
$totalcompras = "0";        
$totalventasreal = "0";

    
$cnssql = "select * from ".$prefixsql."tpv_pagos where ".$sql_seriestpv.$sql_tienda.$sql_terminal." and (fecha >= '".$f_fdesde."' and fecha <= '".$f_fhasta."') order by fecha";

$ConsultaMySql= $mysqli->query($cnssql);
while($col = mysqli_fetch_array($ConsultaMySql))
{
     $url_btneditar = '#';
    
    $xvartemp = explode(" ",$col["fecha"]);
    $xvartemp2 = explode("-",$xvartemp[0]);
    $lblfecha = $xvartemp2[2]."/".$xvartemp2[1]."/".$xvartemp2[0];
    
    $sqlaux = $mysqli->query("select * from ".$prefixsql."formaspago where id = '".$col["idfpago"]."' ");
    $rowaux = mysqli_fetch_assoc($sqlaux);
    $lbl_fpago = $rowaux["formapago"]; 
    
    
    if ($col["tipo"] == 'TCKT')
    {
        $lbl_tipopago = 'Ticket';
        $jus_movimiento = "left"; 
        $lbl_movimiento = '<i class="fas fa-sign-in-alt" alt="Entrada" title="Entrada"></i>';
		
		$url_btneditar = "index.php?module=tpv&section=tpv&action=view&id=".$col["idtpv"];
        
        $sqlaux = $mysqli->query("select * from ".$prefixsql."tpv where id = '".$col["idtpv"]."' ");
        $rowaux = mysqli_fetch_assoc($sqlaux);
        $lbl_codigo = $rowaux["codigo"]; 
        $dbidtercero = $rowaux["idtercero"]; 
        
        $sqlaux = $mysqli->query("select * from ".$prefixsql."terceros where id = '".$dbidtercero."' ");
        $rowaux = mysqli_fetch_assoc($sqlaux);
        $lbl_tercero = $rowaux["razonsocial"]; 
        
        $lbl_ventas = $col["importe"];
        $lbl_compras = '0';
         
                    
    }
    if ($col["tipo"] == 'TPAGO')
    {
        $lbl_tipopago = 'Pago';
        $jus_movimiento = "left"; 
        $lbl_movimiento = '<i class="fas fa-sign-in-alt" alt="Entrada" title="Entrada"></i>';
		
		$url_btneditar = "index.php?module=tpv&section=tpv&action=view&id=".$col["idtpv"];
        
        $sqlaux = $mysqli->query("select * from ".$prefixsql."tpv where id = '".$col["idtpv"]."' ");
        $rowaux = mysqli_fetch_assoc($sqlaux);
        $lbl_codigo = $rowaux["codigo"]; 
        $dbidtercero = $rowaux["idtercero"]; 
        
        $sqlaux = $mysqli->query("select * from ".$prefixsql."terceros where id = '".$dbidtercero."' ");
        $rowaux = mysqli_fetch_assoc($sqlaux);
        $lbl_tercero = $rowaux["razonsocial"]; 
        
        $lbl_ventas = $col["importe"];
        $lbl_compras = '0';
    }
    if ($col["tipo"] == 'MVIN')
    {
        $lbl_tipopago = 'Movimiento';
        $jus_movimiento = "left"; 
        $lbl_movimiento = '<i class="fas fa-sign-in-alt" alt="Entrada" title="Entrada"></i>';
        
		$url_btneditar = "index.php?module=tpv&section=cajon&action=view&id=".$col["idtpv"];
		
        $sqlaux = $mysqli->query("select * from ".$prefixsql."tpv_cajon where id = '".$col["idtpv"]."' ");
        $rowaux = mysqli_fetch_assoc($sqlaux);
        $lbl_codigo = $rowaux["codigo"]; 
        $dbidtercero = $rowaux["idtercero"]; 
        if ($dbidtercero == '0')
        {
            $lbl_tercero = $rowaux["motivo"];
        }
        else
        {
            $sqlaux = $mysqli->query("select * from ".$prefixsql."terceros where id = '".$dbidtercero."' ");
            $rowaux = mysqli_fetch_assoc($sqlaux);
            $lbl_tercero = $rowaux["razonsocial"]; 
        }
        
        $lbl_ventas = $col["importe"];
        $lbl_compras = '0';
        
    }
    if ($col["tipo"] == 'MVOUT')
    {
        $lbl_tipopago = 'Movimiento';
        $jus_movimiento = "right"; 
        $lbl_movimiento = '<i class="fas fa-external-link-alt" alt="Salida" title="Salida"></i>';
        
		$url_btneditar = "index.php?module=tpv&section=cajon&action=view&id=".$col["idtpv"];
		
        $sqlaux = $mysqli->query("select * from ".$prefixsql."tpv_cajon where id = '".$col["idtpv"]."' ");
        $rowaux = mysqli_fetch_assoc($sqlaux);
        $lbl_codigo = $rowaux["codigo"];
        $dbidtercero = $rowaux["idtercero"]; 
        if ($dbidtercero == '0')
        {
            $lbl_tercero = $rowaux["motivo"];
        }
        else
        {
            $sqlaux = $mysqli->query("select * from ".$prefixsql."terceros where id = '".$dbidtercero."' ");
            $rowaux = mysqli_fetch_assoc($sqlaux);
            $lbl_tercero = $rowaux["razonsocial"]; 
        }
        
        $lbl_ventas = '0';
        $lbl_compras = $col["importe"];
                    
    }
    
    if ($color == '1')
    {
            $color = '2';
            $pintacolor = "listacolor2";
    }
    else
    {
            $color = '1';
            $pintacolor = "listacolor1";
    }
    
    $lbl_ventas =round($lbl_ventas, 2);
    $lbl_ventas = number_format($lbl_ventas, 2, ".", ",");
    
    $lbl_compras =round($lbl_compras, 2);
    $lbl_compras = number_format($lbl_compras, 2, ".", ",");
    
echo "<tr class=\"".$pintacolor."\" onmouseover=\"this.className = 'listacolorsobre'\" onmouseout=\"this.className = '".$pintacolor."'\">";
	
echo '<td><a href="'.$url_btneditar.'" class="btnedit">Editar</a></td>';
echo '<td>'.$lbl_tipopago.'</td>';
echo '<td align="'.$jus_movimiento.'">'.$lbl_movimiento.'</td>';
echo '<td>'.$lbl_codigo.'</td>';
echo '<td>'.$lblfecha.'</td>';

echo '<td>'.$lbl_tercero.'</td>';
echo '<td>'.$lbl_fpago.'</td>';
echo '<td align="right">'.$lbl_ventas.'</td>';
echo '<td align="right">'.$lbl_compras.'</td>';
echo '</tr>';
	
}


}

?>

</table>


<p>&nbsp;</p>

<?php

$sqlaux = $mysqli->query("select sum(importe) as importe from ".$prefixsql."tpv_pagos where (tipo = 'TCKT' or tipo = 'TPAGO' or tipo = 'MVIN') and ".$sql_seriestpv.$sql_tienda." and (fecha >= '".$f_fdesde."' and fecha <= '".$f_fhasta."') "); 
$rowaux = mysqli_fetch_assoc($sqlaux);
$totalventas = $rowaux["importe"];

$sqlaux = $mysqli->query("select sum(importe) as importe from ".$prefixsql."tpv_pagos where tipo = 'MVOUT' and ".$sql_seriestpv.$sql_tienda.$sql_terminal." and (fecha >= '".$f_fdesde."' and fecha <= '".$f_fhasta."') "); 
$rowaux = mysqli_fetch_assoc($sqlaux);
$totalcompras = $rowaux["importe"];



?>


<table width="100%">
<tr class="maintitle">
    <td>Concepto</td>
    <td>Importe</td>
    <td width="30">&nbsp;</td>
<?php    
$sqlfpagos= $mysqli->query("select * from ".$prefixsql."formaspago order by formapago");
while($colfp = mysqli_fetch_array($sqlfpagos))
{
    echo '<td>'.$colfp["formapago"].'</td>';
}
?>
</tr>
<?php
$totalventas =round($totalventas, 2);
$totalventas = number_format($totalventas, 2, ".", ",");

?>
<tr>
    <td>Total Ventas</td>
    <td align="right"><?php echo $totalventas; ?></td>
    <td width="30">&nbsp;</td>
<?php    
$cnssqlpagos = $mysqli->query("select * from ".$prefixsql."formaspago order by formapago");
while($colfpago = mysqli_fetch_array($cnssqlpagos))
{
    $idfpago = $colfpago["id"];
        
    $sqlaux = $mysqli->query("select sum(importe) as importe from ".$prefixsql."tpv_pagos where idfpago = '".$idfpago."' and ".$sql_seriestpv.$sql_tienda.$sql_terminal." and (tipo = 'TCKT' or tipo = 'TPAGO' or tipo = 'MVIN') and (fecha >= '".$f_fdesde."' and fecha <= '".$f_fhasta."') "); 
    $rowaux = mysqli_fetch_assoc($sqlaux);
    $importefpago = $rowaux["importe"];
      
    
    $importefpago = round($importefpago, 2);
    
    $pagoventas[$idfpago] = $importefpago;
    
    $importefpago =round($importefpago, 2);
    $importefpago = number_format($importefpago, 2, ".", ",");
    
    echo '<td  align="right">'.$importefpago.'</td>';
}
?>
</tr>
<?php
$totalcompras =round($totalcompras, 2);
$totalcompras = number_format($totalcompras, 2, ".", ",");
?>
<tr>
    <td>Total Compras</td>
    <td  align="right"><?php echo $totalcompras; ?></td>
    <td width="30">&nbsp;</td>
<?php    
$cnssqlpagos = $mysqli->query("select * from ".$prefixsql."formaspago order by formapago");
while($colfpago = mysqli_fetch_array($cnssqlpagos))
{
    $idfpago = $colfpago["id"];
        
    $sqlaux = $mysqli->query("select sum(importe) as importe from ".$prefixsql."tpv_pagos where idfpago = '".$idfpago."' and ".$sql_seriestpv.$sql_tienda.$sql_terminal." and (tipo = 'MVOUT') and (fecha >= '".$f_fdesde."' and fecha <= '".$f_fhasta."') "); 
    $rowaux = mysqli_fetch_assoc($sqlaux);
    $importefpago = $rowaux["importe"];
      
    
    $importefpago = round($importefpago, 2);
    
    $pagocompras[$idfpago] = $importefpago;
    $importefpago =round($importefpago, 2);
    $importefpago = number_format($importefpago, 2, ".", ",");
    echo '<td  align="right">'.$importefpago.'</td>';
}
?>
</tr>

<?php
$total_caja = $totalventas - $totalcompras;

$total_caja =round($total_caja, 2);
$total_caja = number_format($total_caja, 2, ".", ",");
?>
<tr class="maintitle">
    <td>Total Caja</td>
    <td  align="right"><?php echo $total_caja; ?></td>
    <td width="30">&nbsp;</td>
<?php    
$cnssqlpagos = $mysqli->query("select * from ".$prefixsql."formaspago order by formapago");
while($colfpago = mysqli_fetch_array($cnssqlpagos))
{
    $idfpago = $colfpago["id"];
        
     $importefpago = $pagoventas[$idfpago] - $pagocompras[$idfpago];
    
    $importefpago = round($importefpago, 2);
    
     $importefpago =round($importefpago, 2);
    $importefpago = number_format($importefpago, 2, ".", ",");   
    echo '<td  align="right">'.$importefpago.'</td>';
}
?>
</tr>


</table>

</div>







<div id="tab_vf" style="display: none;">
<table width="100%">
<tr class="maintitle">
    <td width="70"></td>
    <td width="80">Tipo</td>
    <td width="30"> </td>
    <td>Codigo</td>
    <td>Fecha</td>
    <td>Tercero / Motivo</td>
    <td>F. Pago</td>
    <td>Pagado</td>
    <td>Ventas</td>
    <td>Compras</td>
<?php    
$cnssqlpagos = $mysqli->query("select * from ".$prefixsql."tpv_cfg_cg where mostrarlist = '1' ");
while($colcampos = mysqli_fetch_array($cnssqlpagos))
{   
    $idcampocustom = $colcampos["id"];
    $sumacampocustom[$idcampocustom] = '0';
    echo '<td>'.$colcampos["campo"].'</td>';
}
?>
</tr>
<?php

$lbl_totalventas = '0';
$lbl_totalpagado = '0';
$lbl_totalcompras = '0';


$cnssql = "select 'Ticket' as tipo, id, codigo, fecha from ".$prefixsql."tpv where codigoint > '0' and (fecha >= '".$f_fdesde."' and fecha <= '".$f_fhasta."') union all select 'Movimiento' as tipo, id, codigo, fecha from ".$prefixsql."tpv_cajon where (fecha >= '".$f_fdesde."' and fecha <= '".$f_fhasta."') order by fecha ";
$cnssqlpagos = $mysqli->query($cnssql);
while($col = mysqli_fetch_array($cnssqlpagos))
{        
    
    
    $xvartemp = explode(" ",$col["fecha"]);
    $xvartemp2 = explode("-",$xvartemp[0]);
    $lblfecha = $xvartemp2[2]."/".$xvartemp2[1]."/".$xvartemp2[0];
    
    if ($col["tipo"] == 'Ticket')
    {
        $lbl_tipopago = 'Ticket';
        $jus_movimiento = "left"; 
        $lbl_movimiento = '<i class="fas fa-sign-in-alt" alt="Entrada" title="Entrada"></i>';
        
        $lbl_fpago = '';
        
		$url_btneditar = "index.php?module=tpv&section=tpv&action=view&id=".$col["id"];
        
        $cnsmovtax= $mysqli->query("select * from ".$prefixsql."tpv_lineas_tax where idtpv = '".$col["id"]."'");
        while($colmovtax = mysqli_fetch_array($cnsmovtax))
        {
            $idtax = $colmovtax["idtax"];
              
                $importeanterior = $v_importetax[$idtax];
                $v_importetax[$idtax] = $importeanterior + $colmovtax["importe"];
            
        }
                
                
        $sqlaux = $mysqli->query("select * from ".$prefixsql."tpv where id = '".$col["id"]."' ");
        $rowaux = mysqli_fetch_assoc($sqlaux);
        $dbidtercero = $rowaux["idtercero"];
        $dbidfpago = $rowaux["idfpago"];
        
                
        $sqlaux = $mysqli->query("select * from ".$prefixsql."terceros where id = '".$dbidtercero."' ");
        $rowaux = mysqli_fetch_assoc($sqlaux);
        $lbl_tercero = $rowaux["razonsocial"];
        
        
        //Calculamos por cunto se valora el ticket
        $sqlaux = $mysqli->query("select sum(importe) as importe from ".$prefixsql."tpv_lineas where idtpv = '".$col["id"]."' ");
        $rowaux = mysqli_fetch_assoc($sqlaux);
        $dbimportelineas = $rowaux["importe"];
        
        $sqlaux = $mysqli->query("select sum(importe) as importe from ".$prefixsql."tpv_lineas_tax where idtpv = '".$col["id"]."' ");
        $rowaux = mysqli_fetch_assoc($sqlaux);
        $dbimportelineastax = $rowaux["importe"];
        
        $sqlaux = $mysqli->query("select sum(importe) as importe from ".$prefixsql."tpv_pagos where idtpv = '".$col["id"]."' and (tipo = 'TCKT' or tipo = 'TPAGO') ");
        $rowaux = mysqli_fetch_assoc($sqlaux);
        $dbpagado = $rowaux["importe"];
        
        $lbl_pagado = $dbpagado;
        $lbl_ventas = $dbimportelineas + $dbimportelineastax;
        $lbl_compras = '0';
    }
    
     if ($col["tipo"] == 'Movimiento')
    {
        $sqlaux = $mysqli->query("select * from ".$prefixsql."tpv_cajon where id = '".$col["id"]."' ");
        $rowaux = mysqli_fetch_assoc($sqlaux);
        $dbtipomov = $rowaux["tipomov"];
        $dbidtercero = $rowaux["idtercero"];
        $dbmotivo = $rowaux["motivo"];
        $dbidfpago = $rowaux["idfpago"];
        $dbimporte = $rowaux["importe"];
 
        
		$url_btneditar = "index.php?module=tpv&section=cajon&action=view&id=".$col["id"];
		
        $sqlaux = $mysqli->query("select * from ".$prefixsql."formaspago where id = '".$dbidfpago."' ");
        $rowaux = mysqli_fetch_assoc($sqlaux);
        $lbl_fpago = $rowaux["formapago"];
        
        if($dbidtercero == '0')
        {
            $lbl_tercero = $dbmotivo; 
        }
        else
        {
            $sqlaux = $mysqli->query("select * from ".$prefixsql."terceros where id = '".$dbidtercero."' ");
            $rowaux = mysqli_fetch_assoc($sqlaux);
            $lbl_tercero = $rowaux["razonsocial"];
        }
        
        if($dbtipomov == 'IN')
        {
            $lbl_tipopago = 'Movimiento';
            $jus_movimiento = "left"; 
            $lbl_movimiento = '<i class="fas fa-sign-in-alt" alt="Entrada" title="Entrada"></i>';
            
            $lbl_pagado = $dbimporte;
            $lbl_ventas = $dbimporte;
            $lbl_compras = '0';
            
            $cnssqltax = $mysqli->query("select * from ".$prefixsql."tpv_cajon_tax where idcajon = '".$col["id"]."'");
            while($coltax = mysqli_fetch_array($cnssqltax))
            {
                $idtax = $coltax["idtax"];
                

                $importeanterior = $v_importetax[$idtax];

                $v_importetax[$idtax] = $importeanterior + $coltax["importe"];

            }
        }
        if($dbtipomov == 'OUT')
        {
            $lbl_tipopago = 'Movimiento';
            $jus_movimiento = "right"; 
            $lbl_movimiento = '<i class="fas fa-external-link-alt" alt="Salida" title="Salida"></i>';
            
            $lbl_ventas = '0';
            $lbl_compras = $dbimporte;
            $lbl_pagado = $dbimporte * (-1);
            
            $cnssqltax = $mysqli->query("select * from ".$prefixsql."tpv_cajon_tax where idcajon = '".$col["id"]."' ");
            while($coltax = mysqli_fetch_array($cnssqltax))
            {
                $idtax = $coltax["idtax"];
                $importeanterior = $c_importetax[$idtax];
                
                $c_importetax[$idtax] = $importeanterior + $coltax["importe"];
            }
        }
        
        
    }
    
    
    
    if ($color == '1')
    {
            $color = '2';
            $pintacolor = "listacolor2";
    }
    else
    {
            $color = '1';
            $pintacolor = "listacolor1";
    }
    
    $lbl_ventas =round($lbl_ventas, 2);
    $lbl_ventas = number_format($lbl_ventas, 2, ".", ",");
    
    $lbl_compras =round($lbl_compras, 2);
    $lbl_compras = number_format($lbl_compras, 2, ".", ",");
    
    $lbl_pagado =round($lbl_pagado, 2);
    $lbl_pagado = number_format($lbl_pagado, 2, ".", ",");
    
    echo "<tr class=\"".$pintacolor."\" onmouseover=\"this.className = 'listacolorsobre'\" onmouseout=\"this.className = '".$pintacolor."'\">";

    echo '<td width="70"><a href="'.$url_btneditar.'" class="btnedit">Editar</a></td>';
    echo '<td width="80">'.$lbl_tipopago.'</td>';
    echo '<td width="30" align="'.$jus_movimiento.'">'.$lbl_movimiento.'</td>';
    echo '<td>'.$col["codigo"].'</td>';
    echo '<td>'.$lblfecha.'</td>';
    echo '<td>'.$lbl_tercero.'</td>';
    echo '<td>'.$lbl_fpago.'</td>';
    echo '<td align="right">'.$lbl_pagado.'</td>';
    echo '<td align="right">'.$lbl_ventas.'</td>';
    echo '<td align="right">'.$lbl_compras.'</td>';

    
    $lbl_totalventas = $lbl_totalventas + $lbl_ventas;
    $lbl_totalpagado = $lbl_totalpagado + $lbl_pagado;
    $lbl_totalcompras = $lbl_totalcompras + $lbl_compras;
    
    
    
    
    
    $cnssqlcampos = $mysqli->query("select * from ".$prefixsql."tpv_cfg_cg where mostrarlist = '1' ");
    while($colcampos = mysqli_fetch_array($cnssqlcampos))
    {   

        if ($col["tipo"] == 'Ticket')
        {
            $sqlaux = $mysqli->query("select * from ".$prefixsql."tpv_campos where idtpv = '".$col["id"]."' and campo = '".$colcampos["campo"]."' ");
            $rowaux = mysqli_fetch_assoc($sqlaux);
            $dbcampocustomfloat = $rowaux["valor"];
            
            if($colcampos["tipo"] == 'float')
            {
                $alinearcampocustom = "right";
                $idcampocustom = $colcampos["id"];
                $sumacampocustom[$idcampocustom] = $sumacampocustom[$idcampocustom] + $dbcampocustomfloat;
                
            }
            else
            {
                $alinearcampocustom = "left";
            }
        }
        else
        {
            $dbcampocustomfloat = '';
        }
        
        echo '<td align="'.$alinearcampocustom.'">'.$dbcampocustomfloat.'</td>';
    }

    echo '</tr>';
    
    
    
}
?>
</table>
<p></p>

<div style="max-width: 400px;">
<table width="100%">
<tr class="maintitle">
    <td>Concepto</td>
    <td>Importe</td>
<?php
//Impuestos de la serie escogida
$ssql = "SELECT * from ".$prefixsql."impuestosrules where idserie = '".$fidserie."' order by orden";
$ConsultaMySql= $mysqli->query($ssql);

while($coltax = mysqli_fetch_array($ConsultaMySql))
{
    $sqlaux = $mysqli->query("select * from ".$prefixsql."impuestos where id = '".$coltax["idimpuesto"]."' "); 
    $rowaux = mysqli_fetch_assoc($sqlaux);
    $lbl_impuesto = $rowaux["impuesto"];
    
    echo '<td>'.$lbl_impuesto.'</td>';
    
}

?>
</tr>
<tr>
    <td>Total Ventas</td>
    <td align="right">
<?php 
$lbl_totalventas =round($lbl_totalventas, 2);
$lbl_xtotalventas = number_format($lbl_totalventas, 2, ".", ","); 
echo $lbl_xtotalventas; 
?>
    </td>
<?php
//Impuestos de la serie escogida
$ssql = "SELECT * from ".$prefixsql."impuestosrules where idserie = '".$fidserie."' order by orden";
$ConsultaMySql= $mysqli->query($ssql);

while($coltax = mysqli_fetch_array($ConsultaMySql))
{
    $idtax = $coltax["idimpuesto"];   
    $lbl_impuesto = round($v_importetax[$idtax], 2);
    
    echo '<td align="right">'.$lbl_impuesto.'</td>';
    
}

?>
</tr>
<tr>
    <td>Total Pagado</td>
    <td align="right">
<?php 
$lbl_totalpagado =round($lbl_totalpagado, 2);
$lbl_totalpagado = number_format($lbl_totalpagado, 2, ".", ",");
echo $lbl_totalpagado; 
?>
    </td>
<?php
//Impuestos de la serie escogida
$ssql = "SELECT * from ".$prefixsql."impuestosrules where idserie = '".$fidserie."' order by orden";
$ConsultaMySql= $mysqli->query($ssql);

while($coltax = mysqli_fetch_array($ConsultaMySql))
{
        
    echo '<td>&nbsp;</td>';
    
}

?>
</tr>
<tr>
    <td>Total Compras</td>
    <td align="right">
<?php
$lbl_totalcompras =round($lbl_totalcompras, 2);
$lbl_xtotalcompras = number_format($lbl_totalcompras, 2, ".", ",");
echo $lbl_xtotalcompras; 
?>
    </td>
<?php
//Impuestos de la serie escogida
$ssql = "SELECT * from ".$prefixsql."impuestosrules where idserie = '".$fidserie."' order by orden";
$ConsultaMySql= $mysqli->query($ssql);

while($coltax = mysqli_fetch_array($ConsultaMySql))
{
    $idtax = $coltax["idimpuesto"];   
    $lbl_impuesto = round($c_importetax[$idtax], 2);
    
    echo '<td align="right">'.$lbl_impuesto.'</td>';
    
}

?>
</tr>
<?php
$lbl_total = $lbl_totalventas - $lbl_totalcompras;
$lbl_total =round($lbl_total, 2);
$lbl_total = number_format($lbl_total, 2, ".", ",");
?>
<tr class="maintitle">
    <td>Total</td>
    <td align="right"><?php echo $lbl_total; ?></td>
<?php
//Impuestos de la serie escogida
$ssql = "SELECT * from ".$prefixsql."impuestosrules where idserie = '".$fidserie."' order by orden";
$ConsultaMySql= $mysqli->query($ssql);

while($coltax = mysqli_fetch_array($ConsultaMySql))
{
    $idtax = $coltax["idimpuesto"];
    $lbl_impuesto = $v_importetax[$idtax] - $c_importetax[$idtax];
    $lbl_impuesto = round($lbl_impuesto, 2);
    echo '<td align="right">'.$lbl_impuesto.'</td>';
    
}

?>
    
</tr>
<?php
$cnssqlcampos = $mysqli->query("select * from ".$prefixsql."tpv_cfg_cg where mostrarlist = '1' and tipo = 'float'");
while($colcampos = mysqli_fetch_array($cnssqlcampos))
{ 
    $idcampocustom = $colcampos["id"];
    echo '<tr>';
    echo '<td>Total '.$colcampos["campo"].'</td>';
    $lbl_campocustom = $sumacampocustom[$idcampocustom];
    $lbl_campocustom =round($lbl_campocustom, 2);
    $lbl_campocustom = number_format($lbl_campocustom, 2, ".", ",");
    
    echo '<td align="right">'.$lbl_campocustom.'</td>';
    echo '</tr>';
}
?>
</table>
</div>

</div>
