<p><a href="index.php?module=bancos&section=bancos&action=new" class="btnedit">Nuevo bacno</a></p>
<table width="100%">
<tr class="maintitle">
	<th width="80"> </th>
	<th>Banco</th>
</tr>
<?php
	$ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."bancos");
	$rstabla = "";
	while($banco = mysqli_fetch_array($ConsultaMySql))
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

		echo '<td><a href="index.php?module=bancos&section=bancos&action=edit&idbanco='.$banco["id"].'" class="btnedit">Editar</a> </td>';
		echo '<td>'.$banco["banco"].'</td>';
		echo '</tr>';
	}

echo '</table>';


?>

