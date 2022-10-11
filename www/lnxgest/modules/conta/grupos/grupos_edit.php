<?php
$idempresa = $_COOKIE["lnxcontaidempresa"];
$idejercicio = $_GET["idejercicio"];

$idgrupo = $_GET["id"];

$sqlaux = $mysqli->query("select * from ".$prefixsql."conta_ejercicios where id = '".$idejercicio."'"); 
$rowaux = mysqli_fetch_assoc($sqlaux);
$lbl_codigo = $rowaux["codigo"];
$lbl_descripcion = $rowaux["descripcion"];

$sqlaux = $mysqli->query("select * from ".$prefixsql."conta_grupos where id = '".$idgrupo."'"); 
$rowaux = mysqli_fetch_assoc($sqlaux);
$dbcodgrupo = $rowaux["codgrupo"];
$dbgrupo = $rowaux["grupo"];
?>
<form name="frmgrupos" method="POST" action="index.php?module=conta&section=grupos&action=save">
    <input type="hidden" name="haccion" value="update" />
    <input type="hidden" name="hidejercicio" value="<?php echo $idejercicio; ?>" />
    <input type="hidden" name="hidgrupo" value="<?php echo $idejercicio; ?>" />
    
<div class="row">
    <div class="col maintitle">
        Cuadro de cuentas y relaciones contables del Plan General de Contabilidad </br>
        <?php echo '<b>'.$lbl_codigo.'</b> - '.$lbl_descripcion; ?>
    </div>
</div>

<div class="row">
    <div class="col maintitle">
        Editando grupo
    </div>
</div>

<div class="row">
    <div class="col-sm-2">
        Codigo grupo
    </div>
    <div class="col">
        <input type="number" min="1" max="99999" value="<?php echo $dbcodgrupo; ?>" name="txtcodgrupo" required="" />
    </div>
</div>
<div class="row">
    <div class="col-sm-2">
        Nombre grupo
    </div>
    <div class="col">
        <input type="text" maxlength="50" value="<?php echo $dbgrupo; ?>" name="txtgrupo" required="" style="width: 100%;"/>
    </div>
</div>

<div align="center" class="rectangulobtnsguardar">

<input class="btnsubmit" name="btnguardar" value="Guardar" type="submit"> 

<?php
echo '<a class="btncancel" href="index.php?module=conta&section=grupos&idejercicio='.$idejercicio.'">Cancelar</a>';
?>

</div>
</form>