<?php
$idempresa = $_COOKIE["lnxcontaidempresa"];
$idejercicio = $_GET["idejercicio"];

$sqlaux = $mysqli->query("select * from ".$prefixsql."conta_ejercicios where id = '".$idejercicio."'"); 
$rowaux = mysqli_fetch_assoc($sqlaux);
$lbl_codigo = $rowaux["codigo"];
$lbl_descripcion = $rowaux["descripcion"];
?>
<form name="frmgrupos" method="POST" action="index.php?module=conta&section=subgrupos&action=save">
    <input type="hidden" name="haccion" value="new" />
    <input type="hidden" name="hidejercicio" value="<?php echo $idejercicio; ?>" />
    
<div class="row">
    <div class="col maintitle">
        Cuadro de cuentas y relaciones contables del Plan General de Contabilidad </br>
        <?php echo '<b>'.$lbl_codigo.'</b> - '.$lbl_descripcion; ?>
    </div>
</div>

<div class="row">
    <div class="col maintitle">
        Nuevo subgrupo
    </div>
</div>

<div class="row">
    <div class="col-sm-2">
        Codigo subgrupo
    </div>
    <div class="col">
        <input type="number" min="1" max="99999" name="txtcodgrupo" required="" />
    </div>
</div>
<div class="row">
    <div class="col-sm-2">
        Nombre subgrupo
    </div>
    <div class="col">
        <input type="text" maxlength="50" name="txtgrupo" required="" style="width: 100%;"/>
    </div>
</div>

<div align="center" class="rectangulobtnsguardar">

<input class="btnsubmit" name="btnguardar" value="Guardar" type="submit"> 

<?php
echo '<a class="btncancel" href="index.php?module=conta&section=subgrupos&idejercicio='.$idejercicio.'">Cancelar</a>';
?>

</div>
</form>