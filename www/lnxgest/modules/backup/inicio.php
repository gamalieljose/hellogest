<script language="javascript">
function muestraxml(modulo, ficheroxml) 
{
window.open("modules/" + modulo + "/recovery/compare.php?file=" + ficheroxml, "Diseño Web", "width=480, height=400, location=no")
}
</script>
<form name="frmborrar" method="POST" action="index.php?module=backup&action=presave">

<input type="hidden" name="haccion" value="prebackuprestore"/>
<table width="100%">
<tr class="maintitle">
<th width="50"> </th>
<th align="center" width="50"> </th>
<th>Modulo</th>
<th>Descripcion</th>
<th>Fichero</th>
<th  width="40"> </th>
</tr>
<?php

//$lnxrecoverymode_files = "/lnxgest/recovery/"; 
$ficherosxmldir = array_diff(scandir($lnxrecoverymode_files), array('..', '.'));

foreach ($ficherosxmldir as $ficherito) 
{

    $ficheroxml = $lnxrecoverymode_files.$ficherito; 

    $xml = simplexml_load_file($ficheroxml);

    $xml_modulo = $xml->module;



    if ($color == '1'){$color = '2'; $pintacolor = "listacolor2";} else {$color = '1'; $pintacolor = "listacolor1";}
        
    echo "<tr class=\"".$pintacolor."\" onmouseover=\"this.className = 'listacolorsobre'\" onmouseout=\"this.className = '".$pintacolor."'\">";
    echo "<td><a href=\"javascript:muestraxml('".$xml_modulo."', '".$ficherito."');\" class=\"btnedit\">Comparar</a></td>";
    echo '<td align="center"><input type="checkbox" value="'.$ficherito.'" name="chkficheroxml[]" /></td>';
    echo '<td>'.$xml_modulo.'</td>';
    echo '<td>'.$ficheroxml.'</td>';
    echo '<td>'.$ficherito.'</td>';
    echo '<td align="right"><a href="index.php?module=backup&action=del&xmlfile='.$ficherito.'" alt="Eliminar" title="Eliminar" class="btnenlacecancel">X</a></td>';
    echo '</tr>';
}

?>

</table>

<div align="center" class="rectangulobtnsguardar"> 
<button type="submit" class="btnsubmit" > <i class="hidephonview fa fa-database fa-lg"></i> Restaurar seleccionados</button> 
</div>
</form>