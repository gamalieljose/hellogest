
<script src="scripts/jquery/jquery-2.1.1.js"></script>
<script src="scripts/jquery/jquery-ui.js"></script>

<script language="javascript">
$(document).ready(function(){
   $("#cbtiendas").change(function () {
           $("#cbtiendas option:selected").each(function () {
            elegido=$(this).val();
			$.post("modules/tpv/ajax/ajx_tienda-terminal.php", { elegido: elegido }, function(data){
            $("#cbterminales").html(data);
            });            
        });
   })
});
</script>
<?php

?>

<div align="center">

<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<form action="index.php?module=tpv&section=tpv&action=new" method="POST">

<table class="msgaviso" width="400">
<tr class="maintitle"><td colspan="2">Inicio de terminal</td></tr>

<tr>
	<td>Usuario actual</td>
	<td>
	
	<?php 
	$sqlaux = $mysqli->query("select * from ".$prefixsql."users where id = '".$_COOKIE["lnxuserid"]."'");
	$rowaux = mysqli_fetch_assoc($sqlaux);
	echo $rowaux["display"];
	?>
	</td>
</tr>
<tr>
	<td>Tienda</td>
	<td>
		<select name="cbtiendas" id="cbtiendas" style="width: 100%;">
		<?php
	
	

	$sqltiendas = $mysqli->query("select  ".$prefixsql."tiendas.id, ".$prefixsql."tiendas.idempresa, ".$prefixsql."tiendas.tienda from ".$prefixsql."tiendas where ".$prefixsql."tiendas.id in ( select idtienda from ".$prefixsql."userstiendas idtienda where iduser = '".$_COOKIE["lnxuserid"]."') order by ".$prefixsql."tiendas.tienda");
	while($col = mysqli_fetch_array($sqltiendas))
	{
		$sqlaux = $mysqli->query("select * from ".$prefixsql."empresas where id = '".$col["idempresa"]."'");
		$rowaux = mysqli_fetch_assoc($sqlaux);
		$dbrazonsocial =  $rowaux["razonsocial"];

		$sqlaux = $mysqli->query("select * from ".$prefixsql."userstiendas where iduser = '".$_COOKIE["lnxuserid"]."' and idtienda = '".$col["id"]."' ");
                $rowaux = mysqli_fetch_assoc($sqlaux);
                $db_idtiendadft =  $rowaux["dft"];
		$db_iddfttienda = $col["id"];

		if($db_idtiendadft == '1'){$seleccionado = ' selected=""'; $idtiendadft = $col["id"];} else {$seleccionado = '';}
		echo '<option value="'.$col["id"].'"'.$seleccionado.'>'.$col["tienda"].' - ('.$dbrazonsocial.') </option>';
	}
	?>
		</select>
	
	</td>
</tr>

<tr>
	<td>
		Terminal
	</td>
	<td>
    <select name="cbterminales" id="cbterminales" style="width: 100%;">
	<?php
	
	
	$sqltiendas = $mysqli->query("select * from ".$prefixsql."pos_terminales where idtienda = '".$db_iddfttienda."' order by descripcion");
	while($col = mysqli_fetch_array($sqltiendas))
	{

		echo '<option value="'.$col["id"].'">'.$col["descripcion"].'</option>';
	}
	?>
		
	</select>
	</td>
</tr>


<tr><td colspan="2" align="center">
</br>
<input type="submit" class="btnedit_verde" value="Iniciar TPV" />
<a href="index.php?module=tpv&section=list" class="btnedit" >Tickets abiertos</a>
</td></tr>


</table>
</form>
</div>
