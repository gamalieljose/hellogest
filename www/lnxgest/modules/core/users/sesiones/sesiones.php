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

<form name="frmspool" method="POST" action="index.php?&module=core&section=sesiones&action=save">
<p><label><input type="checkbox" onclick="marcar(this);" /> Marcar/Desmarcar Todos </label>
<input type="submit" class="btnenlacecancel" value="Eliminar sesiones" />  </p>

<input type="hidden" value="delete" name="haccion" />
<div style="display: block; overflow-x: auto;">

<table width="100%">
<tr class="maintitle">
    <th width="180">Usuario</th>
    <th>UID</th>
    <th>Navegador</th>
    <th width="150">Fecha</th>
	<th>Nombre Session</th>
</tr>

<?php

$sqlusers = $mysqli->query("select * from ".$prefixsql."users_uid order by fecha desc");
while($columna = mysqli_fetch_array($sqlusers))
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
	
        $sqlaux = $mysqli->query("select * from ".$prefixsql."users where id = '".$columna["iduser"]."' "); 
        $rowaux = mysqli_fetch_assoc($sqlaux);
        $lbl_usuario = $rowaux["display"];

        
        
        echo '<td><label><input type="checkbox" value="'.$columna["uidsession"].'" name="chkuidsession[]" /> '.$lbl_usuario.'</label></td>';
        echo '<td>'.$columna["uidsession"].'</td>';
        echo '<td>'.$columna["useragente"].'</td>';
        echo '<td>'.$columna["fecha"].'</td>';
		echo '<td>'.$columna["nomsesion"].'</td>';
	echo '</tr>';
}


?>

</table>
</div>
</form>

