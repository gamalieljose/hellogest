<?php

$idproducto = $_GET["id"];


$cnsconta = $mysqli->query("SELECT * FROM ".$prefixsql."empresa where campo = 'conta'");
$rowempresa = mysqli_fetch_assoc($cnsconta);
	
$mod_stock = $rowempresa["valor"]; //yes
?>
<div class="grupotabs">
<div class="campoencoger">
<?php
if ($_GET["section"] == 'articulos' && $_GET["action"] == 'edit') {$pintaboton = "btn_tab_sel";}else{$pintaboton = "btn_tab";}
	echo '<a class="'.$pintaboton.'" href="index.php?module=almacen&section=articulos&action=edit&id='.$idproducto.'">Articulo</a> ';

if ($_GET["section"] == 'pro' ) {$pintaboton = "btn_tab_sel";}else{$pintaboton = "btn_tab";}
	echo '<a class="'.$pintaboton.'" href="index.php?module=almacen&section=pro&id='.$idproducto.'">Proveedores</a> ';
	
if ($_GET["section"] == 'stock' || $_GET["section"] == 'stockfix' || $_GET["section"] == 'stocktransfer') {$pintaboton = "btn_tab_sel";}else{$pintaboton = "btn_tab";}
	echo '<a class="'.$pintaboton.'" href="index.php?module=almacen&section=stock&id='.$idproducto.'">Stock</a> ';
	
if($LNXERP_bloqueado == "NO")
{
if ($_GET["section"] == 'articulos' && $_GET["action"] == 'del') {$pintaboton = "btn_tab_sel";}else{$pintaboton = "btn_tab_del";}
	echo '<a class="'.$pintaboton.'" href="index.php?module=almacen&section=articulos&action=del&id='.$idproducto.'">Eliminar Articulo</a> ';
}


?>

</div>
</div>