<p>
<a href="index.php?module=lnxit&section=activos" class="btn_tab">Activos</a>
<a href="index.php?module=lnxit&section=activosrc" class="btn_tab">Remote control</a>
<a href="index.php?module=lnxit&section=activosfea" class="btn_tab_sel">Busqueda avanzada</a>
</p>

<p>
<?php
if ($_GET["srch"] == "" || $_GET["srch"] == "features"){$btnclass_features = "btn_tab_sel"; $btnclass_licencias = "btn_tab";}
if ($_GET["srch"] == "licenses"){$btnclass_features = "btn_tab"; $btnclass_licencias = "btn_tab_sel";}
?>
<a href="index.php?module=lnxit&section=activosfea&srch=features" class="<?php echo $btnclass_features; ?>">Caracteristicas</a>
<a href="index.php?module=lnxit&section=activosfea&srch=licenses" class="<?php echo $btnclass_licencias; ?>">Licencias</a>
</p>

<?php
if ($_GET["srch"] == "" || $_GET["srch"] == "features"){include("modules/lnxit/activosfea/list_features.php");}
if ($_GET["srch"] == "licenses"){include("modules/lnxit/activosfea/list_licencias.php");}

?>