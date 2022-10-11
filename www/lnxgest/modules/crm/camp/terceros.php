<?php
include("modules/crm/camp/botonera.php");

$idcamp = $_GET["idcamp"];

$sqlaux = $mysqli->query("select * from ".$prefixsql."crm_camp where id = '".$idcamp."' "); 
$rowaux = mysqli_fetch_assoc($sqlaux);
$lbl_camp = $rowaux["camp"];

?>

<p><?php echo '<a href="index.php?module=crm&section=seguimientos&action=new&idcamp='.$idcamp.'" class="btnedit">Nuevo seguimiento</a> <b>'.$lbl_camp.'</b>'; ?></p>
<div style="display: block; overflow-x: auto;">
<table width="100%">
    <tr class="maintitle">
        <th width="30"></th>
        <th>Tercero</th>
        <th width="30"><i class="fa fa-fw fa-phone" title="Llamada" alt="Llamada"></i></th>
		<th width="30"><i class="fa fa-fw fa-user"  title="Visita" alt="Visita"></i></th>
		<th width="30"><i class="fa fa-fw fa-envelope" title="email" alt="email"></i></th>
		<th width="30"><i class="fa fa-fw fa-comment-dots" title="Otros" alt="Otros"></i></th>
        <th width="140">Ultima actividad</th>
        <th>Última Nota</th>
		<th width="80"></th>
    </tr>
    
<?php
$cnssql= $mysqli->query("SELECT DISTINCT idtercero, MAX(fecha) as fecha FROM ".$prefixsql."crm_seg where idcamp = '".$idcamp."' group by idtercero order by MAX(fecha) desc");
while($col = mysqli_fetch_array($cnssql))
{

    $dbidtercero = $col["idtercero"];
    

    $sqlaux = $mysqli->query("select * from ".$prefixsql."terceros where id = '".$dbidtercero."' "); 
    $rowaux = mysqli_fetch_assoc($sqlaux);
    $lbl_razonsocial = $rowaux["razonsocial"];
 

    $sqlaux = $mysqli->query("select * from ".$prefixsql."crm_seg where idtercero = '".$dbidtercero."' and idcamp = '".$idcamp."' order by fecha desc limit 1"); 
    $rowaux = mysqli_fetch_assoc($sqlaux);
        $xnotas = substr($rowaux["seguimiento"], 0, 30);
		$lbl_notas = $xnotas."...";


    $xfecha = explode(" ", $col["fecha"]);
    $xfechadias = explode("-", $xfecha[0]);

    $dbfechadias = $xfechadias[2]."/".$xfechadias[1]."/".$xfechadias[0];

    $xhora = explode(":", $xfecha[1]);
    $dbfechahoras = $xhora[0].":".$xhora[1];



    $sqlaux = $mysqli->query("select count(*) as contador from ".$prefixsql."crm_seg where llamada = '1' and idtercero = '".$dbidtercero."' and idcamp = '".$idcamp."' "); 
    $rowaux = mysqli_fetch_assoc($sqlaux);
    $lbl_llamada = $rowaux["contador"];

    $sqlaux = $mysqli->query("select count(*) as contador from ".$prefixsql."crm_seg where visita = '1' and idtercero = '".$dbidtercero."' and idcamp = '".$idcamp."' "); 
    $rowaux = mysqli_fetch_assoc($sqlaux);
    $lbl_visita = $rowaux["contador"];

    $sqlaux = $mysqli->query("select count(*) as contador from ".$prefixsql."crm_seg where email = '1' and idtercero = '".$dbidtercero."' and idcamp = '".$idcamp."' "); 
    $rowaux = mysqli_fetch_assoc($sqlaux);
    $lbl_email = $rowaux["contador"];

    $sqlaux = $mysqli->query("select count(*) as contador from ".$prefixsql."crm_seg where otros = '1' and idtercero = '".$dbidtercero."' and idcamp = '".$idcamp."' "); 
    $rowaux = mysqli_fetch_assoc($sqlaux);
    $lbl_otros = $rowaux["contador"];

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
    echo '<td><a href="index.php?module=crm&section=seguimientos&action=view&idtercero='.$dbidtercero.'" class="btnedit">Ver</a></td>';
    echo '<td>'.$lbl_razonsocial.'</td>';	
    echo '<td align="center">'.$lbl_llamada.'</td>';
	echo '<td align="center">'.$lbl_visita.'</td>';
	echo '<td align="center">'.$lbl_email.'</td>';
	echo '<td align="center">'.$lbl_otros.'</td>';
	
	
    echo '<td>'.$dbfechadias.' '.$dbfechahoras.'</td>';
    echo '<td>'.$lbl_notas.'</td>';
	echo '<td width="80"><a href="index.php?module=crm&section=seguimientos&action=new&idcamp='.$idcamp.'&idtercero='.$dbidtercero.'" class="btnedit">Nuevo Seguimiento</a></td>';
    echo '</tr>';
}




?>
</table>
</div>

