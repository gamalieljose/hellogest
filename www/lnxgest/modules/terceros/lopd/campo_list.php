<?php

?>


<p>
    <a href="index.php?module=terceros&section=lopdcampos&action=new" class="btnedit" >Nueva Campo</a>
    
    <a href="index.php?module=terceros&section=lopd" class="btnedit" >Plantillas LOPD</a>

</p>

<table width="100%">
    <tr class="maintitle">
        <td width="80"> </td>
        <td>Display</td>
        <td>Tipo</td>
        <td>nombre campo</td>
    </tr>
<?php
$cnslopd = $mysqli->query("SELECT * from ".$prefixsql."terceros_lopd_cfg ");
while($col = mysqli_fetch_array($cnslopd))
{
if ($color == '1')
    {
            $color = '2';
            $pintacolor = "listacolor2";
    }
    else
    {
            $color = '1';
            $pintacolor = "listacolor1";
    }
    echo "<tr class=\"".$pintacolor."\" onmouseover=\"this.className = 'listacolorsobre'\" onmouseout=\"this.className = '".$pintacolor."'\">";
    echo '<td><a href="index.php?module=terceros&section=lopdcampos&action=edit&id='.$col["id"].'" class="btnedit">Editar</a></td>';
    echo '<td>'.$col["display"].'</td>';
    
    $tipocampo = '';
    if ($col["tipo"] == "text"){$tipocampo = '<i class="fas fa-font"></i> Texto';}
    if ($col["tipo"] == "sino"){$tipocampo = '<i class="fas fa-check-square"></i> Si o No';}
    
    
    echo '<td>'.$tipocampo.'</td>';
    echo '<td>'.$col["campo"].'</td>';
    echo '<tr>';
}
?>
</table>