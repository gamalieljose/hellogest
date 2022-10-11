<?php
// --------------check permisos -----------------
//echo '<p>Permisos: </p>';

$idusuario = $_COOKIE["lnxuserid"];

//buscamos los grupos a los que pertenece el usuario
$sqlpermisosefe = $mysqli->query("select * from ".$prefixsql."usersgroup  where iduser = '".$idusuario."' order by idgroup");

while($dbgrupos = mysqli_fetch_array($sqlpermisosefe))
{
	if ($idgrupos == '')
	{
		$idgrupos = "idgrupo = '".$dbgrupos["idgroup"]."' ";
	}else
	{
		$idgrupos = $idgrupos." or idgrupo = '".$dbgrupos["idgroup"]."' ";
	}
}
//ditinc idpermiso (asi eviatmos duplicados de permisos entre grupos)
//en la consulta especificamos el idpermiso
//si es admin podrá eliminar el ticket sino, no


$sqlpermisosefe = $mysqli->query("SELECT COUNT(DISTINCT idpermiso) as npermisos FROM ".$prefixsql."permisosgrupos WHERE iduser = '".$idusuario."' or (".$idgrupos.") and idpermiso = '2002'");


$rowperm = mysqli_fetch_assoc($sqlpermisosefe);
$dbrspermisos = $rowperm['npermisos'];

if ($dbrspermisos > 0)
{$muestraborrar = "si";}
else
{$muestraborrar = "no";}

$idticket = $_GET["id"];
?>

<div class="grupotabs">
<div class="campoencoger">
<?php
if ($_GET["section"] == 'tickets' && ($_GET["action"] == 'new' || $_GET["action"] == 'edit') ){$claseboton = "btn_tab_sel";}else{$claseboton = "btn_tab";}
echo '<a class="'.$claseboton.'" href="index.php?module=lnxit&section=tickets&action=edit&id='.$idticket.'">Ticket</a> ';
if ($_GET["section"] == "seguimiento" ){$claseboton = "btn_tab_sel";}else{$claseboton = "btn_tab";}
echo '<a class="'.$claseboton.'" href="index.php?module=lnxit&section=seguimiento&action=new&id='.$idticket.'">Seguimiento</a> ';
if ($_GET["section"] == "docs" ){$claseboton = "btn_tab_sel";}else{$claseboton = "btn_tab";}
echo '<a class="'.$claseboton.'" href="index.php?module=lnxit&section=docs&id='.$idticket.'">Documentos</a> ';
if ($_GET["section"] == "ticketactivos" ){$claseboton = "btn_tab_sel";}else{$claseboton = "btn_tab";}
echo '<a class="'.$claseboton.'" href="index.php?module=lnxit&section=ticketactivos&id='.$idticket.'">Activos</a> ';
if ($_GET["section"] == "ticketfactu" ){$claseboton = "btn_tab_sel";}else{$claseboton = "btn_tab";}
echo '<a class="'.$claseboton.'" href="index.php?module=lnxit&section=ticketfactu&id='.$idticket.'">Facturacion</a> ';
if ($_GET["section"] == "print" ){$claseboton = "btn_tab_sel";}else{$claseboton = "btn_tab";}
echo '<a class="'.$claseboton.'" href="index.php?module=lnxit&section=print&action=setup&id='.$idticket.'">Imprimir</a> ';


if ($muestraborrar == "si")
{
if ($_GET["section"] == 'tickets' && $_GET["action"] == 'del' ){$claseboton = "btn_tab_sel";}else{$claseboton = "btn_tab_del";}
echo '<a class="'.$claseboton.'" href="index.php?module=lnxit&section=tickets&action=del&id='.$idticket.'">Eliminar</a> ';

}
?>
</div>
</div>

