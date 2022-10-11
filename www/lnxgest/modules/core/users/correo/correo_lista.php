
<?php 
include("modules/core/users/users/botonera.php");
$iduser = $_GET["id"];
?>

<p><?php echo '<a class="btnedit" href="index.php?module=core&section=correo&action=new&id='.$iduser.'">Nueva cuenta de correo</a>'; ?></p>

<table width="100%">
<tr class="maintitle">
	<td width="80"></td>
	<td width="32"></td>
	<td>Nombre cuenta</td>
	<td>Remitente</td>
</tr>

<?php

$sqlusers = $mysqli->query("select * from ".$prefixsql."users_correo where iduser = '".$iduser."'");
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
	
    echo '<td><a class="btnedit" href="index.php?module=core&section=correo&action=edit&id='.$columna["iduser"].'&idmail='.$columna["id"].'">Editar</a></td>';
	echo '<td align="center">';
	
	if($columna["dft"] == '1')
	{
		echo '<img src="img/yes.png" />';
	}
	echo '</td>';
	
	echo '<td>'.$columna["nomcuenta"].'</td>';
	echo '<td>'.$columna["display"].'</td>';
	echo '</tr>';
}


?>

</table>
