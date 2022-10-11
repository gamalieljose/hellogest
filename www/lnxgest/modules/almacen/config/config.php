<?php
//leeremos configuracion
$sqlarticulo = $mysqli->query("select * from ".$prefixsql."wh_cfg where opcion = 'controlstock'");
$row = mysqli_fetch_assoc($sqlarticulo);
$dbcontrolstock = $row["valor"]; //stock habilitado 


?>
<form name="form1" method="POST" action="index.php?module=almacen&section=config&action=save"/>

<div class="row">
  <div class="col maintitle" align="left">
    Gestion Entrada de stock
  </div>
</div>


<div class="row">
  <div class="col-sm-2" align="left">
    Control de stock
  </div>
  <div class="col" align="left">
	<?php 
	if ($dbcontrolstock == "YES"){$seleccionado = ' checked=""';}else{$seleccionado = '';}
	echo '<input type="checkbox" value="1" name="chkstock" '.$seleccionado.'/> Control de stock habilitado';
	?>
    
  </div>
</div>




<div align="center" class="rectangulobtnsguardar">

<input class="btnsubmit" name="btnnuevousuario" value="Guardar" type="submit"> 

<a class="btncancel" href="index.php?module=almacen&section=config">Cancelar</a>

</div>


</form>

<p>&nbsp;</p>

<div class="row">
  <div class="col maintitle" align="left">
    Series con control de stock
  </div>
</div>

<div style="display: block; overflow-x: auto;">
<table width="100%">
<tr class="maintitle">
	<td width="80"> </td>
	<td>Serie</td>
</tr>
<?php
$cnssql= $mysqli->query("select * from ".$prefixsql."series where stock = '1' ");	
while($col = mysqli_fetch_array($cnssql))
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
	echo '<td><a href="index.php?&module=empresa&section=series&action=edit&id='.$col["id"].'" class="btnedit" >Editar</a></td>';
	echo '<td>'.$col["serie"].'</td>';
	echo '</tr>';
    
}

?>
</table>

</div>

