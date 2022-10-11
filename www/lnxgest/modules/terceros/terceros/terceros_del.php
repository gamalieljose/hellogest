<?php
include("modules/terceros/botones.php");



//obtenemos el idtercero

$idtercero = $_GET["idtercero"];

//Recuperamos los valores de la BBDD

$buscatercero = $mysqli->query("SELECT * FROM ".$prefixsql."terceros where id = '".$idtercero."'");
$row = mysqli_fetch_assoc($buscatercero);
	
	$dbrazonsocial = $row["razonsocial"];
	$dbnomcomercial = $row["nomcomercial"];
	
$colornoborrar = ' bgcolor="#F78181"';
$colorborrar = '';



 echo '<h3>'.$dbrazonsocial.' - ('.$dbnomcomercial.') </h3>'; ?>
<div align="center">


<?php

//Buscamos todas las tablas donde aparezca el campo idtercero
//;
$sumaregistros = 0;

$ary_tabla = array();


$sql_tablas = "show tables where Tables_in_".$lnxdatabase." LIKE '".$prefixsql."%' ";
$cnssql= $mysqli->query($sql_tablas);	
while($col = mysqli_fetch_array($cnssql))
{
		
	$sql_tabla = "SHOW COLUMNS FROM ".$col[0]." where Field = 'idtercero'";
	$sqlaux = $mysqli->query($sql_tabla); 
	$rowaux = mysqli_fetch_assoc($sqlaux);
	
	$existe = $sqlaux->num_rows;
	
	if($existe > 0)
	{
		//Si existe el campo idtercero, cuenta cuantas veces se repite
		$sql_tablaaux = "select count(*) as contador FROM ".$col[0]." where idtercero = '".$idtercero."'";
		$sqlauxcontador = $mysqli->query($sql_tablaaux); 
		$rowauxcontador = mysqli_fetch_assoc($sqlauxcontador);

		if($rowauxcontador["contador"] > 0)
		{
			
			

			$textoarraytablas = $col[0]."|".$rowauxcontador["contador"];
			array_push($ary_tabla, $textoarraytablas );

			$sumaregistros = $sumaregistros +1;
			
		}
	}
    
}



if ($sumaregistros > 0)
{
	echo '<p>No se puede eliminar el tercero, esta presente en varios apartados de la aplicación</p>';
	
}
else
{
	echo '<form id="form1" name="form1" method="post" action="index.php?module=terceros&section=terceros&action=save">';
	echo '<p>&nbsp;</p>';
	
	
	echo '<table class="msgaviso">
	<tr class="maintitle"><td>Eliminación de tercero</td></tr>
	<tr><td align="center">Se puede proceder a eliminar el tercero, esta accion no es reversible </br>
	¿Desea eliminar este tercero?</td></tr>
	<tr><td>&nbsp;</td></tr>
	<tr><td align="center">
	<input type="checkbox" value="1" name="chkborrartercero"> Confirmo que deseo eliminar este tercero </br>
	<input type="submit" class="btnsubmit" value="Eliminar tercero">
	</td></tr>
	</table>';
	echo '<input type="hidden" name="hidtercero" value="'.$idtercero.'">';
	echo '<input type="hidden" name="haccion" value="delete">';
	echo '</form>';
	
}

echo '<p>&nbsp;</p>';
echo '<p>&nbsp;</p>';	


echo '</div>';


if(count($ary_tabla) > 0)
{
	echo '<div align="center"><table>
	<tr class="maintitle">
	<th>Tabla</th>
	<th>Registros</th>
	</tr>';
	foreach ($ary_tabla as $rs_tabla) 
	{
		$var_tabla = explode("|", $rs_tabla);
		
		
		if ($color == '1'){$color = '2'; $pintacolor = "listacolor2";} else {$color = '1'; $pintacolor = "listacolor1";}
		echo "<tr class=\"".$pintacolor."\" onmouseover=\"this.className = 'listacolorsobre'\" onmouseout=\"this.className = '".$pintacolor."'\">";

		echo '<td>'.$var_tabla[0].'</td>'; //Nombre tabla
		echo '<td align="right">'.$var_tabla[1].'</td>'; //cuantos registros de ese tercero existen en esa tabla
		echo '</tr>';
	} 

echo '</table></div>';
}
?>

