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


<script type="text/javascript">
function mutiplicar() {
m1 = document.getElementById("txtunidades").value;
m2 = document.getElementById("txtprecio").value;
m3 = document.getElementById("txtdto").value;
r = m1*m2;
rdto = (r*m3)/100;
r = r - rdto;
document.getElementById("txtimporte").value = Number(r).toFixed(2);
}
</script>


<link rel="stylesheet" href="scripts/jquery/jquery-ui-lnx.css">
<script src="scripts/jquery/jquery-2.1.1.js"></script>
<script src="scripts/jquery/jquery-ui.js"></script>

<script type="text/javascript">
function muestra_tab_dd() 
{
	document.getElementById('tab_dd').style.display = 'inline';
	document.getElementById('tab_p').style.display = 'none';
	document.getElementById('tab_dt').style.display = 'none';
	document.getElementById('tab_op').style.display = 'none';
	
	document.getElementById('btn_tab_dd').className = 'btn_tab_sel';
	document.getElementById('btn_tab_p').className = 'btn_tab';
	document.getElementById('btn_tab_dt').className = 'btn_tab';
	document.getElementById('btn_tab_op').className = 'btn_tab';
}
function muestra_tab_p() 
{
	document.getElementById('tab_dd').style.display = 'none';
	document.getElementById('tab_p').style.display = 'inline';
	document.getElementById('tab_dt').style.display = 'none';
	document.getElementById('tab_op').style.display = 'none';
	
	document.getElementById('btn_tab_dd').className = 'btn_tab';
	document.getElementById('btn_tab_p').className = 'btn_tab_sel';
	document.getElementById('btn_tab_dt').className = 'btn_tab';
	document.getElementById('btn_tab_op').className = 'btn_tab';
}
function muestra_tab_dt() 
{
	document.getElementById('tab_dd').style.display = 'none';
	document.getElementById('tab_p').style.display = 'none';
	document.getElementById('tab_dt').style.display = 'inline';
	document.getElementById('tab_op').style.display = 'none';
	
	document.getElementById('btn_tab_dd').className = 'btn_tab';
	document.getElementById('btn_tab_p').className = 'btn_tab';
	document.getElementById('btn_tab_dt').className = 'btn_tab_sel';
	document.getElementById('btn_tab_op').className = 'btn_tab';
}
function muestra_tab_op() 
{
	document.getElementById('tab_dd').style.display = 'none';
	document.getElementById('tab_p').style.display = 'none';
	document.getElementById('tab_dt').style.display = 'none';
	document.getElementById('tab_op').style.display = 'inline';
	
	document.getElementById('btn_tab_dd').className = 'btn_tab';
	document.getElementById('btn_tab_p').className = 'btn_tab';
	document.getElementById('btn_tab_dt').className = 'btn_tab';
	document.getElementById('btn_tab_op').className = 'btn_tab_sel';
}

</script>

<?php
echo '<script src="modules/'.$lnxinvoice.'/ajax/ajxcompletar.js"></script>';


$cnsprincipal= $mysqli->query("SELECT * from ".$prefixsql.$lnxinvoice." where id = '".$iddocumento."'");
$rowprincipal = mysqli_fetch_assoc($cnsprincipal);
$dbidserie = $rowprincipal["idserie"];
$dbcodigoint = $rowprincipal["codigoint"];
$dbcodigo = $rowprincipal["codigo"];
$dbidcliente = $rowprincipal["idtercero"];
$dbestado = $rowprincipal["estado"];
$dbfecha = $rowprincipal["fecha"];
$dbvencimiento = $rowprincipal["vencimiento"];
$dbidusuario = $rowprincipal["idusuario"];

$dbpc_cp = $rowprincipal["pc_cp"];
$dbpc_dp = $rowprincipal["pc_dp"];





$cnsaux = $mysqli->query("SELECT * from ".$prefixsql."users where id = '".$dbidusuario."'");
$rowaux = mysqli_fetch_assoc($cnsaux);
$dbusuario = $rowaux["display"];

if ($lnxinvoice == "fc")
{
	$dbfactura = $rowprincipal["factura"];
}

$dbeditfv = $rowprincipal["editfv"];
if ($dbeditfv > '0')
{
	echo '<table width="100%">';
	echo '<tr><td bgcolor="#FFFF00">Factura ya validada - Vuelva a validar la factura antes de emitir otra</td></tr>';
	echo '<table>';
}


$dbfupago = $rowprincipal["fupago"];


$cnsaux= $mysqli->query("SELECT id, serie from ".$prefixsql."series where id = '".$dbidserie."'");
$rowaux = mysqli_fetch_assoc($cnsaux);
$nomserie = $rowaux["serie"];

$cnsaux= $mysqli->query("SELECT * from ".$prefixsql."terceros where id = '".$dbidcliente."'");
$rowaux = mysqli_fetch_assoc($cnsaux);
$dbcodcli = $rowaux["codcli"];
$dbcodpro = $rowaux["codpro"];
$dbrazonsocial = $rowaux["razonsocial"];
$clidir = $rowaux["dir"];
$clicp = $rowaux["cp"];
$clipobla = $rowaux["pobla"];
$cliidprov = $rowaux["idprov"];
$cliidpais = $rowaux["idpais"];
$clinotaimp = $rowaux["notaimp"];
$terceroncuenta = $rowaux["ncuenta"];
$tercero_notaimp = $rowaux["notaimp"];

$cnsaux= $mysqli->query("SELECT * from ".$prefixsql."provincias where id = '".$cliidprov."'");
$rowaux = mysqli_fetch_assoc($cnsaux);
$nomprov = $rowaux["provincia"];

$cnsaux= $mysqli->query("SELECT * from ".$prefixsql."paises where id = '".$cliidpais."'");
$rowaux = mysqli_fetch_assoc($cnsaux);
$nompais = $rowaux["pais"];

if ($dbcodigoint == 0){$lblestado = "Borrador";}
if ($dbcodigoint > 0){$lblestado = "Validado";}
if ($dbeditfv > '0'){$lblestado = "Editando documento ya Validado";}



$cnsaux= $mysqli->query("SELECT * from ".$prefixsql."formaspago where id = '".$dbidfpago."'");
	$rowaux = mysqli_fetch_assoc($cnsaux);
	$formapago = $rowaux["formapago"];
	
	$cnsaux= $mysqli->query("SELECT * from ".$prefixsql."cuentascajas where id = '".$dbidcuenta."'");
	$rowaux = mysqli_fetch_assoc($cnsaux);
	$cuentapago = $rowaux["ref"].' - '.$rowaux["cuenta"];
?>
<div class="grupotabs">
<a href="javascript:muestra_tab_dd()" id="btn_tab_dd" class="btn_tab_sel"/>Datos Documento</a>
<a href="javascript:muestra_tab_p()" id="btn_tab_p" class="btn_tab"/>Forma de pago</a>
<a href="javascript:muestra_tab_dt()" id="btn_tab_dt" class="btn_tab"/>Datos Tercero</a>
<a href="javascript:muestra_tab_op()" id="btn_tab_op" class="btn_tab"/>Operaciones</a>
</div>
<div style=" min-height: 100px;">
<div id="tab_dd">
<div class="row">
  <div class="col-sm-2">
    Serie
  </div>
  <div class="col-2" align="left">
     <?php echo $nomserie; ?>
  </div>
  
  <div class="col-sm-2">
    <?php 
    if($lnxinvoice == "fv"){$lblcodigotercero = "Codigo Cliente"; $lblcodtercero = $dbcodcli;}
    if($lnxinvoice == "fc"){$lblcodigotercero = "Codigo Proveedor"; $lblcodtercero = $dbcodpro;}
    echo $lblcodigotercero;
    ?>
  </div>
  <div class="col-2" align="left">
     <?php echo $lblcodtercero; ?>
  </div>
  
</div>
<div class="row">
  <div class="col-sm-2">
    Documento
  </div>
  <div class="col-2" align="left">
     <?php echo $dbcodigo; ?>
  </div>
  
  <div class="col-sm-2">
    <?php echo '<a class="btnedit" href="index.php?module=terceros&section=terceros&action=edit&idtercero='.$dbidcliente.'" >Razon Social</a>'; ?>
  </div>
  <div class="col" align="left">
     <?php echo $dbrazonsocial; ?>
  </div>
</div>
<?php
	if ($lnxinvoice == "fc")
	{
		echo '<div class="row">';
		echo '<div class="col-sm-2">';
		if($LNXERP_bloqueado == "NO")
		{
			echo '<a class="btnedit" href="index.php?module='.$lnxinvoice.'&section=factura&id='.$iddocumento.'">Factura recibida</a>';
		}
		else
		{
			echo 'Factura recibida';
		}
		echo '</div>';
		echo '<div class="col-2" align="left">';
   echo $dbfactura;
  echo '</div>
</div>';
		
		
	}
	?>

<div class="row">
  <div class="col-sm-2">
    Fecha documento
  </div>
  <div class="col-2" align="left">
     <?php 
	 $new_fecha = explode("-", $dbfecha);
	 $fano = $new_fecha[0];
	 $fmes = $new_fecha[1];
	 $fdia = $new_fecha[2];
	 
	 echo $fdia."/".$fmes."/".$fano; 
	 ?>
  </div>
  
  <?php
  if($tercero_notaimp != '')
  {
	  echo '<div class="col" style="background-color: #F2F5A9;">';
	  echo '<img src="img/exclamation.png" height="32" /> '.$tercero_notaimp;
	  echo '</div>';
  }
  ?>
	
</div>
<div class="row">
  <div class="col-sm-2">
    <?php
	if ($dbcodigoint == 0 && $LNXERP_bloqueado == "NO")
	{
	echo '<a class="btnedit" href="index.php?module='.$lnxinvoice.'&section=vencimiento&id='.$iddocumento.'">Vencimiento</a>';
	}
	else
	{
		echo 'Vencimiento';
	}
	?>
  </div>
  <div class="col-2" align="left">
     <?php 
	 $new_fecha = explode("-", $dbvencimiento);
	 $fano = $new_fecha[0];
	 $fmes = $new_fecha[1];
	 $fdia = $new_fecha[2];
	 
	 echo $fdia."/".$fmes."/".$fano;
 ?>
  </div>
<div class="col-sm-2">
    Estado
  </div>
  <div class="col" align="left">
     <?php 

	 echo $lblestado; 
	 ?>
  </div>
</div>

</div>

<div id="tab_p" style="display: none;">

  


<div class="row" >
	<div class="col-sm-2" align="left">
	<?php
	if($LNXERP_bloqueado == "NO")
	{
		echo '<a class="btnedit" href="index.php?module='.$lnxinvoice.'&section=fpago&id='.$iddocumento.'">Condiciones de Pago</a>';
	}
	else
	{
		echo 'Condiciones de Pago';
	}
    
  ?>
	</div>
	<div class="col" align="left">
	<?php
	$cnsaux= $mysqli->query("SELECT * from ".$prefixsql."bancos_cpago where id = '".$dbpc_cp."'");
	$rowaux = mysqli_fetch_assoc($cnsaux);
	$lbl_pc_cp = $rowaux["cpago"];
	
	
	echo $lbl_pc_cp;
	?>
	</div>
</div>

<div class="row" >
	<div class="col-sm-2" align="left">
	Documento
	</div>
	<div class="col" align="left">
	<?php
	$cnsaux= $mysqli->query("SELECT * from ".$prefixsql."formaspago where id = '".$dbpc_dp."' ");
	$rowaux = mysqli_fetch_assoc($cnsaux);
	$lbl_pc_dp = $rowaux["formapago"];
	
	echo $lbl_pc_dp;
	?>
	</div>
</div>

</div>

<div id="tab_dt" style="display: none;">
<div class="row">
  <div class="col-sm-2">
    Codigo Cliente
  </div>
  <div class="col" align="left">
     <?php echo $dbcodcli; ?>
  </div>
</div>
<div class="row">
  <div class="col-sm-2">
    <?php echo '<a class="btnedit" href="index.php?module=terceros&section=terceros&action=edit&idtercero='.$dbidcliente.'" >Razon Social</a>'; ?>
  </div>
  <div class="col" align="left">
     <?php echo $dbrazonsocial; ?>
  </div>
</div>
<div class="row">
  <div class="col-sm-2">
    Dirección
  </div>
  <div class="col" align="left">
     <?php echo $clidir; ?>
  </div>
</div>
<div class="row">
  <div class="col-sm-2">
    CP
  </div>
  <div class="col" align="left">
     <?php echo $clicp; ?>
  </div>
</div>
<div class="row">
  <div class="col-sm-2">
    Población
  </div>
  <div class="col" align="left">
     <?php echo $clipobla; ?>
  </div>
</div>
<div class="row">
  <div class="col-sm-2">
    Provincia
  </div>
  <div class="col" align="left">
     <?php echo $nomprov; ?>
  </div>
</div>
<div class="row">
  <div class="col-sm-2">
    Pais
  </div>
  <div class="col" align="left">
     <?php echo $nompais; ?>
  </div>
</div>
</div>

<div id="tab_op" style="display: none;">
<div class="row">
  <div class="col-sm-2">
    Documento
  </div>
  <div class="col" align="left">
     <?php
if($LNXERP_bloqueado == "NO")
{
	if ($dbcodigoint == 0 && $dbeditfv == 0) 
	{
            echo '<a class="btnedit" href="index.php?module='.$lnxinvoice.'&section=validar&id='.$iddocumento.'">Validar '.$lblnxinvoice.'</a>';

	}
	else
	{
		echo '<a class="btnedit" href="index.php?module='.$lnxinvoice.'&section=validarf&id='.$iddocumento.'">convertir en...</a>';
	}
}	
	
	?>
  </div>
</div>
<div class="row">
  <div class="col-sm-2">
    Pagado
  </div>
  <div class="col" align="left">
<?php 
if($lnxinvoice == "fv" || $lnxinvoice == "fc")
{
	$lbl_ok = "Pagado";
	$lbl_nook = "Pendiente de cobro";
}
if($lnxinvoice == "ov" || $lnxinvoice == "oc")
{
	$lbl_ok = "Aprobado";
	$lbl_nook = "NO aprobado";
}
if($lnxinvoice == "av" || $lnxinvoice == "ac")
{
	$lbl_ok = "Entregado";
	$lbl_nook = "NO entregado";
}


if($LNXERP_bloqueado == "NO")
{
	 echo '<form name="formestado" action="index.php?module='.$lnxinvoice.'&section=status&action=save" method="POST">'; 
	 
	 
	echo '<select name="lststatus">';
	
	
	
	
	
	if ($dbestado == "0"){$seleccionado = 'selected = ""';}else{$seleccionado = '';}
		echo '<option value="0" '.$seleccionado.'>Sin respuesta</option>';
	if ($dbestado == "1"){$seleccionado = 'selected = ""';}else{$seleccionado = '';}
		echo '<option value="1" '.$seleccionado.'>'.$lbl_ok.'</option>';
	if ($dbestado == "2"){$seleccionado = 'selected = ""';}else{$seleccionado = '';}
		echo '<option value="2" '.$seleccionado.'>'.$lbl_nook.'</option>';
	
	echo '</select>';
	echo '<input type="hidden" value="'.$iddocumento.'" name="hiddoc">';
	echo '<input type="submit" value="Aplicar"/>
	</form>';
}
else
{
	if ($dbestado == "0"){echo 'Sin respuesta';}
	if ($dbestado == "1"){echo $lbl_ok;}
	if ($dbestado == "2"){echo $lbl_nook;}
}

	?>
  </div>
</div>
    
</div>
</div>






<table border="0" bgcolor="CCCCCC" width="100%">
<tr class="maintitle">
	<td width="80"> </td>
	<?php
	if($lnxinvoice == "ac" || $lnxinvoice == "fc"){$textocodigo = "Cod Compra";}
	if($lnxinvoice == "av" || $lnxinvoice == "fv"){$textocodigo = "Cod Venta";}
	?>
	<td width="100"><?php echo $textocodigo; ?></td>
	<td width="150">concepto</td>
	<td width="75">unid.</td>
	<td width="75">Precio</td>
	<td width="50">dto</td>
	<td width="75">importe</td>
	<td width="50">accion</td>
	<td width="50">Excluir</td>
	<td>Impuestos</td>
</tr>
<?php 
if($LNXERP_bloqueado == "NO")
{

echo '<form name="formlinea" id="formlinea" action="index.php?module='.$lnxinvoice.'&section=lines&action=save" method="POST">'; ?>
<input type="hidden" name="haccionlinea" value="new">
<?php echo '<input type="hidden" name="hiddocumento" value="'.$iddocumento.'">'; ?>

<tr>
<td width="80"> </td>
<td width="100"><input type="text" name="txtcodventa" id="codventa" onblur="buscacodventa()" autocomplete="off"></td>
<td width="150"><input type="text" name="txtconcepto" id="txtconcepto" onKeyup="addFocusconcepto()" value="" autocomplete="off" style="width: 250px;" maxlength="35"></td>
<td width="75"><input type="number" name="txtunidades" id="txtunidades" value="1" style="width: 60px;" onChange="mutiplicar()"></td>
<td width="75"><input type="text" name="txtprecio" id="txtprecio" value="0.00" style="width: 80px;" onChange="mutiplicar()"></td>
<td width="50"><input type="number" name="txtdto" id="txtdto" value="0" style="width: 50px;" onChange="mutiplicar()"></td>
<td width="75"><input type="text" name="txtimporte" id="txtimporte" value="0.00" style="width: 80px;" readonly="readonly"></td>
<td width="50">
<?php
if ($dbcodigoint == 0)
{ echo '<input type="submit" class="btnedit_verde" value="Agregar"/>'; }
?>
</td>
<td align="center" width="50"> <input type="checkbox" name="chkexcluir" value="1" ></td>
<td align="left" width="100%">
<?php
//muestra los impuestos

$ssql_impuestos = $mysqli->query("SELECT * from ".$prefixsql.$lnxinvoice."_tax where ".$campomasterid." = '".$iddocumento."' ");
while($coltax = mysqli_fetch_array($ssql_impuestos))
{
	$cnsaux= $mysqli->query("SELECT * from ".$prefixsql."impuestos where id = '".$coltax["idimpuesto"]."'");
	$rowaux = mysqli_fetch_assoc($cnsaux);
	$dbimpuestonombre = $rowaux["impuesto"];
	
	$cnsaux= $mysqli->query("SELECT * from ".$prefixsql."impuestosrules where idserie = '".$dbidserie."' and idimpuesto = '".$coltax["idimpuesto"]."'");
	$rowaux = mysqli_fetch_assoc($cnsaux);
	$dbeditabletax = $rowaux["editable"];
	
	if ($dbeditabletax == '1')
	{
		echo $dbimpuestonombre.'<input type="number" name="txttax[]" id="txttax[]" value="'.$coltax["valor"].'" style="width: 50px;"></br> ';
		echo '<input type="hidden" value="editsi" name="heditabletax[]" id="heditabletax[]" />';
	}
	else
	{
		echo $dbimpuestonombre.' - '.$coltax["valor"].'</br> <input type="hidden" name="txttax[]" id="txttax[]" value="'.$coltax["valor"].'" style="width: 50px;">';
		echo '<input type="hidden" value="editno" name="heditabletax[]" id="heditabletax[]" />';
	}
	
	
	echo '<input type="hidden" value="'.$coltax["idimpuesto"].'" name="hidimpuesto[]" id="hidimpuesto[]">';
}

?>
</td>
</tr>
<?php
	echo '</form>';
}

$importesubtotal = "0";

$ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql.$lnxinvoice."_lineas where ".$campomasterid." = '".$iddocumento."' and exclufactu = '0' order by orden");
$cuentalineas = $ConsultaMySql->num_rows;

$lineaactual = 0;
$color = 1;
while($columna = mysqli_fetch_array($ConsultaMySql))
{
	$lineaactual = $lineaactual +1;
	if ($lineaactual > "1" && $lineaactual < $cuentalineas)
	{
		$imgsubir = '<a href="index.php?module='.$lnxinvoice.'&section=lines&action=sube&idlinea='.$columna["id"].'&id='.$iddocumento.'"><img src="img/flecha-arriba.png" /></a>';
	}
	if ($lineaactual > "0" && $lineaactual < $cuentalineas)
	{
		$imgbajar = '<a href="index.php?module='.$lnxinvoice.'&section=lines&action=baja&idlinea='.$columna["id"].'&id='.$iddocumento.'"><img src="img/flecha-abajo.png" /></a>';
	}
	else
	{
		$imgbajar = '';
		if ($cuentalineas == 1)
		{
			$imgsubir = '';
		}
		else
		{
			$imgsubir = '<a href="index.php?module='.$lnxinvoice.'&section=lines&action=sube&idlinea='.$columna["id"].'&id='.$iddocumento.'"><img src="img/flecha-arriba.png" /></a>';
		}
	}

	if($LNXERP_bloqueado == "NO")
	{
		$imgbajar = '';
		$imgsubir = '';
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

	$colprecio = number_format($columna["precio"],2,".",",");
	$colimporte = number_format($columna["importe"],2,".",",");
		
echo '<tr class='.$pintacolor.'>
	<td>';
	if ($dbcodigoint == 0 && $LNXERP_bloqueado == "NO")
	{
		echo '<a class="btnedit" href="index.php?module='.$lnxinvoice.'&section=lines&action=edit&idlinea='.$columna["id"].'&id='.$iddocumento.'">Editar</a>';
	}
	echo '</td>';
	echo '<td>'.$columna["cod"].'</td>
	<td>'.$columna["concepto"].'</td>
	<td align="right">'.$columna["unid"].'</td>
	<td align="right">'.$colprecio.'</td>
	<td align="center">'.$columna["dto"].'</td>
	<td align="right">'.$colimporte.'</td>
	
	<td align="center">';
	if ($dbcodigoint == 0)
	{echo $imgsubir.$imgbajar; }
	echo '</td>
	<td>';
	if ($dbcodigoint == 0 && $LNXERP_bloqueado == "NO")
	{echo '<a class="btnenlacecancel" href="index.php?module='.$lnxinvoice.'&section=lines&action=del&idlinea='.$columna["id"].'&id='.$iddocumento.'">Borrar</a>';}
	echo '</td>';
	echo '<td>';
	
	$ssql_impuestos = $mysqli->query("SELECT * from ".$prefixsql.$lnxinvoice."_lineas_tax where ".$campomasterid." = '".$iddocumento."' and idfvlinea = '".$columna["id"]."'");
	while($coltax = mysqli_fetch_array($ssql_impuestos))
	{
		$cnsauxtax = $mysqli->query("SELECT * from ".$prefixsql."impuestos where id = '".$coltax["idtax"]."'");
		$rowtaxlinea = mysqli_fetch_assoc($cnsauxtax);
		$dbetiquetatax = $rowtaxlinea["impuesto"];
		
		if($coltax["importe"] <> '0')
		{
			echo $dbetiquetatax.' - ('.$coltax["valor"].'%) '.$coltax["importe"].'</br>';
		}
	}
	
	
	echo '</td>';
echo '</tr>';


//ahora mostramos los productos con su numero de serie y partnumber asociados
	$cnssnsql = $mysqli->query("SELECT * from ".$prefixsql.$lnxinvoice."_sn where ".$campomasterid." = '".$iddocumento."' and idlinea = '".$columna["id"]."' ");
	

	while($colsnpn = mysqli_fetch_array($cnssnsql))
	{
		echo '<tr class='.$pintacolor.'><td colspan="2"> </td><td colspan="8">';
		
		if ($colsnpn["sn"] == '') {$xsn = "";} else {$xsn = "SN: ".$colsnpn["sn"]." ";}
		
		if ($colsnpn["pn"] == '') {$xpn = "";} else {$xpn = "PN: ".$colsnpn["pn"]." ";}
		
		if ($colsnpn["otro"] == '') {$xotro = "";} else {$xotro = "otro: ".$colsnpn["otro"]." ";}
		
		$xtextosns = $xsn.$xpn.$xotro;
		
		echo $xtextosns.'</td></tr>';
	}

	

$importesubtotal = $importesubtotal + $columna["importe"];
}

//no hace falta
//$sumatodo = $importesubtotal;
?>

<!-- otros conceptos -->


<?php
$ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql.$lnxinvoice."_lineas where ".$campomasterid." = '".$iddocumento."' and exclufactu = '1' order by orden");
$cuentalineas = $ConsultaMySql->num_rows;

//OTROS CONCEPTO EXCLUIDOS------------------------------------
if ($cuentalineas > '0')
{
	ECHO '<tr class="maintitle"><td colspan="10">Otros conceptos</td></tr>';

	$lineaactual = 0;
	$color = 1;
	while($columna = mysqli_fetch_array($ConsultaMySql))
	{
		$lineaactual = $lineaactual +1;
		
		$imgsubir = '<a href="index.php?module='.$lnxinvoice.'&section=lines&action=sube&idlinea='.$columna["id"].'&id='.$iddocumento.'"><img src="img/flecha-arriba.png" /></a>';
		$imgbajar = '<a href="index.php?module='.$lnxinvoice.'&section=lines&action=baja&idlinea='.$columna["id"].'&id='.$iddocumento.'"><img src="img/flecha-abajo.png" /></a>';
		
		if ($lineaactual == '1' && $cuentalineas == '1')
		{
			$imgsubir = '';
			$imgbajar = '';
		}

		if ($lineaactual == $cuentalineas)
		{
			//$imgsubir = '';
			$imgbajar = '';
		}
		if ($lineaactual == '1' && $lineaactual < $cuentalineas)
		{
			$imgsubir = '';
			//$imgbajar = '';
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

		$colprecio = number_format($columna["precio"],2,".",",");
		$colimporte = number_format($columna["importe"],2,".",",");
			
	echo '<tr class='.$pintacolor.'>
		<td>';
		if ($dbcodigoint == 0)
		{
			echo '<a class="btnedit" href="index.php?module='.$lnxinvoice.'&section=lines&action=edit&idlinea='.$columna["id"].'&id='.$iddocumento.'">Editar</a>';
		}
		echo '</td>';
		echo '<td>'.$columna["cod"].'</td>
		<td>'.$columna["concepto"].'</td>
		<td align="right">'.$columna["unid"].'</td>
		<td align="right">'.$colprecio.'</td>
		<td align="center">'.$columna["dto"].'</td>
		<td align="right">'.$colimporte.'</td>
		
		<td align="center">';
		if ($dbcodigoint == 0)
		{echo $imgsubir.$imgbajar; }
		echo '</td>
		<td>';
		if ($dbcodigoint == 0)
		{echo '<a class="btnenlacecancel" href="index.php?module='.$lnxinvoice.'&section=lines&action=del&idlinea='.$columna["id"].'&id='.$iddocumento.'">Borrar</a>';}
		echo '</td>';
		echo '<td>';
		
		$ssql_impuestos = $mysqli->query("SELECT * from ".$prefixsql.$lnxinvoice."_lineas_tax where ".$campomasterid." = '".$iddocumento."' and idfvlinea = '".$columna["id"]."'");
		while($coltax = mysqli_fetch_array($ssql_impuestos))
		{
			$cnsauxtax = $mysqli->query("SELECT * from ".$prefixsql."impuestos where id = '".$coltax["idtax"]."'");
			$rowtaxlinea = mysqli_fetch_assoc($cnsauxtax);
			$dbetiquetatax = $rowtaxlinea["impuesto"];
			
			if($coltax["valor"] != '0')
			{
				echo $dbetiquetatax.' - ('.$coltax["valor"].'%) '.$coltax["importe"].'</br>';
			}
		}
		
		
		echo '</td>';
	echo '</tr>';


	//ahora mostramos los productos con su numero de serie y partnumber asociados
		$cnssnsql = $mysqli->query("SELECT * from ".$prefixsql.$lnxinvoice."_sn where ".$campomasterid." = '".$iddocumento."' and idlinea = '".$columna["id"]."' ");
		

		while($colsnpn = mysqli_fetch_array($cnssnsql))
		{
			echo '<tr class='.$pintacolor.'><td colspan="2"> </td><td colspan="8">';
			
			if ($colsnpn["sn"] == '') {$xsn = "";} else {$xsn = "SN: ".$colsnpn["sn"]." ";}
			
			if ($colsnpn["pn"] == '') {$xpn = "";} else {$xpn = "PN: ".$colsnpn["pn"]." ";}
			
			if ($colsnpn["otro"] == '') {$xotro = "";} else {$xotro = "otro: ".$colsnpn["otro"]." ";}
			
			$xtextosns = $xsn.$xpn.$xotro;
			
			echo $xtextosns.'</td></tr>';
		}

		

	$importesubtotal = $importesubtotal + $columna["importe"];
	}
}
?>
</table>

<p>&nbsp;</p>
<p>&nbsp;</p>



<div align="center">

<table>
<tr><td valign="top">

<table>
<tr class="maintitle" ><td>impuesto</td><td>Valor</td><td>importe</td></tr>
<?php
//consultamos en FV_TAX que impuestos hay configurados
$cnssnsql = $mysqli->query("SELECT * from ".$prefixsql.$lnxinvoice."_tax where ".$campomasterid." = '".$iddocumento."' ");

while($coltax = mysqli_fetch_array($cnssnsql))
{
	$idimpuesto = $coltax["idimpuesto"];
	$aux_cnstax= $mysqli->query("SELECT * from ".$prefixsql."impuestos where id = '".$coltax["idimpuesto"]."'");
	$rowtax = mysqli_fetch_assoc($aux_cnstax);
	$lblimpuesto = $rowtax["impuesto"];
	
	
	
	
	$sqltaxdifvalores  = $mysqli->query("SELECT SUM(importe) as importe from ".$prefixsql.$lnxinvoice."_lineas_tax where ".$campomasterid." = '".$iddocumento."' and idtax  = '".$coltax["idimpuesto"]."' and valor <> '0'");
	$auxtax = mysqli_fetch_assoc($sqltaxdifvalores);
	$existeesteimpuesto = $auxtax["importe"];
	
	
	$sqltaxdifvalores  = $mysqli->query("SELECT DISTINCT valor from ".$prefixsql.$lnxinvoice."_lineas_tax where ".$campomasterid." = '".$iddocumento."' and idtax  = '".$coltax["idimpuesto"]."' and valor <> '0'");
	$numvaloresdif = $sqltaxdifvalores->num_rows;

	if ($existeesteimpuesto <> '0')
	{
	echo '<tr><td rowspan="'.$numvaloresdif.'" valign="top">'.$lblimpuesto.'</td>';
		
	while($coldiftaxvalores = mysqli_fetch_array($sqltaxdifvalores))
	{
		$linea = '0';
		if ($coldiftaxvalores["valor"] != "0")
		{
			//sumamos el total de iva segun valor
			
			$aux_sumatax= $mysqli->query("SELECT SUM(importe) as importetax from ".$prefixsql.$lnxinvoice."_lineas_tax where ".$campomasterid." = '".$iddocumento."' and idtax  = '".$coltax["idimpuesto"]."' and valor = '".$coldiftaxvalores["valor"]."'");
			$sumatax = mysqli_fetch_assoc($aux_sumatax);
			$lblsumaimpuesto = $sumatax["importetax"];
			
			if ($lblsumaimpuesto <> '0')
			{			
				if ($linea > '0'){echo '<tr>';}
				
				
				$lblsumaimpuesto = round($lblsumaimpuesto, 2);
				$prtlblsumaimpuesto = number_format($lblsumaimpuesto, 2, ".", ",");
				echo '<td align="center">'.$coldiftaxvalores["valor"].' %</td><td align="right">'.$prtlblsumaimpuesto.'</td></tr>';
				
			}
			$linea = $linea +1;
		}
	}
	$auxsumas = $mysqli->query("SELECT SUM(importe) as importe from ".$prefixsql.$lnxinvoice."_lineas_tax where ".$campomasterid." = '".$iddocumento."' and idtax  = '".$coltax["idimpuesto"]."'");
	$auxrow = mysqli_fetch_assoc($auxsumas);
	$lbltotalimpuesto = $auxrow["importe"];

	echo '<tr class="maintitle"><td colspan="2" align="right">Total</td>';
	$lbltotalimpuesto = round($lbltotalimpuesto,2);
	$prtlbltotalimpuesto= number_format($lbltotalimpuesto, 2, ".", ",");
	echo '<td align="right">'.$prtlbltotalimpuesto.'</td></tr>';
	
	$totalimpuestos = $totalimpuestos + $lbltotalimpuesto;
}
}

?>

</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
</td>

<td valign="top">

<table>
<tr class="maintitle"><td>Base imponible</td><td>Impuestos</td><td>Total Factura</td></tr>
<?php

$auxsumas = $mysqli->query("SELECT SUM(importe) as importe from ".$prefixsql.$lnxinvoice."_lineas where ".$campomasterid." = '".$iddocumento."' and exclufactu = '0'");
$auxrow = mysqli_fetch_assoc($auxsumas);
$lblbaseimponible = $auxrow["importe"];
	$lblbaseimponible = round($lblbaseimponible,2);

//excluidos
$auxsumas = $mysqli->query("SELECT SUM(importe) as importe from ".$prefixsql.$lnxinvoice."_lineas where ".$campomasterid." = '".$iddocumento."' and exclufactu = '1'");
$auxrow = mysqli_fetch_assoc($auxsumas);
$lblimpexcluidos = $auxrow["importe"];
	$lblimpexcluidos = round($lblimpexcluidos,2);
	
$auxsumas = $mysqli->query("SELECT SUM(importe) as importe from ".$prefixsql.$lnxinvoice."_lineas_tax where ".$campomasterid." = '".$iddocumento."' ");
$auxrow = mysqli_fetch_assoc($auxsumas);
$lblimpuestos = $auxrow["importe"];
	$lblimpuestos =round($lblimpuestos, 2);

$lbltotalfactura = $lblbaseimponible + $lblimpuestos + $lblimpexcluidos;
	$lbltotalfactura =round($lbltotalfactura, 2);
$totalimpuestos =round($totalimpuestos, 2);

$prtlblbaseimponible = number_format($lblbaseimponible, 2, ".", ",");
$prttotalimpuestos = number_format($totalimpuestos, 2, ".", ",");
$prtlbltotalfactura = number_format($lbltotalfactura, 2, ".", ",");


echo '<tr><td align="right">'.$prtlblbaseimponible.'</td><td align="right">'.$prttotalimpuestos .'</td><td align="right"><FONT SIZE=4><b>'.$prtlbltotalfactura.'</b></font></td></tr>';

?>

</td></tr>
</table>
</div>

<p>&nbsp;</p>
<p>&nbsp;</p>
