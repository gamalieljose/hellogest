<form name="frmmenuelemento" method="POST" action="index.php?module=core&section=menus&action=save">
<input type="hidden" name="haccion" value="new"/>

<div class="row">
    <div class="col-sm-2" align="left">
        Menu Padre
    </div>
    <div class="col" align="left">
        <select name="lstidmenu" class="campoencoger">
	<option value="0">- Menu principal -</option>
	<?php
	$sqlaux = $mysqli->query("SELECT * from ".$prefixsql."menus order by display");
	while($colaux = mysqli_fetch_array($sqlaux))
	{
		echo '<option value="'.$colaux["id"].'">'.$colaux["id"].' - '.$colaux["display"].'</option>';
	}
	?>
	</select>
    </div>
</div>
<div class="row">
    <div class="col-sm-2" align="left">
        Modulo
    </div>
    <div class="col" align="left">
        <select name="lstmodulo" class="campoencoger" />
        <option value="0">- Sin especificar módulo -</option>
        
<?php      
        $directorio = opendir("./modules/");


while($archivo = readdir($directorio))
    {    
    
    
    $ficherodir = "modules/".$archivo;
    //echo "<p>".$ficherodir."</p>";
    
        if(is_dir($ficherodir) && $archivo !== ".." && $archivo !== ".")
        {
            echo '<option value="'.$archivo.'">'.$archivo.'</option>';
        }
    }

closedir($directorio); 
?>
    </select>
    </div>
</div>
<div class="row">
    <div class="col-sm-2" align="left">
        Section
    </div>
    <div class="col" align="left">
        <input type="text" value="" maxlength="20" name="txtsection" />
    </div>
</div>
<div class="row">
    <div class="col-sm-2" align="left">
        Display
    </div>
    <div class="col" align="left">
        <input type="text" value="" maxlength="50" name="txtdisplay" required="" style="width: 100%;"/>
    </div>
</div>
<div class="row">
    <div class="col-sm-2" align="left">
        Orden
    </div>
    <div class="col" align="left">
        <input type="number" value="0" name="txtorden" />
    </div>
</div>
<div class="row">
    <div class="col-sm-2" align="left">
        ID Permiso
    </div>
    <div class="col" align="left">
        <select name="lstidpermiso" style="width: 100%;">
	<?php
	$sqlaux = $mysqli->query("SELECT * from ".$prefixsql."permisos order by display");
	while($colaux = mysqli_fetch_array($sqlaux))
	{
		echo '<option value="'.$colaux["idpermiso"].'">'.$colaux["idpermiso"].' - '.$colaux["display"].'</option>';
	}
	?>
	</select>
    </div>
</div>
<div class="row">
    <div class="col-sm-2" align="left">
        icono (font awesome)
    </div>
    <div class="col" align="left">
        <input type="text" value="" name="txticono" maxlength="50" />
    </div>
</div>

<div class="row">
<div class="col maintitle">Idiomas</div>
</div>

<?php
$cnssql= $mysqli->query("select * from ".$prefixsql."dic_idiomas order by idioma");	
while($col = mysqli_fetch_array($cnssql))
{
    
    echo '<div class="row">';
    echo '<div class="col-sm-2">';
    echo $col["idioma"];
    echo '</div>';
    echo '<div class="col">';
    echo '<input type="text" name="txtidioma['.$col["id"].']" value="" placeholder="Traducción en '.$col["idioma"].'" style="width: 100%;" maxlength="50"/>';
    echo '</div>';
    echo '</div>';
}

?>

<div align="center" class="rectangulobtnsguardar">

<input class="btnsubmit" name="btnguardar" value="Guardar" type="submit"> 

<a class="btncancel" href="index.php?module=core&section=menus">Cancelar</a>

</div>
</form>