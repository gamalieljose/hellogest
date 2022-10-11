<title>LNXGEST ERP - Contactos</title>

<?php
	echo '<form name="form1" action="index.php?module=terceros" method="POST" autocomplete="off" >';

	echo '<p>Nombre: <input type="text" name="txtbuscar" value="'.$_POST["txtbuscar"].'" /> <input type="submit" value="Buscar" class="btnsubmit" /></p>';
	

	echo '</form>';
	
	if ($_POST["txtbuscar"] <> '')
	{
		echo '<table width="100%">';
		echo '<tr class="maintitle"><td width="80">&nbsp;</td><td>Telefono</td></tr>';
		
		$ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."terceros where razonsocial like '%".$_POST["txtbuscar"]."%' or nomcomercial like '%".$_POST["txtbuscar"]."%'");

		$color = '1';
		while($columna = mysqli_fetch_array($ConsultaMySql))
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
			echo '<td><a href="index.php?module=terceros&id='.$columna["id"].'" class="btnedit">Ver ficha</a></td>';
			echo '<td><a href="tel:'.$columna["tel"].'">'.$columna["razonsocial"].'</a></td>';
			echo '</tr>';
		}
		
		
		
		
		
		echo '</table>';
		
		//buscamos en contactos
		echo '<table width="100%">';
		echo '<tr class="maintitle"><td colspan="2" align="center">Contactos</td></tr>';
		
		$ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."terceroscontactos where nombre like '%".$_POST["txtbuscar"]."%' ");
		while($columna = mysqli_fetch_array($ConsultaMySql))
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
			
			$cnsaux = $mysqli->query("SELECT * from ".$prefixsql."terceros where id = '".$columna["idtercero"]."'");
			$rowterceroaux = mysqli_fetch_assoc($cnsaux);

			$dbrazonsocialter = $rowterceroaux["razonsocial"];

			echo "<tr class=\"".$pintacolor."\" onmouseover=\"this.className = 'listacolorsobre'\" onmouseout=\"this.className = '".$pintacolor."'\">";
			echo '<td width="80"><a href="index.php?module=terceros&id='.$columna["idtercero"].'" class="btnedit">Ver ficha</a></td>';
			echo '<td><a href="tel:'.$columna["tel"].'">'.$columna["nombre"].'</a> - ('.$dbrazonsocialter.')</td>';
			echo '</tr>';
		}
		echo '</table>';
		
	}

?>