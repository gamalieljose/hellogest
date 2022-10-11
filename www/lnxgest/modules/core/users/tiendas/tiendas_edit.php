<?php 
include("modules/core/users/users/botonera.php"); 

$iduser = $_GET["id"];

$sqltienda = $mysqli->query("select * from ".$prefixsql."userstiendas where id = '".$_GET["idtienda"]."'");
$row = mysqli_fetch_assoc($sqltienda);
$dbdft = $row["dft"];
$dbidtienda = $row["idtienda"];
$dbidterminal = $row["idterminal"];

$sqltienda = $mysqli->query("select * from ".$prefixsql."tiendas where id = '".$dbidtienda."'");
$row = mysqli_fetch_assoc($sqltienda);
$nomtienda = $row["tienda"];

echo '<p><a href="index.php?module=core&&section=utiendas&action=del&idtienda='.$_GET["idtienda"].'" class="btnenlacecancel">Eliminar tienda</a></p>';

?>

<form name="editausuario" action="index.php?module=core&&section=utiendas&action=save" method="post">



<div class="row">
  <div class="col maintitle" align="left">
    Tiendas del usuario
  </div>
</div>


<input type="hidden" name="haccion" value="update">
<?php 
echo '<input type="hidden" name="hiduser" value="'.$_GET["id"].'">'; 
echo '<input type="hidden" name="hidtienda" value="'.$_GET["idtienda"].'">'; 

?>


<div class="row">
  <div class="col-sm-2">
	
  </div>
  <div class="col" align="left">
    <?php 

if($dbdft == '1' ){$seleccionado = 'checked=""';}else{$seleccionado = '';}

echo '<input type="checkbox" value="1" name="chkdft" '.$seleccionado.'/> '; 

?>
Tienda por defecto
  </div>
</div>

<div class="row">
  <div class="col-sm-2">
	Tienda
  </div>
  <div class="col" align="left">
    
	<?php
	echo $nomtienda;
	?>
  </div>
</div>
<div class="row">
  <div class="col-sm-2">
	Terminal defecto
  </div>
  <div class="col" align="left">
	<select name="lstterminal" style="width: 100%;" >
<?php

$sqlusers = $mysqli->query("select * from ".$prefixsql."pos_terminales where idtienda = '".$dbidtienda."'");
while($col = mysqli_fetch_array($sqlusers))
{
	if($col["id"] == $dbidterminal){$seleccionado = ' selected=""';}else{$seleccionado = '';}
	echo '<option value="'.$col["id"].'" '.$seleccionado.'>'.$col["descripcion"].'</option>';
}


?>
	</select>
  </div>
</div>




<div align="center" class="rectangulobtnsguardar">

<input class="btnsubmit" name="btnguardar" value="Guardar" type="submit"> 

<?php echo '<a class="btncancel" href="index.php?&module=core&&section=utiendas&id='.$iduser.'">Cancelar</a>'; ?>

</div>

</form>