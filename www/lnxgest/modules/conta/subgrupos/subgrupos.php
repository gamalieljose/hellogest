<?php
$idempresa = $_COOKIE["lnxcontaidempresa"];
$idejercicio = $_GET["idejercicio"];

$sqlaux = $mysqli->query("select * from ".$prefixsql."conta_ejercicios where id = '".$idejercicio."'"); 
$rowaux = mysqli_fetch_assoc($sqlaux);
$lbl_codigo = $rowaux["codigo"];
$lbl_descripcion = $rowaux["descripcion"];
?>
<div class="grupotabs">
    <div class="campoencoger">
<?php
if ($_GET["section"] == "ejercicios" && $_GET["action"] == "edit"){$claseboton = "btn_tab_sel";}else{$claseboton = "btn_tab";}
echo '<a class="'.$claseboton.'" href="index.php?module=conta&section=ejercicios&action=edit&idejercicio='.$idejercicio.'">Ejercicio</a> ';

if ($_GET["section"] == "grupos"){$claseboton = "btn_tab_sel";}else{$claseboton = "btn_tab";}
echo '<a class="'.$claseboton.'" href="index.php?module=conta&section=grupos&idejercicio='.$idejercicio.'">Grupos</a> ';

if ($_GET["section"] == "subgrupos"){$claseboton = "btn_tab_sel";}else{$claseboton = "btn_tab";}
echo '<a class="'.$claseboton.'" href="index.php?module=conta&section=subgrupos&idejercicio='.$idejercicio.'">SubGrupos</a> ';

?>
    </div>
</div>

<div class="row">
    <div class="col maintitle">
        Cuadro de cuentas y relaciones contables del Plan General de Contabilidad </br>
        <?php echo '<b>'.$lbl_codigo.'</b> - '.$lbl_descripcion; ?>
    </div>
</div>
<?php 
echo '<p><a href="index.php?module=conta&section=subgrupos&idejercicio='.$idejercicio.'&action=new" class="btnedit">Nuevo subgrupo</a></p>'; 
?>
<div style="display: block; overflow-x: auto;">
<table width="100%">
    <tr class="maintitle">
        <th width="80"> </th>
        <th>Codigo</th>
        <th>SubGrupo</th>
    </tr>
<?php
$cnssql= $mysqli->query("select * from ".$prefixsql."conta_subgrupos where idserie = '".$idejercicio."' and idempresa = '".$idempresa."' order by subgrupo");
while($col = mysqli_fetch_array($cnssql))
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

    echo '<td><a href="index.php?module=conta&section=subgrupos&idejercicio='.$idejercicio.'&action=edit&id='.$col["id"].'" class="btnedit">Editar</a></td>';
    echo '<td>'.$col["subgrupo"].'</td>';
    echo '<td>'.$col["descripcion"].'</td>';
    echo '</tr>';
    
}

?>
</table>
    
</div>

