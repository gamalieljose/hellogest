<p><a class="btnedit" href="index.php?module=core&section=impuestos&action=new">Nuevo impuesto</a></p>
<?php

echo '<table width="100%">';

?>
<tr class="maintitle">
<th width="80"></th>
<th width="30"></th>
<th>Impuesto</th>
<th>valor</th>
</tr>
<?php

$ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."impuestos");
$color = '1';
while($columna = mysqli_fetch_array($ConsultaMySql))
{
	if ($color == '1'){$color = '2'; $pintacolor = "listacolor2";} else {$color = '1'; $pintacolor = "listacolor1";}
        
	echo "<tr class=\"".$pintacolor."\" onmouseover=\"this.className = 'listacolorsobre'\" onmouseout=\"this.className = '".$pintacolor."'\">";
	echo '<td><a class="btnedit" href="index.php?&module=core&section=impuestos&action=edit&id='.$columna["id"].'">editar</a></td>';
	
	if($columna["activo"] == '1'){$imagen = "img/yes.png";}else{$imagen = "img/no.png";}
	
	echo '<td><img src="'.$imagen.'" /></td>';
	echo '<td>'.$columna["impuesto"].'</td>';
	echo '<td>'.$columna["valor"].' %</td>';
	echo '</tr>';

}



?>
</table>