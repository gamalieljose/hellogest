<?php

?>
<div class="grupotabs">
    <div class="campoencoger">
<?php
$claseboton = "btn_tab";
echo '<a class="'.$claseboton.'" href="index.php?module=tpv&section=cfgterm">Terminales</a> ';

$claseboton = "btn_tab";
echo '<a class="'.$claseboton.'" href="index.php?module=tpv&section=cfgcg">Campos personalizados globales</a> ';

$claseboton = "btn_tab_sel";
echo '<a class="'.$claseboton.'" href="index.php?module=tpv&section=cfgia">Impresiones adicionales</a> ';
?>
    </div>
</div>
<p><a href="index.php?module=tpv&section=cfgia&action=new" class="btnedit">Nueva condicion</a></p>


<table width="100%">
    <tr class="maintitle">
        <td width="80"> </td>
        <td>Display</td>
        <td>Plantilla</td>
    </tr>
<?php
$sqlcamposglobales = $mysqli->query("select * from ".$prefixsql."tpv_cfg_ia ");
while($col = mysqli_fetch_array($sqlcamposglobales))
{

    if($col["activo"] == '1'){$imgactivo = "img/yes.png";}else{$imgactivo = "img/no.png";}
          
    
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
    echo '<td><a href="index.php?module=tpv&section=cfgia&action=edit&id='.$col["id"].'" class="btnedit">Editar</a></td>';
    echo '<td><img src="'.$imgactivo.'" /> '.$col["regla"].'</td>';
    echo '<td>'.$col["docprint"].'</td>';
    
    echo '</tr>';

}


?>
    
</table>