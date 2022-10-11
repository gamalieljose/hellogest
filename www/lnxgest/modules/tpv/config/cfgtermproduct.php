<?php
$idterminal = $_GET["id"];

$claseboton = "btn_tab";
echo '<a class="'.$claseboton.'" href="index.php?module=tpv&section=cfgterm&action=edit&id='.$idterminal.'">Terminal / Serie</a> ';

$claseboton = "btn_tab_sel";
echo '<a class="'.$claseboton.'" href="index.php?module=tpv&section=cfgtermproduct&id='.$idterminal.'">Productos</a> ';


?>

<p>
<?php
echo '<a href="index.php?module=tpv&section=cfgtermproduct&action=new&id='.$idterminal.'" class="btnedit">Nuevo producto</a>';
?>
</p>

<table width="100%">
<tr class="maintitle">
    <th width="40"> </th>
    <th>Producto</th>
    <th width="80" align="center">Orden</th>
</tr>
<?php
$ConsultaMySql = $mysqli->query("SELECT * from ".$prefixsql."tpv_cfg_home where idterminal = '".$idterminal."' order by orden");
$contador = $ConsultaMySql->num_rows;
while($col = mysqli_fetch_array($ConsultaMySql))
{
    
    $sqlaux = $mysqli->query("select * from ".$prefixsql."productos where id = '".$col["idproducto"]."'");
    $rowaux = mysqli_fetch_assoc($sqlaux);
    $lbl_producto = $rowaux["concepto"];
    
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

$url = "index.php?module=tpv&section=cfgtermproduct&action=save&idlinea=".$col["id"]."&pos=del";
echo '<td><a href="'.$url.'" class="btnenlacecancel">Eliminar</a></td>';
echo '<td>'.$lbl_producto.'</td>';
echo '<td align="center">';

if($col["orden"] == '1'){$lvlup = "1"; $lvldown = "0";}
if($col["orden"] > '1' && $col["orden"] < $contador){$lvlup = "1"; $lvldown = "1";}
if($col["orden"] == $contador){$lvlup = "0"; $lvldown = "1";}
if($col["orden"] == '1' && $contador == '1'){$lvlup = "0"; $lvldown = "0";}

if($lvlup == '1')
{
    $url = "index.php?module=tpv&section=cfgtermproduct&action=save&idlinea=".$col["id"]."&pos=up";
    echo '<a href="'.$url.'" ><img src="img/flecha-abajo.png"/></a> ';
}
if($lvldown == "1")
{
    $url = "index.php?module=tpv&section=cfgtermproduct&action=save&idlinea=".$col["id"]."&pos=down";
    echo '<a href="'.$url.'" ><img src="img/flecha-arriba.png"/></a>';
}
echo '</td>';
echo '</tr>';

    
}


?>
</table>

