<?php
$idcamp = $_GET["idcamp"];
$sqlaux = $mysqli->query("select * from ".$prefixsql."crm_camp where id = '".$idcamp."'"); 
$rowaux = mysqli_fetch_assoc($sqlaux);
$dbcamp = $rowaux["camp"];
$dbnotas = $rowaux["notas"];


?>
      
<?php
include("modules/crm/camp/botonera.php");
?>

<form name="frmcamp" method="POST" action="index.php?module=crm&section=camp&action=save">
<input type="hidden" name="haccion" value="update" />
<input type="hidden" name="hidcamp" value="<?php echo $idcamp; ?>" />
<div class="row">
    <div class="col-sm-2" align="left">
        Campaña
    </div>
    <div class="col" align="left">
        <input type="text" value="<?php echo $dbcamp; ?>" name="txtcamp" maxlength="50" class="campoencoger" required="" /> 
    </div>
</div>
<div class="row">
    <div class="col-sm-2" align="left">
        Notas
    </div>
    <div class="col" align="left">
        <textarea name="txtnotas" maxlength="5000" class="campoencoger" ><?php echo $dbnotas; ?></textarea> 
    </div>
</div>

<div align="center" class="rectangulobtnsguardar">

<input class="btnsubmit" name="btnguardar" value="Guardar" type="submit"> 

<a class="btncancel" href="index.php?module=crm&section=camp">Cancelar</a>

</div>
    
</form>
