<?php
include("modules/crm/camp/botonera.php");

$idcamp = $_GET["idcamp"];

$sqlaux = $mysqli->query("select * from ".$prefixsql."crm_camp where id = '".$idcamp."' "); 
$rowaux = mysqli_fetch_assoc($sqlaux);
$lbl_camp = $rowaux["camp"];
?>
<p><?php echo '<a href="index.php?module=crm&section=seguimientos&action=new&idcamp='.$idcamp.'" class="btnedit">Nuevo seguimiento</a> <b>'.$lbl_camp.'</b>'; ?></p>

<table width="100%">
    <tr class="maintitle">
        <th width="70"></th>
        <th>Tercero</th>
        <th width="150">Fecha</th>
        <th width="30"><i class="fa fa-fw fa-phone" title="Llamada" alt="Llamada"></i></th>
		<th width="30"><i class="fa fa-fw fa-user"  title="Visita" alt="Visita"></i></th>
		<th width="30"><i class="fa fa-fw fa-envelope" title="email" alt="email"></i></th>
		<th width="30"><i class="fa fa-fw fa-comment-dots" title="Otros" alt="Otros"></i></th>
        <th>Última Nota</th>
        <th width="40"></th>
		<th width="80"></th>
    </tr>
<?php
$cnssql= $mysqli->query("SELECT * FROM ".$prefixsql."crm_seg where idcamp = '".$idcamp."' order by fecha desc");
while($col = mysqli_fetch_array($cnssql))
{
    $xfecha = explode(" ", $col["fecha"]);
    $xfechadias = explode("-", $xfecha[0]);

    $dbfechadias = $xfechadias[2]."/".$xfechadias[1]."/".$xfechadias[0];

    $xhora = explode(":", $xfecha[1]);
    $dbfechahoras = $xhora[0].":".$xhora[1];

    $sqlaux = $mysqli->query("select id, razonsocial from ".$prefixsql."terceros where id = '".$col["idtercero"]."' "); 
    $rowaux = mysqli_fetch_assoc($sqlaux);
    $dbtercerorz = $rowaux["razonsocial"];

    if($col["idcontacto"] > 0)
    {
        $sqlaux = $mysqli->query("select id, nombre from ".$prefixsql."terceroscontactos where id = '".$col["idcontacto"]."' "); 
        $rowaux = mysqli_fetch_assoc($sqlaux);
        $lbl_contacto = "</br>- <i>".$rowaux["nombre"]."</i>";
    }
    else 
    {
        $lbl_contacto = "";    
    }

    if($col["llamada"] == "1"){$lbl_llamada = '<i class="fa fa-fw fa-phone" title="Llamada" alt="Llamada"></i>';}else{$lbl_llamada = '';}
    if($col["visita"] == "1"){$lbl_visita = '<i class="fa fa-fw fa-user" title="Visita" alt="Visita"></i>';}else{$lbl_visita = '';}
    if($col["email"] == "1"){$lbl_email = '<i class="fa fa-fw fa-envelope" title="Email" alt="Email"></i>';}else{$lbl_email = '';}
    if($col["otros"] == "1"){$lbl_otros = '<i class="fa fa-fw fa-comment-dots" title="Otros" alt="Otros"></i>';}else{$lbl_otros = '';}

    if($col["rsseg"] == "0"){$lbl_rsseg = '';}
    if($col["rsseg"] == "1"){$lbl_rsseg = '<i class="fa fa-thumbs-up fa-lg" alt="Aprobado" title="Aprobado"></i>';}
    if($col["rsseg"] == "-1"){$lbl_rsseg = '<i class="fa fa-thumbs-down fa-lg" alt="Rechazado" title="Rechazado"></i>';}

    $sqlaux = $mysqli->query("select * from ".$prefixsql."ficheros_loc where module = 'crm_seg' and idlinea0 = '".$col["id"]."' "); 
    $rowaux = mysqli_fetch_assoc($sqlaux);
    $dbidfichero = $rowaux["idfichero"];
    if($dbidfichero > 0)
    {
        $btn_fichero = '<a href="modules/ficheros/download.php?id='.$dbidfichero.'" class="btnedit" target="_blank">Download</a>';
    }
    else 
    {
        $btn_fichero = '';    
    }

    if ($color == '1'){$color = '2'; $pintacolor = "listacolor2";} else {$color = '1'; $pintacolor = "listacolor1";}
        
    echo "<tr class=\"".$pintacolor."\" onmouseover=\"this.className = 'listacolorsobre'\" onmouseout=\"this.className = '".$pintacolor."'\">";
    echo '<td><a href="index.php?module=crm&section=seguimientos&action=edit&id='.$col["id"].'&idcamp='.$col["idcamp"].'" class="btnedit" >Editar</a></td>
    <td>'.$dbtercerorz.$lbl_contacto.'</td>
    <td>'.$dbfechadias.' '.$dbfechahoras.'</td>
    <td>'.$lbl_llamada.'</td>
    <td>'.$lbl_visita.'</td>
    <td>'.$lbl_email.'</td>
    <td>'.$lbl_otros.'</td>
    <td>'.$col["seguimiento"].'</td>';
    echo '<td align="center">'.$lbl_rsseg.'</td>';
    echo '<td>'.$btn_fichero.'</td>';
    echo '</tr>';
}
?>
</table>