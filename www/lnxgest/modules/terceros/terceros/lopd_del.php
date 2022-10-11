<?PHP
$idregistro = $_GET["id"];
$idtercero = $_GET["idtercero"];

//Recuperamos los valores de la BBDD

$buscatercero = $mysqli->query("SELECT * FROM ".$prefixsql."terceros_lopd_files where id = '".$idregistro."'");
$row = mysqli_fetch_assoc($buscatercero);
    $dbidempresa = $row["idempresa"];
    $dbidcatlopd = $row["idcatlopd"];
    $dbdescripcion = $row["descripcion"];


$buscatercero = $mysqli->query("SELECT * FROM ".$prefixsql."terceros where id = '".$idtercero."'");
$row = mysqli_fetch_assoc($buscatercero);
	
	$dbrazonsocial = $row["razonsocial"];
	
include("modules/terceros/botones.php");
?>
<p>Tercero: <b><?php echo $dbrazonsocial; ?></b></p>

<?php echo '<form name="frmplantillalopd" action="index.php?module=terceros&section=terceroslopd&idtercero='.$idtercero.'&action=save" method="POST" >'; ?>
<input type="hidden" name="haccion" value="delete" />
<?php 
    echo '<input type="hidden" name="hidtercero" value="'.$idtercero.'" />'; 
    echo '<input type="hidden" name="hidregistro" value="'.$idregistro.'" />';
?>


<div align="center">

<table width="300" class="msgaviso">
    <tr class="maintitle"><td>Eliminar fichero</td></tr>
    <tr><td align="center">
            ¿Desea eliminar el siguiente archivo? </br>
            </br>
            
            <?php echo '<b>'.$dbdescripcion.'</b>'; ?>
            
            </br>
            </br>
            
            <input class="btnsubmit" name="btnnuevousuario" value="Guardar" type="submit"> 

<?php echo '<a class="btncancel" href="index.php?module=terceros&section=terceroslopd&idtercero='.$idtercero.'">Cancelar</a>'; ?>

            
    </td></tr>

</table>
     
  




</div>

</form>