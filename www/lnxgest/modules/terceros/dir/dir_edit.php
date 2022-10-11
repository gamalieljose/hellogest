<script src="scripts/jquery/jquery-2.1.1.js"></script>

<script language="javascript">
$(document).ready(function(){
   $("#cbpais").change(function () {
           $("#cbpais option:selected").each(function () {
            elegido=$(this).val();
            $.post("modules/terceros/ajax/ajx_pais-prov.php", { elegido: elegido }, function(data){
            $("#cbprovincias").html(data);
            });            
        });
   })
});
</script>

<?php

include("modules/terceros/botones.php");
echo '<p></p>';
$idtercero = $_GET["idtercero"];
$iddir = $_GET["iddir"];


echo '<form id="form1" name="form1" method="post" action="index.php?module=terceros&section=dir&action=save&idtercero='.$idtercero.'">';


$cnsdir = $mysqli->query("SELECT * FROM ".$prefixsql."tercerosdir where id = '".$iddir."'");
$row = mysqli_fetch_assoc($cnsdir);
	
$dbreferencia = $row["referencia"];
$dbdir = $row["dir"];
$dbcp = $row["cp"];
$dbpobla = $row["pobla"];
$dbidprov = $row["idprov"];
$dbidpais = $row["idpais"];
$dbtel = $row["tel"];
$dbactivo = $row["activo"];
$dbnotas = $row["notas"];


if($_GET["upd"] == "ate")
{
echo '<div class="animated fadeOut" align="center" style="width:100%; ba">
Cambios aplicados con éxito
</div>';
}
?>


<div class="row">
  <div class="col-sm-2">
    
  </div>
  <div class="col" align="left">
    <input type="checkbox" checked="checked" name="chkactivo" value="1" /> Activo
  </div>
</div>
<div class="row">
  <div class="col-sm-2" align="left">
    Referencia
  </div>
  <div class="col" align="left">
    <?php echo '<input type="text" value="'.$dbreferencia.'" name="txtreferencia" required="" style="width: 100%;">'; ?>
  </div>
</div>

<div class="row">
  <div class="col-sm-2" align="left">
    Direccion
  </div>
  <div class="col" align="left">
    <?php echo '<input type="text" value="'.$dbdir.'" name="txtdir" style="width: 100%;">'; ?>
  </div>
</div>

<div class="row">
  <div class="col-sm-2" align="left">
    CP
  </div>
  <div class="col" align="left">
    <?php echo '<input type="text" value="'.$dbcp.'" name="txtcp"  style="width: 100%;">'; ?>
  </div>
  <div class="col-sm-2" align="left">
    Poblacion
  </div>
  <div class="col" align="left">
    <?php echo '<input type="text" value="'.$dbpobla.'" name="txtpobla" style="width: 100%;">'; ?>
  </div>
</div>

<div class="row">
  <div class="col-sm-2" align="left">
    Pais
  </div>
  <div class="col" align="left">
  
    <select name="cbpais" id="cbpais" style="width: 100%;">
	<?php
	$ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."paises order by pais");
		
	while($columna = mysqli_fetch_array($ConsultaMySql))
	{
		
		if ($columna["id"] == $dbidpais)
		{
			echo '<option value="'.$columna["id"].'" selected>'.$columna["pais"].'</option>';
		}
		else
		{
			echo '<option value="'.$columna["id"].'">'.$columna["pais"].'</option>';
		}
		
	}

	
?>
	</select>
  </div>
</div>

<div class="row">
  <div class="col-sm-2" align="left">
    Provincia
  </div>
  <div class="col" align="left">
    <select name="cbprovincias" id="cbprovincias" style="width: 100%;">
	<?php
	$ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."provincias where idpais = '".$dbidpais."' order by provincia");
		
	while($columna = mysqli_fetch_array($ConsultaMySql))
	{
		
		if ($columna["id"] == $dbidprov)
		{
			echo '<option value="'.$columna["id"].'" selected>'.$columna["provincia"].'</option>';
		}
		else
		{
			echo '<option value="'.$columna["id"].'">'.$columna["provincia"].'</option>';
		}
		
	}

	
?>
	</select>
  </div>
</div>

<div class="row">
  <div class="col-sm-2" align="left">
    Telefono
  </div>
  <div class="col" align="left">
    <?php echo '<input type="text" value="'.$dbtel.'" name="txttel" style="width: 100%;">'; ?>
  </div>
</div>

<div class="row">
  <div class="col-sm-2" align="left">
    Notas
  </div>
  <div class="col" align="left">
    <textarea name="txtnotas" style="width: 100%; height: 300px "><?php echo $dbnotas; ?></textarea>
  </div>
</div>




	
	
	<input type="hidden" name="haccion" value="update">
	<?php 
	echo '<input type="hidden" name="hidtercero" value="'.$idtercero.'">'; 
	echo '<input type="hidden" name="hidregistro" value="'.$iddir.'">';
	?>
	


<div align="center" class="rectangulobtnsguardar">

<input class="btnsubmit" name="btnguardar" value="Guardar" type="submit"> 
<input class="btnapply" name="btnaplicar" value="Aplicar" type="submit"> 

<?php echo ' <a href="index.php?module=terceros&section=dir&idtercero='.$idtercero.'" class="btncancel" >Cancelar</a>'; ?>

</div>

</form>
