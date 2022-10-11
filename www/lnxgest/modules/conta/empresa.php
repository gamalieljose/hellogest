<script language="javascript">
$(document).ready(function(){
   $("#lstempresa").change(function () {
           $("#lstempresa option:selected").each(function () {
            elegido=$(this).val();
            $.post("modules/conta/ajax/ajx_empresaseries.php", { elegido: elegido }, function(data){
            $("#lstejercicio").html(data);
            });            
        });
   })
});
</script>
<?php

?>
<form name="frmloginconta" method="POST" action="index.php?module=conta&section=login&action=save">

<div class="row">
    <div class="col-sm-2">
		Empresa
    </div>
    <div class="col">
        <select name="lstempresa" id="lstempresa" class="campoencoger" >
            <option value="0">-Selecciona empresa-</option>
        <?php
        $ConsultaMySql= $mysqli->query("SELECT * from ".$prefixsql."empresas order by razonsocial");
        while($col = mysqli_fetch_array($ConsultaMySql))
        {
                echo '<option value="'.$col["id"].'">'.$col["razonsocial"].'</option>';
        }
        ?>
        </select>
    </div>
</div>


<div class="row">
	<div class="col-sm-2">
		Ejercicio
	</div>
	<div class="col">
            <select name="lstejercicio" id="lstejercicio" class="campoencoger" >
                <option value="0">Seleccionar empresa</option>
            </select>
	</div>
</div>
      
      
<div align="center" class="rectangulobtnsguardar">

<input class="btnsubmit" name="btnguardar" value="Guardar" type="submit"> 

<a class="btncancel" href="index.php">Cancelar</a>

</div>
</form>