<table width="100%">
<tr class="maintitle">
<th width="80"> </th>
<th>Tipo</th>
<th>Display</th>
</tr>
<?php
$cnssql= $mysqli->query("select * from ".$prefixsql."users_mainview where iduser = '".$_COOKIE["lnxuserid"]."' order by orden");	
while($col = mysqli_fetch_array($cnssql))
{

echo '<tr>'
echo '<td><a href="#" class="btnedit" >Editar</a></td>';
echo '<td>Botón</td>';
echo '<td>'.$col["display"].'</td>';
echo '</tr>'

}
?>

</table>