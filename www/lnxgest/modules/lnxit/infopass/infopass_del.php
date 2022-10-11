<script src="core/com/js_terceros_all.js"></script>
<?php
$ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."it_infopass where id = '".$_GET["id"]."'");
$row = mysqli_fetch_assoc($ConsultaMySql);
$dbdonde = $row["donde"];



//comprobar permisos
// Buscamos permiso 2004 que es acceso si o si a las contraseñas y para ello buscamos por usuario y grupos asociados

//buscamos permiso especifico por usuario



$ConsultaMySql= $mysqli->query("SELECT count(*) as contador from ".$prefixsql."permisosgrupos where iduser = '".$_COOKIE["lnxuserid"]."' and idpermiso = '2004'");
$row = mysqli_fetch_assoc($ConsultaMySql);
$dbcontador = $row['contador'];

if($dbcontador > 0){$tienepermisouser = "SI";}else{$tienepermisouser = "NO";}


//ahora buscamos a que grupos pertenece el usuario
$tienepermisogrupo = "NO";
$cnssql = "SELECT * FROM ".$prefixsql."usersgroup where iduser = '".$_COOKIE["lnxuserid"]."'";
$ConsultaMySql= $mysqli->query($cnssql);

while($grupo = mysqli_fetch_array($ConsultaMySql))
{
	$cnsgrupos= $mysqli->query("SELECT count(*) as contador from ".$prefixsql."permisosgrupos where idgrupo = '".$grupo["idgroup"]."' and idpermiso = '2004'");
	$rowgrupo = mysqli_fetch_assoc($cnsgrupos);
	$dbcontador = $rowgrupo['contador'];

	if($dbcontador > 0){$tienepermisogrupo = "SI"; }
}

if($tienepermisogrupo == "SI" || $tienepermisouser == "SI"){$tienepermiso = "SI";}else{$tienepermiso = "NO";}



if ($tienepermiso == "NO")
{
	//si no hemos encontrado permiso 2004 (acceso si o si a infopass) entonces buscaremos dentro de los permisos del registro
	
	$cnsaux = $mysqli->query("SELECT count(*) as contador from ".$prefixsql."it_infopass_perm where idinfopass = '".$_GET["id"]."' and idusuario = '".$_COOKIE["lnxuserid"]."'");
	$rowaux = mysqli_fetch_assoc($cnsaux);
	$dbcontador = $rowaux['contador'];
	
	if($dbcontador > '0'){$tienepermiso = "SI";}
	
}
if ($tienepermiso == "NO")
{
	//si no hemos encontrado permiso 2004 (acceso si o si a infopass) entonces buscaremos dentro de los permisos del registro
	//pero esta vez por los grupos a los que pertenezca el usuario
	$cnssql = "SELECT * FROM ".$prefixsql."usersgroup where iduser = '".$_COOKIE["lnxuserid"]."'";
	$ConsultaMySql= $mysqli->query($cnssql);

	while($grupo = mysqli_fetch_array($ConsultaMySql))
	{
		$cnsaux = $mysqli->query("SELECT count(*) as contador from ".$prefixsql."it_infopass_perm where idinfopass = '".$_GET["id"]."' and idgrupo = '".$grupo["idgroup"]."'");
		$rowaux = mysqli_fetch_assoc($cnsaux);
		$dbcontador = $rowaux['contador'];
		if($dbcontador > '0'){$tienepermiso = "SI";}
	}
			
	
	
}




if ($tienepermiso == "SI")
{
	//si tiene permiso, puede editar

?>



<form name="form1" action="index.php?module=lnxit&section=infopass&action=save" method="post">

<div align="center">
<input type="hidden" name="haccion" value="delete">
<input type="hidden" name="hidinfopass" value="<?php echo $_GET["id"]; ?>">

<div align="center">
<table style="max-width: 400px; width: 100%;" class="msgaviso">
<tr class="maintitle">Eliminar password</td></tr>
<tr><td align="center">
<p>¿Esta seguro de quere eliminar este password?</p>

<p><?php echo $_GET["id"].' - '.$dbdonde; ?></p>

<p><input class="btnsubmit" name="btnguardar" value="Eliminar" type="submit"> 
<a class="btncancel" href="index.php?module=lnxit&section=infopass">Cancelar</a>
</p>
</td></tr>
</table>

</div>





</form>
<?php
//fin de poder editar 
}else
{
	$urlatras = "index.php?module=lnxit&section=infopass";
header( "refresh:2;url=".$urlatras );
	echo '<div align="center">
	<table width="300" class="msgaviso">
	<tr><td class="maintitle">mensaje:</td></tr>
	<tr><td>NO Dispone de permiso para acceder</td></tr>
	<tr><td align="center"><a class="btnedit" href="'.$urlatras.'">Aceptar</a></td></tr>
	</table></div>';
}
?>
