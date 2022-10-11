


<?php
include("modules/core/users/users/botonera.php");


$sqlbuscar= $mysqli->query("SELECT * from ".$prefixsql."users where id = '".$iduser."'");
$row = mysqli_fetch_assoc($sqlbuscar);
$dbidempresa = $row["idempresa"];

$sqlbuscar= $mysqli->query("SELECT * from ".$prefixsql."empresas where id = '".$dbidempresa."'");
$row = mysqli_fetch_assoc($sqlbuscar);
$lbl_empresa = $row["razonsocial"];

$sqlbuscar= $mysqli->query("SELECT * from ".$prefixsql."router where idempresa = '".$dbidempresa."' and opcion = 'orangehrm_activo'");
$row = mysqli_fetch_assoc($sqlbuscar);
$dborangehrm_activo = $row["valor"];

if($dborangehrm_activo == "1")
{
	$sqlbuscar= $mysqli->query("SELECT * from ".$prefixsql."router where idempresa = '".$dbidempresa."' and opcion = 'orangehrm_routerurl'");
	$row = mysqli_fetch_assoc($sqlbuscar);
	$dborangehrm_routerurl = $row["valor"]; //Valor de la URL para obtener los datos
	
	$sqlbuscar= $mysqli->query("SELECT * from ".$prefixsql."router where idempresa = '".$dbidempresa."' and opcion = 'orangehrm_routerurl'");
	$row = mysqli_fetch_assoc($sqlbuscar);
	$dborangehrm_router = $row["valor"];
	
	$sqlbuscar= $mysqli->query("SELECT * from ".$prefixsql."router where idempresa = '".$dbidempresa."' and opcion = 'orangehrm_routerpass'");
	$row = mysqli_fetch_assoc($sqlbuscar);
	$dborangehrm_routerpass = $row["valor"];
	
	
	
}

?>

<div class="row">
	<div class="col-sm-2">
		Empresa
	</div>
	<div class="col">
		<?php echo $lbl_empresa; ?>
	</div>
</div>
<div class="row">
	<div class="col maintitle">
		Orange HRM
	</div>
</div>
<?php
if($dborangehrm_activo == "1")
{
	
	$sqlaux = $mysqli->query("SELECT * from ".$prefixsql."users_app where iduser = '".$iduser."' and app = 'orangehrm'");
	$row = mysqli_fetch_assoc($sqlaux);
	$dborangehrm_idempleado = $row["idremote"]; 
	
	
	
echo '<form name="form1" method="POST" action="index.php?&module=core&section=rrhhsave&id='.$iduser.'">';	
?>
	<div class="row">
		<div class="col-sm-2">
			Usuario Orange HRM
			<input type="hidden" value="<?php echo $iduser; ?>" name="hiduser"/>
		</div>
		<div class="col">

			<select name="lstorangehrm_userid" id="lstorangehrm_userid" style="width: 100%;">
			<option value="0">-Sin asignar-</option>
			
<?php
// abrimos la sesión cURL
$ch = curl_init();
 
// definimos la URL a la que hacemos la petición
curl_setopt($ch, CURLOPT_URL,$dborangehrm_router);
// indicamos el tipo de petición: POST
curl_setopt($ch, CURLOPT_POST, TRUE);
// definimos cada uno de los parámetros
curl_setopt($ch, CURLOPT_POSTFIELDS, "lnxquery=empleados&pass=".$dborangehrm_routerpass);
 
// recibimos la respuesta y la guardamos en una variable
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$remote_server_output = curl_exec ($ch);
 
// cerramos la sesión cURL
curl_close ($ch);
 
// hacemos lo que queramos con los datos recibidos
// por ejemplo, los mostramos




$empleados = new SimpleXMLElement($remote_server_output);

/* Para cada <personaje>, se muestra cada <nombre>. */
foreach ($empleados->empleado as $personaje) 
{
	$idremoto = $personaje->id;
	if($dborangehrm_idempleado == $idremoto){$seleccionado = ' selected=""';}else{$seleccionado = '';}
   echo '<option value="'.$personaje->id.'" '.$seleccionado.'>'.$personaje->nombre.'</option>';
}



?>
			</select>
		</div>
	</div>
	
<?php
//Muestra los datos del Orange HRM
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$dborangehrm_router);
curl_setopt($ch, CURLOPT_POST, TRUE);
curl_setopt($ch, CURLOPT_POSTFIELDS, "lnxquery=empleados&idempleado=".$dborangehrm_idempleado."&pass=".$dborangehrm_routerpass);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$remote_server_output = curl_exec ($ch);
curl_close ($ch);

$empleado = "";
$empleado = new SimpleXMLElement($remote_server_output);

echo '<p>-----------------</p>';


foreach ($empleado->empleado as $personaje) 
{

   echo '<p>'.$personaje->id.'</p>';
   echo '<p>'.$personaje->nombre.'</p>';
   echo '<p>'.$personaje->apellido1.'</p>';
   echo '<p>'.$personaje->apellido2.'</p>';
}

?>
	
	
	
<div align="center" class="rectangulobtnsguardar">

<input class="btnsubmit" name="btnguardar" value="Guardar" type="submit"> 

</div>
	
</form>
<?php
}

?>