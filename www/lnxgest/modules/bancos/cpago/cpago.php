<p><a class="btnedit" href="index.php?module=bancos&section=cpago&action=new">Nueva condicion de apgo</a></p>


<table width="100%">
<tr class="maintitle">
	<td width="80"> </td>
	<td>Condicion de pago</td>
<tr>
<?php
	$ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."bancos_cpago");
	$color = '1';
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
	
		echo '<td ><a class="btnedit" href="index.php?module=bancos&section=cpago&action=edit&idcpago='.$col["id"].'">Editar</a></td>';
		echo '<td>'.$col["cpago"].'</td>';
		echo '<tr>';
		
	}
echo '</table>';
	

?>


