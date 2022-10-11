<?php
include("modules/".$lnxinvoice."/fv/botones.php");

$idfv = $_GET["id"];

$tbl_bloquear = $prefixsql.$lnxinvoice;
if(lnx_check_bloqueo($tbl_bloquear, $idfv, $_COOKIE["lnxuserid"]) > 0)
{
  //Bloqueado
  $cssboxbloqueo = "display: inline;";
  $cssbotonbloqueo = "display: none;";
  $LNXERP_bloqueado = "YES";
}
else 
{
  //sin bloquear
  $cssboxbloqueo = "display: none;";
  $cssbotonbloqueo = "display: inline;";
  $LNXERP_bloqueado = "NO";
}
?>
<script type="text/javascript">
$(document).ready(function() {

    lnxbloquea(); //Ejecutamos script nada más abrir el registro

    function lnxbloquea() {

      var bloquea_tabla = "<?php echo $tbl_bloquear; ?>";
      var bloquea_idregistro = "<?php echo $idfv; ?>";

      $.post("core/lock.php", { lnxtabla: bloquea_tabla, lnxregistro: bloquea_idregistro}, function(data){

        response = JSON.parse(data);
        document.getElementById('msgbloqueo').innerHTML = response["rssimple"];

        if(response["rseditable"] == "NO")
        {         
          document.getElementById('boxbloqueo').style.display = "inline";
        }
        if(response["rseditable"] == "YES")
        {         
          document.getElementById('boxbloqueo').style.display = "none"; 
        }
      
      });
       
    }
    setInterval(lnxbloquea, 5000);
});
</script>

<?php
$auxsumas = $mysqli->query("SELECT SUM(importe) as importe from ".$prefixsql.$lnxinvoice."_lineas where ".$campomasterid." = '".$idfv."' and exclufactu = '0'");
$auxrow = mysqli_fetch_assoc($auxsumas);
$lblbaseimponible = $auxrow["importe"];
$lblbaseimponible = round($lblbaseimponible,2);

$auxsumas = $mysqli->query("SELECT SUM(importe) as importe from ".$prefixsql.$lnxinvoice."_lineas_tax where ".$campomasterid." = '".$idfv."' ");
$auxrow = mysqli_fetch_assoc($auxsumas);
$lblsumaimpuestos = $auxrow["importe"];
$lblsumaimpuestos = round($lblsumaimpuestos,2);

$auxsumas = $mysqli->query("SELECT SUM(importe) as importe from ".$prefixsql.$lnxinvoice."_lineas where ".$campomasterid." = '".$idfv."' and exclufactu = '1'");
$auxrow = mysqli_fetch_assoc($auxsumas);
$lblexcluidos = $auxrow["importe"];
$lblexcluidos = round($lblexcluidos,2);

$dbtotal = $lblbaseimponible + $lblsumaimpuestos + $lblexcluidos;

?>
<div class="row" id="boxbloqueo" style="<?php echo $cssboxbloqueo; ?>">
  <div class="col" style="background-color: #ff8d33;">
  <div id="msgbloqueo">Registro Bloqueado</div>		
  </div>
</div>


<?php 
if($LNXERP_bloqueado == "NO")
{
echo '<p><a class="btnedit" href="index.php?module='.$lnxinvoice.'&section=pagos&id='.$idfv.'&action=new">Nuevo pago</a></p>'; 
}
?>
<div class="row">
	<div class="col-sm-2">
		Total Factura
	</div>
	<div class="col">
	<?php echo $dbtotal; ?>
	</div>
</div>

<div class="row">
	<div class="col-sm-2">
		Pagado
	</div>
	<div class="col">
	<?php
$cnsaux = $mysqli->query("SELECT SUM(importe) as sumaimporte from ".$prefixsql.$lnxinvoice."_pagos where ".$campomasterid." = '".$idfv."'");
$rowpago = mysqli_fetch_assoc($cnsaux);
$dbsumaimporte = $rowpago["sumaimporte"];
$dbsumaimporte = round($dbsumaimporte, 2);

echo $dbsumaimporte;
?>
	</div>
</div>

<div class="row">
	<div class="col-sm-2">
		Pendiente
	</div>
	<div class="col">
	<?php
$pendientepago = $dbtotal - $dbsumaimporte;

echo $pendientepago;
?>
	</div>
</div>



<table width="100%">
<tr class="maintitle">
	<td width="40">&nbsp;</td>
	<td>Recibo</td>
	<td>Fecha</td>
	<td>Importe</td>
	<td>Forma de pago</td>
</tr>

<?php
$cnsaux = $mysqli->query("SELECT * from ".$prefixsql.$lnxinvoice." where id = '".$idfv."'");
$rowpago = mysqli_fetch_assoc($cnsaux);
$dbcodigo = $rowpago["codigo"];

$ConsultaMySql = $mysqli->query("SELECT * from ".$prefixsql.$lnxinvoice."_pagos where ".$campomasterid." = '".$idfv."' order by fecha");

$color = 1;
while($columna = mysqli_fetch_array($ConsultaMySql))
{
	$xtemp = explode("-", $columna["fecha"]);
	$lbl_fecha = $xtemp[2]."/".$xtemp[1]."/".$xtemp[0];
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
	echo '<td><a class="btnedit" href="index.php?module='.$lnxinvoice.'&section=pagos&id='.$idfv.'&action=edit&idpago='.$columna["id"].'">Editar</a></td>';
	echo '<td>'.$dbcodigo."-".$columna["id"].'</td>';
	echo '<td>'.$lbl_fecha.'</td>';
	echo '<td>'.$columna["importe"].'</td>';
	
	$cnsaux = $mysqli->query("SELECT * from ".$prefixsql."formaspago where id = '".$columna["idfpago"]."'");
	$rowpago = mysqli_fetch_assoc($cnsaux);
	$dbformapago = $rowpago["formapago"];
	
	$cnsaux = $mysqli->query("SELECT * from ".$prefixsql."bancos_cpago where id = '".$columna["idcpago"]."'");
	$rowpago = mysqli_fetch_assoc($cnsaux);
	$dbcpago = $rowpago["cpago"];
	
	echo '<td>'.$dbformapago.' - '.$dbcpago.'</td>';
	echo '</tr>';
}
?>

</table>