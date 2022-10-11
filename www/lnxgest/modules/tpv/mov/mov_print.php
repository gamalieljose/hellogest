<form name="frmprint" method="POST" action="index.php?module=tpv&section=movprint&action=print">
    
<?php
echo '<input type="hidden" value="'.$_POST["dpkfechadesde"].'" name="dpkfechadesde" />';
echo '<input type="hidden" value="'.$_POST["dpkfechahasta"].'" name="dpkfechahasta" />';
echo '<input type="hidden" value="'.$_POST["lstseries"].'" name="lstseries" />';
echo '<input type="hidden" value="'.$_POST["lsttiendas"].'" name="lsttiendas" />';
echo '<input type="hidden" value="'.$_POST["lstterminal"].'" name="lstterminal" />';
?>

<div class="row">
    <div class="col maintitle" align="left">
        Imprimir listado
    </div>
</div>

<div class="row">
    <div class="col-sm-2" align="left">
        Fecha 
    </div>
    <div class="col-sm" align="left">
        Desde </br>
        <?php echo $_POST["dpkfechadesde"]; ?>
    </div>
    <div class="col-sm" align="left">
        Hasta </br>
        <?php echo $_POST["dpkfechahasta"]; ?>
    </div>
</div>
<div class="row">
    <div class="col-sm-2" align="left">
        Serie TPV 
    </div>
    <div class="col" align="left">
        <?php echo $_POST["lstseries"]; ?>
    </div>
</div>
<div class="row">
    <div class="col-sm-2" align="left">
        Tienda
    </div>
    <div class="col" align="left">
        <?php echo $_POST["lsttiendas"]; ?>
    </div>
</div>
<div class="row">
    <div class="col-sm-2" align="left">
        Caja 
    </div>
    <div class="col" align="left">
        <?php echo $_POST["lstterminal"]; ?>
    </div>
</div>
<div class="row">
    <div class="col maintitle" align="left">
        Selecione impresora y plantilla
    </div>
</div>
<div class="row">
    <div class="col-sm-2" align="left">
        Impresora 
    </div>
    <div class="col" align="left">
        <select name="lstprinter" style="width: 100%;">
            <option value="0">PDF</option>
<?php
$ConsultaMySql= $mysqli->query("SELECT * FROM ".$prefixsql."usersprinters WHERE iduser = '".$_COOKIE["lnxuserid"]."'");
while($col = mysqli_fetch_array($ConsultaMySql))
{
    $cnsuax = $mysqli->query("SELECT * from ".$prefixsql."impresoras where id = '".$col["idprinter"]."' ");
    $rowaux = mysqli_fetch_assoc($cnsuax);
    $lblname = $rowaux["nombre"];
    $lblnotas = $rowaux["notas"];
    $tipo = $rowaux["tipo"];
    if ($tipo == "2")
    {
        echo '<option value="'.$col["id"].'">'.$lblname.' - '.$lblnotas.'</option>';
    }
}
?>
        </select>
    </div>
</div>

<div class="row">
    <div class="col-sm-2" align="left">
        Plantilla 
    </div>
    <div class="col" align="left">
        <select name="lstdocprint" style="width: 100%;">
            <option value="tpv_listado_vr.php">Vista Registros</option>
            <option value="tpv_listado_vf.php">Vista Facturación</option>
        </select>
    </div>
</div>

<div align="center" class="rectangulobtnsguardar">

<input type="submit" class="btnsubmit" name="btnguardar" value="Imprimir" > 
<a class="btncancel" href="index.php?module=tpv&section=mov" >Cancelar</a>
</div>

</form>