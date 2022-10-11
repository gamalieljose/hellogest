
       
<p><a href="index.php?module=lnxit&section=colas&action=new" class="btnedit" >Nueva cola</a></p>

<table width="100%">
<tr class="maintitle">
	<th width="80"> </th>
	<th>Cola de trabajo</th>
	<th width="80"> </th>
</tr>
<?php


$cnssql = "SELECT * FROM ".$prefixsql."it_colas order by cola";
$ConsultaMySql= $mysqli->query($cnssql);

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
		echo '<td width="80"><a class="btnedit" href="index.php?module=lnxit&section=colas&action=edit&id='.$col["id"].'">Editar</a></td>';
		echo '<td>'.$col["cola"].'</td>';
		echo '<td align="right"><a class="btnenlacecancel" href="index.php?module=lnxit&section=colas&action=del&id='.$col["id"].'">Eliminar</a></td>';
		echo '<tr>';
		
	}
?>

</table>


<p>&nbsp;</p>
<p>&nbsp;</p>

