<?php
$ConsultaMySql = $mysqli->query("SELECT * FROM ".$prefixsql."gastos_cfg");
while($col = mysqli_fetch_array($ConsultaMySql))
{
    if($col["opcion"] == "APROBAR"){$db_aprobar = $col["valor"];}
}

?>
<form name="frmconfig" method="POST" action="index.php?module=gastos&section=cfg_main&action=save" >
<input type="hidden" name="haccion" value="savecfg" />
<div align="center" class="rectangulobtnsguardar"> 
<button type="submit" class="btnsubmit" > <i class="hidephonview fa fa-save fa-lg"></i> Guardar</button> 
<a href="index.php?module=gastos&section=cfg" class="btncancel"><i class="hidephonview fa fa-window-close fa-lg"></i> Cancelar</a> 
</div>

<div class="row">
<div class="col maintitle">
General
</div>
</div>
<div class="row">
<div class="col-sm-2">
    Aprobación
</div>
<div class="col">
<?php
if($db_aprobar == "YES"){$seleccionado = ' checked=""';}else{$seleccionado = '';}
echo '<label><input type="checkbox" name="chk_aprobar" value="YES" '.$seleccionado.'/> Se requiere aprobación de gastos</label>';
?>
</div>
</div>
</form>