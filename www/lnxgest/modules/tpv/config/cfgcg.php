<?php

?>
<div class="grupotabs">
    <div class="campoencoger">
<?php
$claseboton = "btn_tab";
echo '<a class="'.$claseboton.'" href="index.php?module=tpv&section=cfgterm">Terminales</a> ';

$claseboton = "btn_tab_sel";
echo '<a class="'.$claseboton.'" href="index.php?module=tpv&section=cfgcg">Campos personalizados globales</a> ';

$claseboton = "btn_tab";
echo '<a class="'.$claseboton.'" href="index.php?module=tpv&section=cfgia">Impresiones adicionales</a> ';
?>
    </div>
</div>
<p><a href="index.php?module=tpv&section=cfgcg&action=new" class="btnedit">Nuevo campo</a></p>


<table width="100%">
    <tr class="maintitle">
        <td width="80"> </td>
        <td>Display</td>
        <td>Tipo</td>
        <td>nombre campo</td>
    </tr>
<?php
$sqlcamposglobales = $mysqli->query("select * from ".$prefixsql."tpv_cfg_cg ");
while($col = mysqli_fetch_array($sqlcamposglobales))
{

    if ($color == '1')
    {
        $color = '2';
        $pintacolor = 'listacolor2';
    }
    else
    {
        $color = '1';
        $pintacolor = 'listacolor1';
    }
    echo "<tr class=\"".$pintacolor."\" onmouseover=\"this.className = 'listacolorsobre'\" onmouseout=\"this.className = '".$pintacolor."'\">";

    echo '<td><a class="btnedit" href="index.php?module=tpv&section=cfgcg&action=edit&id='.$col["id"].'" class="btnedit">Editar</a></td>';
    echo '<td>'.$col["display"].'</td>';
    $tipocampo = '';
    if ($col["tipo"] == "text"){$tipocampo = '<i class="fas fa-font"></i> Texto';}
    if ($col["tipo"] == "sino"){$tipocampo = '<i class="fas fa-check-square"></i> Si o No';}
    if ($col["tipo"] == "float"){$tipocampo = '<b>123</b> Numero';}
    
    echo '<td>'.$tipocampo.'</td>';
    echo '<td>'.$col["campo"].'</td>';
    echo '</tr>';

}


?>
    
</table>