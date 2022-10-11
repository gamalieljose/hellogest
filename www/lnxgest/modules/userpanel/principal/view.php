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

$cnssql= $mysqli->query("select * from ".$prefixsql."users_mainview where iduser = '".$_COOKIE["lnxuserid"]."' order by orden");	
while($col = mysqli_fetch_array($cnssql))
{
    echo '<a href="'.$col["enlace"].'" target="'.$col["ventana"].'" ><div class="contenedorboton" align="center">
	<div style="font-size:20px; color:blue; flota: left;">
	  <i class="fas fa-'.$col["icono"].'"></i>
	
	'.$col["display"].'
	</div>
</div>
</a>';
    
}




?>