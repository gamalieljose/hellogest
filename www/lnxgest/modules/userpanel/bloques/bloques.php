<?php

?>
<p><a href="index.php?module=userpanel&section=bloques&action=new" class="btnedit">Nuevo bloque</a></p>

<div style="display: block; overflow-x: auto;">
<table width="100%">
<tr class="maintitle">
<th width="80"> </th>
<th width="150">Icono</th>
<th>Display</th>
<th width="120">Ventana</th>
<th width="80">Orden</th>
<th width="80"> </th>
</tr>
<?php

$cnssql= $mysqli->query("select * from ".$prefixsql."users_mainview where iduser = '".$_COOKIE["lnxuserid"]."' order by orden");	
while($col = mysqli_fetch_array($cnssql))
{
if ($color == '1'){$color = '2'; $pintacolor = "listacolor2";} else {$color = '1'; $pintacolor = "listacolor1";}


echo "<tr class=\"".$pintacolor."\" onmouseover=\"this.className = 'listacolorsobre'\" onmouseout=\"this.className = '".$pintacolor."'\">";

echo '<td><a href="index.php?module=userpanel&section=bloques&action=edit&id='.$col["id"].'" class="btnedit">Editar</a></td>';
echo '<td>'.$col["icono"].'</td>';
echo '<td>'.$col["display"].'</td>';
echo '<td>'.$col["ventana"].'</td>';
echo '<td>'.$col["orden"].'</td>';
echo '<td align="right"><a href="index.php?module=userpanel&section=bloques&action=del&id='.$col["id"].'" class="btnenlacecancel">Borrar</a></td>';
echo '</tr>';
    
}

?>


</table>
</div>