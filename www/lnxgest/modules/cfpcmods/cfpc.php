
<?php
echo '<a class="btnedit" href="index.php?module=cfpcmods">Configuracion modulos</a>';

if ($_GET["cfpc"] > '0')
{
	$sqlmodulos= $mysqli->query("SELECT * from ".$prefixsql."modulos where id = '".$_GET["cfpc"]."'");
	$row = mysqli_fetch_assoc($sqlmodulos);
	$dirmodulo = $row['directorio'];
include("modules/".$dirmodulo."/config.php");

}
else
{
echo '<p>&nbsp;</p>';
	echo '<table>';
	echo '<tr class="maintitle"><td>Nombre del modulo</td><td>dir</td><td>Status</td><td>Config</td></tr>';


	$directorio = opendir("./modules");
	while ($archivo = readdir($directorio))
	{
	   if (is_dir("./modules/".$archivo))
	   {
		//Directorio
			if ($archivo == '..' || $archivo == '.')
			{}
			else
			{
	//Es un directorio y realmente no es archivos

	$sqlmodulos= $mysqli->query("SELECT * from ".$prefixsql."modulos where directorio = '".$archivo."'");
	$row = mysqli_fetch_assoc($sqlmodulos);
	$activo = $row['activo'];
	$display = $row['display'];
	$idcfpc = $row['id'];

	$existe = $sqlmodulos->num_rows;
	if ($existe == '0')
	{
	$activo = 'OFF';
	$display = 'Desconocido';
	$colorfondo = '#FA5858';
	}
	else
	{
	$activo = 'ON';
	$colorfondo = '#00FF40';
	}

	if (file_exists("modules/".$archivo."/config.php"))
		{
			$icoconfig = '<a class="btnedit" href="index.php?module=cfpcmods&cfpc='.$idcfpc.'">Configurar</a>';
		}
		else
		{
			$icoconfig = ''; 
		}

		if ($color == '1')
		{
			$color = '2';
			$pintacolor = 'class="listacolor2"';
		}
		else
		{
			$color = '1';
			$pintacolor = 'class="listacolor1"';
		}

	echo '<tr '.$pintacolor.'><td>'.$display.'</td><td>'.$archivo.'</td><td align="center" bgcolor = '.$colorfondo.'>'.$activo.'</td><td>'.$icoconfig.'</td></tr>';		
			
	//FIN interactuar directorios
			}
	   }
	   
	}
	closedir($directorio); 

	echo '</table>';
}



?>

