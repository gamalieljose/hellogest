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

	
<?php

echo '<a href="index.php?module=gastos&section=cfg_main" ><div class="contenedorboton" align="center">
	<div style="font-size:20px; color:blue; flota: left;">
	  <i class="fas fa-cogs"></i>
	
	Configuración general
	</div>
</div>
</a>';


echo '<a href="index.php?module=gastos&section=cfg_tg" ><div class="contenedorboton" align="center">
	<div style="font-size:20px; color:blue; flota: left;">
	  <i class="fas fa-user-check"></i>
	
	Tipo gastos
	</div>
</div>
</a>';
?>

