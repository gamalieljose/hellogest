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

<form name="form1" action ="index.php?module=ficheros&section=purgar2" method="POST">
<p><input type="submit" class="btnsubmit" value="Borrar marcados"/></p>


<table width="100%">
<tr class="maintitle">
<td width="80"> </td>
<td>Fichero</td>
<td>extension</td>
<td>Descripcion</td>
<td>Repite</td>
<td width="80"> </td>
</tr>



<?php
$ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."ficheros");
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

	
	$sqlficheros = $mysqli->query("select * from ".$prefixsql."ficheros_loc where idfichero = '".$ficheros ["id"]."' ");
	$existe = $sqlficheros->num_rows;
	
		if($existe == 0)
		{
		echo "<tr class=\"".$pintacolor."\" onmouseover=\"this.className = 'listacolorsobre'\" onmouseout=\"this.className = '".$pintacolor."'\">";
		echo '<td align="center"><input type="checkbox" name="chkidfichero[]" value="'.$ficheros ["id"].'" /></td>';
		echo '<td>'.$ficheros ["nombre"].'</td>';
		echo '<td>'.$ficheros ["extension"].'</td>';
		echo '<td>'.$ficheros ["descripcion"].'</td>';
		echo '<td>'.$existe.'</td>';
		
		echo '<td><a class="btnsubmit"  href="modules/ficheros/download.php?id='.$ficheros ["id"].'">Download</a></td>';
		echo '</tr>';
		}
	}
?>

</table>
</form>