<?php
echo '<p><a class="btnedit" href="index.php?module=bancos&section=fpago&action=new">Nueva forma de apgo</a></p>';
?>

<table width="100%">
<tr class="maintitle">
	<th width="80"> </th>
	<th>Forma de pago</th>
	<th>Ref</th>
<tr>
<?php
	$ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."formaspago");
	$color = '1';
	while($fpago = mysqli_fetch_array($ConsultaMySql))
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


		if($fpago["idcuentacaja"] > 0)
		{
			$sqlaux = $mysqli->query("select * from ".$prefixsql."cuentascajas where id = '".$fpago["idcuentacaja"]."' "); 
			$rowaux = mysqli_fetch_assoc($sqlaux);
			$db_ref = $rowaux["ref"];
			$db_cuenta = ' - '.$cuenta["cuenta"];
		}
		else 
		{
			$db_cuenta = "";
			if($fpago["idcuentacaja"] == -1){$db_ref ="Cuenta bancaria tercero";}
			if($fpago["idcuentacaja"] == 0){$db_ref ="";}
			
		}
		


	echo "<tr class=\"".$pintacolor."\" onmouseover=\"this.className = 'listacolorsobre'\" onmouseout=\"this.className = '".$pintacolor."'\">";
		echo '<td><a class="btnedit" href="index.php?module=bancos&section=fpago&action=edit&idfpago='.$fpago["id"].'">Editar</a></td>';
		echo '<td>'.$fpago["formapago"].'</td>';
		echo '<td>'.$db_ref.$db_cuenta.'</td>';
		echo '<tr>';
		
	}
	
	

?>


</table>