<?php


echo '<p><a class="btnedit" href="index.php?module=bancos&section=cuentascajas&action=new">nuevo Cuenta / Caja</a></p>';
?>

<table width="100%">
<tr class="maintitle">
<td width="80"> </td>
<td>Empresa</td>
<td>tipo</td>
<td>Banco</td>
<td>Referencia</td>
<td>Cuenta</td>
<td>Activo</td>
<tr>
<?php
	$ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."cuentascajas");
	$color = '1';
	while($cuenta = mysqli_fetch_array($ConsultaMySql))
	{
		if ($color == '1')
		{
			$color = '2';
			$pintacolor = 'class="listacolor2"';
		}
		else
		{
			$color = '1';
			$pintacolor = 'class="listacolor1"';
		}
		$cnsbancos = $mysqli->query("SELECT * from ".$prefixsql."bancos where id = '".$cuenta["idbanco"]."'");
		$row = mysqli_fetch_assoc($cnsbancos);
		$dbnombrebanco = $row['banco'];
		
		$cnsbancos = $mysqli->query("SELECT * from ".$prefixsql."empresas where id = '".$cuenta["idempresa"]."'");
		$row = mysqli_fetch_assoc($cnsbancos);
		$lblempresa = $row["razonsocial"];

		$cnsbancos = $mysqli->query("SELECT * from ".$prefixsql."bancostipo where id = '".$cuenta["idbancotipo"]."'");
		$row = mysqli_fetch_assoc($cnsbancos);
		$lbltipobanco = $row["tipo"];
		

		if ($cuenta["idbanco"] == '0'){$dbnombrebanco = "CAJA";}
		
		
		echo '<tr '.$pintacolor.'><td width="100"><a class="btnedit" href="index.php?module=bancos&section=cuentascajas&action=edit&idcuenta='.$cuenta["id"].'">Editar</a></td>
		<td>'.$lblempresa.'</td>
		<td>'.$lbltipobanco.'</td>
		<td>'.$dbnombrebanco.'</td>
		<td>'.$cuenta["ref"].'</td>
		<td>'.$cuenta["cuenta"].'</td>
		<td>'.$cuenta["activo"].'</td><tr>';
		
	}
?>


</table>

