<?php
$fhsqlids = $_POST["hsqlids"];

header( "refresh:2;url=index.php?module=ficheros&section=purgar" );
	echo '<div align="center">
	<table width="300" class="msgaviso">
	<tr><td class="maintitle">mensaje:</td></tr>
	<tr><td>Ficheros eliminados con éxito</td></tr>
	<tr><td align="center"><a class="btnedit" href="index.php?module=ficheros&section=purgar">Aceptar</a></td></tr>
	</table></div>';



$ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."ficheros where ".$fhsqlids." ");

?>
<div align="center">
<table>
<tr class="maintitle">
		<td>Fichero</td>
		<td>Descripcion</td>
		<td>Ruta</td>
	</tr>
<?php
	while($ficheros = mysqli_fetch_array($ConsultaMySql))
	{
		echo '<tr>';
		echo '<td>'.$ficheros["nombre"].'</td>';
		echo '<td>'.$ficheros["descripcion"].'</td>';
		$ficheroborrar = $lnxrutaficheros.$ficheros["dirfichero"].'/'.$ficheros["fichero"];
		echo '<td>'.$ficheroborrar.'</td>';
		echo '</tr>';
		
		$sqlfichero= $mysqli->query("delete from ".$prefixsql."ficheros where id = '".$ficheros["id"]."'");
		
		
		
		unlink($ficheroborrar);
	}


	
	
	
	
?>

</div>