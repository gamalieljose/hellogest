<?php
$iddocumento = $_GET["id"];

$tbl_bloquear = $prefixsql.$lnxinvoice;
if(lnx_check_bloqueo($tbl_bloquear, $iddocumento, $_COOKIE["lnxuserid"]) > 0)
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
      var bloquea_idregistro = "<?php echo $iddocumento; ?>";

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
<div class="row" id="boxbloqueo" style="<?php echo $cssboxbloqueo; ?>">
  <div class="col" style="background-color: #ff8d33;">
  <div id="msgbloqueo">Registro Bloqueado</div>		
  </div>
</div>
<?php
if($LNXERP_bloqueado == "NO")
{
echo '<p><a href="index.php?module=fv&section=links&action=new&id='.$iddocumento.'" class="btnedit">Nuevo vinculo</a></p>';
}
?>



<div style="display: block; overflow-x: auto;">

<table width="100%">
<tr class="maintitle">
<th width="80"></th>
<th>Tipo</th>
<th>Documento</th>
<th width="80"></th>
</tr>
<?php

$tipoa = strtoupper($lnxinvoice);

$cnssql= $mysqli->query("select * from ".$prefixsql."opafr where tipoa = '".$tipoa."' and idtipoa = '".$iddocumento."'");	
while($col = mysqli_fetch_array($cnssql))
{

    if($col["tipob"] == "OV"){$lbl_tipo = "Presupuesto Venta";}
    if($col["tipob"] == "OC"){$lbl_tipo = "Presupuesto Compra";}
    if($col["tipob"] == "PV"){$lbl_tipo = "Pedido Venta";}
    if($col["tipob"] == "PC"){$lbl_tipo = "Pedido Compra";}
    if($col["tipob"] == "AV"){$lbl_tipo = "Albaran Venta";}
    if($col["tipob"] == "AC"){$lbl_tipo = "Albaran Compra";}
    if($col["tipob"] == "FV"){$lbl_tipo = "Factura Venta";}
    if($col["tipob"] == "FC"){$lbl_tipo = "Factura Compra";}
    if($col["tipob"] == "FVR"){$lbl_tipo = "Factura V. Rectificativa";}

    $dbtipob = strtolower($col["tipob"]);

    $cnsaux = $mysqli->query("SELECT * from ".$prefixsql.$dbtipob." where id = '".$col["idtipob"]."'");
    $rowaux = mysqli_fetch_assoc($cnsaux);
    $lbl_codigob = $rowaux["codigo"];

if ($color == '1'){$color = '2'; $pintacolor = "listacolor2";} else {$color = '1'; $pintacolor = "listacolor1";}
        
echo "<tr class=\"".$pintacolor."\" onmouseover=\"this.className = 'listacolorsobre'\" onmouseout=\"this.className = '".$pintacolor."'\">";
echo '<td><a href="index.php?module='.$dbtipob.'&section=main&action=view&id='.$col["idtipob"].'" class="btnedit">Ver doc</td>';
echo '<td>'.$lbl_tipo.'</td>';
echo '<td>'.$lbl_codigob.'</td>';
echo '<td align="right">';
if($LNXERP_bloqueado == "NO")
{
    echo '<a href="index.php?module='.$lnxinvoice.'&section=links&action=del&id='.$iddocumento.'&targetb='.$col["idtipob"].'-'.$dbtipob.'" class="btnenlacecancel">Borrar';
}
echo '</td>';
echo '<tr>';
}
?>
</table>
</div>