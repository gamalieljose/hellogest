<style>
.contenedorboton
{
	width: 250px;
	height: 80px;
	border-style: solid;
	border-width: 2px;
	float: left;
	padding: 2px;
	margin-right: 5px;
}
@media screen and (max-width: 991px)
{
	.contenedorboton
	{
		width: 100%;
		height: auto;
		border-style: solid;
		border-width: 2px;
		float: none;
		padding: 2px;
		margin-top: 5px;
		
	}
}

</style>
<p>
<?php

echo '<a class="btn_tab" href="index.php?module=userpanel&section=perfil">Datos</a> ';

echo '<a class="btn_tab_sel" href="index.php?module=userpanel&section=perfil_addons">Complementos</a> ';

?>
</p>

<a href="downloads/lnxclip.zip"><div class="contenedorboton" align="center">
	<div style="font-size:20px; color:blue; flota: left;">
	  <i class="fas fa-paperclip"></i>
	
	LNXCLIP </br>
    Anexador de ficheros
	</div>
</div>
</a>

<a href="downloads/print_client.zip"><div class="contenedorboton" align="center">
	<div style="font-size:20px; color:blue; flota: left;">
	  <i class="fas fa-print"></i>
	
	LNX PRINT </br>
    Cliente de impresión
	</div>
</div>
</a>

<a href="downloads/lnxit_remotecontrol.zip"><div class="contenedorboton" align="center">
	<div style="font-size:20px; color:blue; flota: left;">
	  <i class="fas fa-desktop"></i>
	
	LNXIT Remote Control </br>
    Conexión remota
	</div>
</div>
</a>



