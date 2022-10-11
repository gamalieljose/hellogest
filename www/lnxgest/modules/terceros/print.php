<?php
$docp_informe = $_GET["docprint"];

?>
<script src="scripts/jquery/jquery-2.1.1.js"></script>
<script src="scripts/jquery/jquery-ui.js"></script> 

<script language="javascript">
$(document).ready(function(){
   $("#lstempresas").change(function () {
       
       var idempresa = document.getElementById("lstempresas").value;
       var modulo = "<?php echo $_GET["module"]; ?>";
       var docprint = "<?php echo $docp_informe; ?>";
       
       
           $("#lstempresas option:selected").each(function () {
            elegido=$(this).val();
            $.post("docprint/motor.php", { iddocprint: docprint, idempresa: idempresa, module: modulo}, function(data){
            $("#lstinformes").html(data);
            });            
        });
   })
});
</script>

<?php

//Obtenemos la tienda por defecto
$sqlaux = $mysqli->query("select * from ".$prefixsql."userstiendas where iduser = '".$_COOKIE["lnxuserid"]."' and dft = '1' "); 
$rowaux = mysqli_fetch_assoc($sqlaux);
$user_dft_tienda = $rowaux["idtienda"];

$sqlaux = $mysqli->query("select * from ".$prefixsql."tiendas where id = '".$user_dft_tienda."' "); 
$rowaux = mysqli_fetch_assoc($sqlaux);
$user_dft_empresa = $rowaux["idempresa"];

$ary_tiendas = array();

$cnssql= $mysqli->query("SELECT DISTINCT(idtienda)  FROM ".$prefixsql."userstiendas WHERE iduser = '".$_COOKIE["lnxuserid"]."' ");	
while($col = mysqli_fetch_array($cnssql))
{
    array_push ( $ary_tiendas , $col["idtienda"] );
    
}


$xid = 0;
$sqlidtiendas = "";
foreach($ary_tiendas as $dbidtienda)
    {
    if($xid == 0)
    {
        $sqlidtiendas = "id = '".$dbidtienda."' ";
    }
    else 
    {
        $sqlidtiendas = $sqlidtiendas." or id = '".$dbidtienda."' ";
    }
    
    $xid = $xid +1;
    }

    
$lnx_urlinicio = "index.php?".$_SERVER["QUERY_STRING"];

$lnx_idtercero = $_GET["idtercero"];
?>
<form name="frmprint" method="POST" action="index.php?module=terceros&section=terceros&action=printrs" />
<input type="hidden" name="hurlinicio" value="<?php echo $lnx_urlinicio; ?>" />
<input type="hidden" name="hidtercero" value="<?php echo $lnx_idtercero; ?>" />
<input type="hidden" name="hvariableprint" value="<?php echo $_GET["variableprint"]; ?>" />


<div class="row">
<div class="col-sm-2">
Empresa
</div>
<div class="col">
<select name="lstempresas" id="lstempresas" class="campoencoger" >
<?php
$cnssql= $mysqli->query("SELECT DISTINCT(idempresa)  FROM ".$prefixsql."tiendas WHERE ".$sqlidtiendas." ");	
while($col = mysqli_fetch_array($cnssql))
{
    $sqlaux = $mysqli->query("select * from ".$prefixsql."empresas where id = '".$col["idempresa"]."' "); 
    $rowaux = mysqli_fetch_assoc($sqlaux);
    $dbrazonsocial = $rowaux["razonsocial"];

    if($col["id"] == $user_dft_empresa){$seleccionado = 'selected=""';}else{$seleccionado = '';}
    echo '<option value="'.$col["idempresa"].'" '.$seleccionado.'>'.$dbrazonsocial.'</option>';
}

?>
</select>
</div>
</div>

<div class="row">
<div class="col-sm-2">
Informe
</div>
<div class="col">
<select name="lstinformes" id="lstinformes" class="campoencoger" >
<?php

if($docp_informe == '')
{
    $sqlinformes = "select * from ".$prefixsql."docprint where idempresa = '".$user_dft_empresa."' ";
}
else
{
    $sqlinformes = "select * from ".$prefixsql."docprint where idempresa = '".$user_dft_empresa."' and codinforme = '".$docp_informe."' ";
}

$cnssql= $mysqli->query($sqlinformes);	
while($col = mysqli_fetch_array($cnssql))
{
    echo '<option value="'.$col["id"].'" >'.$col["descripcion"].'</option>';
    
}

?>
</select>
</div>
</div>

<div class="row">
<div class="col-sm-2">
Impresora
</div>
<div class="col">
<select name="lstimpresora" id="lstimpresora" class="campoencoger" >

<?php
$sqlaux = $mysqli->query("select * from ".$prefixsql."usersprinters where iduser = '".$_COOKIE["lnxuserid"]."' and dft = '1' "); 
$rowaux = mysqli_fetch_assoc($sqlaux);

$existe = $sqlaux->num_rows;
if($existe == 1)
{
    $user_dftprinter = $rowaux["idprinter"];
}
else 
{
    $user_dftprinter = '0';
}
if($user_dftprinter == '0'){$seleccionado = 'selected=""';}else{$seleccionado = '';}
echo '<option value="0" '.$seleccionado.'>Impresora PDF</option>';

$cnssql= $mysqli->query("select * from ".$prefixsql."usersprinters where iduser = '".$_COOKIE["lnxuserid"]."' ");	
while($col = mysqli_fetch_array($cnssql))
{
    $sqlaux = $mysqli->query("select * from ".$prefixsql."impresoras where id = '".$col["idprinter"]."' "); 
    $rowaux = mysqli_fetch_assoc($sqlaux);
    $lbl_printer_name = $rowaux["nombre"];
    $lbl_printer_notas = $rowaux["notas"];

    if($user_dftprinter == $col["idprinter"]){$seleccionado = 'selected=""';}else{$seleccionado = '';}
    echo '<option value="'.$col["idprinter"].'" '.$seleccionado.'>'.$lbl_printer_name.' - '.$lbl_printer_notas.'</option>';
    
}

?>
</select>
</div>
</div>


<div align="center" class="rectangulobtnsguardar" >

        <button type="submit" class="btnsubmit" >
                <i class="hidephonview fa fa-print fa-lg"></i> Imprimir
        </button>
<?php
$url_atras = "index.php?module=terceros&section=terceros";
if($docp_informe == "tercontact"){$url_atras = "index.php?module=terceros&section=contactos&idtercero=".$lnx_idtercero;}
if($docp_informe == "terlistado"){$url_atras = "index.php?module=terceros&section=terceros";}
?>
<a href="<?php echo $url_atras; ?>" class="btncancel">Cancelar</a>
</div>


</form>