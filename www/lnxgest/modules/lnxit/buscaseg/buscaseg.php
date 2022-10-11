<?php

?>

<form name="form1" action="index.php?module=lnxit&section=buscaseg" method="post">
<input type="hidden" name="hbusca" value="si">
<table width="100%">
<tr class="tblbuscar">
<td align="center">
Buscar: 
<?php echo '<input type="text" name="txtbuscar" value="'.$_POST["txtbuscar"].'"> '; 

if ($_POST["optbuscar"] == '1' || $_POST["hbusca"] == '')
	{echo '<input type="radio" name="optbuscar" value="1" checked=""> Resumen, Problema y Solucion ';}
	else
	{echo '<input type="radio" name="optbuscar" value="1" > Resumen, Problema y Solucion ';}
if ($_POST["optbuscar"] == '2')
	{echo '<input type="radio" name="optbuscar" checked="" value="2" > Seguimientos ';}
	else
	{echo '<input type="radio" name="optbuscar" value="2" > Seguimientos ';}

?>


<input class="btnsubmit" name="btnbuscar" value="Buscar" type="submit"> 
</td>
</tr>
</table>
</form>

<?php
if ($_POST["hbusca"] == 'si')
{
	if ($_POST["optbuscar"] == '1')
	{
		
		echo '<table width="100%"><tr class="maintitle">
		<td width="75"> </td>
		<td width="75">ID</td>
		<td width="100">tipo</td>
		<td width="100" >asignado</td>
		<td>resumen</td>
		</tr>';
		
		$cnssql = "SELECT * from ".$prefixsql."it_tickets 
		where resumen like '%".$_POST["txtbuscar"]."%' OR 
		problema like '%".$_POST["txtbuscar"]."%' OR 
		solucion like '%".$_POST["txtbuscar"]."%'";
		
		$ConsultaMySql= $mysqli->query($cnssql);
		$color = '1';
		
		while($columna = mysqli_fetch_array($ConsultaMySql))
		{
			$cnssubsql= $mysqli->query("select * from ".$prefixsql."it_tipos where id = '".$columna["idtipo"]."' ");	
			$row = mysqli_fetch_assoc($cnssubsql);
			$tipoticket = $row['tipo'];
			
			$cnssubsql= $mysqli->query("select id, display from ".$prefixsql."users where id = '".$columna["idasignado"]."' ");	
			$row = mysqli_fetch_assoc($cnssubsql);
			$userasignado = $row['display'];
			
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

					echo '<td><a class="btnedit" href="index.php?module=lnxit&section=tickets&action=edit&id='.$columna["id"].'">Editar</a></td>
					<td>'.$columna["id"].'</td>
					<td>'.$tipoticket.'</td>
					<td>'.$userasignado.'</td>
					<td>'.$columna["resumen"].'</td>
		</tr>';
		
		}


		
		
		
		echo '</table>';
		
		
	}

	if ($_POST["optbuscar"] == '2')
	{
		//BUSCAMOS DENTRO DE LOS SEGUIMIENTOS
		
		
		
		echo '<table width="100%"><tr class="maintitle">
		<td width="75"> </td>
		<td width="75">ID</td>
		<td width="100">tipo</td>
		<td width="100">asignado</td>
		<td>resumen</td>
		</tr>';
		
		$color = '1';
		
		$cnssql = "SELECT * from ".$prefixsql."it_seguimiento 
		where seguimiento like '%".$_POST["txtbuscar"]."%' ";
		
		$ConsultaMySql= $mysqli->query($cnssql);
		$color = '1';
		
		while($columna = mysqli_fetch_array($ConsultaMySql))
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
			
			
			$cnsaux= $mysqli->query("select * from ".$prefixsql."it_tickets where id = '".$columna["idticket"]."'");
			$rowaux = mysqli_fetch_assoc($cnsaux);
			$dbidtipo = $rowaux['idtipo'];
			$dbresumen = $rowaux['resumen'];
			$dbidasignado = $rowaux['idasignado'];
			
			$cnsaux= $mysqli->query("select * from ".$prefixsql."it_tipos where id = '".$dbidtipo."'");
			$rowaux = mysqli_fetch_assoc($cnsaux);
			$tipoticket = $rowaux['tipo'];
			
			$cnsaux= $mysqli->query("select id, display from ".$prefixsql."users where id = '".$dbidasignado."'");
			$rowaux = mysqli_fetch_assoc($cnsaux);
			$userasignado = $rowaux['display'];
			
			echo '<tr '.$pintacolor.'>
		<td><a class="btnedit" href="index.php?module=lnxit&section=tickets&action=edit&id='.$columna["idticket"].'">Editar</a></td>
		<td>'.$columna["idticket"].'</td>
		<td>'.$tipoticket.'</td>
		<td>'.$userasignado.'</td>
		<td>'.$dbresumen.'</td>
		</tr>';
			
		}
		
	}
}
?>