<p><a href="index.php?module=crm&section=seguimientos&action=new" class="btnedit">Nuevo registro</a></p>

<table width="100%">
<tr class="maintitle">
<th width="80"></th>
<th>Tercero</th>
<th width="150">Fecha</th>
<th>Seguimiento</th>
<th>Campaña</th>
<th width="50"></th>
</tr>

<?php

//$cnssql= $mysqli->query("SELECT ".$prefixsql."crm_seg.id , ".$prefixsql."crm_seg.idtercero, ".$prefixsql."terceros.razonsocial FROM ".$prefixsql."crm_seg INNER JOIN ".$prefixsql."terceros on (".$prefixsql."terceros.id = ".$prefixsql."crm_seg.idtercero)");	
$cnssql= $mysqli->query("SELECT ".$prefixsql."crm_seg.id , ".$prefixsql."crm_seg.idtercero, ".$prefixsql."terceros.razonsocial, ".$prefixsql."crm_seg.fecha, ".$prefixsql."crm_seg.idcamp, ".$prefixsql."crm_seg.rsseg, ".$prefixsql."crm_seg.seguimiento FROM ".$prefixsql."crm_seg INNER JOIN ".$prefixsql."terceros on (".$prefixsql."terceros.id = ".$prefixsql."crm_seg.idtercero)");	
while($col = mysqli_fetch_array($cnssql))
{
    if($col["rsseg"] == "0"){$lbl_rsseg = '';}
    if($col["rsseg"] == "1"){$lbl_rsseg = '<i class="fa fa-thumbs-up fa-lg" alt="Aprobado" title="Aprobado"></i>';}
    if($col["rsseg"] == "-1"){$lbl_rsseg = '<i class="fa fa-thumbs-down fa-lg" alt="Rechazado" title="Rechazado"></i>';}

    $xfecha = explode(" ", $col["fecha"]);
    $xfechadias = explode("-", $xfecha[0]);

    $dbfechadias = $xfechadias[2]."/".$xfechadias[1]."/".$xfechadias[0];

    $xhora = explode(":", $xfecha[1]);
    $dbfechahoras = $xhora[0].":".$xhora[1];

    $sqlaux = $mysqli->query("select * from ".$prefixsql."crm_camp where id = '".$col["idcamp"]."' "); 
    $rowaux = mysqli_fetch_assoc($sqlaux);
    $lbl_camp = $rowaux["camp"];

    if ($color == '1'){$color = '2'; $pintacolor = "listacolor2";} else {$color = '1'; $pintacolor = "listacolor1";}
        
echo "<tr class=\"".$pintacolor."\" onmouseover=\"this.className = 'listacolorsobre'\" onmouseout=\"this.className = '".$pintacolor."'\">";
echo '<td><a href="index.php?module=crm&section=seguimientos&action=edit&id='.$col["id"].'" class="btnedit">Editar</a></td>';
echo '<td>'.$col["razonsocial"].'</td>';
echo '<td>'.$dbfechadias.' '.$dbfechahoras.'</td>';
echo '<td>'.$col["seguimiento"].'</td>';
echo '<td>'.$lbl_camp.'</td>';
echo '<td>'.$lbl_rsseg.'</td>';
echo '</tr>';

}
?>


</table>