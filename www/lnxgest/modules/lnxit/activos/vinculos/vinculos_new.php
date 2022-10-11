<?php
include("modules/lnxit/activos/tabs.php");

$idactivo = $_GET["id"];


echo '<form name="frmbuscar" method="POST" action="index.php?module=lnxit&section=activos&ss=vinculos&id='.$idactivo.'&tab=3&action=new" >';
?>
<div class="tblbuscar" >
Activo: 
<input type="text" value="<?php echo $_POST["txtbuscar"]; ?>" name="txtbuscar" /> 
<input type="submit" value="Buscar" class="btnedit_verde"/>
</div>
</form>

<?php
echo '<form name="frmselecciona" method="POST" action="index.php?module=lnxit&section=activos&ss=vinculos&id='.$idactivo.'&tab=3&action=save" >';

echo '<input type="hidden" value="'.$idactivo.'" name="hidactivo" />';

?>
<input type="hidden" value="new" name="haccion" />


<table width="100%">
<tr class="maintitle">
	<th width="80">ID</th>
	<th>Codigo</th>
	<th>Activo</th>
</tr>
<?php
$ftxtbuscar = addslashes($_POST["txtbuscar"]);

$sqlaux = $mysqli->query("select * from ".$prefixsql."ita_activos where id = '".$idactivo."' "); 
$rowaux = mysqli_fetch_assoc($sqlaux);
$dbidtercero = $rowaux["idtercero"];




$cnssql= $mysqli->query("select * from ".$prefixsql."ita_activos where nombre like '".$ftxtbuscar."%' and idtercero = '".$dbidtercero."'");	
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

    echo '<td><label><input type="checkbox" value="'.$col["id"].'" name="chkactivo[]" /> '.$col["id"].'</label></td>';
	echo '<td>'.$col["codigo"].'</td>';
	echo '<td>'.$col["nombre"].'</td>';
}

?>
</table>

<?php
echo '<div align="center" class="rectangulobtnsguardar">
	<input type="submit" class="btnsubmit" name="btnguardar" value="Seleccionar" > 

	<a class="btncancel" href="index.php?module=lnxit&section=activos&ss=vinculos&id='.$idactivo.'&tab=3">Cancelar</a>

</div>';

?>
</form>