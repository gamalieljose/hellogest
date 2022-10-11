<?php
include("modules/core/users/users/botonera.php");
?>
<div align="center">
<form name="form1" action="index.php?&module=core&section=permisosespecificos&action=save" method="POST">
<input type="hidden" value="update" name="haccion"/>
<?php 
echo '<input type="hidden" value="'.$_GET["id"].'" name="hidusuario"/>'; 
?>

<h2 align="center">Permisos especificos</h2>

<div align="center" class="rectangulobtnsguardar" >

        <button type="submit" class="btnsubmit" >
                <i class="hidephonview fa fa-search fa-lg"></i> Aplicar cambios
        </button>
</div>

<table width="100%">

<?php
$sqlmodulos = $mysqli->query("select * from ".$prefixsql."modulos order by display");
while($columna = mysqli_fetch_array($sqlmodulos))
{
	echo '<tr class="maintitle"><td>'.$columna["display"].'</td></tr>';
	
	$sqlpermisos = $mysqli->query("select * from ".$prefixsql."permisos where idmod = '".$columna["idmod"]."' order by display");
	while($colpermisos = mysqli_fetch_array($sqlpermisos))
	{
		$sqlcheckpermiso= $mysqli->query("SELECT * from ".$prefixsql."permisosgrupos where iduser = '".$_GET["id"]."' and idpermiso = '".$colpermisos["idpermiso"]."'");
		$existe = $sqlcheckpermiso->num_rows;
		
		if ($existe == '1'){$seleccionado = ' checked=""';}else{$seleccionado = '';}
		
		echo '<tr><td><label><input type="checkbox" value="'.$colpermisos["idpermiso"].'" name="chkpermiso[]" '.$seleccionado.'/> '.$colpermisos["display"].'</td></tr>';
	}
}
?>

</table>

</form>
</div>

<p>&nbsp;</p>