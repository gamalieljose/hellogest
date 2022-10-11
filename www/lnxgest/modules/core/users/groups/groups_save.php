<?php
$fhaccion = $_POST["haccion"];
$ftxtgrupo = $_POST["txtgrupo"];
$fhidgrupo = $_POST["hidgrupo"];

if($fhaccion == "new")
{
	
	$sqlgrupos = $mysqli->query("insert into ".$prefixsql."groups (grupo) VALUES ('".$ftxtgrupo."')");
	
	$sqlgrupos = $mysqli->query("SELECT max(id) as contador from ".$prefixsql."groups");
	$row = mysqli_fetch_assoc($sqlgrupos);
	$dbidgrupo = $row["contador"];
}
if($fhaccion == "update")
{

	$sqlgrupos = $mysqli->query("update ".$prefixsql."groups set grupo = '".$ftxtgrupo."' where id = '".$fhidgrupo."'");
	$dbidgrupo = $fhidgrupo;

}
if($fhaccion == "delete")
{
	
	$sqlgrupos = $mysqli->query("delete from ".$prefixsql."groups where id = '".$fhidgrupo."'");
	$dbidgrupo = $fhidgrupo;
}


//borramos los permisos asociados a dicho grupo
	$sqlpermisosdegrupo = $mysqli->query("delete from ".$prefixsql."permisosgrupos where idgrupo = '".$dbidgrupo."' ");

//Registramos los permisos del nuevo grupo en la base de datos
	
	foreach ($_POST['chkpermiso'] as $idpermiso)
	{
	   // echo '<p>Permiso id: '.$idpermiso.'</p>';
	   $sqlpermisosdegrupo = $mysqli->query("insert into ".$prefixsql."permisosgrupos (iduser, idgrupo, idpermiso) VALUES ('0', '".$dbidgrupo."', '".$idpermiso."')");
	}
	
	

	
	





$urlatras = "index.php?&module=core&section=groups";

header( "refresh:2;url=".$urlatras );
	echo '<div align="center">
	<table width="300" class="msgaviso">
	<tr><td class="maintitle">mensaje:</td></tr>
	<tr><td>Cambios efectuados con éxito</td></tr>
	<tr><td align="center">';
	if($fhaccion == "update")
	{
		echo '<a class="btnedit" href="index.php?module=core&section=groups&action=edit&id='.$fhidgrupo.'">Seguir Editando</a>';
	}
	
	echo ' <a class="btnedit" href="'.$urlatras.'">Aceptar</a></td></tr>
	</table></div>';
	
	?>