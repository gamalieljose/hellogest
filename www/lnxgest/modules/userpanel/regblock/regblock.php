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

<form name="frmspool" method="POST" action="index.php?module=userpanel&section=regblock&action=save">
<p><label><input type="checkbox" onclick="marcar(this);" /> Marcar/Desmarcar Todos </label>
<input type="submit" class="btnenlacecancel" value="Debloquear registros seleccionados" />  </p>

<table width="100%">
<tr class="maintitle">
	<td width="30">&nbsp;</td>
	<td>Usuario</td>
	<td>tabla</td>
	<td>registro</td>
    <td>Fecha bloqueo</td>
</tr>
<?php
$ConsultaMySql= $mysqli->query("select * from ".$prefixsql."bloqueos where iduser = '".$_COOKIE["lnxuserid"]."' order by fecha asc");
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
	
	$sqlaux = $mysqli->query("select * from ".$prefixsql."users where id = '".$columna["iduser"]."'");
	$rowaux = mysqli_fetch_assoc($sqlaux);
	$lbl_displayuser = $rowaux["display"];
	
		
	$idcontrol = $columna["iduser"]."-".$columna["tabla"]."-".$columna["idregistro"];

	$idcontrol = base64_encode($idcontrol);
	
    echo '<td><input type="checkbox" value="'.$idcontrol.'" name="chkbloqueo[]" /> </td>
	<td>'.$lbl_displayuser.'</td>
	<td>'.$columna["tabla"].'</td>
	<td>'.$columna["idregistro"].'</td>
    <td>'.$columna["fecha"].'</td>
	</tr>';
}
?>
</table>

</form>