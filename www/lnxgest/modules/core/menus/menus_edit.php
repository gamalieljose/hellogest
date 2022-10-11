<?php
$idmenu = $_GET["id"];

$sqlaux = $mysqli->query("select * from ".$prefixsql."menus where id = '".$idmenu."' "); 
$rowaux = mysqli_fetch_assoc($sqlaux);
$dbidmenu = $rowaux["idmenu"];
$dbmodule = $rowaux["module"];
$dbsection = $rowaux["section"]; if($dbsection == "-"){$dbsection = "";}
$dbdisplay = $rowaux["display"];
$dborden = $rowaux["orden"];
$dbidpermiso = $rowaux["idpermiso"];
$dbicono = $rowaux["icono"];



?>

<form name="frmmenuelemento" method="POST" action="index.php?module=core&section=menus&action=save">
<input type="hidden" name="haccion" value="update"/>
<input type="hidden" name="hidmenu" value="<?php echo $idmenu; ?>"/>
<div class="row">
    <div class="col-sm-2" align="left">
        Menu Padre
    </div>
    <div class="col" align="left">
        <select name="lstidmenu" class="campoencoger">
<?php
if ($dbidmenu == "0"){$seleccionado = ' selected=""';}else{$seleccionado = '';}
	echo '<option value="0" '.$seleccionado.'>- Menu principal -</option>';

	$sqlaux = $mysqli->query("SELECT * from ".$prefixsql."menus order by display");
	while($colaux = mysqli_fetch_array($sqlaux))
	{
            if ($dbidmenu == $colaux["id"]){$seleccionado = ' selected=""';}else{$seleccionado = '';}
		echo '<option value="'.$colaux["id"].'" '.$seleccionado.'>'.$colaux["id"].' - '.$colaux["display"].'</option>';
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
<?php
        
if ($dbmodule == "0"){$seleccionado = ' selected=""';}else{$seleccionado = '';}
        echo '<option value="0" '.$seleccionado.'>- Sin especificar módulo -</option>';
        
      
        $directorio = opendir("./modules/");


while($archivo = readdir($directorio))
    {    
    
    
    $ficherodir = "modules/".$archivo;
    //echo "<p>".$ficherodir."</p>";
    
        if(is_dir($ficherodir) && $archivo !== ".." && $archivo !== ".")
        {
            if ($dbmodule == $archivo){$seleccionado = ' selected=""';}else{$seleccionado = '';}
            echo '<option value="'.$archivo.'" '.$seleccionado.'>'.$archivo.'</option>';
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
        <input type="text" value="<?php echo $dbsection; ?>" maxlength="20" name="txtsection" />
    </div>
</div>
<div class="row">
    <div class="col-sm-2" align="left">
        Display
    </div>
    <div class="col" align="left">
        <input type="text" value="<?php echo $dbdisplay; ?>" maxlength="50" name="txtdisplay" required="" style="width: 100%;"/>
    </div>
</div>
<div class="row">
    <div class="col-sm-2" align="left">
        Orden
    </div>
    <div class="col" align="left">
        <input type="number" value="<?php echo $dborden; ?>" name="txtorden" />
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
            if($dbidpermiso == $colaux["idpermiso"]){$seleccionado = ' selected=""';}else{$seleccionado = '';}
		echo '<option value="'.$colaux["idpermiso"].'" '.$seleccionado.'>'.$colaux["idpermiso"].' - '.$colaux["display"].'</option>';
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
        <input type="text" value="<?php echo $dbicono; ?>" name="txticono" maxlength="50" />
    </div>
</div>
<div class="row">
<div class="col maintitle">Idiomas</div>
</div>

<?php
$cnssql= $mysqli->query("select * from ".$prefixsql."dic_idiomas order by idioma");	
while($col = mysqli_fetch_array($cnssql))
{
    $sqlaux = $mysqli->query("select * from ".$prefixsql."menus_lang where idmenu = '".$idmenu."' and idlang = '".$col["id"]."'"); 
    $rowaux = mysqli_fetch_assoc($sqlaux);
    $dbetiqueta = $rowaux["etiqueta"];
    
    echo '<div class="row">';
    echo '<div class="col-sm-2">';
    echo $col["idioma"];
    echo '</div>';
    echo '<div class="col">';
    echo '<input type="text" name="txtidioma['.$col["id"].']" value="'.$dbetiqueta.'" placeholder="Traducción en '.$col["idioma"].'" style="width: 100%;" maxlength="50"/>';
    echo '</div>';
    echo '</div>';
}

?>

<div align="center" class="rectangulobtnsguardar">

<input class="btnsubmit" name="btnguardar" value="Guardar" type="submit"> 

<a class="btncancel" href="index.php?module=core&section=menus">Cancelar</a>

</div>
</form>