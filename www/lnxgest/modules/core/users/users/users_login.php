<script type="text/javascript">
	function marcar(source) 
	{
		checkboxes=document.getElementsByTagName('input'); //obtenemos todos los controles del tipo Input
		for(i=0;i<checkboxes.length;i++) //recoremos todos los controles
		{
			if(checkboxes[i].type == "checkbox") //solo si es un checkbox entramos
			{
				checkboxes[i].checked=source.checked; //si es un checkbox le damos el valor del checkbox que lo llamó (Marcar/Desmarcar Todos)
			}
		}
	}

</script>
<?php
$sqlaux = $mysqli->query("select * from ".$prefixsql."users_config where opcion = 'ALLOW_LOGIN' "); 
$rowaux = mysqli_fetch_assoc($sqlaux);
$permitido_login = $rowaux["valor"];

$sqlaux = $mysqli->query("select * from ".$prefixsql."users_config where opcion = 'IDUSERALLOWED' "); 
$rowaux = mysqli_fetch_assoc($sqlaux);
$iduser_allow = $rowaux["valor"];

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
	$lbl_inicio = '<i style="color: red;" class="hidephonview fa fa-times-circle fa-lg"></i> Bloqueado el inicio de sesión, excepto para: <b>'.$lbl_userallowed.'</b>';
}
	


$sqlbuscar= $mysqli->query("SELECT * from ".$prefixsql."users where id = '".$_GET["id"]."'");
$row = mysqli_fetch_assoc($sqlbuscar);
$dbusername = $row['username'];
$dbdisplay = $row['display'];
$dbncuenta = $row["ncuenta"];
$dbtel = $row["tel"];
$dbemail = $row["email"];
$dbdir = $row["dir"];
$dbcp = $row["cp"];
$dbpobla = $row["pobla"];
$dbidprov = $row["idprov"];
$dbidpais = $row["idpais"];
$dbactivo = $row["activo"];
$dbididioma = $row["ididioma"];
$dbnif = $row["nif"];


?>


<form name="editausuario" action="index.php?module=core&section=users&action=savelogin" method="post">

<div align="center" class="rectangulobtnsguardar"> 
<button type="submit" class="btnsubmit" > <i class="hidephonview fa fa-save fa-lg"></i> Guardar</button> 
<a href="index.php?&module=core&section=users" class="btncancel"><i class="hidephonview fa fa-window-close fa-lg"></i> Cancelar</a> 
</div>


<input type="hidden" name="haccion" value="login">
<?php echo '<input type="hidden" name="hiduser" value="'.$_GET["id"].'">'; ?>

<div class="row">
<div class="col maintitle">
Configuración del inicio de sesión
</div>
</div>

<div class="row">
<div class="col-sm-2">
Actual:
</div>
<div class="col">
    <?php echo $lbl_inicio; ?>
</div>
</div>

<div class="row">
<div class="col maintitle">
&nbsp;
</div>
</div>

<div class="row">
<div class="col-sm-2">
Login
</div>
<div class="col">
<?php
if($permitido_login == "YES"){$seleccionado = ' checked=""';}else{$seleccionado = '';}
?>
    <label><input type="radio" name="chkallowlogin" value="YES" <?php echo $seleccionado; ?>/> Permitir el inicio de sesión</label> </br>
<?php
if($permitido_login == "NO"){$seleccionado = ' checked=""';}else{$seleccionado = '';}
?>  
    <label><input type="radio" name="chkallowlogin" value="NO" <?php echo $seleccionado; ?>/> Bloquear el inicio de sesión</label>
</div>
</div>

<div class="row">
<div class="col-sm-2">
Puede iniciar sesión
</div>
<div class="col">
<?php
    $sqlaux = $mysqli->query("select * from ".$prefixsql."users where id = '".$_COOKIE["lnxuserid"]."' "); 
	$rowaux = mysqli_fetch_assoc($sqlaux);
	$user_id = $rowaux["if"];
    $user_display = $rowaux["display"];

    echo $user_display;
?>

<input type="hidden" value="<?php echo $_COOKIE["lnxuserid"]; ?>" name="hiduserallowed" />
</div>
</div>

<p></p>

<div class="row maintitle">
<div class="col-sm-2">
Sesiones
</div>
<div class="col">
<label><input type="checkbox" onclick="marcar(this);" /> Marcar/Desmarcar Todos </label>
</div>
</div>

<div class="row">
<div class="col" align="center">
<b>Se eliminarán todas las sesiones marcadas <i>(solo si se ha bloqueado el acceso)</i></b>
</div>
</div>


<table width="100%">
<tr class="maintitle">
    <th width="180">Usuario</th>
    <th>UID</th>
    <th>Navegador</th>
    <th width="150">Fecha</th>
	<th>Nombre Session</th>
</tr>

<?php

$sqlusers = $mysqli->query("select * from ".$prefixsql."users_uid order by fecha desc");
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
	
        $sqlaux = $mysqli->query("select * from ".$prefixsql."users where id = '".$columna["iduser"]."' "); 
        $rowaux = mysqli_fetch_assoc($sqlaux);
        $lbl_usuario = $rowaux["display"];

        echo '<td>';
        if($_SESSION["lnxuid"] <> $columna["uidsession"])
        {
            echo '<label><input type="checkbox" value="'.$columna["uidsession"].'" name="chkuidsession[]" /> '.$lbl_usuario.'</label>';
        }
        else
        {
            echo '<b>'.$lbl_usuario.'</b>';
        }
        echo '</td>';
        
        echo '<td>'.$columna["uidsession"].'</td>';
        echo '<td>'.$columna["useragente"].'</td>';
        echo '<td>'.$columna["fecha"].'</td>';
		echo '<td>'.$columna["nomsesion"].'</td>';
	echo '</tr>';
}


?>

</table>






</form>