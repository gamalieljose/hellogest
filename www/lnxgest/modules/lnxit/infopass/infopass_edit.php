<script src="core/com/js_terceros_all.js"></script>
<?php
$ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."it_infopass where id = '".$_GET["id"]."'");
$row = mysqli_fetch_assoc($ConsultaMySql);
$dbusuario = $row['usuario'];
$dbpassword = base64_decode($row["password"]); 
$dbemail = $row['email'];
$dbdonde = $row['donde'];
$dburlweb = $row['urlweb'];
$dbnotas = $row['notas'];
$dbidtercero = $row['idtercero'];



$tienepermiso = "NO";
if(lnx_check_perm(4801) > '0')
{
	//El usuario es superadmin
	$tienepermiso = "YES";
}
else 
{
	//Comprobar si el usuario o uno de los grupos a los que pertenece el usuario tiene acceso a la ficha
	$ConsultaMySql= $mysqli->query("SELECT count(*) as contador from ".$prefixsql."it_infopass_perm where iduser = '".$_COOKIE["lnxuserid"]."' and idinfopass = '".$_GET["id"]."'");
	$row = mysqli_fetch_assoc($ConsultaMySql);
	$dbcontador = $row["contador"];

	if($dbcontador > 0)
	{
		//si esta el usuario, puede editarlo
		$tienepermiso = "YES";
	}
	else 
	{
		//sino esta el usuario, buscaremos dentro de los grupos a los que pertenece dicho usuario
		$pertenece = '0';
		$cnssql= $mysqli->query("select * from ".$prefixsql."it_infopass_perm where idinfopass = '".$_GET["id"]."' and idgrupo > '0' ");	
		while($col = mysqli_fetch_array($cnssql))
		{
			//ahora buscaremos si el usuario pertenece a alguno de los grupos que hay asociado al infopass
			$idgrupo = $col["idgrupo"]; 

			$cnssqlaux = $mysqli->query("select count(*) as contador from ".$prefixsql."usersgroup where iduser = '".$_COOKIE["lnxuserid"]."' and idgroup = '".$idgrupo."' ");	
			while($colaux = mysqli_fetch_array($cnssqlaux))
			{
				if($colaux["contador"] > 0 ){$pertenece = $pertenece + 1;}
			}

			if($pertenece > 0)
			{
				//Si pertenece a alguno de los grupos, entonces puede editar
				$tienepermiso = "YES";
			}
			else 
			{
				$tienepermiso = "NO";	
			}
			
		}

	}
}



if ($tienepermiso == "YES")
{
	//si tiene permiso, puede editar


echo '<p><a href="index.php?module=lnxit&section=infopass&action=del&id='.$_GET["id"].'" class="btnenlacecancel">Eliminar</a></p>';
?>



<form name="form1" action="index.php?module=lnxit&section=infopass&action=save" method="post">

<div align="center">
<input type="hidden" name="haccion" value="update">


<?php echo '<input type="hidden" name="hidinfopass" value="'.$_GET["id"].'">'; ?>

<div class="row">
   <div class="col maintitle">
        EDITANDO - Datos infopass
   </div>
</div>


<div class="row">
    <div class="col-sm-2" align="left">
        Tercero
    </div>
    <div class="col" align="left">
<div id="div_buscatercero" style="display:none;">
<input type="text" value="" name="txttercero" id="txttercero" maxlength="50" placeholder="Escriba el nombre a buscar" class="campoencoger"/></br> 
</div>
<a href="javascript:mostrar();"><img src="img/buscar.jpg"/></a>
<?php
	//seleciona cliente
	
	echo '<select name="lsttercero" id="lsttercero" style="width: calc(100% - 230px);">';
	
	$cnsterceros = $mysqli->query("SELECT * from ".$prefixsql."terceros where id = '".$dbidtercero."'");
		
		while($colter = mysqli_fetch_array($cnsterceros))
		{     
                    if($colter["id"] == $dbidtercero ){$seleccionado = ' selected=""';}else{$seleccionado = '';}
			echo '<option value="'.$colter["id"].'" '.$seleccionado.'>'.$colter["razonsocial"].'</option>'; 
		}
		echo '</select>';
?>

    </div>
</div>
<div class="row">
   <div class="col-sm-2" align="left">
Usuario
   </div>
   <div class="col" align="left">
<?php echo '<input type="text" maxlength="50" class="campoencoger" name="txtusuario" required="" value="'.$dbusuario.'">'; ?>
   </div>
</div>
<div class="row">
   <div class="col-sm-2" align="left">
	Password
   </div>
   <div class="col" align="left">
<?php echo '<input type="text" maxlength="50" style="width: 100%;" name="txtpassword" required="" value="'.$dbpassword.'">'; ?>
   </div>
</div>
<div class="row">
   <div class="col-sm-2" align="left">
	e-mail asociado
   </div>
   <div class="col" align="left">
<?php echo '<input type="text" maxlength="50" style="width: 100%;" name="txtemail" value="'.$dbemail.'">'; ?>
   </div>
</div>
<div class="row">
   <div class="col-sm-2" align="left">
	Donde
   </div>
   <div class="col" align="left">
<?php echo '<input type="text" maxlength="50" style="width: 100%;" name="txtdonde" value="'.$dbdonde.'">'; ?>
   </div>
</div>
<div class="row">
<div class="col-sm-2" align="left">
  URL web
</div>
<div class="col" align="left">

<input type="text" maxlength="255" name="txturlweb" value="<?php echo $dburlweb; ?>" placeholder="http:// Ruta acceso web" style="width: 100%;" />

</div>
</div>
<div class="row">
   <div class="col-sm-2" align="left">
	Notas
   </div>
   <div class="col" align="left">
<?php echo '<textarea maxlength="50" style="width: 100%;" name="txtnotas" >'.$dbnotas.'</textarea>'; ?>
   </div>
</div>
<div class="row">
   <div class="col maintitle">
	Permisos de acceso
   </div>
</div>
<div class="row">
   <div class="col-sm">
<b>Usuarios autorizados</b></br>
<table width="100%">
<?php
//Por defecto:
$cnssql = "SELECT * FROM ".$prefixsql."users order by display";
$ConsultaMySql= $mysqli->query($cnssql);
$color = '1';
while($cat = mysqli_fetch_array($ConsultaMySql))
{
	if ($color == '1')
	{
		$color = '2';
		$pintacolor = "listacolor2";
	}
	else
	{
		$color = '1';
		$pintacolor = "listacolor1";
	}
	$cnsaux = $mysqli->query("SELECT count(*) as contador from ".$prefixsql."it_infopass_perm where idinfopass = '".$_GET["id"]."' and idusuario = '".$cat["id"]."'");
	$rowaux = mysqli_fetch_assoc($cnsaux);
	$dbcontador = $rowaux['contador'];
	
	if($dbcontador > '0'){$marcado = ' checked=""';}else{$marcado = '';}
		
	echo "<tr class=\"".$pintacolor."\" onmouseover=\"this.className = 'listacolorsobre'\" onmouseout=\"this.className = '".$pintacolor."'\">";
	echo '<td><input type="checkbox" name="chkusuario[]" value="'.$cat["id"].'" '.$marcado.'> '.$cat["display"].'</td>
	<tr>';
	
}
?>
</table>
</div>
<div class="col-sm">
<b>Grupos autorizados </b></br>

<table width="100%">
<?php
//Por defecto:
$cnssql = "SELECT * FROM ".$prefixsql."groups order by grupo";
$ConsultaMySql= $mysqli->query($cnssql);
$color = '1';
while($cat = mysqli_fetch_array($ConsultaMySql))
{
	if ($color == '1')
	{
		$color = '2';
		$pintacolor = "listacolor2";
	}
	else
	{
		$color = '1';
		$pintacolor = "listacolor1";
	}
	
	$cnsaux = $mysqli->query("SELECT count(*) as contador from ".$prefixsql."it_infopass_perm where idinfopass = '".$_GET["id"]."' and idgrupo = '".$cat["id"]."'");
	$rowaux = mysqli_fetch_assoc($cnsaux);
	$dbcontador = $rowaux['contador'];
	
	if($dbcontador > '0'){$marcado = ' checked=""';}else{$marcado = '';}

		
	echo "<tr class=\"".$pintacolor."\" onmouseover=\"this.className = 'listacolorsobre'\" onmouseout=\"this.className = '".$pintacolor."'\">";
	echo '<td><input type="checkbox" name="chkgrupo[]" value="'.$cat["id"].'" '.$marcado.'> '.$cat["grupo"].'</td>
	<tr>';
	
}
?>
</table>
</div>
</div>



<div align="center" class="rectangulobtnsguardar"> 
<input class="btnsubmit" name="btnguardar" value="Guardar" type="submit"> 
<a class="btncancel" href="index.php?module=lnxit&section=infopass">Cancelar</a>
</div>



</form>
<?php
//fin de poder editar 
}
else
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
