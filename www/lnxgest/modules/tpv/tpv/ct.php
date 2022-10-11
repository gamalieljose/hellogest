<script src="core/com/js_terceros_cli.js"></script>
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


<?php
$idtpv = $_GET["id"];
                
$cnsprincipal= $mysqli->query("SELECT * from ".$prefixsql."tpv where id = '".$idtpv."'");
$rowprincipal = mysqli_fetch_assoc($cnsprincipal);
$dbidtercero = $rowprincipal["idtercero"];  
$dbidserie = $rowprincipal["idserie"];
$dbidusuario = $rowprincipal["iduser"];
$dbedittpv = $rowprincipal["edittpv"];

$cnsaux = $mysqli->query("SELECT * from ".$prefixsql."series where id = '".$dbidserie."'");
$rowaux = mysqli_fetch_assoc($cnsaux);
$dbidempresa = $rowaux["idempresa"];

?>
<form name="form1" id="form1" action="index.php?module=tpv&section=ct&action=save" method="POST">
<input type="hidden" name="hidtpv" value="<?php echo $idtpv; ?>" />

<div class="row">
    <div class="col maintitle" align="left">
        Modificaciones del TPV actual
    </div>
</div>
<div class="row">
    <div class="col-sm-2" align="left">
        Empresa
    </div>
    <div class="col" align="left">
        
<?php
        $cnsempresas= $mysqli->query("SELECT * from ".$prefixsql."empresas order by razonsocial");
        
if($dbedittpv == '1'){$habilitacontrol = ' disabled=""';}else{$habilitacontrol = '';}
	echo '<select id="lstempresas" name="lstempresas" '.$habilitacontrol.' class="campoencoger">';
	while($colempresa = mysqli_fetch_array($cnsempresas))
	{
            if($colempresa["id"] == $dbidempresa){$seleccionado = ' selected=""';}else{$seleccionado = '';}
            echo '<option value="'.$colempresa["id"].'" '.$seleccionado.'>'.$colempresa["razonsocial"].'</option>';
        }
        echo '</select>';
                
?>
        </select>
    </div>
</div>

<div class="row">
    <div class="col-sm-2" align="left">
        Serie
    </div>
    <div class="col" align="left">
<?php
echo '<select id="lstseries" name="lstseries" '.$habilitacontrol.' class="campoencoger">';
$ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."series where tipo = 'TPV' and cv = '2' and idempresa = '".$dbidempresa."' ");
while($columna = mysqli_fetch_array($ConsultaMySql))
{

    if($columna["id"] == $dbidserie) {$pordefecto = ' selected=""';}else{$pordefecto = '';}
     echo '<option value="'.$columna["id"].'" '.$pordefecto.'>'.$columna["serie"].'</option>'; 
}
	echo '</select>';
	?>  
    </div>
</div>




<div class="row">
    <div class="col-sm-2" align="left">
        Tercero
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
    <div class="col-sm-2" align="left">
        Usuario
    </div>
    <div class="col" align="left">
        
<?php
        $cnsempresas= $mysqli->query("SELECT * from ".$prefixsql."users order by display");
	echo '<select id="lstusuarios" name="lstusuarios" style="width: 100%;">';
	while($col = mysqli_fetch_array($cnsempresas))
	{
            if($col["id"] == $dbidusuario){$seleccionado = ' selected=""';}else{$seleccionado = '';}
            echo '<option value="'.$col["id"].'" '.$seleccionado.'>'.$col["display"].'</option>';
        }
        echo '</select>';
                
?>
        </select>
    </div>
</div>



<div align="center" class="rectangulobtnsguardar">

<input class="btnsubmit" name="btnguardar" value="Guardar" type="submit"> 

<?php echo ' <a class="btncancel" href="index.php?module=tpv&section=tpv&action=view&id='.$idtpv.'">Cancelar</a>'; ?>



</div>
</form>

