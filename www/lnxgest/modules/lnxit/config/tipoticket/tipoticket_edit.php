<?php
$idtipoticket = $_GET["id"];

$cnssql = "SELECT * FROM ".$prefixsql."it_tipos where id = '".$idtipoticket."'";
$ConsultaMySql= $mysqli->query($cnssql);
$row = mysqli_fetch_assoc($ConsultaMySql);
$dbtipo = $row["tipo"];
$dbactivo = $row["activo"];
?>

					   
<form name="form1" action="index.php?module=lnxit&section=tipoticket&action=save" method="post">

<input type="hidden" name="haccion" value="update" />
<input type="hidden" name="hidtipo" value="<?php echo $idtipoticket; ?>" />
    
<div class="row">
    <div class="col-sm-2" align="left">
        
    </div>
    <div class="col" align="left">
<?php
if($dbactivo == "1"){$seleccionado = ' checked=""';}else{$seleccionado = '';}
    echo '<label><input type="checkbox" name="chlactivo" '.$seleccionado.' value="1" /> Activo</label>';
?>
    </div>
</div>
<div class="row">
    <div class="col-sm-2" align="left">
        Tipo de Ticket
    </div>
    <div class="col" align="left">
        <input type="text" name="txttipoticket" required="" value="<?php echo $dbtipo; ?>" class="campoencoger">
    </div>
</div>
    
<div align="center" class="rectangulobtnsguardar">
<input class="btnsubmit" name="btnguardar" value="Guardar" type="submit"> 

<a class="btncancel" href="index.php?module=lnxit&section=tipoticket">Cancelar</a>
</div>

</form>