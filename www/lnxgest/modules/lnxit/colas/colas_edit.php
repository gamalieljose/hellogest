<?php
$idcola = $_GET["id"];

$sqlaux = $mysqli->query("select * from ".$prefixsql."it_colas where id ='".$idcola."' "); 
$rowaux = mysqli_fetch_assoc($sqlaux);
$dbcola = $rowaux["cola"];

?>

					   
<form name="form1" action="index.php?module=lnxit&section=colas&action=save" method="post">

<div align="center">
<input type="hidden" name="haccion" value="update">
<input type="hidden" name="hidcola" value="<?php echo $idcola; ?>">

<div class="row">
    <div class="col-sm-2" align="left">
        Nombre de la cola
    </div>
    <div class="col" align="left">
		<input type="text" maxlength="50" required="" value="<?php echo $dbcola; ?>" name="txtcola" class="campoencoger" />
    </div>
</div>

<div class="row">
  <div class="col-sm-2" align="left">
    Usuarios
  </div>
  <div class="col" align="left">
<?php

$contadorusuarios = 0;

$cnssql = "SELECT * FROM ".$prefixsql."it_colas_perm where idcola = '".$idcola."' ";
$ConsultaMySql= $mysqli->query($cnssql);
while($colusers = mysqli_fetch_array($ConsultaMySql))
{
  $contadorusuarios = $contadorusuarios +1;
  if($contadorusuarios == 1)
  {
    $strsqlusuarios = "id = '".$colusers["idusuario"]."'";
  }
  else 
  {
    $strsqlusuarios = $strsqlusuarios."or id = '".$colusers["idusuario"]."'";
  }
  
  
}

if($contadorusuarios == 0)
{
  $strsqlusuarios = "";
}
else 
{
  $strsqlusuarios = " or (".$strsqlusuarios.") ";  
}


$cnssql = "SELECT * FROM ".$prefixsql."users where activo = '1' ".$strsqlusuarios." order by display";
$ConsultaMySql= $mysqli->query($cnssql);
while($cat = mysqli_fetch_array($ConsultaMySql))
{

	
	$sqlaux = $mysqli->query("select count(*) as contador from ".$prefixsql."it_colas_perm where idcola = '".$idcola."' and idusuario = '".$cat["id"]."'"); 
	$rowaux = mysqli_fetch_assoc($sqlaux);
	$dbexisteusuario = $rowaux["contador"];
	
	if($dbexisteusuario > '0'){$seleccionado = ' checked=""';}else{$seleccionado = '';}
	
	echo '<label><input type="checkbox" name="chkusuario[]" value="'.$cat["id"].'" '.$seleccionado.'/> '.$cat["display"].'</label></br>';
	
}
?>
  </div>
</div>




<div align="center" class="rectangulobtnsguardar">
<input class="btnsubmit" name="btnguardar" value="Guardar" type="submit"> 
<a class="btncancel" href="index.php?module=lnxit&section=colas">Cancelar</a>
</div>

</form>

