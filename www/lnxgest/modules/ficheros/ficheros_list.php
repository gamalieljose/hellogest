<a href="index.php?module=ficheros&section=new" class="btnedit">Nuevo archivo</a>

<form name="frmbuscaficheros" method="POST" action="index.php?module=ficheros" >
<?php
$flstbuscarpor = $_POST["lstbuscarpor"];
$ftxtbuscar = addslashes(strtolower($_POST["txtbuscar"]));
$flstcampoordenar = $_POST["lstcampoordenar"];
$flstorden = $_POST["lstorden"];

?>
<div class="tblbuscar">
		<div class="row">
			<div class="col-sm-3" align="left">
				<select name="lstbuscarpor" style="width: 100%;">
<?php
if($flstbuscarpor == 'A'){$seleccionado = ' selected=""';}else{$seleccionado = '';}
					echo '<option value="A" '.$seleccionado.'>Buscar por nombre</option>';
if($flstbuscarpor == 'B'){$seleccionado = ' selected=""';}else{$seleccionado = '';}
					echo '<option value="B" '.$seleccionado.'>Buscar por contenido</option>';
?>
				</select>
			</div>
			<div class="col" align="left">
				<?php echo '<input type="text" value="'.strtolower($_POST["txtbuscar"]).'" name="txtbuscar" class="campoencoger"/> '; ?>
			</div>
		</div>	
		<div class="row">
	<div class="col-sm-3">
		Extensión
	</div>
	<div class="col">
	<select name="lstextension" class="campoencoger">
<?php
echo '<option value="" selected="">-Cualquier extensión-</option>';
$cnssql= $mysqli->query("SELECT DISTINCT(extension) FROM ".$prefixsql."ficheros order by extension");	
while($col = mysqli_fetch_array($cnssql))
{
	if($col["extension"] != "")
	{
		echo '<option value="'.$col["extension"].'">'.$col["extension"].'</option>';
	}
    
}

?>
	</select>
	</div>
</div>


		<div class="row">
			<div class="col-sm-3" align="left">
				Ordenar
			</div>
			<div class="col" align="left">
				<select name="lstcampoordenar" style="width: 100%;">
					<option value="nombre">Fichero</option>
					<option value="extension">extension</option>
					<option value="descripcion">Descripcion</option>
					<option value="fsubido">Fecha</option>
					<option value="dirfichero">Directorio</option>
				</select> </br>

				<select name="lstorden" style="width: 100%;">
				<option value="asc">Ascendente</option>
				<option value="desc">Descendente</option>
				</select>
			</div>
			<div class="col" align="left">
				

			<div align="center">
				<?php
				$espaciolibre = disk_free_space ( $lnxrutaficheros );


					$bytes = $espaciolibre;
					$si_prefix = array( 'B', 'KB', 'MB', 'GB', 'TB', 'EB', 'ZB', 'YB' );
					$base = 1024;
					$class = min((int)log($bytes , $base) , count($si_prefix) - 1);
					

				echo '<table class="msgaviso">';
				echo '<tr class="maintitle"><td>Concepto</td><td>Valor</td></tr>';
				echo '<tr><td>Ruta ficheros</td><td>'.$lnxrutaficheros.'</td></tr>';
				echo '<tr><td>Espacio disponible</td><td>';
					echo sprintf('%1.2f' , $bytes / pow($base,$class)) . ' ' . $si_prefix[$class];
				echo '</td></tr>';

					$size = 0;
					foreach(new RecursiveIteratorIterator(new RecursiveDirectoryIterator($lnxrutaficheros)) as $file){
						$size+=$file->getSize();
					}
					
					$bytes = $size;
					$si_prefix = array( 'B', 'KB', 'MB', 'GB', 'TB', 'EB', 'ZB', 'YB' );
					$base = 1024;
					$class = min((int)log($bytes , $base) , count($si_prefix) - 1);

				echo '<tr><td>Espacio ocupado</td><td>';
					echo sprintf('%1.2f' , $bytes / pow($base,$class)) . ' ' . $si_prefix[$class];
				echo '</td></tr>';
				echo '</table>';
				?>
				</div>



			</div>
		</div>	
	</div>

	<div align="center" class="rectangulobtnsguardar"> 
<button type="submit" class="btnsubmit" > <i class="hidephonview fa fa-search fa-lg"></i> Buscar</button> 
</div>

</form>




<table width="100%">
<tr class="maintitle">
<td width="80"> </td>
<td>Fichero</td>
<td>Propietario</td>
<td width="180">Fecha</td>
<td>ext</td>
<td width="100">Directorio</td>
<td>Descripcion</td>
<td width="80"> </td>
</tr>



<?php
	if($flstbuscarpor == 'A')
	{
		$cnssql = "SELECT * from ".$prefixsql."ficheros where nombre like '".$ftxtbuscar."%' or descripcion like '".$ftxtbuscar."%' order by ".$flstcampoordenar." ".$flstorden;	
	}
	if($flstbuscarpor == 'B')
	{
		$cnssql = "SELECT ".$prefixsql."ficheros_keyword.idfichero as id, ".$prefixsql."ficheros.nombre, ".$prefixsql."ficheros.extension, ".$prefixsql."ficheros.descripcion, ".$prefixsql."ficheros.iduser, ".$prefixsql."ficheros.fsubido, ".$prefixsql."ficheros.dirfichero FROM ".$prefixsql."ficheros_keyword INNER JOIN ".$prefixsql."ficheros on (".$prefixsql."ficheros_keyword.idfichero = ".$prefixsql."ficheros.id) where ".$prefixsql."ficheros_keyword.palabrasclave like '%".$ftxtbuscar."%' order by ".$prefixsql."ficheros.".$flstcampoordenar." ".$flstorden;	
	}

$ConsultaMySql= $mysqli->query($cnssql);
	$color = '1';
	while($ficheros = mysqli_fetch_array($ConsultaMySql))
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

	$sqlaux = $mysqli->query("select * from ".$prefixsql."users where id = '".$ficheros ["iduser"]."' "); 
	$rowaux = mysqli_fetch_assoc($sqlaux);
	$lbl_usuario_propietario = $rowaux["display"];


	$sqlaux = $mysqli->query("select * from ".$prefixsql."ficheros_ext where extension = '".$ficheros ["extension"]."' "); 
	$rowaux = mysqli_fetch_assoc($sqlaux);
	$icono = $rowaux["icono"];
	$lbltituloicono = $rowaux["display"];
	

	if($icono != '')
	{
		$imgicono = '<img src="img/extensions/'.$icono.'" alt="'.$lbltituloicono.'" title="'.$lbltituloicono.'" />';
	}
	else 
	{
		$imgicono = $ficheros ["extension"];
	}

	echo "<tr class=\"".$pintacolor."\" onmouseover=\"this.className = 'listacolorsobre'\" onmouseout=\"this.className = '".$pintacolor."'\">";
	echo '<td><a class="btnedit" href="index.php?module=ficheros&section=edit&id='.$ficheros ["id"].'">Editar</a></td>';
	echo '<td>'.$ficheros ["nombre"].'</td>';
	echo '<td>'.$lbl_usuario_propietario.'</td>';
	echo '<td>'.$ficheros ["fsubido"].'</td>';
	echo '<td>'.$imgicono.'</td>';
	echo '<td>'.$ficheros ["dirfichero"].'</td>';
	echo '<td>'.$ficheros ["descripcion"].'</td>';
	echo '<td align="right"><a class="btnedit_verde"  href="modules/ficheros/download.php?id='.$ficheros ["id"].'">Download</a></td>';
	echo '</tr>';
		
	}
?>

</table>