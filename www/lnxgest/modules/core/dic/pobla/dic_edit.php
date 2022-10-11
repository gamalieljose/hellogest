<script src="scripts/jquery/jquery-2.1.1.js"></script>

<script language="javascript">
$(document).ready(function(){
   $("#cbpais").change(function () {
           $("#cbpais option:selected").each(function () {
            elegido=$(this).val();
            $.post("modules/terceros/ajax/ajx_pais-prov.php", { elegido: elegido }, function(data){
            $("#cbprovincias").html(data);
            });            
        });
   })
});
</script>
<?php
$iddic = $_GET["id"];

$ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."poblaciones where id = '".$iddic."'");
$row = mysqli_fetch_assoc($ConsultaMySql);
$dbpoblacion = $row['poblacion'];
$dbidprov = $row['idprov'];
$dbidpais = $row['idpais'];
$dbcp = $row['cp'];


if($_GET["upd"] == "ate")
{
echo '<div class="animated fadeOut" align="center" style="width:100%; ba">
Cambios aplicados con éxito
</div>';
}
?>

<?php
echo '<p><a href="index.php?module=core&section=dic&subs=pobla&action=del&id='.$iddic.'" class="btnenlacecancel">Eliminar</a></p>';
?>

<form name="nuevodic" action="index.php?module=core&section=dic&subs=pobla&action=save" method="post">
<input type="hidden" name="haccion" value="update">

<?php echo '<input type="hidden" name="hiddic" value="'.$iddic.'">'; ?>

<div class="row">
  <div class="col-sm-2" align="left">
    Pais
  </div>
  <div class="col" align="left">
    <select name="cbpais" id="cbpais" class="campoencoger">
	<?php
	$cnsaux = $mysqli->query("SELECT * from ".$prefixsql."paises order by pais");
	while($col = mysqli_fetch_array($cnsaux))
	{
		if($dbidpais == $col["id"]){$seleccionado = ' selected=""';}else{$seleccionado = '';}
		echo '<option value="'.$col["id"].'" '.$seleccionado.'>'.$col["pais"].'</option>';
	}
	?>
	</select>
  </div>
</div>

<div class="row">
  <div class="col-sm-2" align="left">
    Provincia
  </div>
  <div class="col" align="left">
    <select name="cbprovincias" id="cbprovincias" class="campoencoger">
	<?php
	$cnsaux = $mysqli->query("SELECT * from ".$prefixsql."provincias where idpais = '".$dbidpais."' order by provincia");
	while($col = mysqli_fetch_array($cnsaux))
	{
		if($dbidprov == $col["id"]){$seleccionado = ' selected=""';}else{$seleccionado = '';}
		echo '<option value="'.$col["id"].'" '.$seleccionado.'>'.$col["provincia"].'</option>';
	}
	?>
	</select>
  </div>
</div>
<div class="row">
  <div class="col-sm-2" align="left">
    CP
  </div>
  <div class="col" align="left">
	<?php echo '<input name="txtcp" required="" maxlength="10" type="text" value="'.$dbcp.'" class="campoencoger">'; ?>
  </div>
</div>
<div class="row">
  <div class="col-sm-2" align="left">
    Poblacion
  </div>
  <div class="col" align="left">
	<?php echo '<input name="txtpobla" required="" maxlength="50" type="text" value="'.$dbpoblacion.'" class="campoencoger">'; ?>
  </div>
</div>

<div align="center" class="rectangulobtnsguardar">

<input class="btnsubmit" name="btnguardar" value="Guardar" type="submit"> 
<input class="btnapply" name="btnaplicar" value="Aplicar" type="submit"> 

<a class="btncancel" href="index.php?module=core&section=dic&subs=pobla">Cancelar</a>

</div>


</form>