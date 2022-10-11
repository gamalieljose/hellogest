<div class="grupotabs">
<div class="campoencoger">

<?php
$sqlaux = $mysqli->query("select * from ".$prefixsql."ita_activos where id = '".$_GET["id"]."' "); 
$rowaux = mysqli_fetch_assoc($sqlaux);
$dbtratarcomo = $rowaux["tratarcomo"];

if ($_GET["ss"] == 'activo') {$btn_clase = "btn_tab_sel";} else{$btn_clase = "btn_tab";}
echo '<a href="index.php?module=lnxit&section=activos&ss=activo&action=edit&id='.$_GET["id"].'" class="'.$btn_clase.'">Activo</a> ';

if ($_GET["ss"] == 'licensing') {$btn_clase = "btn_tab_sel";} else{$btn_clase = "btn_tab";}
echo '<a href="index.php?module=lnxit&section=activos&ss=licensing&id='.$_GET["id"].'&tab=2" class="'.$btn_clase.'">Licencias</a> ';

if ($_GET["ss"] == 'caracteristicas') {$btn_clase = "btn_tab_sel";} else{$btn_clase = "btn_tab";}
echo '<a href="index.php?module=lnxit&section=activos&ss=caracteristicas&id='.$_GET["id"].'&tab=3"class="'.$btn_clase.'">Caracteristicas</a> ';

if($dbtratarcomo == '2')
{
    if ($_GET["ss"] == 'computer') {$btn_clase = "btn_tab_sel";} else{$btn_clase = "btn_tab";}
    echo '<a href="index.php?module=lnxit&section=activos&ss=computer&id='.$_GET["id"].'"class="'.$btn_clase.'">Ordenador</a> ';
}
if ($_GET["ss"] == 'proveedores') {$btn_clase = "btn_tab_sel";} else{$btn_clase = "btn_tab";}
echo '<a href="index.php?module=lnxit&section=activos&ss=proveedores&id='.$_GET["id"].'&tab=3"class="'.$btn_clase.'">Proveedores</a> ';

if ($_GET["ss"] == 'vinculos') {$btn_clase = "btn_tab_sel";} else{$btn_clase = "btn_tab";}
echo '<a href="index.php?module=lnxit&section=activos&ss=vinculos&id='.$_GET["id"].'&tab=3"class="'.$btn_clase.'">Vinculos</a> ';

if ($_GET["ss"] == 'ficheros') {$btn_clase = "btn_tab_sel";} else{$btn_clase = "btn_tab";}
echo '<td><a href="index.php?module=lnxit&section=activos&ss=ficheros&id='.$_GET["id"].'&tab=3" class="'.$btn_clase.'">Ficheros</a> ';

if ($_GET["ss"] == 'docprint') {$btn_clase = "btn_tab_sel";} else{$btn_clase = "btn_tab";}
echo '<td><a href="index.php?module=lnxit&section=activos&ss=docprint&id='.$_GET["id"].'&tab=3" class="'.$btn_clase.'">Imprimir</a> ';

if ($_GET["ss"] == 'del') {$btn_clase = "btn_tab_sel";} else{$btn_clase = "btn_tab_del";}
echo '<td><a href="index.php?module=lnxit&section=activos&ss=activo&action=del&id='.$_GET["id"].'" class="'.$btn_clase.'">Eliminar</a> ';


?>

</div></div>
