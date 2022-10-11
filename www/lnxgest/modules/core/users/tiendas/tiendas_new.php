<?php 
include("modules/core/users/users/botonera.php"); 

$iduser = $_GET["id"];

$sqlcorreo = $mysqli->query("SELECT * from ".$prefixsql."userstiendas where iduser = '".$iduser."'");
$row = mysqli_fetch_assoc($sqlbuscar);
$dbdft = $row["dft"];

$existe = $sqlcorreo->num_rows;




?>

<form name="editausuario" action="index.php?module=core&&section=utiendas&action=save" method="post">


<div class="row">
  <div class="col maintitle" align="left">
    Tiendas del usuario
  </div>
</div>


<input type="hidden" name="haccion" value="new">
<?php echo '<input type="hidden" name="hiduser" value="'.$_GET["id"].'">'; ?>


<div class="row">
  <div class="col-sm-2">
	
  </div>
  <div class="col" align="left">
    <?php 

if($existe == '0' || $existe == '' ){$seleccionado = 'checked=""';}else{$seleccionado = '';}

echo '<input type="checkbox" value="1" name="chkdft" '.$seleccionado.'/> '; 

?>
Tienda por defecto
  </div>
</div>

<div class="row">
  <div class="col-sm-2">
	Seleccione la tienda
  </div>
  <div class="col" align="left">
    <select name="lsttiendas" style="width: 100%;">
	<?php
	
	
	$sqltiendas = $mysqli->query("select ".$prefixsql."tiendas.id, ".$prefixsql."tiendas.tienda from ".$prefixsql."tiendas where ".$prefixsql."tiendas.id not in ( select idtienda from ".$prefixsql."userstiendas idtienda where iduser = '".$_GET["id"]."') order by ".$prefixsql."tiendas.tienda");
	while($col = mysqli_fetch_array($sqltiendas))
	{
		$sqlaux = $mysqli->query("SELECT * from ".$prefixsql."tiendas where id = '".$col["id"]."'");
		$rowaux = mysqli_fetch_assoc($sqlaux);
		$auxidempresa = $rowaux["idempresa"];
		
		$sqlaux = $mysqli->query("SELECT * from ".$prefixsql."empresas where id = '".$auxidempresa."'");
		$rowaux = mysqli_fetch_assoc($sqlaux);
		$nomempresa = $rowaux["razonsocial"];
		
		echo '<option value="'.$col["id"].'">'.$col["tienda"].' - '.$nomempresa.'</option>';
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