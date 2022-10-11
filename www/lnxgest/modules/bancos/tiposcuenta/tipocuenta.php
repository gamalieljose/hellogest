<p><a href="index.php?module=bancos&section=tiposcuenta&action=new" class="btnedit">Nuevo tipo cuenta</a></p>
<table width="100%">
<tr class="maintitle">
	<th width="80"> </th>
	<th>Tipo cuenta</th>
</tr>
<?php
	$ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."bancostipo order by tipo");
	$rstabla = "";
	while($col = mysqli_fetch_array($ConsultaMySql))
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

		echo '<td><a href="index.php?module=bancos&section=tiposcuenta&action=edit&id='.$col["id"].'" class="btnedit">Editar</a> </td>';
		echo '<td>'.$col["tipo"].'</td>';
		echo '</tr>';
	}
?>
</table>




