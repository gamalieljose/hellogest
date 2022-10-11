<?php
$idtercero = $_GET["idtercero"];
include("modules/terceros/botones.php");

$buscatercero = $mysqli->query("SELECT * FROM ".$prefixsql."terceros where id = '".$idtercero."'");
$row = mysqli_fetch_assoc($buscatercero);
	
$dbrazonsocial = $row["razonsocial"];

$urlvincnew = "index.php?module=terceros&section=tercerosvinc&idtercero=".$idtercero."&action=new";
?>

<p><a href="<?php echo $urlvincnew; ?>" class="btnedit">Nuevo vinculo</a> Tercero: <b><?php echo $dbrazonsocial; ?></b></p>

<table width="100%">
<tr class="maintitle">
<th width="80"> </th>
<th>Tercero</th>
<th>Vinculo</th>
<th width="80"> </th>
</tr>
<?php
$cnssql= $mysqli->query("select * from ".$prefixsql."terceros_vinc where idtercero = '".$idtercero."'");	
while($col = mysqli_fetch_array($cnssql))
{
    $sqlaux = $mysqli->query("select id, razonsocial from ".$prefixsql."terceros where id = '".$col["idtercerob"]."' "); 
    $rowaux = mysqli_fetch_assoc($sqlaux);
    $lblrazonsocial = $rowaux["razonsocial"];

    $sqlaux = $mysqli->query("select * from ".$prefixsql."terceros_vinc_label where id = '".$col["idvinc"]."' "); 
    $rowaux = mysqli_fetch_assoc($sqlaux);
    $dblabela = $rowaux["labela"];
    $dblabelb = $rowaux["labelb"];

    if($col["vinclabel"] == 'A'){$lblvinculacion = $dblabela;}
    if($col["vinclabel"] == 'B'){$lblvinculacion = $dblabelb;}


    if ($color == '1'){$color = '2'; $pintacolor = "listacolor2";} else {$color = '1'; $pintacolor = "listacolor1";}
        
    echo "<tr class=\"".$pintacolor."\" onmouseover=\"this.className = 'listacolorsobre'\" onmouseout=\"this.className = '".$pintacolor."'\">";
    echo '<td><a href="index.php?module=terceros&section=tercerosvinc&idtercero='.$idtercero.'&action=edit&id='.$col["idtercero"].'-'.$col["idtercerob"].'" class="btnedit">Editar</a></td>';
    echo '<td><a href="index.php?module=terceros&section=tercerosvinc&idtercero='.$col["idtercerob"].'" >'.$lblrazonsocial.'</a></td>';
    echo '<td>'.$lblvinculacion.'</td>';
    echo '<td align="right"><a href="index.php?module=terceros&section=tercerosvinc&idtercero='.$idtercero.'&action=del&id='.$col["idtercero"].'-'.$col["idtercerob"].'" class="btnenlacecancel">Eliminar</a></td>';
    echo '</tr>';
    
}

?>
</table>
