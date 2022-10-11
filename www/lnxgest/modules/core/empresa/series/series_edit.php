<div class="grupotabs">
<div class="campoencoger">
<?php
if ($_GET["section"] == 'series' && $_GET["action"] == 'edit' && ($_GET["tab"] == '' || $_GET["tab"] == '1')) {$pintaboton = "btn_tab_sel";}else{$pintaboton = "btn_tab";}
echo '<a class="'.$pintaboton.'" href="index.php?&module=core&section=series&action=edit&tab=1&id='.$_GET["id"].'">Serie</a> ';

if ($_GET["section"] == 'series' && $_GET["tab"] == '2') {$pintaboton = "btn_tab_sel";}else{$pintaboton = "btn_tab";}
echo '<a class="'.$pintaboton.'" href="index.php?&module=core&section=series&action=edit&tab=2&id='.$_GET["id"].'">Regla impuestos</a> ';
	
if ($_GET["section"] == 'articulos' && $_GET["action"] == 'del') {$pintaboton = "btn_tab_sel";}else{$pintaboton = "btn_tab_del";}
echo '<a class="'.$pintaboton.'" href="index.php?module=core&section=series&action=delete&id='.$_GET["id"].'">Eliminar</a> ';



?>

</div>
</div>


<?php
if ($_GET["tab"] == '' || $_GET["tab"] == '1') {include("modules/core/empresa/series/series_edit_tab1.php");}
if ($_GET["tab"] == '2') {include("modules/core/empresa/series/series_edit_tab2.php");}

?>