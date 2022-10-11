<div class="grupotabs">
<div class="campoencoger">
<?php
$idcamp = $_GET["idcamp"];

if ($_GET["section"] == "camp" && $_GET["action"] == "edit"){$claseboton = "btn_tab_sel";}else{$claseboton = "btn_tab";}
echo '<a class="'.$claseboton.'" href="index.php?module=crm&section=camp&action=edit&idcamp='.$idcamp.'">Campaña</a>';

if ($_GET["section"] == "campterceros" ){$claseboton = "btn_tab_sel";}else{$claseboton = "btn_tab";} 
echo '<a class="'.$claseboton.'" href="index.php?module=crm&section=campterceros&idcamp='.$idcamp.'">Terceros</a>';


if ($_GET["section"] == "campseg" ){$claseboton = "btn_tab_sel";}else{$claseboton = "btn_tab";} 
echo '<a class="'.$claseboton.'" href="index.php?module=crm&section=campseg&idcamp='.$idcamp.'">Seguimientos</a>';

if ($_GET["section"] == "camputils" ){$claseboton = "btn_tab_sel";}else{$claseboton = "btn_tab";} 
echo '<a class="'.$claseboton.'" href="index.php?module=crm&section=camputils&idcamp='.$idcamp.'">Utilidades</a>';


if ($_GET["section"] == "terceros" && $_GET["action"] == "del" ){$claseboton = "btn_tab_sel";}else{$claseboton = "btn_tab_del";}
echo ' <a class="'.$claseboton.'" href="index.php?module=crm&section=camp&action=del&idcamp='.$idcamp.'">Eliminar</a>';
?>
        
        
</div>
</div>