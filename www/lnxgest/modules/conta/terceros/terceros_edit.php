<script src="modules/conta/ajax/ajx_conta.js"></script>
<?php
$idempresa = $_COOKIE["lnxcontaidempresa"];
$idtercero = $_GET["idtercero"];

$sqlaux = $mysqli->query("select * from ".$prefixsql."conta_cfpc where opcion = 'numdigitos' and idempresa = '".$idempresa."' "); 
$rowaux = mysqli_fetch_assoc($sqlaux);
$dbnumdigitos = $rowaux["valor"];

$sqlaux = $mysqli->query("select * from ".$prefixsql."terceros where id = '".$idtercero."'"); 
$rowaux = mysqli_fetch_assoc($sqlaux);
$dbrazonsocial = $rowaux["razonsocial"];
$dbnomcomercial = $rowaux["nomcomercial"];
$dbcodcli = $rowaux["codcli"];
$dbcodpro = $rowaux["codpro"];

//Comprobamos si hay codigo cliente para este tercero
$sqlaux = $mysqli->query("select * from ".$prefixsql."conta_master where idempresa = '".$idempresa."' and modulo = 'terceros-cli' and idreg = '".$idtercero."'"); 
$existecuentacli = $sqlaux->num_rows;
$rowaux = mysqli_fetch_assoc($sqlaux);
$cli_grp = $rowaux["grupo"];
$cli_sub = $rowaux["subcuenta"];

    $digitosgrupo = strlen($cli_grp);
    $digitosid = strlen($cli_sub);
    $digitostotal = $digitosgrupo + $digitosid;
    $cerosanadir = $dbnumdigitos - $digitostotal;

    $i = 0;
    $textoceros = "";
    do {
        $i = $i + 1;
        $textoceros = $textoceros."0";
    } 
    while ($i < $cerosanadir);

    $codigocontacli = $cli_grp.$textoceros.$cli_sub;



$sqlaux = $mysqli->query("select * from ".$prefixsql."conta_master where idempresa = '".$idempresa."' and modulo = 'terceros-pro' and idreg = '".$idtercero."'"); 
$existecuentapro = $sqlaux->num_rows;
$rowaux = mysqli_fetch_assoc($sqlaux);
$pro_grp = $rowaux["grupo"];
$pro_sub = $rowaux["subcuenta"];

    $digitosgrupo = strlen($pro_grp);
    $digitosid = strlen($pro_sub);
    $digitostotal = $digitosgrupo + $digitosid;
    $cerosanadir = $dbnumdigitos - $digitostotal;

    $i = 0;
    $textoceros = "";
    do {
        $i = $i + 1;
        $textoceros = $textoceros."0";
    } 
    while ($i < $cerosanadir);

    $codigocontapro = $pro_grp.$textoceros.$pro_sub;

?>

<form name="frmconta" method="POST" action="index.php?module=conta&section=terceros&action=save">
    
    <input type="hidden" name="haccion" value="update"/>
    <input type="hidden" name="hidtercero" value="<?php echo $idtercero; ?>"/>
    
<div class="row">
    <div class="col maintitle">
        Editando tercero
    </div>
</div>
<div class="row">
    <div class="col-sm-2">
        Razon Social
    </div>
    <div class="col">
        <a href="index.php?module=terceros&section=terceros&action=edit&idtercero=<?php echo $idtercero; ?>" ><?php echo $dbrazonsocial; ?></a>
    </div>
</div>
<div class="row">
    <div class="col-sm-2">
        Nombre Comercial
    </div>
    <div class="col">
        <?php echo $dbnomcomercial; ?>
    </div>
</div>
<div class="row">
    <div class="col maintitle">
        Datos Cliente
    </div>
</div>
<div class="row">
    <div class="col-sm-2">
        Codigo cliente </br>
        <?php 
        if($dbcodcli == "0")
        {            
            echo '<p>No disponible</p>';
        }
        else
        {
            echo $dbcodcli; 
        }
        ?>
    </div>
    <div class="col">
        Codigo contable cliente </br>
        <?php 
        if($dbcodcli == "0")
        {            
            echo '<p>Acceda a la ficha del tercero para habilitarlo como cliente si desea crear el código contable</p>';
            echo '<input type="hidden" value="OK" name="hcontacli" />';
        }
        else
        {
            if($existecuentacli > 0)
            {
                echo $codigocontacli;
                echo '<input type="hidden" value="OK" name="hcontacli" />';
            }
            else
            {
                echo '<p>Asignar nuevo código cliente</br>';
                echo "<input type=\"text\" value=\"\" name=\"txtcontacodcli\" id=\"txtcontacodcli\" onfocusout=\"contanuevocodigo('txtcontacodcli', 'lblcontacodcli', 'lblcontacli');\" style=\"width: 80px;\"/> ";
                echo '<label id="lblcontacli"></label></p>';
                echo '<p>Codigo abreviado</br>';
                echo '<input type="text" value="" name="lblcontacodcli" id="lblcontacodcli" readonly=""/> </p>';
            }
        }
        ?>
    </div>
</div>
<div class="row">
    <div class="col maintitle">
        Datos Proveedor
    </div>
</div>
<div class="row">
    <div class="col-sm-2">
        Codigo proveedor </br>
        <?php 
        if($dbcodpro == "0")
        {            
            echo '<p>No disponible</p>';
        }
        else
        {
            echo $dbcodpro; 
        }
        ?>
    </div>
    <div class="col">
        Codigo contable proveedor </br>
        <?php 
        if($dbcodpro == "0")
        {            
            echo '<p>Acceda a la ficha del tercero para habilitarlo como proveedor si desea crear el código contable</p>';
            echo '<input type="hidden" value="OK" name="hcontapro" />';
        }
        else
        {
            if($existecuentapro > 0)
            {
                echo $codigocontapro;
                echo '<input type="hidden" value="OK" name="hcontapro" />';
            }
            else
            {
                echo '<p>Asignar nuevo código proveedor</br>';
                echo "<input type=\"text\" value=\"\" name=\"txtcontacodpro\" id=\"txtcontacodpro\" onfocusout=\"contanuevocodigo('txtcontacodpro', 'lblcontacodpro', 'lblcontapro');\" style=\"width: 80px;\"/> ";
                echo '<label id="lblcontapro"></label></p>';
                echo '<p>Codigo abreviado</br>';
                echo '<input type="text" value="" name="lblcontacodpro" id="lblcontacodpro" readonly=""/> </p>';
            }
        }
        ?>
    </div>
</div>

<div align="center" class="rectangulobtnsguardar">

<input class="btnsubmit" name="btnguardar" value="Guardar" type="submit"> 

<a class="btncancel" href="index.php?module=conta&section=terceros">Cancelar</a>


</div>
</form>