<?php

$idwarehouse = $_GET["id"];


?>
<div class="grupotabs">
<div class="campoencoger">

<?php

if ($_GET["section"] == 'wh' && $_GET["action"] == 'edit') {$pintaboton = "btn_tab_sel";}else{$pintaboton = "btn_tab";}
	echo '<a class="'.$pintaboton.'" href="index.php?module=almacen&section=wh&action=edit&id='.$idwarehouse.'">Nombre Almacen</a> ';

if ($_GET["section"] == 'whstock' && $_GET["action"] == '') {$pintaboton = "btn_tab_sel";}else{$pintaboton = "btn_tab";}
	echo '<a class="'.$pintaboton.'" href="index.php?module=almacen&section=whstock&id='.$idwarehouse.'">Stock</a> ';
	
if ($_GET["section"] == 'whmov') {$pintaboton = "btn_tab_sel";}else{$pintaboton = "btn_tab";}
	echo '<a class="'.$pintaboton.'" href="index.php?module=almacen&section=whmov&id='.$idwarehouse.'">Movimientos Almacen</a> ';
	
if ($_GET["section"] == 'wh' && $_GET["action"] == 'del') {$pintaboton = "btn_tab_sel";}else{$pintaboton = "btn_tab_del";}
	echo '<a class="'.$pintaboton.'" href="index.php?module=almacen&section=wh&action=del&id='.$idwarehouse.'">Eliminar Almacen</a> ';


?>
</div></div>