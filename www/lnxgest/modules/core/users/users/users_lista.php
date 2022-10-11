<?php
$sqlaux = $mysqli->query("select * from ".$prefixsql."users_config where opcion = 'ALLOW_LOGIN' "); 
$rowaux = mysqli_fetch_assoc($sqlaux);
$permitido_login = $rowaux["valor"];

if($permitido_login == "YES")
{
	$lbl_inicio = '<i style="color: green;" class="hidephonview fa fa-check-circle fa-lg"></i> Permitido el inicio de sesión';
}
else
{
	$sqlaux = $mysqli->query("select * from ".$prefixsql."users_config where opcion = 'IDUSERALLOWED' "); 
	$rowaux = mysqli_fetch_assoc($sqlaux);
	$iduser_allow = $rowaux["valor"];

	$sqlaux = $mysqli->query("select * from ".$prefixsql."users where id = '".$iduser_allow."' "); 
	$rowaux = mysqli_fetch_assoc($sqlaux);
	$lbl_userallowed = $rowaux["display"];

	$lbl_inicio = '<i style="color: red;" class="hidephonview fa fa-times-circle fa-lg"></i> Bloqueado el inicio de sesión, excepto para: '.$lbl_userallowed;
}


?>
<p>
<a class="btnedit" href="index.php?module=core&section=users&action=new">Nuevo usuario</a>
<?php
if(lnx_check_perm(7003) > 0)
{
echo '<a href="index.php?module=core&section=users&action=login" class="btnedit">Configurar inicio de sesión</a> ';
}
?>
</p>
<p align="center"><?php echo $lbl_inicio; ?></p>

<table width="100%">
<tr class="maintitle">
<td width="80"></td>
<td width="80">ID</td>
<td>Display</td>
<td width="80">Sesiones</td>
<td>username</td>
</tr>


<?php

$sqlusers = $mysqli->query("select * from ".$prefixsql."users order by display");
$color = '1';
while($columna = mysqli_fetch_array($sqlusers))
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


	echo "<tr class=\"".$pintacolor."\" onmouseover=\"this.className = 'listacolorsobre'\" onmouseout=\"this.className = '".$pintacolor."'\">";
	
		
	if($columna["activo"] == '1'){$img_useractivo = '<img src="img/yes.png"/>';}else{$img_useractivo = '<img src="img/no.png"/>';}


	$sqlaux = $mysqli->query("select count(*) as contador from ".$prefixsql."users_uid where iduser = '".$columna["id"]."' "); 
	$rowaux = mysqli_fetch_assoc($sqlaux);
	$sesionesenuso = $rowaux["contador"];

		
    echo '<td><a class="btnedit" href="index.php?&module=core&section=users&action=edit&id='.$columna["id"].'">Editar</a></td>
	<td>'.$columna["id"].'</td>
	<td>'.$img_useractivo.' '.$columna["display"].'</td>
	<td>'.$sesionesenuso.'/'.$columna["uidmulti"].'</td>
	<td>'.$columna["username"].'</td>
	</tr>';
}


?>

</table>
