<script src="core/com/js_terceros_cli.js"></script>
<script language="javascript">
$(document).ready(function(){
   $("#lstempresas").change(function () {
           $("#lstempresas option:selected").each(function () {
            empresa=$(this).val();
            
            $.post("modules/tpv/ajax/ajx_e-serietpv-v.php", { idempresa: empresa }, function(data){
            $("#lstseriesv").html(data);
            });            
            
            $.post("modules/tpv/ajax/ajx_e-serietpv-c.php", { idempresa: empresa }, function(data){
            $("#lstseriesc").html(data);
            });
            
            
			
			document.getElementById("lstseriesv").disabled=false;
			document.getElementById("lstseriesc").disabled=false;
			
        });
   })
});
</script>

<?php
$idterminal = $_GET["id"];
$sqlaux = $mysqli->query("select * from ".$prefixsql."pos_terminales where id = '".$idterminal."' ");
$rowaux = mysqli_fetch_assoc($sqlaux);
$dbdescripcion = $rowaux["descripcion"];


$sqlaux = $mysqli->query("select count(*) as contador from ".$prefixsql."tpv_cfg where idterminal = '".$idterminal."' "); 
$rowaux = mysqli_fetch_assoc($sqlaux);
$existecfg = $rowaux["contador"];

if($existecfg == '0')
{
	echo '<p>Configuración no creada para este terminal</p>';
	$dbidserie = '0';
	$dbidprinter = '0';
	$dbidtercero = '0';
        $dbidempresa = '0';
        
}
else
{
	
	$sqlaux = $mysqli->query("select * from ".$prefixsql."tpv_cfg where idterminal = '".$idterminal."' "); 
	$rowaux = mysqli_fetch_assoc($sqlaux);
	$dbidserie = $rowaux["idserie"]; //serie ventas
        $dbidseriec = $rowaux["idseriec"]; //serie compras
	$dbidprinter = $rowaux["idprinter"];
	$dbidtercero = $rowaux["idtercero"];
	
        //obtenemos la empresa de la serie de ventas
        $sqlaux = $mysqli->query("select * from ".$prefixsql."series where id = '".$dbidserie."' "); 
	$rowaux = mysqli_fetch_assoc($sqlaux);
	$dbidempresa = $rowaux["idempresa"];
            
}
?>


<div class="grupotabs">
    <div class="campoencoger">
<?php
$idterminal = $_GET["id"];

$claseboton = "btn_tab_sel";
echo '<a class="'.$claseboton.'" href="index.php?module=tpv&section=cfgterm&action=edit&id='.$idterminal.'">Terminal / Serie</a> ';

$claseboton = "btn_tab";
echo '<a class="'.$claseboton.'" href="index.php?module=tpv&section=cfgtermproduct&id='.$idterminal.'">Productos</a> ';


?>
    </div>
</div>


<form name="frmcfgtpv" method="POST" action="index.php?module=tpv&section=cfgterm&action=save">


<div class="row">
  <div class="col-sm-2" align="left">
    Terminal
  </div>
  <div class="col" align="left">
    <?php echo $dbdescripcion; 

echo '<input type="hidden" name="hidterminal" value="'.$idterminal.'" />';

?>
  </div> 
</div>
<div class="row">
  <div class="col-sm-2" align="left">
    Empresa
  </div>
  <div class="col" align="left">
    <select name="lstempresas" id="lstempresas" class="campoencoger">
        
<?php
if($dbidempresa == '0')
{
    echo '<option value="0">- Selecciona una empresa -</option>';
}
$sqlseries = $mysqli->query("select * from ".$prefixsql."empresas order by razonsocial");
while($col = mysqli_fetch_array($sqlseries))
{
 if($col["id"] == $dbidempresa){$seleccionado = ' selected=""';}else{$seleccionado = '';}
    echo '<option value="'.$col["id"].'" '.$seleccionado.'>'.$col["razonsocial"].'</option>';
}

?>

        </select>
     </div>
  </div>
<div class="row">
  <div class="col-sm-2" align="left">
    Serie TPV Ventas
  </div>
  <div class="col" align="left">
<?php
if($dbidempresa == '0'){$campodeshabilitado = ' disabled=""';}else{$campodeshabilitado = '';}
    echo '<select name="lstseriesv" id="lstseriesv" class="campoencoger" '.$campodeshabilitado.'>';
    if($dbidempresa == '0')
    {
        echo '<option value="0" selected="">Seleccione una empresa</option>';
    }
    else 
    {
        $sqlseries = $mysqli->query("select * from ".$prefixsql."series where tipo = 'TPV' and cv = '2'  order by serie");
        while($col = mysqli_fetch_array($sqlseries))
        {
         if($col["id"] == $dbidserie){$seleccionado = ' selected=""';}else{$seleccionado = '';}
            echo '<option value="'.$col["id"].'" '.$seleccionado.'>'.$col["serie"].'</option>';
        }
    }
    echo '</select>';
?>
      
  </div>
</div>

<div class="row">
  <div class="col-sm-2" align="left">
    Serie TPV Compras
  </div>
  <div class="col" align="left">
<?php
if($dbidempresa == '0'){$campodeshabilitado = ' disabled=""';}else{$campodeshabilitado = '';}
    echo '<select name="lstseriesc" id="lstseriesc" class="campoencoger" '.$campodeshabilitado.'>';
    if($dbidempresa == '0')
    {
        echo '<option value="0" selected="">Seleccione una empresa</option>';
    }
    else 
    {
        $sqlseries = $mysqli->query("select * from ".$prefixsql."series where tipo = 'TPV' and cv = '1' order by serie");
        while($col = mysqli_fetch_array($sqlseries))
        {
         if($col["id"] == $dbidseriec){$seleccionado = ' selected=""';}else{$seleccionado = '';}
            echo '<option value="'.$col["id"].'" '.$seleccionado.'>'.$col["serie"].'</option>';
        }
    }
    echo '</select>';
?>
  </div>
</div>
    
    
<div class="row">
  <div class="col-sm-2" align="left">
    Impresora tickets
  </div>
  <div class="col" align="left">
    <select name="lstprinter" style="width: 100%;">
<?php

$sqlseries = $mysqli->query("select * from ".$prefixsql."impresoras where tipo = '3'order by nombre");
while($col = mysqli_fetch_array($sqlseries))
{
	
	if($col["id"] == $dbidprinter){$seleccionado = ' selected=""';}else{$seleccionado = '';}
echo '<option value="'.$col["id"].'" '.$seleccionado.'>'.$col["nombre"].' - '.$col["notas"].'</option>';
}
?>
        </select>
  </div>
</div>


<div class="row">
  <div class="col-sm-2" align="left">
    Tercero por defecto
  </div>
  <div class="col" align="left">
<div id="div_buscatercero" style="display:none;">
<input type="text" value="" name="txttercero" id="txttercero" maxlength="50" placeholder="Escriba el nombre a buscar" style="width: 100%;"/></br> 
</div>
<a href="javascript:mostrar();"><img src="img/buscar.jpg"/></a>
<?php
	//seleciona cliente
	
	echo '<select name="lsttercero" id="lsttercero" style="width: Calc(100% - 30px);">';
	
	$cnsterceros = $mysqli->query("SELECT * from ".$prefixsql."terceros where id = '".$dbidtercero."'");
		
		while($colter = mysqli_fetch_array($cnsterceros))
		{
                    if($colter["id"] == $dbidtercero){$seleccionado = ' selected=""';}else{$seleccionado = '';}
			echo '<option value="'.$colter["id"].'" '.$seleccionado.'>'.$colter["razonsocial"].'</option>'; 
		}
		echo '</select>';
?>


</div>
</div>


<div align="center" class="rectangulobtnsguardar">

<input class="btnsubmit" name="btnguardar" value="Guardar" type="submit">

<a class="btncancel" href="index.php?module=tpv&section=cfgterm">Cancelar</a>

</div>

</form>
