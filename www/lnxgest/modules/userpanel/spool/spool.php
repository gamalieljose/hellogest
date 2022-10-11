<script type="text/javascript">
	function marcar(source) 
	{
		checkboxes=document.getElementsByTagName('input'); //obtenemos todos los controles del tipo Input
		for(i=0;i<checkboxes.length;i++) //recoremos todos los controles
		{
			if(checkboxes[i].type == "checkbox") //solo si es un checkbox entramos
			{
				checkboxes[i].checked=source.checked; //si es un checkbox le damos el valor del checkbox que lo llamó (Marcar/Desmarcar Todos)
			}
		}
	}

</script>

<form name="frmspool" method="POST" action="index.php?module=userpanel&section=spool&action=del">
<p><label><input type="checkbox" onclick="marcar(this);" /> Marcar/Desmarcar Todos </label>
<input type="submit" class="btnenlacecancel" value="Cancelar trabajos seleccionados" />  </p>

<table width="100%">
<tr class="maintitle">
	<td width="30">&nbsp;</td>
	<td>impresora</td>
	<td>trabajo</td>
	<td>Fichero</td>
	<td>usuario</td>
    <td>Fecha impresión</td>
</tr>
<?php
$ConsultaMySql= $mysqli->query("select * from ".$prefixsql."printjobs order by id desc");
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
	
	$sqlaux = $mysqli->query("select * from ".$prefixsql."impresoras where id = '".$columna["idprinter"]."'");
	$rowaux = mysqli_fetch_assoc($sqlaux);
	$nombreimpresora = $rowaux["nombre"]." - ".$rowaux["notas"];
	
	$sqlaux = $mysqli->query("select * from ".$prefixsql."users where id = '".$columna["iduser"]."'");
	$rowaux = mysqli_fetch_assoc($sqlaux);
	$nombreusuario = $rowaux["display"];
	
	
    echo '<td><input type="checkbox" value="'.$columna["id"].'" name="chkimpresion[]" /> </td>
	<td>'.$nombreimpresora.'</td>
	<td>'.$columna["display"].'</td>
	<td>'.$columna["printfile"].'</td>
	<td>'.$nombreusuario.'</td>
            <td>'.$columna["fecha"].'</td>
	</tr>';
}
?>
</table>

</form>