
<?php 
include("modules/core/users/users/botonera.php");
$iduser = $_GET["id"];
?>

<p><?php echo '<a class="btnedit" href="index.php?module=core&&section=utiendas&action=new&id='.$iduser.'">Asignar nueva tienda</a>'; ?></p>

<table width="100%">
<tr class="maintitle">
	<td width="80"></td>
	<td width="32"></td>
	<td>Empresa</td>
	<td>Tienda</td>
	<td>Terminal</td>
</tr>

<?php

$sqlusers = $mysqli->query("select * from ".$prefixsql."userstiendas where iduser = '".$iduser."'");
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
	
    echo '<td><a class="btnedit" href="index.php?module=core&&section=utiendas&action=edit&id='.$columna["iduser"].'&idtienda='.$columna["id"].'">Editar</a></td>';
	echo '<td align="center">';
	
	if($columna["dft"] == '1')
	{
		echo '<img src="img/yes.png" />';
	}
	echo '</td>';
	$sqlaux = $mysqli->query("SELECT * from ".$prefixsql."tiendas where id = '".$columna["idtienda"]."'");
	$rowaux = mysqli_fetch_assoc($sqlaux);
	$nomtienda = $rowaux["tienda"];
	$auxidempresa = $rowaux["idempresa"];
			
		
		$sqlaux = $mysqli->query("SELECT * from ".$prefixsql."empresas where id = '".$auxidempresa."'");
		$rowaux = mysqli_fetch_assoc($sqlaux);
		$nomempresa = $rowaux["razonsocial"];
	
	echo '<td>'.$nomempresa.'</td>';
	echo '<td>'.$nomtienda.'</td>';
	
	if($columna["idterminal"] > '0')
	{
		$sqlaux = $mysqli->query("SELECT * from ".$prefixsql."pos_terminales where id = '".$columna["idterminal"]."'");
		$rowaux = mysqli_fetch_assoc($sqlaux);
		$nomterminal = $rowaux["descripcion"];
	}
	else
	{
		$nomterminal = '';
	}
	echo '<td>'.$nomterminal.'</td>';
	echo '</tr>';
}


?>

</table>



<p>Listado en forma de arbol</p>
<table width="100%">

<?php

$sqlempresas = $mysqli->query("select * from ".$prefixsql."empresas order by razonsocial");
while($columna = mysqli_fetch_array($sqlempresas))
{
	echo '<tr class="maintitle">';
	echo '<td colspan="4">'.$columna["razonsocial"].'</td>';
	echo '</tr>';
	
	
	
	$sqltiendas = $mysqli->query("select * from ".$prefixsql."tiendas where idempresa = '".$columna["id"]."'");
	while($coltienda = mysqli_fetch_array($sqltiendas))
	{
		echo '<tr>';
		echo '<td width="50">&nbsp;</td>';
		echo '<td colspan="3" class="maintitle">'.$coltienda["tienda"].'</td>';
		echo '</tr>';
		
		
		$sqlterminales = $mysqli->query("select * from ".$prefixsql."pos_terminales where idtienda = '".$coltienda["id"]."'");
		while($colterminal = mysqli_fetch_array($sqlterminales))
		{
			if ($color == '1'){$color = '2'; $pintacolor = "listacolor2";} else {$color = '1'; $pintacolor = "listacolor1";}

			$sqlaux = $mysqli->query("select * from ".$prefixsql."userstiendas where iduser = '".$iduser."' and idtienda = '".$coltienda["id"]."' and idterminal = '".$colterminal["id"]."' "); 
			$rowaux = mysqli_fetch_assoc($sqlaux);
			$dbesdefecto = $rowaux["dft"];
			
			$sqlaux = $mysqli->query("select count(*) as contador from ".$prefixsql."userstiendas where iduser = '".$iduser."' and idtienda = '".$coltienda["id"]."' and idterminal = '".$colterminal["id"]."' "); 
			$rowaux = mysqli_fetch_assoc($sqlaux);
			$dbexistetiendauser = $rowaux["contador"];

			if($dbesdefecto == 1)
			{$imgdefecto = '<img src="img/yes.png" title="Terminal establecido por defecto" alt="Terminal establecido por defecto"/>';}
			else
			{$imgdefecto = '&nbsp;';}
		
			if($dbexistetiendauser == 1)
			{$imgterminal = '<img src="img/yes.png" />';}
			else
			{$imgterminal = '<img src="img/no.png" />';}
		
		


			echo "<tr class=\"".$pintacolor."\" onmouseover=\"this.className = 'listacolorsobre'\" onmouseout=\"this.className = '".$pintacolor."'\">";
			echo '<td width="50">'.$imgdefecto.'</td>';
			echo '<td width="50">'.$imgterminal.'</td>';
			echo '<td>'.$colterminal["descripcion"].'</td>';
			echo '</tr>';
		}
		
	}
	
}

?>

</table>